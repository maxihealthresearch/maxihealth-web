<?php
		$_PAGE['scripts'][] = '/js/libs/jquery.min.js';
		$_PAGE['scripts'][] = '/admin/js/stores.js';


	$id = intval($_GET['id']);

	if ($id > 0) 

		$r = mysql_fetch_assoc(query("select * from stores where id = $id"));

	else 

		$r = array ('id' => 0, 'lat' => 40.178873, 'lng' => -96.723633);



	if ($errors['name']) echo '<p class="error">Please enter store name.</p>';
	if ($errors['address']) echo '<p class="error">Please enter address.</p>';
	if ($errors['city']) echo '<p class="error">Please enter city</p>';
	if ($errors['postal']) echo '<p class="error">Please enter postal code</p>';

	unset($errors);

?>

<h2><?php echo ($id ? 'Edit' : 'Add') ?> store</h2>

<p>* Required fields</p><br />

<form method="post" action="#" enctype="multipart/form-data" id="mapform">

<input type="hidden" name="action" value="save" />

<input type="hidden" name="id" value="<?php echo $r['id'] ?>" />


<table>
<tr><th>*Name:</th><td><input type="text" name="name" value="<?php echo $r['name'] ?>" /></td></tr>
<tr><th>*Address:</th><td><input type="text" name="address" id="address_input" value="<?php echo $r['address'] ?>" /></td></tr>
<tr><th>Address 2:</th><td><input type="text" name="address2" value="<?php echo $r['address2'] ?>" /></td></tr>
<tr><th>*City/Town:</th><td><input type="text" name="city" id="city_input" value="<?php echo $r['city'] ?>" /></td></tr>
<tr><th>State/Province:</th><td><input type="text" name="state" id="state_input" value="<?php echo $r['state'] ?>" /></td></tr>
<tr><th>*Postal Code:</th><td><input type="text" name="postal" id="postal_input" value="<?php echo $r['postal'] ?>" /></td></tr>
<tr><th>Country:</th><td>
<?php /*?><input type="text" name="country" id="country_input" value="<?php echo $r['country'] ?>" /><?php */?>
			<select name="country" id="country_input">
				<option value="Canada"<?php if ($r['country'] == 'Canada') echo ' selected="selected"'; ?>>Canada</option>
				<option value="Israel"<?php if ($r['country'] == 'Israel') echo ' selected="selected"'; ?>>Israel</option>
				<option value="South Africa"<?php if ($r['country'] == 'South Africa') echo ' selected="selected"'; ?>>South Africa</option>
<option value="Switzerland"<?php if ($r['country'] == 'Switzerland') echo ' selected="selected"'; ?>>Switzerland</option>
<option value="United Kingdom"<?php if ($r['country'] == 'United Kingdom') echo ' selected="selected"'; ?>>United Kingdom</option>
                
				<option value="United States"<?php if ($r['country'] == 'United States') echo ' selected="selected"'; ?>>United States</option>
			</select><br />
</td></tr>
<tr><th>Phone:</th><td><input type="text" name="phone" value="<?php echo $r['phone'] ?>" /></td></tr>
<tr><th>Website:</th><td><input type="text" name="url" value="<?php echo $r['url'] ?>" /></td></tr>

	<tr>

		<td>&nbsp;</td>

		<td>
		<input type="hidden" name="lat" id="lat_input" value="<?php echo $r['lat']?>" />
		<input type="hidden" name="lng" id="lng_input" value="<?php echo $r['lng']?>" />
			<input type="submit" value="Save" class="btn" />

			<input type="button" value="Back" onclick="document.location='index.html'" class="btn" />

		</td>

	</tr>

</table>

</form>