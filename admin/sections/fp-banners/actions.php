<?php 
switch ($action) {
	case 'save':
		require DIR_ADMIN_INCLUDES."upload.php";
		$id = intval($_POST['id']);
		$text = form_escape($_POST['text']);
		$ord = intval($_POST['ord']);
		$display = 1;
		$href = form_escape($_POST['href']);
		
		if (!$ord) {
			$res = query ("select max(ord) from fp_banners");
			$ord = 1 + mysql_result($res, 0, 0);
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
			query ('replace into fp_banners values ('.
				($id ? $id : 'null').', '.
				'"'.$href.'",'.
				'"'.$text.'",'.
				'"'.$extension.'",'.
				'"'.$ord.'",'.
				$display.
				')');
			if (!$id)
				$id = mysql_insert_id();
			if (is_uploaded_file($_FILES['image']['tmp_name'])) {
				$fileName = $_FILES['image']['name'];
				$chunk = explode('.', $fileName);
				$extension = $chunk[count($chunk) - 1];
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGES_FRONT_PAGE_BANNERS.$id.'_original.'.$extension);
				create_thumbnail(DIR_IMAGES_FRONT_PAGE_BANNERS.$id.'_original.'.$extension, DIR_IMAGES_FRONT_PAGE_BANNERS.$id.'.png',
					300, 760, 'png', false, false);
			}
			header ('Location: index.html');
		}
		break;
	case 'delete':
		$id = intval ($_GET['id']);
		$res = query ("select ord, extension from fp_banners where id = ".$id);
		$row = mysql_fetch_assoc($res);
		$ord = $row['ord'];
		$originalExtension = $row['extension'];
		query ("delete from fp_banners where id = ".$id);
		query ("update fp_banners set ord = ord - 1 where ord > ".$ord);
		@unlink(DIR_IMAGES_FRONT_PAGE_BANNERS.$id.'.png');
		@unlink(DIR_IMAGES_FRONT_PAGE_BANNERS.$id.'_original.'.$originalExtension);
		header ("Location: index.html?id=".$menu_id);
		break;
	case 'move':
		$dir = intval($_GET['dir']);
		$id = intval($_GET['id']);
		$ord = intval($_GET['ord']);
		query ("update fp_banners set ord = ord - (".$dir.") where ord = ".($ord + $dir));
		query ("update fp_banners set ord = ord + (".$dir.") where id = $id");
		header ("Location: index.html");
		break;
}
?>