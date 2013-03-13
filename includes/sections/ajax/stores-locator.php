<?php 
//Created by Dmitry 2-4-2013
//This script outputs list of stores in json format
// Sample usage http://maxihealth.com/ajax/stores-locator4.json?location=11235

$return_arr = array();
$return_arr2 = array();
$exclude_ids = array();

$keywords = trim($_GET['location']); // grab keyword that user searches


//Get a list of states from database. If user searches "California" it will search database for "MD"

$fetchstate = mysql_query("SELECT state_code, state_name FROM states ORDER BY state_code");

while($staterow = mysql_fetch_array($fetchstate)) {

if (strtolower($keywords) == strtolower($staterow['state_name'])) {
	$keywords =  $staterow['state_code'] . " united states";
}

}

//



	
	$fetch = mysql_query("SELECT *
						FROM stores 
WHERE CONCAT_WS(', ',address, city, state, postal, country) LIKE '%$keywords%'
OR CONCAT_WS(' ',address, city, state, postal, country) LIKE '%$keywords%' 
OR CONCAT_WS(' ',state, country) LIKE '%$keywords%'");

	


	/* Retrieve and store in array the results of the query.*/
	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
	        $row_array['id'] = $row['id'];
	        $row_array['name'] = trim($row['name']);
	        $row_array['address'] = trim($row['address']);
	        $row_array['address2'] = trim($row['address2']);
	        $row_array['city'] = trim($row['city']);
	        $row_array['state'] = trim($row['state']);
	        $row_array['postal'] = trim($row['postal']);
	        $row_array['country'] = $row['country'];
if ($row['country'] == "United States") {
	        $row_array['usa'] = true;
} else {
	        $row_array['usa'] = false;	
}
	        $row_array['phone'] = trim($row['phone']);
	        $row_array['email'] = trim($row['email']);
	        $row_array['url'] = trim($row['url']);
	        $row_array['lat'] = $row['lat'];
	        $row_array['lng'] = $row['lng'];

        array_push($return_arr,$row_array);

    }
$total_target_stores = count($return_arr);
//If a match is found - look for nearby addresses
if (count($return_arr) > 0) {


//Create a comma delimeted list of ids to exclude from nearby_stores 
foreach ($return_arr as $key => $a) {
  $exclude_ids[$key] = $a['id'];
}
$commaList = implode(', ', $exclude_ids);
//

	$fetch2 = mysql_query("SELECT id, name, address, address2, city, state, postal, country, phone, email, url, lat, lng,  
						 ( 3959 * acos( cos( radians(". $return_arr[0]['lat'] . ") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(". $return_arr[0]['lng'] . ") ) + sin( radians(". $return_arr[0]['lat'] . ") ) * sin( radians( lat ) ) ) ) AS distance
						 FROM stores 
						 HAVING distance < 5
						 AND id NOT IN($commaList)
						 ORDER BY distance"); 

	


	/* Retrieve and store in array the results of the query.*/
	while ($row2 = mysql_fetch_array($fetch2, MYSQL_ASSOC)) {
	        $row_array2['id'] = $row2['id'];
	        $row_array2['name'] = trim($row2['name']);
	        $row_array2['address'] = trim($row2['address']);
	        $row_array2['address2'] = trim($row2['address2']);
	        $row_array2['city'] = trim($row2['city']);
	        $row_array2['state'] = trim($row2['state']);
	        $row_array2['postal'] = trim($row2['postal']);
	        $row_array2['country'] = $row2['country'];
if ($row2['country'] == "United States") {
	        $row_array2['usa'] = true;
} else {
	        $row_array2['usa'] = false;	
}
	        $row_array2['phone'] = trim($row2['phone']);
	        $row_array2['url'] = trim($row2['url']);
	        $row_array2['lat'] = $row2['lat'];
	        $row_array2['lng'] = $row2['lng'];
	        $row_array2['distance'] = $row2['distance'];

        array_push($return_arr2,$row_array2);
    }

echo json_encode(array('total_target_stores' => $total_target_stores, 'target_stores' => $return_arr, 'nearby_stores' => $return_arr2));
} else {
//if no match is found then output this
echo json_encode(array('total_target_stores' => $total_target_stores));

}
exit();

?>