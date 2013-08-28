<?php

if (isset($_GET['print'])) {

	require DIR_SECTIONS.'/products/product-print.php';

} else {

 

$_PAGE['scripts'][] = '/js/products-page.js';

$_PAGE['scripts'][] = '/js/photo-enlarger.js';



$product_url = $_GET['url'];

$res = query ('select * from products where url = "'.form_escape($product_url).'"');

if ($product=mysql_fetch_assoc($res)) {

	$_PAGE['keywords'] = $product['meta_keywords'];

	$_PAGE['description'] = $product['meta_description'];
?>
<?php /*?>facebook like code. do not delete<?php */?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php /*?><?php */?>
<link rel="stylesheet" href="/css/product.css" type="text/css" media="screen">
<div id="body" class="product-body">

<p class="product-breadcrumb">
		<a href="/" title="">Home</a> &gt;

		<?php 

		if (isset($_GET['pcid'])) {

			$cat = $GLOBALS['categories_flat'][$_GET['pcid']];

			if ($cat) {

				$pcat = $GLOBALS['categories_flat'][$cat['parent_id']];

				echo '<a href="/products/', $pcat['url'], '/" ',

						'title="', $pcat['name'], '">', $pcat['name'], '</a> &gt; ',

						'<a href="/products/', $pcat['url'], '/', $cat['url'], '.html" ',

						'title="', $cat['name'], '">', $cat['name'], '</a> &gt; ';

			}

		}

		echo $product['name'];

		?>

	</p>

<ul id="productPrintMail"><li class="product-print">Print</li><li class="product-mail" id="email_friend_link" style="display:none">Email</li></ul>
 	

 	<h1><?php echo $product['name']?></h1>

 	


<table id="productTop" data-productid="<?php echo $product['id'] ?>">
  <tr>
    <td rowspan="2" class="product-top-photo">
<figure class="product-top-photo-wrap" data-pictype="product">
<?php 
				$image_file2 = DIR_IMAGES_PRODUCTS.$product['id'].'_2.png';
				$image_file3 = DIR_IMAGES_PRODUCTS.$product['id'].'_3.png';
				$image_file4 = DIR_IMAGES_PRODUCTS.$product['id'].'_4.png';
if (file_exists($image_file2)) {
					echo '<div class="product-top-multi-zoom">'
	.'<ul class="product-top-image-menu">'
    .'<li class="product-prev-arrow-wrap js-product-arrow" data-direction="prev"><span class="js-product-prev-arrow">prev</span></li>'
    .'<li class="product-zoom-icon-wrap js-largezoom"><span>enlarge</span></li>'
    .'<li class="product-next-arrow-wrap js-product-arrow" data-direction="next"><span class="js-product-next-arrow">next</span></li>'
  .'</ul>'
  .'</div>';
} else {
	echo '<div class="product-top-single-zoom js-largezoom"><span>enlarge</span></div>';	
}
?>
<div class="product-hero-pic-wrap"><img class="js-product-pic" src="<?php echo WEB_DIR_IMAGES_PRODUCTS, $product['id'] ?>.png?dateStamp=<?php echo time() ?>" data-imageid="<?php echo $product['id'] ?>" /></div>
</figure>

<?php

if (file_exists($image_file2)) {
    echo '<p class="product-top-caption">', $product['image_name'], '</p>';
}
?>
    </td>
    <td colspan="2" class="product-top-subtitle"><p><strong><?php echo $product['subtitle'], '</strong><br>', $product['short_description'] ?></p></td>
  </tr>
  <tr>
    <td class="product-top-forms-features">
				<?php 

				$res = query ('select pf.size, f.name, f.id '.

					' from products_forms pf '.

					' left join n_forms f on (f.id = pf.form_id) '.

					' where product_id = '.$product['id']);

				while ($row = mysql_fetch_assoc($res))

					echo '<p class="product-top-forms" style="background-image:url(', WEB_DIR_IMAGES_FORMS, $row['id'], '.png)">',

						$row['size'], ' ', $row['name'], '</p>';

				?>

<?php 


				$res = query ('select f.name, f.id '.

					' from products_features pf '.

					' left join n_features f on (f.id = pf.feature_id) '.

					' where product_id = '.$product['id']);

				if (mysql_num_rows($res) > 0) {

					echo '<ul class="product-top-flavors">'; 

					while ($row = mysql_fetch_assoc($res))

						echo '<li style="background-image:url(/images/features/', $row['id'], '.png)">', $row['name'], '</li>';

					echo '</ul>';

				}

				

				if ($product['benefits']) {

					$benefits = explode("\n", $product['benefits']);

					echo '<p class="product-top-benefits-title">Benefits</p><ul class="product-top-benefits-list">';

					foreach ($benefits as $row)

						echo '<li>', $row, '</li>';

					echo '</ul>';

				}

				?>    
    </td>
    <td rowspan="2" class="product-top-seead-alsogreat">
 				<?php 

				$res = query ('select pa.ad_id '.

					' from products_ads pa '.

					' left join ads a on (a.id = pa.ad_id) '.

					' where pa.product_id = '.$product['id']);

$row = mysql_fetch_assoc($res);

if ($row['ad_id']) {
					echo '<figure class="product-top-seead" data-pictype="ad" data-adid="', $row['ad_id'], '">'.
					'<img src="/images/ads/', $row['ad_id'], '.png" alt="See Our Ad" />'.
					'<span class="btn white">See Our Ad</span>'.
					'</figure>';
}
				?>
				<?php 

				$res = query ('select gr.name, gr.id '.

					' from products_groups pg '.

					' left join groups gr on (gr.id = pg.group_id) '.

					' where pg.product_id = '.$product['id']);

				if (mysql_num_rows($res) > 0) {


							echo '<aside class="product-top-alsogreat"><p>Also a great</p>';


							while ($row = mysql_fetch_assoc($res)) {

								echo '<a class="product-top-alsogreat-node" href="/products/group/', $row['id'], '.html">', $row['name'], '</a>';
							}
							
							echo '</aside>';

				} 

				


				?>   				                
    
    </td>
  </tr>
  <tr>
    <td colspan="2" class="product-top-thumbs">
<!--if product has more than one image - display thumb list--> 

			<?php


if (file_exists($image_file2)) {
					echo '<ul class="product-top-thumblist">';
					echo '<li title="', $product['image_name'], '" class="product-top-thumblist-selected"><span><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_t.png" alt="', $product['image_name'], '"></span></li>';
					echo '<li title="', $product['image_2_name'], '"><span><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_2_t.png" alt="', $product['image_2_name'], '"></span></li>';
}
if (file_exists($image_file3)) {
					echo '<li title="', $product['image_3_name'], '"><span><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_3_t.png" alt="', $product['image_3_name'], '"></span></li>';
}
if (file_exists($image_file4)) {
					echo '<li title="', $product['image_4_name'], '"><span><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_4_t.png" alt="', $product['image_4_name'], '"></span></li>';
}
if (file_exists($image_file2)) {
					echo '</ul>';
}
			?> 
    
    </td>
  </tr>
</table>
<section class="product-social-wrapper">
<div class="fb-like" data-send="false" data-width="290" data-show-faces="true"></div>

<!-- Place this tag where you want the +1 button to render -->
<g:plusone size="medium"></g:plusone>

<!-- Place this render call where appropriate -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</section>


<div id="product_bottom">

<?php 

 		$res = query ('select distinct pr.id, pr.name, pr.url, pr.subtitle, g.name as group_name, g.id as group_id '.

 			' from products_groups mygr '.

 			' left join products_groups gr on (gr.group_id = mygr.group_id and gr.product_id != mygr.product_id) '.

 			' inner join products pr on (pr.id = gr.product_id) '.

 			' left join groups g on (g.id = gr.group_id) '.

 			' where mygr.product_id = '.$product['id'].

 			' group by pr.id ');

 	

 		if (mysql_num_rows($res) > 0) {

 			echo '<div class="best_taken_with">',

 					'<strong class="ttl">For best results take with...</strong>';

 			while ($row = mysql_fetch_assoc($res)) {

 				echo '<div class="prb220">',

 						'<div class="t"></div>',

 						'<div class="m">',

	 						'<a href="/products/', $row['url'], '.html" title="', $row['name'], '">',

	 							'<img src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'], '_t.png" alt="', $row['name'] , '" />',

			 					'<strong class="name">', $row['name'], '</strong>',

			 					'<span class="subt">', $row['subtitle'], '</span>',

			 					'<a href="/products/group/', $row['group_id'], '.html" title="', $row['group_name'], '" class="cat">', $row['group_name'], '</a>',

		 					'</a>',

	 					'</div>',

	 					'<div class="b"></div>',

	 				'</div>';

 			}

 			echo '</div>';

 		}

 		?>

 		<div class="tabs_container">

 			<div class="tabs_top">

 				<a href="#" class="exp" id="expand_all_btn" onclick="return showExpandedView()">Expanded View</a>

 				<a href="#" class="tab" id="description_tab_btn" title="Description" onclick="return switchTab(0)">Description</a>

 				<a href="#" class="tab selected" id="supplemental_facts_tab_btn" title="Directions &amp; Supplement Facts" onclick="return switchTab(1)">Directions &amp; Supplement Facts</a>

 					<?php 

 					$res = query ('select sql_calc_found_rows r.* '.

 						' from reviews r '.

 						' where r.product_id = '.$product['id'].' and r.status="A" '.

 						' order by r.date_added desc ');

					$total = mysql_result(query('select found_rows()'), 0, 0);

if ($total == 0) {

		echo '<a href="#" class="tab" title="Reviews" id="reviews_tab_btn" onclick="return switchTab(2)">Reviews</a>';

	} else {

 		echo '<a href="#" class="tab" title="Reviews" id="reviews_tab_btn" onclick="return switchTab(2)">Reviews (', $total, ')</a>';

	 				}

 					?>

 			</div>

 			<div class="tabs">

 				<div id="description_tab" style="display:none">

 					<?php echo $product['description']; ?>

                    <p>These statements have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure, or prevent any diseases.</p>

 				</div>

 				<div id="supplemental_facts_tab" style="display:block">

                

                

                

                                

<?php 

if($product['directions'] !== '') {

echo '<p><strong>Directions:</strong> '. $product['directions'] . '</p>';

}

?>



                                    
<section class="product-tabs-supfacts">
<?php echo $product['supplemental_facts']; ?>
</section>


<?php 

if($product['directions'] !== '') {

$oldotherings = $product['other_ingredients'];

$otherings =  preg_replace("/^<[^<]*>/", "", $oldotherings);



echo '<p><strong>Other Ingredients:</strong> '. $otherings;

echo '<p>Store tightly closed in a cool, dry place. Keep out of reach of children.</p>';

}

?>



<?php 

if($product['directions'] !== '') {

				$res = query ('select pf.size, f.name, f.id '.

					' from products_forms pf '.

					' left join n_forms f on (f.id = pf.form_id) '.

					' where product_id = '.$product['id']);

				while ($row = mysql_fetch_assoc($res)) {

					echo '<p><strong>Available packaged in the following units:</strong> '. $row['size'] . ' '. $row['name'] . '</p>';

				}

echo '<p>These statements have not been evaluated by the Food and Drug Administration.'. 

' This product is not intended to diagnose, treat, cure, or prevent any diseases. </p>'.

' <p><strong>Abbreviations:</strong> <br>'.

' I.U. : International Units <br>'.

' mg. : milligrams <br>'.

' mcg. : micrograms </p>';

				

} 

?>

                  



                    

                    

 				</div>

 				<div id="reviews_tab">

 					<?php 

 					$res = query ('select sql_calc_found_rows r.text,r.name,date_format(r.date_added, "%c/%e/%Y") as date_added '.

 						' from reviews r '.

 						' where r.product_id = '.$product['id'].' and r.status="A" '.

 						' order by r.date_added desc ');

					$total = mysql_result(query('select found_rows()'), 0, 0);

if ($total == 0) {

		echo '<h1>Be the first to write a review!</h1>';

	} else {

 						echo '<div class="ttl">What other people say about ', $product['name'], '</div>';

	 					while ($row = mysql_fetch_assoc($res)) {

	 						echo '<div class="review"><p>',

		 							$row['text'], '</p>',

		 							'<div class="btm">&mdash; ', $row['name'],

		 								', <span class="date">on ', $row['date_added'], '</span>',

		 							'</div>',

	 							'</div>';

	 					}

	 				}

 					?>

 					<div id="product_post_review">

	 					<div class="ttl">Post your story</div>

	 					<p>Please make sure you fill in all the fields. Comments are moderated. Please don't spam</p>

	 					<div id="review_send_result"></div>

	 					<form method="post" action="/ajax/post-review.json" id="review_form">

	 						<input type="hidden" name="pid" value="<?php echo $product['id'] ?>" />

	 						<input type="hidden" name="not_ajax" value="true" />

	 						<div class="form">

	 							<div class="l">

	 								<label>Name</label>

	 								<input type="text" name="name" class="text" />

	 							</div>

	 							<div class="r">

	 								<label>Email</label> <span>(will not be published)</span>

	 								<input type="text" name="email" class="text" />

	 							</div>

	 							<label>Your story</label>

	 							<textarea rows="5" cols="40" name="text"></textarea>

                                <!--<button class="btn" name="submit" type="submit">Submit</button>-->

                                <input type="submit" value="Submit" class="btn" name="submit" />

	 						</div>

	 					</form>

	 				</div>

 				</div>

 			</div>

 		</div>

 
 	</div> <!-- product bottom end -->


<div id="product_popup">

 		<div class="t">

			<div class="l"></div><div class="r"></div><div class="m" id="product_popup_title">E-mail a friend</div>

			<a href="#" class="close" onclick="EmailFriend.close()"></a>

		</div>

		<div class="m">

			<form action="" method="post" id="email_friend_form">
                                <input name="product_url" type="hidden" value="<?php echo $product['url'] ?>" />
				<div id="email_friend_send_result"></div>

				<label>Your name</label>

				<input type="text" class="text" name="name" />

				<label>Your e-mail</label>

				<input type="text" class="text" name="email" />

				<label>Recipient's name</label>

				<input type="text" class="text" name="recipient_name" />

				<label>Recipient's e-mail</label>

				<input type="text" class="text" name="recipient_email" />

				<div>

                    <button class="btn" name="submit" type="submit" id="btn_email_friend"  >Submit</button>

					<div id="email_friend_sending" class="ajax_sending">Sending, please wait!</div>

				</div>

			</form>

		</div>

		<div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div>

	</div> 	


</div> <!-- product body end -->

<div class="clear_both"></div>

<?php 

} else {

	$_PAGE['404'] = true;

}

}

?>