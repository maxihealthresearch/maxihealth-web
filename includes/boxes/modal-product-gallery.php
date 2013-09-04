       <?php 
require_once $_SERVER['DOCUMENT_ROOT']."/config.php"; //this gets database data

$productid = trim($_GET['productid']);
$imageid = trim($_GET['imageid']);
$pictype = $_GET['pictype'];

$res = mysql_query("select * from products WHERE id = " . $productid);
$product = mysql_fetch_assoc($res)

?>
<div id="modalGalleryWrap">
  
  <div id="adsModalRight"> <a href="close" id="adsModalClose" class="ads-modal-close">close</a>
    <ul id="adsModalImgWrap">
<?php 
if ($pictype == 'ad') {
      echo '<li class="ads-modal-img ads-modal-preloader"><a href="/"><img src="', WEB_DIR_IMAGES_ADS, $imageid, '_large.png" ></a></li>';
} else {
      echo '<li class="ads-modal-img ads-modal-preloader"><a href="/"><img src="', WEB_DIR_IMAGES_PRODUCTS, $imageid, '_original.png" ></a></li>';	
}
?>	  
    </ul>
  </div>
</div>
