<?php

header ('Content-Type: application/json'); 

$res = query ('select name,address,city,state,postal,country,phone,url,text,lat,lng from stores');

$chunk = array ();

while ($row = mysql_fetch_assoc($res)) {

	$row['lat'] = floatval($row['lat']);

	$row['lng'] = floatval($row['lng']);

	$chunk[] = $row;

}

echo json_encode($chunk);

?>