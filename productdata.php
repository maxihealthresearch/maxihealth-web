<html><head><title>MySQL Table Viewer</title></head><body>
<?php
include_once("dBug.php"); //this class outputs data in a table http://dbug.ospinto.com/examples.php
require_once $_SERVER['DOCUMENT_ROOT']."/config.php"; //this gets database data

$sql = 'select CONCAT("http://maxihealth.com/images/products/", p.id, "_original.png") as "Image Url", p.name as "Product Name", p.subtitle, p.short_description, p.directions,'.
		' CONCAT("<textarea rows=4 cols=50>", p.supplemental_facts, "</textarea>") as "Supplement Facts",'
		' p.other_ingredients,'.
		' CONCAT(pf.size, " ", GROUP_CONCAT(distinct f.name)) as "Size and Form",'.
		' GROUP_CONCAT(distinct nf.name) as "Feature",'.
		' GROUP_CONCAT(distinct r.text separator "<hr>") as "Review"'.
		' from products p'.
		' left join products_forms pf on p.id = pf.product_id'.
		' left join n_forms f on pf.form_id = f.id'.
		' left join products_features pfe on p.id = pfe.product_id'.
		' left join n_features nf on pfe.feature_id = nf.id'.
		' left join reviews r on p.id = r.product_id and r.status = "A"'.
		' GROUP BY p.id';


$result = mysql_query($sql)


or die(mysql_error());  


new dBug($result);



?>
</body></html>