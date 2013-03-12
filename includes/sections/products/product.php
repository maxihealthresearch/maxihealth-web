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

<div id="body" class="pl20">

	<div id="breadcrumb">

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

	</div>

 	<div id="print_mail">

 		<a href="#" class="print" onclick="window.open('?print', 'print', 'width=600,menubar=1')" title="Print this product">Print</a>

 		<a href="#" id="email_friend_link" class="mail" title="Email a link to this product">Email</a></br></div>

 	

 	<h1><?php echo $product['name']?></h1>

 	

 	<div class="ovfla">

	 	<div id="product_photo">

	 		<div class="ph">

	 			<img src="<?php echo WEB_DIR_IMAGES_PRODUCTS, $product['id'] ?>.png?dateStamp=<?php echo time() ?>" alt="<?php echo $product['name'] ?>" />

	 		</div>

	 		<div class="vl">

	 			<a href="#" onclick="PhotoEnlarger.open('<?php echo WEB_DIR_IMAGES_PRODUCTS, $product['id'] ?>_original.<?php echo $product['extension'] ?>')" title="<?php echo $product['name'] ?>">View Larger</a>

	 		</div>


	 	</div>

	 	<div id="product_top_right">

	 		<p><?php echo $product['subtitle'], '</p><p>', $product['short_description'] ?></p>

            

   

            

            

			<div class="forms">

				<?php 

				$res = query ('select pf.size, f.name, f.id '.

					' from products_forms pf '.

					' left join n_forms f on (f.id = pf.form_id) '.

					' where product_id = '.$product['id']);

				while ($row = mysql_fetch_assoc($res))

					echo '<div class="form" style="background-image:url(', WEB_DIR_IMAGES_FORMS, $row['id'], '.png)">',

						$row['size'], ' ', $row['name'], '</div>';

				?>

			</div>

			<div class="ovfla">

				<?php 

				$res = query ('select gr.name, gr.id '.

					' from products_groups pg '.

					' left join groups gr on (gr.id = pg.group_id) '.

					' where pg.product_id = '.$product['id']);

				if (mysql_num_rows($res) > 0) {

					?>

					<div class="also_a_great prb220">

						<div class="t"></div>

						<div class="m">

							<strong>Also great for</strong>

							<?php 

							while ($row = mysql_fetch_assoc($res))

								echo '<a href="/products/group/', $row['id'], '.html" title="', $row['name'], '">', $row['name'], '</a>';

							?>

						</div>

						<div class="b"></div>

					</div>

					<?php 

				} 

				

				if ($product['see_our_ad_link_url']) {

				?>

				<a href="<?php echo $product['see_our_ad_link_url'] ?>" title="See our ad" class="see_our_ad" target="_blank">

					<img src="<?php echo $product['see_our_ad_link_url'] ?>" alt="See Our Ad" />
                    <span class="btn white">See Our Ad</span>

				</a>

				<?php 

				}

				$res = query ('select f.name, f.id '.

					' from products_features pf '.

					' left join n_features f on (f.id = pf.feature_id) '.

					' where product_id = '.$product['id']);

				if (mysql_num_rows($res) > 0) {

					echo '<ul class="features">'; 

					while ($row = mysql_fetch_assoc($res))

						echo '<li style="background-image:url(/images/features/', $row['id'], '.png)">', $row['name'], '</li>';

					echo '</ul>';

				}

				

				if ($product['benefits']) {

					$benefits = explode("\n", $product['benefits']);

					echo '<div class="benefits">Benefits<ul>';

					foreach ($benefits as $row)

						echo '<li>', $row, '</li>';

					echo '</ul></div>';

				}

				?>

			</div>

	 	</div>

 	</div>
<?php /*?>if product has more than one image - display thumb list <?php */?>
			<?php
				$image_file2 = DIR_IMAGES_PRODUCTS.$product['id'].'_2.png';
				$image_file3 = DIR_IMAGES_PRODUCTS.$product['id'].'_3.png';
				$image_file4 = DIR_IMAGES_PRODUCTS.$product['id'].'_4.png';

if (file_exists($image_file2)) {
					echo '<ul id="itemThumbList">';
					echo '<li><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_t.png"></a></li>';
					echo '<li><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_2_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_2_t.png"></a></li>';
}
if (file_exists($image_file3)) {
					echo '<li><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_3_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_3_t.png"></a></li>';
}
if (file_exists($image_file4)) {
					echo '<li><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_4_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_4_t.png"></a></li>';
}
if (file_exists($image_file2)) {
					echo '</ul>';
}
			?>   


<?php /*?><li><img src="/images/products/262_2_t.png"></li>
<li><img src="/images/products/262_3_t.png"></li><?php */?>


<section id="socialMediaWrpr">
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



                                    

<?php echo $product['supplemental_facts']; ?>



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

 					'<strong class="ttl">For best results taken with...</strong>';

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

 	</div>

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

</div>

<div class="clear_both"></div>

<?php 

} else {

	$_PAGE['404'] = true;

}

}

?>