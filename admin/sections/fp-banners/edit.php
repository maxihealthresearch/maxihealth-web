<?php

$id = intval($_GET['id']);
if ($id > 0)
	$row = mysql_fetch_assoc(query ("select * from fp_banners where id = $id"));
else
	$row = array('id' => 0, 'ord' => 0);

if (count($errors)) {
	if ($errors['image'])
		echo '<p class="error">Please select image to upload!</p>';
	$row['text'] = $_POST['text'];
}
	
?>
<h2><?php echo ($id ? 'Edit' : 'Add') ?> front page banner</h2><br />
<form method="post" action="#" enctype="multipart/form-data">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
<input type="hidden" name="ord" value="<?php echo $row['ord'] ?>" />
<input type="hidden" name="extension" value="<?php echo $row['extension'] ?>" />
<table>
	<tr><th>Banner link URL: </th>
		<td><input type="text" name="href" class="text" value="<?php echo $row['href']?>" size="50" /></td></tr>
	<tr><th>Alt Text / Title: </th>
		<td><input type="text" name="text" class="text" value="<?php echo $row['text']?>" size="50" /></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Image:</th><td><input type="file" name="image" class="file" /><br />
		<em>The image will be resized to 760x300px so it is recommended that you upload it that size
		to avoid loss of quality in the process of resizing.</em></td></tr>
	<?php if ($id > 0 ) {?>
	<tr><th>Current:</th><td style="padding-left: 3px;">
			<?php
			$image_file = DIR_IMAGES_FRONT_PAGE_BANNERS.$row['id'].'.png';
			echo '<img alt="', $row['text'], '" src="', WEB_DIR_IMAGES_FRONT_PAGE_BANNERS, $row['id'], '.png" />';
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
