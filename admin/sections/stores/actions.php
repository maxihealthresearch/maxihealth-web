<?php

//TO DO
//1. Try to connect to Google json to get latitude and logitude using address posted by edit.php
//2. If Google can't find address. 
//   a. Enter default lat & lng('lat' => 40.178873, 'lng' => -96.723633)
//   b. Output message "Google couldn't not find address you entered. Your data is saved, however the map will not work for this address. Please check your address. If you still get this message please contact Dmitry.
//3. If address is successfully saved output message "Store info has been saved"

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
/*	$lat = floatval($_POST['lat']);
	$lng = floatval($_POST['lng']);*/


		if (!$name)
			$errors['name'] = true;

		if (!$address)
			$errors['address'] = true;

		if (!$city)
			$errors['city'] = true;
			
		if (!$postal)
			$errors['postal'] = true;

	if (count($errors) == 0) {

$google_address = urlencode($address.', '.$city);
$mapurl = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address='.$google_address.'");
$parsedmap = json_decode($mapurl, true);

if (count($parsedmap) > 0) {


if ($parsedmap[status] === "OK") {

$lat = $parsedmap[results][0][geometry][location][lat];
$lng = $parsedmap[results][0][geometry][location][lng];

		query("replace into $db_table values ($id, '$name', '$address', '$address2', '$city', '$state', '$postal', '$country', '$phone', '$url', '$text', '$lat', '$lng')");
		header('Location: index.html');


} else {
echo "Google can't find this address. Please check your address again to make sure there are no errors";	
}

} else { 
//If you can't get ANY json data at all display this message
	echo "Can't connect to google. Please contact Dmitry";
}



	}
} elseif ($action == 'delete') {
	$id = intval($_GET['id']);
	query("delete from $db_table where id = $id");
	header('Location: index.html');
}
?>