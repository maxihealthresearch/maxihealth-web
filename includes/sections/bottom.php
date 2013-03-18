</div>
<?php 
require DIR_BOXES.'bottom-menu.php';
?>
<div id="sub_footer">
	<div class="r1">
		<a href="/why-maxi-health.html" title="Why Maxihealth">Why MaxiHealth&reg;?</a>  |  
		<a href="/buy-online.html" title="Buy Online via our resellers">Buy Online</a>  |  
		<a href="/products/new.html" title="New Products">New Products</a>  |  
		<a href="/about-enzymax.html" title="About Enzymax">About Enzymax</a>  |  
		<a href="/strictly-kosher.html" title="Strictly Kosher">Strictly Kosher</a>  |  
		<a href="/stores/" title="Store Locator">Store Locator</a>  |  
		<a href="/articles/">Health Articles</a>  |  
		<a href="/reviews.html">Reviews</a>  |  
		<a href="/contact-us.html" title="Contact us">Contact Us</a>  |  
		<a href="/sitemap.html">Site Map</a>
	</div>
	<span class="m5">Questions? Call 1-800-895-9555</span>
	<span class="m5">Email us: <a href="mailto:info@maxihealth.com" title="Email Maxihealth">info@maxihealth.com</a></span>
	<span class="m5">Follow Maxihealth on 
		<a href="http://www.google.com/profiles/maxihealthresearch" title="Follow Maxihealth on Google Buzz"><img src="/images/google-buzz.png" alt="Google Buzz" /></a>
		<a href="http://twitter.com/Maxihealth" title="Follow Maxihealth on Twitter"><img src="/images/twitter.png" alt="Twitter" /></a>
	</span>
	<span class="m5">Copyright &copy; <?php echo date('Y'); ?> Maxihealth Research LLC. All rights reserved.</span>
</div>
<!--Note: Script order important to avoid conflict between prototype and jquery-->
<script type="text/javascript" src="/js/zopim.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/base.js"></script>
<script type="text/javascript" src="/js/autosuggest.js"></script>
<script type="text/javascript" src="/js/menu.js"></script>
<script type="text/javascript" src="/js/holiday.js"></script>
<?php 
if (is_array($_PAGE['scripts']))
	foreach ($_PAGE['scripts'] as $script)
		echo '<script type="text/javascript" src="',$script.'"></script>';
?>
</body>
</html>