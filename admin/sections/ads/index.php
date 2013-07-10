<h2>Ads</h2>

<?php

require DIR_ADMIN_INCLUDES."table.php";



$res = query ("select * from ads order by id asc ");

$total_rows_count = mysql_num_rows($res);

if ($total_rows_count > 0) { 

?>

<a href="edit.html?id=0" title="Add ad">Add ad</a><br /><br />

<table class="list_table" cellspacing="0">

	<thead>

		<tr><td width="64">Image</td><td>Name</td><td>Link</td><td width="200">Actions</td></tr>

	</thead>

	<tbody>

	<?php

		while ($r = mysql_fetch_assoc($res)) {	?>

		<tr><td><?php

				echo '<img alt="'.$r['text'].'" src="', WEB_DIR_IMAGES_ADS, $r['id'], '.png" />';

				?>

			</td>

			<td><?php echo $r['name']; ?></td>
			<td><?php echo $r['link']; ?></td>

			<td>

				<a href="edit.html?id=<?= $r['id'] ?>">edit</a>

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

	echo 'There are no ads in the system yet</strong><br />';

?>

<br /><a href="edit.html?id=0" title="Add ad">Add ad</a>