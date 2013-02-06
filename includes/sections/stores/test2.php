<?php 

$_PAGE['title'] = 'Store Locator';

$_PAGE['drop-left-menu'] = true;

$_PAGE['scripts'][] = 'http://maps.google.com/maps/api/js?key=AIzaSyBFP46Ctp5dH8FVmuzGtVsNDm-KtmPJhmc&sensor=false&v=3.8';

$_PAGE['scripts'][] = '/js/stores-locator2.js?dateStamp=3' . time();

?>


<div id="body" class="noleftmenu stores_locations_body">

	<h1 class="bb">Store Locations</h1>
    <p>Maxi Health Research is dedicated to provide consumers with supplements that will improve their lives and achive maximum results.
<br>
Check out our great line of products up close at a retailer near you.</p>

<p class="msg_error" style="display:none;">No stores found in this location that offer our products.</p>

<form method="get" action="" id="search_location_form">
	<ul id="search_form">
<li>Search stores:</li>
<li><input type="text" name="location" class="text" id="location" size="30">
<small>Enter address, postal code, city, state/province or country</small>
</li>			
<li><input type="submit" class="subm" value="&nbsp;"></li>
</ul>
</form>

	<div id="stores_locator">

		<div id="stores_list">
        <div class="stores-found"><h2><span></span> stores found</h2><div></div></div>
        <div class="other-stores" style="display:none"><h2>Other stores nearby</h2><div></div></div>
        </div>

		<div id="map_canvas"></div>

	</div>

</div>

<div class="clear_both"></div>