<div id="left_menu"<?php if ($_PAGE['drop-left-menu']) echo ' class="hidden"'; ?>>
	<div class="t"></div>
	<div class="m">
		<a href="/products/all.html" id="see_all_products">See All Categories &amp; Products</a>
		<ul id="left_menu_l1">
<?php 
	$res = query ('select pr.id, pr.name, pc.category_id, pr.url '.
		' from products pr '.
		' left join products_categories pc on (pc.product_id = pr.id) ORDER BY pr.name');
	$products = array ();
	while ($row = mysql_fetch_assoc($res)) {
		$cid = intval($row['category_id']);
		if (!isset($products[$cid]))
			$products[$cid] = array();
		$products[$cid][] = $row;
	}
	$isFirst = true;
	$allCategories = $GLOBALS['categories'];


	// The Kiddiemax category must be moved to the bottom
	$km = $allCategories[273];
	unset ($allCategories['273']);
	


foreach ($allCategories as $key => $row) {
    $name[$key]  = $row['name'];
}
array_multisort($name, SORT_ASC, $allCategories);


	
	foreach ($allCategories as $index => $category) {


		if ($category['display'] == 'F')
			continue;
		if (!$category['url'])
			continue;

		if ($category['id'] != 273) {
					echo '<li', ($isFirst ? ' class="first"' : ''), '><a href="/products/', $category['url'], '/">',
						$category['name'],
					'</a>';
		} 


		// here comes the fun part
		// build arrays for each subcategory, holding the products
		$subCats = array ();
	
		foreach ($category['subcategories'] as $subcategory) {
			$scID = $subcategory['id'];
			if (!isset($products[$scID]))
				continue; // empty category!
			$scProducts = $products[$scID];
			$subCats[] = array ('id' => $scID, 'name' => $subcategory['name'], 'url' => $subcategory['url'],
				'products' => $scProducts, 'products_count' => count($scProducts));
		}
		// sort the categories by the amount of products from the largest to the smallest
		$subCats = array_reverse(sortArrayBySubKey($subCats, 'products_count'));
		// here we will keep which category goes into which column
		$columns = array (array(), array(), array());
		// temp array, holding the length of the columns
		$columnsSizes = array (0, 0, 0);
		for ($i = 0, $c = count($subCats); $i < $c; $i ++) {
			$subCat = $subCats[$i];
			$subCatSize = $subCat['products_count'] + 1; // don't forget +1 for the title of the category
			// find the shortest column
			$min = 100000000;
			$minColumnIndex = null;
			for ($j = 0; $j < 3; $j ++) {
				if ($columnsSizes[$j] < $min) {
					$min = $columnsSizes[$j];
					$minColumnIndex = $j;
				}
			}
			// so, the shortest column s with index $minColumnIndex. We add the subcategory there
			$columns[$minColumnIndex][] = $subCat;
			$columnsSizes[$minColumnIndex] += $subCatSize;
		}

		// now sort the columns by their sizes, so the largest comes first
		array_multisort($columnsSizes, SORT_DESC, SORT_NUMERIC, $columns);
		$columnsCount = 0;
		foreach ($columnsSizes as $size)
			if ($size > 0)
				$columnsCount ++;
				
		// now that we know how many columns there will be we can go and print the "sub" element
		
		echo '<div class="sub cc', $columnsCount, '"><a href="#" class="close" onclick="menuClose()">&nbsp;</a>',
				'<div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div>',
				'<div class="c"><div class="c2"><div class="c3">';
				
		// actually print the columns	
		for ($i = 0; $i < $columnsCount; $i ++) {
			echo '<div class="clmn">';
			$column = $columns[$i];
//temp
/*
foreach ($column as $keyo => $rowo) {
    $nameo[$keyo]  = $rowo['id'];
}
array_multisort($nameo, SORT_ASC, $column);
*/
//var_dump($column);

			foreach ($column as $subCategory) {
				$scProducts = $subCategory['products'];
				$cnt = $subCategory['products_count'];
				
				echo '<strong>',
						'<a href="/products/', $category['url'], '/', $subCategory['url'], '.html">', 
							$subCategory['name'], 
						'</a>',
					'</strong>';
				
$max_loop=20; //This is the desired value of Looping
$p_count = 0; //First we set the count to be zeo					
				foreach ($scProducts as $j => $product) {
					echo '<div onmouseover="mih(this, ', $product['id']. ')">', 
								'<a href="/products/', $product['url'], '.html?pcid=', $subCategory['id'], '" title="', $product['name'], '"', 
									($j < $cnt - 1 ? '' : ' class="pt"'), '>', 
									$product['name'], 
								'</a>',
							'</div>';
					    $p_count++; //Increase the value of the count by 1
    					if($p_count==$max_loop) break; //Break the loop if count is equal to the max_loop


					}
					
					if($cnt > $max_loop) {
					echo '<p><a href="/products/', $category['url'], '/', $subCategory['url'], '.html" class="view-all-prods">View All</a></p>';	
						
					}
				
			}
			
			echo '</div>';
		}
		
		echo 		'<div class="clear_both"></div></div></div></div>',
					'<div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div>',
					'<div class="p"></div>',
				'</div>',
			'</li>';

		
		$isFirst = false;
	}
	
	$allCategories[] = $km; // we add it at the bottom, violating the $id key, but it is not used in he menu anyway 

	foreach ($allCategories as $index => $category) {


		if ($category['id'] == 273) {
			echo '<li class="kiddie_max">',
				'<a href="/products/', $category['url'], '/" title="">&nbsp;</a>';






		// here comes the fun part
		// build arrays for each subcategory, holding the products
		$subCats = array ();
		foreach ($category['subcategories'] as $subcategory) {
			$scID = $subcategory['id'];
			if (!isset($products[$scID]))
				continue; // empty category!
			$scProducts = $products[$scID];
			$subCats[] = array ('id' => $scID, 'name' => $subcategory['name'], 'url' => $subcategory['url'],
				'products' => $scProducts, 'products_count' => count($scProducts));
		}
		// sort the categories by the amount of products from the largest to the smallest
		$subCats = array_reverse(sortArrayBySubKey($subCats, 'products_count'));
		// here we will keep which category goes into which column
		$columns = array (array(), array(), array());
		// temp array, holding the length of the columns
		$columnsSizes = array (0, 0, 0);
		for ($i = 0, $c = count($subCats); $i < $c; $i ++) {
			$subCat = $subCats[$i];
			$subCatSize = $subCat['products_count'] + 1; // don't forget +1 for the title of the category
			// find the shortest column
			$min = 100000000;
			$minColumnIndex = null;
			for ($j = 0; $j < 3; $j ++) {
				if ($columnsSizes[$j] < $min) {
					$min = $columnsSizes[$j];
					$minColumnIndex = $j;
				}
			}
			// so, the shortest column s with index $minColumnIndex. We add the subcategory there
			$columns[$minColumnIndex][] = $subCat;
			$columnsSizes[$minColumnIndex] += $subCatSize;
		}

		// now sort the columns by their sizes, so the largest comes first
		array_multisort($columnsSizes, SORT_DESC, SORT_NUMERIC, $columns);
		$columnsCount = 0;
		foreach ($columnsSizes as $size)
			if ($size > 0)
				$columnsCount ++;
				
		// now that we know how many columns there will be we can go and print the "sub" element
		
		echo '<div class="sub cc', $columnsCount, '"><a href="#" class="close" onclick="menuClose()">&nbsp;</a>',
				'<div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div>',
				'<div class="c"><div class="c2"><div class="c3">';
				
		// actually print the columns	
		for ($i = 0; $i < $columnsCount; $i ++) {
			echo '<div class="clmn">';
			$column = $columns[$i];
			foreach ($column as $subCategory) {
				$scProducts = $subCategory['products'];
				$cnt = $subCategory['products_count'];
				echo '<strong>',
						'<a href="/products/', $category['url'], '/', $subCategory['url'], '.html">', 
							$subCategory['name'], 
						'</a>',
					'</strong>';
				foreach ($scProducts as $j => $product) {
					echo '<div onmouseover="mih(this, ', $product['id']. ')">', 
								'<a href="/products/', $product['url'], '.html?pcid=', $subCategory['id'], '" title=""', 
									($j < $cnt - 1 ? '' : ' class="pt"'), '>', 
									$product['name'], 
								'</a>',
							'</div>';
				}
			}
			
			echo '</div>';
		}
		
		echo 		'<div class="clear_both"></div></div></div></div>',
					'<div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div>',
					'<div class="p"></div>',
				'</div>',
			'</li>';


		}

	
	}





	
?>
        </ul>
	</div>
	<div class="b"></div>

<?php if (!$_PAGE['drop-left-menu']) { ?>
	<div id="slm">
		<a href="/search/alphabetically/">Products A to Z</a>
		<a href="/search/by-ingredients.html">Ingredients A to Z</a>
		<p>
			Learn more about MaxiHealth products. Check out all our ads.
            <a class="btn" href="/our-ads.html"><span>View ads</span></a>	
		</p>
	</div>
<?php } ?>
</div>