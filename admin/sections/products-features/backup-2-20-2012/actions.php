<?php
require_once DIR_ADMIN_INCLUDES."upload.php";

if ($action == 'save') {
	$id = intval($_POST['id']);
	$name = form_escape($_POST['name']);
	$description = form_escape($_POST['description']);
	
	if (!$name) $errors['name'] = 1;
	
	if (!$errors) {
		query("replace into n_features values ($id, '$name', '$description')");
		if ($id == 0)	// if we are adding (not editing), take the last insert id
			$id = mysql_insert_id();

		if ($_FILES['image']['tmp_name'])
			$image = upload_file('image', DIR_IMAGES_FEATURES.DIRECTORY_SEPARATOR, $id.'.png', true);
	
		header('Location: index.html');
	}
} elseif ($action == 'delete') {
	$id = intval($_GET['id']);
	query("delete from n_features where id = $id");
	header('Location: index.html');
	@unlink (DIR_IMAGES_FEATURES.DIRECTORY_SEPARATOR.$id.'.png');
}
?>