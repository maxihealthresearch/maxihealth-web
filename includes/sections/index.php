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
		<?php echo $_PAGE['body'] ?>
	</div>
	
	<div id="seasonal_products_box">
		<div class="ttl">Seasonal Products</div>
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
		<div class="b"></div>
	</div>
	<img src="/images/fp-quality-ingredients.png" alt="Quality Ingredients Since 1974" />
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
