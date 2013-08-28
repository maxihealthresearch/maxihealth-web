<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Maxihealth admin panel <?php echo ($_PAGE['title'] ? ' - '.$_PAGE['title'] : ''); ?></title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="/admin/admin.css" />
<script type="text/javascript" src="/admin/js/delete.js"></script>
<?php
if ($_PAGE['scripts'])
	foreach ($_PAGE['scripts'] as $src)
		echo '<script type="text/javascript" src="'.$src.'"></script>';
if ($_PAGE['js_additional'])
	echo '<script type="text/javascript">'.$_PAGE['js_additional'].'</script>';
?>
</head>
<body <?php echo $_PAGE['js_onload'] ? 'onload="'.$_PAGE['js_onload'].'"' : ''?>>
<div id="all_sub">
	<div id="header" class="wrapper">
		<ul class="menu">
			<li><a href="/admin/static-pages/">Pages</a></li>
			<li><a href="/admin/search-autocomplete/">Search Autocomplete</a></li>
			<li><a href="/admin/fp-banners/">Front page banners</a></li>
			<li><a href="/admin/featured-products/">Seasonal Products</a></li>
			<li><a href="/admin/ingredients/">Ingredients Search</a></li>
			<li><a href="/admin/stores/">Stores Locations</a></li>
			<li><a href="/admin/articles/">Articles</a></li>
			<li><a href="/admin/contact-us/">Contact Us</a></li>
			<li><a href="/admin/redirects/">URL Redirects</a></li>
			<li style="clear:left;width:0;margin:0"></li>
			<li><a href="/admin/products-features/">Products Features</a></li>
			<li><a href="/admin/products-forms/">Products Forms</a></li>
			<li><a href="/admin/categories/">Products Categories</a></li>
			<li><a href="/admin/groups/">Products Groups</a></li>
			<li><a href="/admin/products/">Products</a></li>
			<li><a href="/admin/reviews/">Products Reviews</a></li>
			<li><a href="/admin/online-stores/">Online Resellers</a></li>
			<li><a href="/admin/ads/">Our Ads</a></li>
		</ul>
		<div style="clear:both"></div>
	</div>
	<hr class="wrapper"/>
	<div id="content" class="wrapper">