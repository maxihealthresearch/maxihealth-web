<?php
require DIR_ADMIN_INCLUDES."upload.php"; 
switch ($action) {
	case 'save':
		$id = intval($_POST['id']);
		$name = form_escape($_POST['name']);
		$subtitle = form_escape($_POST['subtitle']);
		$url = rawurlencode(preg_replace("/\s+/", '-', trim($_POST['url'])));
		$ordr = intval($_POST['ordr']);	
		$meta_keywords = form_escape($_POST['meta_keywords']);
		$meta_description = form_escape($_POST['meta_description']);
		$short_description = form_escape($_POST['short_description']);
		
		$description = trim(addslashes($_POST['description']));
		$supplemental_facts = trim(addslashes($_POST['supplemental_facts']));
		$other_ingredients = trim(addslashes($_POST['other_ingredients']));
		$other_facts = trim(addslashes($_POST['other_facts']));
		$directions = trim(addslashes($_POST['directions']));
		$ingredients_search = trim(addslashes($_POST['ingredients_search']));
		
		$benefits = form_escape($_POST['benefits']);
		
		$see_our_ad_link_url = form_escape($_POST['see_our_ad_link_url']);
		
		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			$chunk = explode('.', $_FILES['image']['name']);
			$extension = $chunk[count($chunk) - 1];
		} else
			$extension = form_escape($_POST['extension']);

		$categoriesIDs = array ();
		if ($_POST['categories']) {
			foreach ($_POST['categories'] as $catID => $value)
				if ($value == 'on') $categoriesIDs[] = intval($catID);
			$categoriesIDs = array_unique($categoriesIDs);
		}
		
		$formsIDs = array ();
		if ($_POST['forms']) {
			foreach ($_POST['forms'] as $fID => $value)
				if ($value == 'on') $formsIDs[] = intval($fID);
			$formsIDs = array_unique($formsIDs);
		}
		
		$featuresIDs = array ();
		if ($_POST['features']) {
			foreach ($_POST['features'] as $fID => $value)
				if ($value == 'on') $featuresIDs[] = intval($fID);
			$featuresIDs = array_unique($featuresIDs);
		}
		
		$groupsIDs = array ();
		if ($_POST['groups']) {
			foreach ($_POST['groups'] as $gID => $value)
				if ($value == 'on') $groupsIDs[] = intval($gID);
			$groupsIDs = array_unique($groupsIDs);
		}
		
		if (!$name) $errors['name'] = true;
		if (!$url)
			$errors['url'] = true;
		else {
			$res = query('select count(*) from products where url = "'.$url.'" and id != '.intval($id));
			if (mysql_result($res, 0, 0) > 0)
				$errors['url-duplicate'] = true;
		}
		if (count($categoriesIDs) == 0) 
			$errors['category'] = true;
		
		if ($id == 0 && !is_uploaded_file($_FILES['image']['tmp_name']))
			$errors['image'] = true;
			
		$date_added = form_escape($_POST['date_added']);
			
		if (count($errors) == 0) {
			$searchData = $name.' '.$subtitle.' '.
				$short_description.' '.$benefits.' '.
				strip_tags ($description).' '.strip_tags ($directions).' '.strip_tags ($supplemental_facts).' '.
				strip_tags ($other_ingredients).' '.strip_tags ($other_facts).' '.
				$meta_description.' '.$meta_keywords;
			$searchData = preg_replace('/\s+/', ' ', $searchData);
			
			query ('replace into products (id, ordr, url, name, subtitle, short_description, '.
					'benefits, description, directions, supplemental_facts, other_ingredients, '.
					'other_facts, ingredients_search, meta_description, meta_keywords, '.
					'see_our_ad_link_url, extension, search_data, date_added '.
					') values ('.
					($id ? $id : 'null').','.
					$ordr.','.
					'"'.stripslashes($url).'",'.
					'"'.stripslashes($name).'",'.
					'"'.stripslashes($subtitle).'",'.
					'"'.stripslashes($short_description).'",'.
					'"'.stripslashes($benefits).'",'.
					'"'.stripslashes($description).'",'.
					'"'.stripslashes($directions).'",'.
					'"'.stripslashes($supplemental_facts).'",'.
					'"'.stripslashes($other_ingredients).'",'.
					'"'.stripslashes($other_facts).'",'.
					'"'.stripslashes($ingredients_search).'", '.
					'"'.stripslashes($meta_description).'",'.
					'"'.stripslashes($meta_keywords).'",'.
					'"'.$see_our_ad_link_url.'",'.
					'"'.$extension.'",'.
					'"'.$searchData.'",'.
					'"'.($date_added ? $date_added : 'now()').'"'.
					')');
					if (empty($ordr)) {
    				query ('update products set ordr = ordr + 1');
					}					
			if ($id == 0) {
				$id = mysql_insert_id();
			} else {
				query ('delete from products_categories where product_id = '.$id);
				query ('delete from products_features where product_id = '.$id);
				query ('delete from products_forms where product_id = '.$id);
				query ('delete from products_groups where product_id = '.$id);
			}
			
			$chunk = array();
			foreach ($categoriesIDs as $cid)
				$chunk[] = '('.$id.', '.$cid.')';
			query ('insert into products_categories (product_id, category_id) values '.implode(',' ,$chunk));
			
			if (count($formsIDs) > 0) {
				$chunk = array();
				foreach ($formsIDs as $cid)
					$chunk[] = '('.$id.', '.$cid.', "'.stripslashes($_POST['sizes'][$cid]).'")';
				query ('insert into products_forms (product_id, form_id, size) values '.implode(',' ,$chunk));
			}
			
			if (count($featuresIDs) > 0) {
				$chunk = array();
				foreach ($featuresIDs as $cid)
					$chunk[] = '('.$id.', '.$cid.')';
				query ('insert into products_features (product_id, feature_id) values '.implode(',' ,$chunk));
			}
			
			if (count($groupsIDs) > 0) {
				$chunk = array();
				foreach ($groupsIDs as $gid)
					$chunk[] = '('.$id.', '.$gid.')';
				query ('insert into products_groups (product_id, group_id) values '.implode(',' ,$chunk));
			}

		if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			//move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGES_PRODUCTS.$id.'_original.'.$extension);
			//move_uploaded_file function above doesn't seem to work so I replaced it with line below
			$image = upload_file('image', DIR_IMAGES_PRODUCTS.DIRECTORY_SEPARATOR, $id.'_original.png', true);
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'.png',
					213, 350, 'png');
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'_t.png',
					80, 80, 'png');
		}
		if (is_uploaded_file($_FILES['image2']['tmp_name'])) {
			$image = upload_file('image2', DIR_IMAGES_PRODUCTS.DIRECTORY_SEPARATOR, $id.'_2_original.png', true);
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_2_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'_2.png',
					213, 350, 'png');
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_2_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'_2_t.png',
					80, 80, 'png');
		}
		if (is_uploaded_file($_FILES['image3']['tmp_name'])) {
			$image = upload_file('image3', DIR_IMAGES_PRODUCTS.DIRECTORY_SEPARATOR, $id.'_3_original.png', true);
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_3_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'_3.png',
					213, 350, 'png');
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_3_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'_3_t.png',
					80, 80, 'png');
		}
		if (is_uploaded_file($_FILES['image4']['tmp_name'])) {
			$image = upload_file('image4', DIR_IMAGES_PRODUCTS.DIRECTORY_SEPARATOR, $id.'_4_original.png', true);
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_4_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'_4.png',
					213, 350, 'png');
				create_thumbnail(DIR_IMAGES_PRODUCTS.$id.'_4_original.'.$extension, DIR_IMAGES_PRODUCTS.$id.'_4_t.png',
					80, 80, 'png');
		}

			header ('Location: index.html?cat='.$categoriesIDs[0]);
		}
		
		break;
	case 'delete':
		$id = intval($_GET['id']);
		query ('delete from products where id = '.$id);
		query ('delete from products_categories where product_id = '.$id);
		query ('delete from products_features where product_id = '.$id);
		query ('delete from products_forms where product_id = '.$id);
		query ('delete from products_groups where product_id = '.$id);
		query ('update products set ordr = ordr - 1');
		break;
	case 'move':
		$dir = intval($_GET['dir']);
		$id = intval($_GET['id']);
		$ordr = intval($_GET['ordr']);
		query ("update products set ordr = ordr - (".$dir.") where ordr = ".($ordr + $dir));
		query ("update products set ordr = ordr + (".$dir.") where id = ".$id);
		header ("Location: index.html");
		break;
}
?>