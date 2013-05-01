<h2>Products Features</h2>
<?php
require DIR_ADMIN_INCLUDES."table.php";

$res = query ("select * from n_features order by name");
$total_rows_count = mysql_num_rows($res);
if ($total_rows_count > 0) { 
?>
<a href="edit.html?id=0" title="Add feature">Add products feature</a><br /><br />
<table class="list_table" cellspacing="0">
	<thead>
		<tr><td width="64">Image</td><td>Name</td><td>Description</td><td width="100">Actions</td></tr>
	</thead>
	<tbody>
	<?php
		while ($r = mysql_fetch_assoc($res)) {	?>
		<tr><td><?php
				$image_file = DIR_IMAGES_FEATURES.DIRECTORY_SEPARATOR.$r['id'].'.png';
				if (file_exists($image_file)) {
					echo '<img alt="'.$r['name'].'" src="', WEB_DIR_IMAGES_FEATURES, $r['id'], '.png?dateStamp=', time(), '" />';
				} else
					echo '<em>- none -</em>';
				?>
			</td>
			<td><strong><?php echo $r['name'] ?></strong></td>
			<td><?php echo $r['description'] ?></td>
			<td><a href="edit.html?id=<?= $r['id'] ?>">edit</a>
				<a href="index.html?action=delete&amp;id=<?= $r['id'] ?>" onclick="return confirmDelete()">delete</a>
			</td>
		</tr>
	<?php
		}	
	?>
	</tbody>
</table>
<?php
} else 
	echo 'There are no products features in the system yet</strong><br />';
?>
<br /><a href="edit.html?id=0" title="Add feature">Add products feature</a>