<?php

$_PAGE['title'] = 'Stores';



echo '<h2>'.$_PAGE['title'].'</h2>';

$res = query ('select * from stores order by id');

	

if (mysql_num_rows($res) > 0) {

?>

<a href="edit.html?id=0" title="Add store">Add store</a>

	<table class="list_table" cellspacing="0">

		<thead>

			<tr><td>Store Name</td><td>Address</td><td>Address 2</td><td>City</td><td>State/Province</td><td>Postal Code</td><td>Country</td><td>Phone</td><td>Email</td><td>Website</td><td>Old Text</td><td class="act">Actions</td></tr>

		</thead>

		<tbody>

			<?php

			while ($row = mysql_fetch_assoc($res)) {

			?>

			<tr>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['address'] ?></td>
				<td><?php echo $row['address2'] ?></td>
				<td><?php echo $row['city'] ?></td>
				<td><?php echo $row['state'] ?></td>
				<td><?php echo $row['postal'] ?></td>
				<td><?php echo $row['country'] ?></td>
				<td><?php echo $row['phone'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['url'] ?></td>

				<td><?php echo $row['text'] ?></td>

				<td class="tac">

					<a href="edit.html?id=<?php echo $row['id'] ?>">edit</a>

					<a href="?action=delete&amp;id=<?php echo $row['id'] ?>" onclick="return confirmDelete()">delete</a>

				</td>

			</tr>

			<?php

			}

			?>

		</tbody>

	</table>

<?php

} else

	echo '<strong>No stores are in the system yet!</strong><br/><br/>';

?>

<a href="edit.html?id=0" title="Add store">Add store</a>