<?php
require_once DIR_ADMIN_INCLUDES."upload.php";

if ($action == 'save') {
	$id = intval($_POST['id']);
	$name = form_escape($_POST['name']);
	$extension = form_escape($_POST['extension']);	
	
		if (!$name)
			$errors['name'] = true;
			
		if ($id == 0 && !is_uploaded_file($_FILES['image']['tmp_name']))
			$errors['image'] = true;


		if (is_uploaded_file($_FILES['image']['tmp_name'])) {

			$fileName = $_FILES['image']['name'];

			$chunk = explode('.', $fileName);

			$extension = $chunk[count($chunk) - 1];

		} else {

			$extension = form_escape($_POST['extension']);

		}

	
	if (!$errors) {
		
			query ('replace into ads values ('.

				($id ? $id : 'null').','.

				'"'.$name.'",'.

				'"'.$extension.'"'.

				')');
		
			if (!$id) {
				$id = mysql_insert_id();
			}
		


			if (is_uploaded_file($_FILES['image']['tmp_name'])) {

				$fileName = $_FILES['image']['name'];

				$chunk = explode('.', $fileName);

				$extension = $chunk[count($chunk) - 1];

				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGES_ADS.$id.'_original.'.$extension);
				
				create_thumbnail(DIR_IMAGES_ADS.$id.'_original.'.$extension, DIR_IMAGES_ADS.$id.'_large.png',

					1000, 766, 'png');				

				create_thumbnail(DIR_IMAGES_ADS.$id.'_original.'.$extension, DIR_IMAGES_ADS.$id.'.png',

					278, 278, 'png');
				create_thumbnail(DIR_IMAGES_ADS.$id.'_original.'.$extension, DIR_IMAGES_ADS.$id.'_smallthumb.png',

					142, 142, 'png');
			}
	
	
		header('Location: index.html');
	}
} elseif ($action == 'delete') {
	$id = intval($_GET['id']);
	query("delete from ads where id = $id");
	header('Location: index.html');
	@unlink (DIR_IMAGES_ADS.DIRECTORY_SEPARATOR.$id.'.png');
}
?>