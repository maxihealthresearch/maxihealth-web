<?php 
$filter = null;
if (isset($_GET['cat'])) {
	if ($_GET['cat'] == 'all')
		$filter = 'all';
	else
		$filter = intval($_GET['cat']);
}
/*if (!$filter) {
	$fk = array_keys($GLOBALS['categories']);
	$fk = $fk[0];
	$filter = $GLOBALS['categories'][$fk]['subcategories'][0]['id'];
}*/
if ($filter == 'all')
	$filter = null;
?>
<div style="float:right;margin-top:12px">
<form method="get">
	Filter by category:
	<select name="cat" onchange="this.form.submit()">
		<option value="all">-ALL-</option>
		<?php 
		$fcName = '';
		$categories = $GLOBALS['categories'];
		foreach ($categories as $category) {
			if ($filter == $category['id']) $fcName = $category['name'];
			echo '<option value="'. $category['id'], '" style="font-weight:bold"',
						($filter == $category['id'] ? ' selected="selected"' : ''), ' />',
						$category['name'], '</option>';
			foreach ($category['subcategories'] as $subc) {
				echo '<option value="', $subc['id'], '" style="padding-left:20px"',
						($filter == $subc['id'] ? ' selected="selected"' : ''), ' />',
						$subc['name'],
						'</option>';
				if ($filter == $subc['id']) $fcName = $subc['name'];
			}
		}
		?>
	</select>
</form>
</div>
<h2>Products<?php if ($fcName) echo ' in category "'.$fcName.'"' ?></h2>
<?php
require DIR_ADMIN_INCLUDES."table.php";

$sql = 'select sql_calc_found_rows p.*, '.
	' group_concat(distinct cat.name separator "<br />") as categories, '.
	' group_concat(distinct g.name separator "<br />") as groups, '.
	' count(distinct r.id) as reviews ';
if ($filter) {
/* 
Annother approach is:

select p.*, group_concat(cat.name separator "<br />") as categories 
from (
	select distinct pc.product_id as id 
	from categories c 
	inner join products_categories pc on (c.id = pc.category_id) 
	where (c.id = 1 or c.parent_id = 1)
) pf
left join products p on (p.id = pf.id) 
left join products_categories pc2 on (pc2.product_id = p.id)
left join categories cat on (cat.id = pc2.category_id) 
where cat.deleted="N" 
group by p.id 
 */
	$sql .= ' from categories c '.
			' inner join products_categories pc on (c.id = pc.category_id)'.
			' inner join products p on (pc.product_id = p.id)  '.
			' left join products_categories pc2 on (pc2.product_id = p.id) '.
			' left join categories cat on (cat.id = pc2.category_id) '.
			' left join products_groups prg on (prg.product_id = p.id) '.
			' left join groups g on (g.id = prg.group_id) '.
			' left join reviews r on (r.product_id = p.id and r.status="A") '.
			' where  (c.id = '.$filter.' or c.parent_id = '.$filter.')'.
			' group by p.ordr, p.id';
} else {
	$sql .= ' from products p '.
			' left join products_categories pc on (pc.product_id = p.id) '.
			' left join categories cat on (cat.id = pc.category_id) '.
			' left join products_groups prg on (prg.product_id = p.id) '.
			' left join groups g on (g.id = prg.group_id) '.
			' left join reviews r on (r.product_id = p.id and r.status="A") '.
			' where true '.
			' group by p.ordr, p.id'.
			' order by p.date_added DESC';
}
$page = intval($_GET['page']);
if (!$page) $page = 1;

$per_page = 1000;
$sql .= ' limit '.(($page - 1) * $per_page).', '.$per_page;

$res = query ($sql);
$t = mysql_result(query('select found_rows()'), 0, 0);
$total_rows_count = mysql_num_rows($res);
if ($total_rows_count == 0 && $t > 0) {
	header ('Location: ?page=1'.($filter ? '&cat='.$filter : ''));
	exit();
}
if ($total_rows_count > 0) {
	$pages = ceil ($t / $per_page);
	if ($pages > 1) {
		ob_start();
		echo '<div class="fr">Jump to page: ';
		if ($page > 1)
			echo '<a href="?page=', ($page - 1), ($filter ? '&amp;cat='.$filter : ''), '">&laquo</a> ';
		
		for ($i = 1; $i <= $pages; $i ++) {
			if ($i == $page)
				echo $i, ' ';
			else
				echo '<a href="?page=', $i, ($filter ? '&amp;cat='.$filter : ''), '">', $i, '</a> ';
		}
		
		if ($page < $pages)
			echo '<a href="?page=', ($page + 1), ($filter ? '&amp;cat='.$filter : ''), '">&raquo</a> ';

		echo '</div>';
		$pagers_html = ob_get_flush();
	}
?>
<?php
echo $total_rows_count.' items shown&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit.html?id=0" title="Add product">Add product</a>';
?>


<br /><br />
<table class="list_table" cellspacing="0">
	<thead>
		<tr><td width="64">Image</td><td>Name</td><td>Categories</td><td>Groups</td><td>Reviews</td><td>Date Added</td><td width="200">Actions</td></tr>
	</thead>
	<tbody>
	<?php
		while ($r = mysql_fetch_assoc($res)) {	?>
		<tr><td><?php
				//echo '<img alt="" src="', WEB_DIR_IMAGES_PRODUCTS, $r['id'], '_t.png" />';
				echo '<img alt="'.$r['name'].'" src="', WEB_DIR_IMAGES_PRODUCTS, $r['id'], '_t.png?dateStamp=', time(), '" />';
				?>
			</td>
			<td><?php echo $r['name'] ?></td>
			<td><?php echo $r['categories'] ?></td>
			<td><?php echo $r['groups'] ?></td>
			<td><?php echo $r['reviews'] ?></td>
			<td><?php echo $r['date_added'] ?></td>
			<td><a href="edit.html?id=<?= $r['id'] ?>">edit</a>
            <a style="float:right;" href="index.html?action=delete&amp;id=<?= $r['id'] ?>" onclick="return confirmDelete()">delete</a>
            <br /><br />
			New Produts Order: <?php /*?><?= $r['ordr'] ?><?php */?>
			<?php 
					if ($r['ordr'] > 1)
						echo '<a href="?action=move&amp;id=', $r['id'], '&amp;dir=-1&amp;ordr=', $r['ordr'], '">&uarr;&uarr;&uarr;</a> ';
					else
						echo '&uarr;&uarr;&uarr; ';
					if ($r['ordr'] < $total_rows_count)
						echo '<a href="?action=move&amp;id=', $r['id'], '&amp;dir=1&amp;ordr=', $r['ordr'], '">&darr;&darr;&darr;</a> ';
					else
						echo '&darr;&darr;&darr; ';
				?>
			</td>
		</tr>
	<?php
		}	
	?>
	</tbody>
</table>
<?php
	echo $pagers_html;
} else 
	echo 'There are no products in the system yet</strong><br />';
?>
<br /><a href="edit.html?id=0" title="Add product">Add product</a>