<?php
$db_table = 'stores';

if ($action == 'save') {

	$id = intval($_POST['id']);
	$name = form_escape(stripslashes($_POST['name']));	
	$address = form_escape(stripslashes($_POST['address']));
	$address2 = form_escape(stripslashes($_POST['address2']));
	$city = form_escape(stripslashes($_POST['city']));
	$state = form_escape(stripslashes($_POST['state']));
	$postal = form_escape(stripslashes($_POST['postal']));
	$country = form_escape(stripslashes($_POST['country']));
	$phone = form_escape(stripslashes($_POST['phone']));
	$url = form_escape(stripslashes($_POST['url']));	
	$text = trim(form_escape($_POST['text']));
	$lat = floatval($_POST['lat']);
	$lng = floatval($_POST['lng']);


		if (!$name)
			$errors['name'] = true;

		if (!$address)
			$errors['address'] = true;

		if (!$city)
			$errors['city'] = true;
			
		if (!$postal)
			$errors['postal'] = true;

	if (count($errors) == 0) {	
		query("replace into $db_table values ($id, '$name', '$address', '$address2', '$city', '$state', '$postal', '$country', '$phone', '$url', '$text', '$lat', '$lng')");
		header('Location: index.html');
	}
} elseif ($action == 'delete') {
	$id = intval($_GET['id']);
	query("delete from $db_table where id = $id");
	header('Location: index.html');
}
?>