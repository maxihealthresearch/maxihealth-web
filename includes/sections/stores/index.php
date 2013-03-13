<?php 

$_PAGE['title'] = 'Store Locator';

$_PAGE['drop-left-menu'] = true;

$_PAGE['scripts'][] = 'http://maps.google.com/maps/api/js?key=AIzaSyBFP46Ctp5dH8FVmuzGtVsNDm-KtmPJhmc&sensor=false&v=3.8';

$_PAGE['scripts'][] = '/js/jquery.mockjax.js';

$_PAGE['scripts'][] = '/js/stores-locator.js';

$_PAGE['scripts'][] = '/js/mustache.js';

?>
<link rel="stylesheet" href="/css/stores.css?dateStamp=<?php echo time()?>" media="screen">

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

		<div id="stores_list"><img src="/images/spinner.gif" alt="loading..."></div>

		<div id="map_canvas"><img src="/images/spinner.gif" alt="loading..."></div>

	</div>

</div>
<script id="infowindow" type="text/template">
{{#target_stores}}
	<p>
	<strong>{{{name}}}</strong><br>
	{{{address}}}<br>
	{{#address2}}{{address2}}<br>{{/address2}}
	{{{city}}}, {{#state}}{{state}}, {{/state}}{{{postal}}}<br>
{{^usa}}{{{country}}}<br>{{/usa}}
	{{{phone}}}
{{#email}}<br>{{{email}}}{{/email}}
{{#url}}<br><a href="{{{url}}}" target="_blank">visit website</a>{{/url}}
	</p>
{{/target_stores}}
</script>

<script id="listTpl" type="text/template">
<div class="stores-found">
		<h2><span>{{total_target_stores}}</span> stores found</h2>

{{#target_stores}}
	<p>
	<a href="#" class="store-name" onclick="showMap({{lat}}, {{lng}});return false">{{{name}}}</a><br>
	{{{address}}}<br>
	{{#address2}}{{address2}}<br>{{/address2}}
	{{{city}}}, {{#state}}{{state}}, {{/state}}{{{postal}}}<br>
{{^usa}}{{{country}}}<br>{{/usa}}
	{{{phone}}}
{{#email}}<br>{{{email}}}{{/email}}
{{#url}}<br><a href="{{{url}}}" target="_blank">visit website</a>{{/url}}
	</p>
{{/target_stores}}



<h2 class="nearby-title" style="display:none">Other stores nearby</h2>
{{#nearby_stores}}
	<p>
	<a href="#" class="store-name" onclick="showMap({{lat}}, {{lng}});return false">{{{name}}}</a><br>
	{{{address}}}<br>
	{{#address2}}{{address2}}<br>{{/address2}}
	{{{city}}}, {{#state}}{{state}}, {{/state}}{{{postal}}}<br>
{{^usa}}{{{country}}}<br>{{/usa}}
	{{{phone}}}
{{#url}}<br><a href="{{{url}}}" target="_blank">visit website</a>{{/url}}
	</p>
{{/nearby_stores}}

</div>{{! end of stores-found div }}
</script>
<div class="clear_both"></div>