<?php
$_PAGE['scripts'][] = '/js/fp.js';
loadPageMetaData('index');
?>
<div id="body2">
	<div id="fp_banner" class="loading">
		<?php 
		$res = query ('select id, href from fp_banners 
		where display = 1
		order by ord asc');
		$chunk = array ();
		$ind = 0;
		while ($row = mysql_fetch_assoc($res))
			echo '<a href="', ($row['href'] ? $row['href'] : '#'), '" ',
				'class="b id_', $row['id'], ($ind++ == 0 ? ' current' : ''), '" title="">&nbsp;</a>'; 
		?>
		<div class="indicators" id="fp_banner_indicators"></div>
	</div>
	
	<div class="fp_text">
		<a href="/why-maxi-health.html"><img alt="Over 250 Products" src="/images/home-over-250-products.jpg"></a>
<p>For over 35 years, Maxi Health has been trusted worldwide to provide consumers with over 250 quality kosher products.&nbsp; Thank you for visiting our web site. Since you are here, you must care a lot about your health - and so do we.&nbsp; We have products and formulations available for your entire family.</p>
<p>We are certified by the NSF &amp; GMP - independent laboratories that verify the purity of dietary supplements as well as the accuracy of what is printed on product labels. <a href="why-maxi-health.html" class="decolink">Read More</a></p></div>

	
	<div id="seasonal_products_box">
		<div class="ttl">New Products</div>
		<div class="content">
			<ul>
				<?php 
				$res = query ('select pr.* '.
							' from products pr '.
							' order by pr.date_added DESC limit 4');
				while ($row = mysql_fetch_assoc($res)) {
					echo '<li>',
							'<a href="/products/', $row['url'], '.html" title="', $row['name'], '">',
								'<img src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'], '_t.png" ',
								'alt="', $row['name'], '" />',
							'</a>',
							'<div>',
								'<a href="/products/', $row['url'], '.html" title="', $row['name'], '">',
									'<strong>', $row['name'], '</strong>',
									$row['subtitle'],
								'</a>',
							'</div>',
						'</li>';
				}
				?>
			</ul>
		</div>
	</div>
<img src="/images/quality-ings.png" alt="Quality Ingredients Since 1974" id="fp_brands_listing" />
	<div class="clear_both"></div>
</div>
<?php /*
<div class="clear_both"></div>
<div id="fp_featured_products">
	<div class="ttl">Featured Products</div>
	<div class="content">
		<ul>
			<?php 
			$res = query ('select pr.id, pr.name, pr.url, pr.subtitle '.
				' from featured_products f '.
				' left join products pr on pr.id = f.product_id '.
				' order by f.ord ');
			while ($row = mysql_fetch_assoc($res)) {
				echo '<li>',
						'<a href="/products/', $row['url'], '.html" title="', $row['name'], '">',
							'<img src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'], '_t.png" ',
							'alt="', $row['name'], '" />',
						'</a>',
						'<div>',
							'<a href="/products/', $row['url'], '.html" title="', $row['name'], '">',
								'<strong>', $row['name'], '</strong>',
								$row['subtitle'],
							'</a>',
						'</div>',
					'</li>';
			}
			?>
		</ul>
	</div>
</div>
<div id="fp_brands_listing"><img src="/images/uploads/brands.png" alt="" title="" /></div>
*/ ?>
