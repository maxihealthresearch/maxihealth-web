<?php



$id = intval($_GET['id']);

if ($id > 0)

	$row = mysql_fetch_assoc(query ("select * from ads where id = $id"));

else

	$row = array('id' => 0);



if (count($errors)) {



	if ($errors['name']) {

		echo '<p class="error">Please Enter Ad Name!</p>';
	}

	if ($errors['link']) {

		echo '<p class="error">Please Enter Link url for this ad!</p>';
	}
	
	if ($errors['image']) {

		echo '<p class="error">Please select file to upload!</p>';
	}

	$row['name'] = $_POST['name'];
	$row['link'] = $_POST['link'];

}

	

?>

<h2><?php echo ($id ? 'Edit' : 'Add') ?> Ad</h2><br />

<form method="post" action="#" enctype="multipart/form-data">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
<input type="hidden" name="extension" value="<?php echo $row['extension'] ?>" />

<table>

	<tr><th>Name:</th><td><input type="text"  class="text" size="50" name="name" value="<?php echo $row['name'] ?>" /></td>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Link:</th><td><input type="text"  class="text" size="50" name="link" value="<?php echo $row['link'] ?>" /></td>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>File:</th><td><input type="file" name="image" class="file" />
    <br />
    <em>PNG or JPEG files only. If an ad is PDF - use <a href="http://pdfjpg.net/" target="_blank">pdfjpg.net</a> to convert it to JPEG</em>
    </td></tr>

	<?php if ($id > 0 ) { ?>

	<tr><th>Current Image:</th><td style="padding-left: 3px;">

			<?php

			$image_file = DIR_IMAGES_ADS.$row['id'].'.png';

			echo '<img alt="', $row['text'], '" src="', WEB_DIR_IMAGES_ADS, $row['id'], '.png" />';

			?>

		</td>

	</tr>

	<?php } ?>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>

		<td colspan="2">

			<input type="submit" value="Save" class="btn" />

			<input type="button" value="Back" onclick="document.location='index.html'" class="btn" />

		</td>

	</tr>

</table>



</form>