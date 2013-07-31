<?php
require_once DIR_WYSIWYG.'wysiwygPro.class.php';

$id = intval($_GET['id']);
if ($id > 0) {
	$row = mysql_fetch_assoc(query ('select * from products where id = '.$id));
	$res = query('select feature_id from products_features where product_id = '.$id);
	while ($r = mysql_fetch_assoc($res))
		$row['features'][$r['feature_id']] = true;
	$res = query('select form_id, size from products_forms where product_id = '.$id);
	while ($r = mysql_fetch_assoc($res)) { 
		$row['forms'][$r['form_id']] = true;
		$row['sizes'][$r['form_id']] = $r['size'];
	}
	$res = query('select category_id from products_categories where product_id = '.$id);
	while ($r = mysql_fetch_assoc($res))
		$row['categories'][$r['category_id']] = true;
	$res = query('select group_id from products_groups where product_id = '.$id);
	while ($r = mysql_fetch_assoc($res))
		$row['groups'][$r['group_id']] = true;
} else
	$row = array('id' => 0, 'features' => array(), 'forms' => array(), 'categories' => array());

if (count($errors)) {
	if ($errors['name']) echo '<p class="error">Please enter name of the product!</p>';
	/*if ($errors['url']) echo '<p class="error">Please enter URL chunk of the product!</p>';*/
	if ($errors['category']) echo '<p class="error">Please select at least one category!</p>';
	if ($errors['url-duplicate']) echo '<p class="error">There already is a product with that URL!</p>';
	if ($errors['image']) echo '<p class="error">Please select image to upload!</p>';
	$row = array_merge($row, $_POST);
}
	
?>
<h2><?php echo ($id ? 'Edit' : 'Add') ?> product</h2><br />

<p>*Required Fields</p>

<br>
<form method="post" action="#" enctype="multipart/form-data">
<input type="hidden" name="action" value="save" />
<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
<input type="hidden" name="extension" value="<?php echo $row['extension'] ?>" />
<table>
	<tr><th>*Name: </th>
		<td><input type="text" name="name" class="text" value="<?php echo $row['name']?>" size="50" /></td></tr>
	<tr>
		<th>Groups:</th><td><table><tr><td style="width:400px"><div class="cats_list">
		<?php 
		$res = query ('select * from groups order by name');
		while ($group = mysql_fetch_assoc($res)) {
			echo '<div>', 
					'<input type="checkbox" name="groups[', $group['id'], ']"',
						($row['groups'][$group['id']] ? ' checked="checked"' : ''), ' />',
					$group['name'],
					'</div>';
		}
		?>
		</div></td>
    <td style="width:50px"><strong>*Categories:</strong></td><td><div class="cats_list">
		<?php 
		$categories = $GLOBALS['categories'];
		foreach ($categories as $category) {
			echo '<div><strong>', $category['name'], '</strong></div>';
			foreach ($category['subcategories'] as $subc) {
				echo '<div>', 
						'<input type="checkbox" name="categories[', $subc['id'], ']"',
							($row['categories'][$subc['id']] ? ' checked="checked"' : ''), ' />',
						$subc['name'],
						'</div>';
			}
		}
		?>
		</div></td></tr></table></td>
        </tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Meta description: </th>
		<td><textarea name="meta_description"><?php echo $row['meta_description']?></textarea></td></tr>
	<tr><th>Meta keywords: </th>
		<td><input type="text" name="meta_keywords" class="text w600" value="<?php echo $row['meta_keywords']?>" size="50" /></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Subtitle: </th>
		<td colspan="3"><input type="text" name="subtitle" class="text w600" value="<?php echo $row['subtitle']?>" size="50" /></td></tr>
	<tr><th>Short description: </th>
		<td><textarea name="short_description"><?php echo $row['short_description']?></textarea></td></tr>
	<tr><th>Long Description:</th><td>
		<textarea name="description" rows="20" cols="200"><?php echo $row['description']?></textarea>
		</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Directions:</th><td>
		<textarea name="directions" rows="4" cols="200"><?php echo $row['directions']?></textarea>
		</td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Supplement facts:</th><td>
		<textarea name="supplemental_facts" rows="20" cols="200"><?php echo $row['supplemental_facts']?></textarea>
		</td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Other Ingredients:</th><td>
		<textarea name="other_ingredients" rows="20" cols="200"><?php echo $row['other_ingredients']?></textarea>
		</td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Ingredients:</th><td>
		<textarea name="ingredients_search" rows="4" cols="80"><?php echo $row['ingredients_search']?></textarea><br />
		<em>Used only for the "Search by Ingredients" and not displayed to the user! No need to separate with commas</em>
		</td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>Forms and sizes:</th><td colspan="3"><div class="forms_list">
		<?php 
		$res = query ('select id, name from n_forms');
		while ($r = mysql_fetch_assoc($res))
			echo '<div class="itm">',
					'<input type="checkbox" name="forms[', $r['id'], ']"',
						($row['forms'][$r['id']] ? ' checked="checked"' : ''), ' />',
					'<img src="', WEB_DIR_IMAGES_FORMS, $r['id'], '.png" alt="" />',
					$r['name'],
					'<input type="text" class="t" name="sizes[',$r['id'],']" value="', $row['sizes'][$r['id']], '" />',
					'</div>';
		?>
		</div></td></tr>
	<tr><th>Features:</th><td colspan="3"><div class="cb_list">
		<?php 
		$res = query ('select id, name from n_features');
		while ($r = mysql_fetch_assoc($res))
			echo '<div class="itm">',
					'<input type="checkbox" name="features[', $r['id'], ']"',
						($row['features'][$r['id']] ? ' checked="checked"' : ''), ' />',
					'<img src="', WEB_DIR_IMAGES_FEATURES, $r['id'], '.png" alt="" />',
					$r['name'], 
					'</div>';
		?>
		</div></td></tr>
	<tr><th>Benefits:<br /><em>One per line!</em></th>
		<td><textarea name="benefits"><?php echo $row['benefits']?></textarea></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>"See our Ad" link URL: </th>
		<td><input type="text" name="see_our_ad_link_url" class="text" value="<?php echo $row['see_our_ad_link_url']?>" size="50" /></td></tr>
	<tr><th>Date Added:</th>
    	
        <!--Note: 4-18-2013. Convert mysql date to php date. Need to figure out regular expressions--> 	
    	<?php /*?><td><input type="text" name="date_added" class="text" value="<?php echo date('m/d/Y H:i:s',strtotime($row['date_added'])); ?>" size="50" /><br /><?php */?>
    	<td><input type="text" name="date_added" class="text" value="<?php echo $row['date_added']; ?>" size="50" /><br />

		<em>Format year/month/day hour/min/sec/.  The newer the date - the higher the product is positioned on new products page. By default all new products have latest date.</em></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><th>*Product Images:</th><td><table><tr>
    <td>Image 1:</td><td><input type="file" name="image" class="file" /></td>
    <td>Image 2:</td><td><input type="file" name="image2" class="file" /></td>
    <td>Image 3:</td><td><input type="file" name="image3" class="file" /></td>
    <td>Image 4:</td><td><input type="file" name="image4" class="file" /></td>
    </tr>
	<?php if ($id > 0 ) {?>
		<tr>
        <td>Current:</td><td style="padding-left: 3px;">
        
			<?php
				$image_file = DIR_IMAGES_PRODUCTS.$row['id'].'.png';
				if (file_exists($image_file))
					//echo '<img alt="', $row['text'], '" src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'], '_t.png" />';
					echo '<img alt="'.$row['name'].'" src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'].'_t.png?dateStamp=', time(), '" />';
			?>
			</td>
        <td>Current:</td><td style="padding-left: 3px;">
			<?php
				$image_file2 = DIR_IMAGES_PRODUCTS.$row['id'].'_2.png';
				if (file_exists($image_file2))
					echo '<img alt="'.$row['name'].'" src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'].'_2_t.png?dateStamp=', time(), '" />';
			?>
			</td>
        <td>Current:</td><td style="padding-left: 3px;">
			<?php
				$image_file3 = DIR_IMAGES_PRODUCTS.$row['id'].'_3.png';
				if (file_exists($image_file3))
					echo '<img alt="'.$row['name'].'" src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'].'_3_t.png?dateStamp=', time(), '" />';
			?>
			</td>
        <td>Current:</td><td style="padding-left: 3px;">
			<?php
				$image_file4 = DIR_IMAGES_PRODUCTS.$row['id'].'_4.png';
				if (file_exists($image_file4))
					echo '<img alt="'.$row['name'].'" src="', WEB_DIR_IMAGES_PRODUCTS, $row['id'].'_4_t.png?dateStamp=', time(), '" />';
			?>
        	</td>
		</tr>
	<?php } ?>    
    </table></td></tr>

	
    



	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="Save" class="btn" />
			<input type="button" value="Back" onclick="document.location='index.html'" class="btn" />
		</td>
	</tr>
</table>

</form>
