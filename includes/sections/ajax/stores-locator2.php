<?php 
$return_arr = array();
$keywords = trim($_GET['location']);

if (strtolower($keywords) == strtolower(Maryland)) {
	$keywords = "MD";
}

	$fetch = mysql_query("SELECT * FROM stores where 
						 address like '%" . $keywords . "%' 
						 or city like '%" . $keywords . "%'
						 or state like '%" . $keywords . "%' 
						 or postal like '%" . $keywords . "%' 
						 or country like '%" . $keywords . "%'"); 

	/* Retrieve and store in array the results of the query.*/
	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
	        $row_array['id'] = $row['id'];
	        $row_array['name'] = $row['name'];
	        $row_array['address'] = $row['address'];
	        $row_array['address2'] = $row['address2'];
	        $row_array['city'] = $row['city'];
	        $row_array['state'] = $row['state'];
	        $row_array['postal'] = $row['postal'];
	        $row_array['country'] = $row['country'];
	        $row_array['phone'] = $row['phone'];
	        $row_array['url'] = $row['url'];
	        $row_array['lat'] = $row['lat'];
	        $row_array['lng'] = $row['lng'];

        array_push($return_arr,$row_array);
    }

/* Toss back results as json encoded array. */
echo json_encode($return_arr);
exit();

?>