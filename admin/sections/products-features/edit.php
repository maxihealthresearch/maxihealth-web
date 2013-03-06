<?php
	$id = intval($_GET['id']);
	if ($id > 0) 
		$r = mysql_fetch_assoc(query("select * from n_features where id = $id"));
	else 
		$r = array ('id' => 0);

	if ($errors['title']) echo '<p class="error">Please enter name of the feature!</p>';
	unset($errors);
?>
<h2><?php echo ($id ? 'Edit' : 'Add') ?> product feature</h2>
<form method="post" action="#" enctype="multipart/form-data">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="<?php echo $r['id'] ?>" />
<table>
	<tr><th>Name:</th><td><input type="text" name="name" value="<?php echo $r['name'] ?>" size="30" class="text" /></td></tr>
	<tr><th>Description: <br /><em>For your reference</em></th>
		<td><textarea name="description" rows="3" cols="50" style="height:auto"><?php echo $r['description'] ?></textarea></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Image:</th><td><input type="file" name="image" size="30" class="text" /><br />
		<em>For best results use PNG of maximum size of 20x20 pixels</em></td></tr>
	<?php if ($id > 0) {?>
	<tr><th>Current image:</th><td style="padding-left: 3px;">
			<?php
			$image_file = DIR_IMAGES_FEATURES.DIRECTORY_SEPARATOR.$r['id'].'.png';
			if (file_exists($image_file)) {
				list($w, $h) = getimagesize($image_file);
				$size = round(filesize($image_file)/1024);
				echo '<img alt="'.$r['name'].'" src="', WEB_DIR_IMAGES_FEATURES, $r['id'].'.png?dateStamp=', time(), '" />';
				echo "$w x $h pixles, $size KiB";
			}
			else
				echo '<em>- none -</em>';
			?>
		</td>
	</tr>
	<?php } ?>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" value="Save" class="btn" />
			<input type="button" value="Back" onclick="document.location='index.html'" class="btn" />
		</td>
	</tr>
</table>

</form>
