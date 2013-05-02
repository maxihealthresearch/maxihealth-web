<div id="body" class="our_ads_body">
	<h1 class="bb">Our Ads</h1>
<?php 
$_PAGE['scripts'][] = '/js/photo-enlarger.js';

$res = query ('select * from ads order by id asc');

while ($row = mysql_fetch_assoc($res)) {
	echo '<div class="ad">'.
			'<img src="', WEB_DIR_IMAGES_ADS, $row['id'], '.png" alt="', $row['name'], '" />',
			'<div class="n">', $row['name'], '</div>',
			'<div class="l">',
				'<a href="#" title="" class="vl" ',
					'onclick="PhotoEnlarger.open(\'', WEB_DIR_IMAGES_ADS, $row['id'], '_original.', $row['extension'], '\');">View larger</a> ',
				'<a href="', WEB_DIR_ADS_PDFS, $row['id'], '.pdf" target="_blank" title="" class="pdf">View PDF</a>',
			'</div>',
		'</div>';
}

?>
</div>
<div class="clear_both"></div>