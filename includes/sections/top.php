<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"<?php if (USE_RTL) echo ' dir="rtl"'; ?>>
<head>
<title><?php echo $_PAGE['title'] ?></title>
<meta name="description" content="<?php echo $_PAGE['description'] ?>" />
<meta name="keywords" content="<?php echo $_PAGE['keywords'] ?>" />
<meta name="language" content="en" />
<meta name="robots" content="index, follow" />
<meta name="audience" content="all" />
<meta name="distribution" content="global" />
<meta name="revisit-after" content="5 days" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="/css/main<?php if (USE_RTL) echo '-rtl'; ?>.css?dateStamp=<? echo time(); ?>" media="all" />
<link rel="stylesheet" type="text/css" href="/css/autosuggest.css">
<?php /*
<link type="text/css" rel="stylesheet" href="/css/print.css" media="print" />
*/ ?>
<!--[if lt IE 9]>
<link type="text/css" rel="stylesheet" href="/css/ie.css" media="all" />
<![endif]-->
<!--[if IE 7]>
<link type="text/css" rel="stylesheet" href="/css/ie7<?php if (USE_RTL) echo '-rtl'; ?>.css" media="all" />
<![endif]-->
<script src="/js/modernizr.custom.min.js"></script>

<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body<?php if ($_PAGE['onload']) echo ' onload="'.$_PAGE['onload'].'"'; ?>>
<div id="main_container">
<a href="/" title="Home" id="home_page_link">&nbsp;</a>
<?php 
require DIR_BOXES.'left-menu.php';
?>
<div id="header">
	<div class="tr_links">
		<a href="/reviews.html" title="Reviews">Reviews</a> &nbsp; | &nbsp;
		<a href="/sitemap.html" title="Site Map">Site Map</a> &nbsp; | &nbsp;
		<a href="/contact-us.html" title="Contact us">Contact Us</a>
	</div>
    <?php /*?><img src="/images/pesach-btn.gif" id="holiday-btn" alt="Pesach List" /><?php */?>
    <div id="holidayDialog" title="Pesach List" style="display:none;"></div>

	<form method="get" action="/search/results.html" id="searchform" name="searchform">
		<div class="search">
			<input type="text" class="text" id="searchInput" name="q" autocomplete="off" value="">
			<input type="submit" class="subm" value="&nbsp;">
		</div>
	</form>
	<a href="javascript:$zopim.livechat.window.show()" id="chatlive"><img id="chat_img" src="/images/send-msg-btn.png"/></a>
    <div class="menu">
      <div class="m"> <a href="/why-maxi-health.html" class="first"><span>Why MaxiHealth?</span></a> <a href="/strictly-kosher.html" class="kosher"><span>Strictly Kosher</span></a> <a href="/products/new.html" class="new"><span>New Products</span></a> <a href="/articles/" class="health"><span>Health Articles</span></a> <a href="/buy-online.html" class="bo"><span><span>Buy Online</span></span></a> <a href="/stores/" class="last"><span><span>Store Locator</span></span></a>
<ul id="storesDropDown">
          <li class="arrow"></li>
          <li class="headline">Find a Store Near You</li>
          <li class="store-search-input">
            <form class="form-inline search-form" action="/stores/test.html" method="get">
              <input name="location" id="dealerSearch" type="text" placeholder="Enter address, postal code, city, state/province or country" autocomplete="off" value="" required>
              <button type="submit" id="dealerSubmitBtn"><i></i></button>
            </form>
          </li>
          <li class="view-all"><a href="/stores/test.html?location=United States">View All Stores</a></li>
        </ul>        
      </div>
    </div>
</div>
