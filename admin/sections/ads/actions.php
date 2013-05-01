<?php 
switch ($action) {
	case 'save':
		require DIR_ADMIN_INCLUDES."upload.php";
		$id = intval($_POST['id']);
		$ord = intval($_POST['ord']);
		$name = form_escape($_POST['name']);
		
		if (!$id) {
			if (!is_uploaded_file($_FILES['file']['tmp_name']))
				$errors['file'] = 1;
			if (!is_uploaded_file($_FILES['image']['tmp_name']))
				$errors['image'] = 1;
		}
		
		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			$fileName = $_FILES['image']['name'];
			$chunk = explode('.', $fileName);
			$extension = $chunk[count($chunk) - 1];
		} else {
			$extension = form_escape($_POST['extension']);
			if (!$id)
				$errors['image'] = true;
		}

		if (count($errors) == 0) {
			query ('replace into ads values ('.
				($id ? $id : 'null').','.
				'"'.$name.'",'.
				'"'.$extension.'"'.
				')');
			if (!$id)
				$id = mysql_insert_id();
			if (is_uploaded_file($_FILES['image']['tmp_name'])) {
				$fileName = $_FILES['image']['name'];
				$chunk = explode('.', $fileName);
				$extension = $chunk[count($chunk) - 1];
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGES_ADS.$id.'_original.'.$extension);
				create_thumbnail(DIR_IMAGES_ADS.$id.'_original.'.$extension, DIR_IMAGES_ADS.$id.'.png',
					278, 198, 'png');
			}
			
			if (is_uploaded_file($_FILES['file']['tmp_name'])) { 
				move_uploaded_file($_FILES['file']['tmp_name'], DIR_ADS_PDFS.$id.'.pdf');
			}
			
			header ('Location: index.html');
		}
		break;
	case 'delete':
		$id = intval ($_GET['id']);
		query ("delete from ads where id = ".$id);
		header ("Location: index.html");
		break;
}
?>