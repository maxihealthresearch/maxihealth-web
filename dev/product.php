       <?php 
require_once $_SERVER['DOCUMENT_ROOT']."/config.php"; //this gets database data

$res = mysql_query("select * from products WHERE id = 29");
$product = mysql_fetch_assoc($res)

?>
<!DOCTYPE html>
<html xml:lang="en">
<head>
<title>Maxihealth.com</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="language" content="en" />
<meta name="robots" content="index, follow" />
<meta name="audience" content="all" />
<meta name="distribution" content="global" />
<meta name="revisit-after" content="5 days" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css">
<link type="text/css" rel="stylesheet" href="/css/main.min.css" media="all" />
<link type="text/css" rel="stylesheet" href="css/main.min.css" media="all" />

<script src="/js/modernizr.custom.min.js"></script>
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<div id="adsModalOverlay"></div>
<div id="adsModalContainer" class="hidden"></div>
<div id="main_container">
<a href="/" title="Home" id="home_page_link">&nbsp;</a>
<div id="left_menu">
	<div class="t"></div>
	<div class="m">
		<a href="/products/all.html" id="see_all_products">See All Categories &amp; Products</a>
		<ul id="left_menu_l1">
<li class="first"><a href="/products/antioxidant-immune/">Antioxidant/Immune</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/antioxidant-immune/antioxidant-immune.html">Antioxidant/Immune</a></strong><div onMouseOver="mih(this, 77)"><a href="/products/glutamax-caps.html?pcid=205" title="Glutamax Caps&trade;">Glutamax Caps&trade;</a></div><div onMouseOver="mih(this, 76)"><a href="/products/glutamax-tablets.html?pcid=205" title="Glutamax&trade; (Tablets)">Glutamax&trade; (Tablets)</a></div><div onMouseOver="mih(this, 229)"><a href="/products/immune-support-kiddievite.html?pcid=205" title="Immune Support&trade; (for children)">Immune Support&trade; (for children)</a></div><div onMouseOver="mih(this, 228)"><a href="/products/immune-support.html?pcid=205" title="Immune Support&trade; (for teens and adults)">Immune Support&trade; (for teens and adults)</a></div><div onMouseOver="mih(this, 87)"><a href="/products/kiddie-boost.html?pcid=205" title="Kiddie Boost&trade; ">Kiddie Boost&trade; </a></div><div onMouseOver="mih(this, 91)"><a href="/products/kyolic-liquid.html?pcid=205" title="Kyolic&reg; Liquid">Kyolic&reg; Liquid</a></div><div onMouseOver="mih(this, 215)"><a href="/products/liquid-iodine-complex.html?pcid=205" title="Liquid Iodine Complex&trade;">Liquid Iodine Complex&trade;</a></div><div onMouseOver="mih(this, 96)"><a href="/products/max-c-bio-600.html?pcid=205" title="Max C Bio 600 &trade; ">Max C Bio 600 &trade; </a></div><div onMouseOver="mih(this, 13)"><a href="/products/maxi-antiox-supreme.html?pcid=205" title="Maxi AntioX Supreme&trade;">Maxi AntioX Supreme&trade;</a></div><div onMouseOver="mih(this, 108)"><a href="/products/maxi-biotic.html?pcid=205" title="Maxi Biotic&reg;">Maxi Biotic&reg;</a></div><div onMouseOver="mih(this, 90)"><a href="/products/maxi-kyolic-400.html?pcid=205" title="Maxi Kyolic&reg; 400 ">Maxi Kyolic&reg; 400 </a></div><div onMouseOver="mih(this, 165)"><a href="/products/maxi-opc-supreme.html?pcid=205" title="Maxi OPC Supreme&trade;">Maxi OPC Supreme&trade;</a></div><div onMouseOver="mih(this, 186)"><a href="/products/maxi-resveratrol.html?pcid=205" title="Maxi Resveratrol&trade;">Maxi Resveratrol&trade;</a></div><div onMouseOver="mih(this, 163)"><a href="/products/olive-supreme.html?pcid=205" title="Olive Supreme&trade;">Olive Supreme&trade;</a></div><div onMouseOver="mih(this, 172)"><a href="/products/pome-green.html?pcid=205" title="Pome-Green&trade;">Pome-Green&trade;</a></div><div onMouseOver="mih(this, 2)"><a href="/products/pycnogenol-supreme.html?pcid=205" title="Pycnogenol&reg; Supreme" class="pt">Pycnogenol&reg; Supreme</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/co-q-formuals/">CO Q Formulas</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/co-q-formuals/co-q-formulas.html">CO Q Formulas</a></strong><div onMouseOver="mih(this, 44)"><a href="/products/advanced-co-q-300.html?pcid=214" title="Advanced CO Q 300&trade; ">Advanced CO Q 300&trade; </a></div><div onMouseOver="mih(this, 41)"><a href="/products/co-q-100-liquid-caps.html?pcid=214" title="CO Q 100 Liquid Caps&trade; ">CO Q 100 Liquid Caps&trade; </a></div><div onMouseOver="mih(this, 265)"><a href="/products/co-q-300-liquid-caps.html?pcid=214" title="Co Q 300&trade; Liquid Caps">Co Q 300&trade; Liquid Caps</a></div><div onMouseOver="mih(this, 46)"><a href="/products/co-q-carnitine-complex.html?pcid=214" title="Co Q Carnitine Complex&trade; ">Co Q Carnitine Complex&trade; </a></div><div onMouseOver="mih(this, 47)"><a href="/products/co-q-supreme.html?pcid=214" title="CO Q Supreme&trade; ">CO Q Supreme&trade; </a></div><div onMouseOver="mih(this, 42)"><a href="/products/maxi-co-q-200.html?pcid=214" title="Maxi Co Q 200&trade; ">Maxi Co Q 200&trade; </a></div><div onMouseOver="mih(this, 43)"><a href="/products/maxi-co-q-30.html?pcid=214" title="MAXI CO Q 30&trade; ">MAXI CO Q 30&trade; </a></div><div onMouseOver="mih(this, 45)"><a href="/products/maxi-co-q-60.html?pcid=214" title="MAXI CO Q 60&trade; ">MAXI CO Q 60&trade; </a></div><div onMouseOver="mih(this, 237)"><a href="/products/co-q-ubiquinol.html?pcid=214" title="Maxi Co Q Ubiquinol&trade;" class="pt">Maxi Co Q Ubiquinol&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/calcium/">Calcium</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/calcium/calcium.html">Calcium</a></strong><div onMouseOver="mih(this, 240)"><a href="/products/cal-mag-fizz.html?pcid=212" title="Cal Mag Fizz&trade;">Cal Mag Fizz&trade;</a></div><div onMouseOver="mih(this, 24)"><a href="/products/cal-d-max.html?pcid=212" title="Cal-D-Max&trade; ">Cal-D-Max&trade; </a></div><div onMouseOver="mih(this, 27)"><a href="/products/cal-m-d.html?pcid=212" title="CAL-M-D&trade;">CAL-M-D&trade;</a></div><div onMouseOver="mih(this, 6)"><a href="/products/cal-max.html?pcid=212" title="Cal-Max&trade;">Cal-Max&trade;</a></div><div onMouseOver="mih(this, 25)"><a href="/products/calciFizz.html?pcid=212" title="CalciFizz&trade; ">CalciFizz&trade; </a></div><div onMouseOver="mih(this, 303)"><a href="/products/calciyum-strawberry-flavor.html?pcid=212" title="CalciYum! - Strawberry Flavor">CalciYum! - Strawberry Flavor</a></div><div onMouseOver="mih(this, 302)"><a href="/products/calciyum-with-vitamin-k2-chocolate-flavor.html?pcid=212" title="CalciYum! with Vitamin K2 - Chocolate Flavor">CalciYum! with Vitamin K2 - Chocolate Flavor</a></div><div onMouseOver="mih(this, 32)"><a href="/products/chewable-calci-yum.html?pcid=212" title="Chewable Calci-Yum&trade;">Chewable Calci-Yum&trade;</a></div><div onMouseOver="mih(this, 31)"><a href="/products/chewable-calcium-complex.html?pcid=212" title="Chewable Calcium Complex&trade; ">Chewable Calcium Complex&trade; </a></div><div onMouseOver="mih(this, 109)"><a href="/products/maxi-cal.html?pcid=212" title="Maxi-Cal&trade; ">Maxi-Cal&trade; </a></div><div onMouseOver="mih(this, 162)"><a href="/products/one-to-one-cal-max.html?pcid=212" title="One to One Cal Max&trade;" class="pt">One to One Cal Max&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/enzyme-digestion-formulas/">Enzyme/Digestion Formulas</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/enzyme-digestion-formulas/enzyme-digestion-formulas.html">Enzyme/Digestion Formulas</a></strong><div onMouseOver="mih(this, 161)"><a href="/products/chewable-nutralizer.html?pcid=216" title="Chewable Nutralizer&trade;">Chewable Nutralizer&trade;</a></div><div onMouseOver="mih(this, 55)"><a href="/products/digest-support.html?pcid=216" title="Digest Support &trade; ">Digest Support &trade; </a></div><div onMouseOver="mih(this, 56)"><a href="/products/digest-to-the-max.html?pcid=216" title="Digest To The Max&trade; ">Digest To The Max&trade; </a></div><div onMouseOver="mih(this, 107)"><a href="/products/maxi-anti-acid.html?pcid=216" title="Maxi Anti Acid&trade; ">Maxi Anti Acid&trade; </a></div><div onMouseOver="mih(this, 111)"><a href="/products/maxi-digest.html?pcid=216" title="Maxi Digest&trade; ">Maxi Digest&trade; </a></div><div onMouseOver="mih(this, 175)"><a href="/products/premium-enzymax-complex.html?pcid=216" title="Premium Enzymax&reg; Complex ">Premium Enzymax&reg; Complex </a></div><div onMouseOver="mih(this, 193)"><a href="/products/super-enzymax.html?pcid=216" title="Super Enzymax&trade;" class="pt">Super Enzymax&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/glucosamine-joint-formula/">Glucosamine/Joint Formula</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/glucosamine-joint-formula/glucosamine-joint-formula.html">Glucosamine/Joint Formula</a></strong><div onMouseOver="mih(this, 80)"><a href="/products/maxi-gs-500.html?pcid=220" title="Maxi GS 500&trade; ">Maxi GS 500&trade; </a></div><div onMouseOver="mih(this, 177)"><a href="/products/premium-glucosamine-complex.html?pcid=220" title="Premium Glucosamine Complex&trade;">Premium Glucosamine Complex&trade;</a></div><div onMouseOver="mih(this, 194)"><a href="/products/super-glucosamine-complex.html?pcid=220" title="Super Glucosamine Complex&trade;">Super Glucosamine Complex&trade;</a></div><div onMouseOver="mih(this, 264)"><a href="/products/veggie-glucosamine.html?pcid=220" title="Veggie Glucosamine&trade;" class="pt">Veggie Glucosamine&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/green-foods/">Green Foods</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/green-foods/green-foods.html">Green Foods</a></strong><div onMouseOver="mih(this, 79)"><a href="/products/green-vitality.html?pcid=222" title="Green Vitality&trade; ">Green Vitality&trade; </a></div><div onMouseOver="mih(this, 113)"><a href="/products/maxi-green-concentrate.html?pcid=222" title="Maxi Green Concentrate&trade; ">Maxi Green Concentrate&trade; </a></div><div onMouseOver="mih(this, 78)"><a href="/products/maxi-green-energee.html?pcid=222" title="Maxi Green Energee&trade; ">Maxi Green Energee&trade; </a></div><div onMouseOver="mih(this, 115)"><a href="/products/maxi-green-supreme.html?pcid=222" title="Maxi Green Supreme&trade; " class="pt">Maxi Green Supreme&trade; </a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/herbs/">Herbs</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/herbs/herbs.html">Herbs</a></strong><div onMouseOver="mih(this, 18)"><a href="/products/bee-pollen-cleanser.html?pcid=224" title="Bee Pollen Cleanser&trade;">Bee Pollen Cleanser&trade;</a></div><div onMouseOver="mih(this, 19)"><a href="/products/bilberry-supreme.html?pcid=224" title="Bilberry Supreme&trade; ">Bilberry Supreme&trade; </a></div><div onMouseOver="mih(this, 20)"><a href="/products/black-cohosh-dong-quai-root.html?pcid=224" title="Black Cohosh &amp; Dong Quai Root&trade; ">Black Cohosh &amp; Dong Quai Root&trade; </a></div><div onMouseOver="mih(this, 285)"><a href="/products/chewable-teen-hers.html?pcid=224" title="Chewable Teen Hers&trade;">Chewable Teen Hers&trade;</a></div><div onMouseOver="mih(this, 59)"><a href="/products/echinacea-supreme.html?pcid=224" title="Echinacea Supreme&trade; ">Echinacea Supreme&trade; </a></div><div onMouseOver="mih(this, 72)"><a href="/products/gingemax.html?pcid=224" title="Gingermax&trade; ">Gingermax&trade; </a></div><div onMouseOver="mih(this, 74)"><a href="/products/ginko-biloba-eleuthero-root.html?pcid=224" title="Ginkgo Biloba &amp; Eleuthero Root&trade;">Ginkgo Biloba &amp; Eleuthero Root&trade;</a></div><div onMouseOver="mih(this, 73)"><a href="/products/ginkgo-biloba.html?pcid=224" title="Ginkgo Biloba&trade; ">Ginkgo Biloba&trade; </a></div><div onMouseOver="mih(this, 75)"><a href="/products/ginkgomax.html?pcid=224" title="Ginkgomax&trade; ">Ginkgomax&trade; </a></div><div onMouseOver="mih(this, 83)"><a href="/products/herbal-calm.html?pcid=224" title="Herbal Calm&trade; ">Herbal Calm&trade; </a></div><div onMouseOver="mih(this, 229)"><a href="/products/immune-support-kiddievite.html?pcid=224" title="Immune Support&trade; (for children)">Immune Support&trade; (for children)</a></div><div onMouseOver="mih(this, 228)"><a href="/products/immune-support.html?pcid=224" title="Immune Support&trade; (for teens and adults)">Immune Support&trade; (for teens and adults)</a></div><div onMouseOver="mih(this, 93)"><a href="/products/livamax.html?pcid=224" title="Livamax&trade; ">Livamax&trade; </a></div><div onMouseOver="mih(this, 38)"><a href="/products/maxi-cinnacaps-complex.html?pcid=224" title="Maxi Cinnacaps Complex&trade; ">Maxi Cinnacaps Complex&trade; </a></div><div onMouseOver="mih(this, 110)"><a href="/products/maxi-cleanse.html?pcid=224" title="Maxi Cleanse&trade; ">Maxi Cleanse&trade; </a></div><div onMouseOver="mih(this, 58)"><a href="/products/echinacea.html?pcid=224" title="Maxi Echinacea&trade; ">Maxi Echinacea&trade; </a></div><div onMouseOver="mih(this, 60)"><a href="/products/maxi-eleuthero.html?pcid=224" title="Maxi Eleuthero&trade; ">Maxi Eleuthero&trade; </a></div><div onMouseOver="mih(this, 112)"><a href="/products/maxi-flax-caps.html?pcid=224" title="Maxi Flax Caps&trade; ">Maxi Flax Caps&trade; </a></div><div onMouseOver="mih(this, 219)"><a href="/products/maxi-green-tea-concentrate.html?pcid=224" title="Maxi Green Tea Concentrate&trade;">Maxi Green Tea Concentrate&trade;</a></div><div onMouseOver="mih(this, 239)"><a href="/products/maxi-longevity-women.html?pcid=224" title="Maxi Longevity for Women&trade;">Maxi Longevity for Women&trade;</a></div><p><a href="/products/herbs/herbs.html" class="view-all-prods">View All</a></p></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/minerals/">Minerals</a><div class="sub cc3"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/minerals/zinc.html">Zinc</a></strong><div onMouseOver="mih(this, 223)"><a href="/products/maxi-zinc-30.html?pcid=228" title="Maxi Zinc 30&trade;">Maxi Zinc 30&trade;</a></div><div onMouseOver="mih(this, 205)"><a href="/products/zinc-6.html?pcid=228" title="Zinc 6&trade;">Zinc 6&trade;</a></div><div onMouseOver="mih(this, 206)"><a href="/products/zinc-aspartate.html?pcid=228" title="Zinc Aspartate&trade;">Zinc Aspartate&trade;</a></div><div onMouseOver="mih(this, 207)"><a href="/products/zinc-plex.html?pcid=228" title="Zinc Plex&trade;" class="pt">Zinc Plex&trade;</a></div><strong><a href="/products/minerals/iron.html">Iron</a></strong><div onMouseOver="mih(this, 63)"><a href="/products/fe-25.html?pcid=227" title="FE 25&trade;">FE 25&trade;</a></div><div onMouseOver="mih(this, 65)"><a href="/products/maxi-ferrochel.html?pcid=227" title="Maxi Ferrochel 25&trade; ">Maxi Ferrochel 25&trade; </a></div><div onMouseOver="mih(this, 217)"><a href="/products/maxi-liquid-iron-concentrate.html?pcid=227" title="Maxi Liquid Iron Concentrate&trade;" class="pt">Maxi Liquid Iron Concentrate&trade;</a></div></div><div class="clmn"><strong><a href="/products/minerals/magnesium.html">Magnesium</a></strong><div onMouseOver="mih(this, 303)"><a href="/products/calciyum-strawberry-flavor.html?pcid=226" title="CalciYum! - Strawberry Flavor">CalciYum! - Strawberry Flavor</a></div><div onMouseOver="mih(this, 302)"><a href="/products/calciyum-with-vitamin-k2-chocolate-flavor.html?pcid=226" title="CalciYum! with Vitamin K2 - Chocolate Flavor">CalciYum! with Vitamin K2 - Chocolate Flavor</a></div><div onMouseOver="mih(this, 95)"><a href="/products/mag-6.html?pcid=226" title="Mag 6&trade; ">Mag 6&trade; </a></div><div onMouseOver="mih(this, 234)"><a href="/products/maxi-magnesium.html?pcid=226" title="Maxi Magnesium Capsules">Maxi Magnesium Capsules</a></div><div onMouseOver="mih(this, 122)"><a href="/products/maxi-magnesium-powder.html?pcid=226" title="Maxi Magnesium Powder&trade; ">Maxi Magnesium Powder&trade; </a></div><div onMouseOver="mih(this, 220)"><a href="/products/maxi-potassium-magnesium.html?pcid=226" title="Maxi Potassium Magnesium&trade;" class="pt">Maxi Potassium Magnesium&trade;</a></div></div><div class="clmn"><strong><a href="/products/minerals/other-minerals.html">Other Minerals</a></strong><div onMouseOver="mih(this, 127)"><a href="/products/maxi-colloidal-sulfur.html?pcid=229" title="Maxi Colloidal Sulfur&trade;">Maxi Colloidal Sulfur&trade;</a></div><div onMouseOver="mih(this, 249)"><a href="/products/maxi-mineral-complete.html?pcid=229" title="Maxi Mineral Complete&shy;&trade;">Maxi Mineral Complete&shy;&trade;</a></div><div onMouseOver="mih(this, 187)"><a href="/products/maxi-s-s.html?pcid=229" title="Maxi S &amp; S&trade;">Maxi S &amp; S&trade;</a></div><div onMouseOver="mih(this, 195)"><a href="/products/maxi-taurine-Magnesium-complex.html?pcid=229" title="Maxi Taurine Magnesium&trade; Complex" class="pt">Maxi Taurine Magnesium&trade; Complex</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/multivitamins-and-minerals/">Multivitamins and Minerals</a><div class="sub cc3"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/multivitamins-and-minerals/teens.html">Teens</a></strong><div onMouseOver="mih(this, 285)"><a href="/products/chewable-teen-hers.html?pcid=234" title="Chewable Teen Hers&trade;">Chewable Teen Hers&trade;</a></div><div onMouseOver="mih(this, 267)"><a href="/products/chewable-teen-his.html?pcid=234" title="Chewable Teen His&trade;">Chewable Teen His&trade;</a></div><div onMouseOver="mih(this, 196)"><a href="/products/teen-supreme-hers.html?pcid=234" title="Teen Supreme&trade; Hers">Teen Supreme&trade; Hers</a></div><div onMouseOver="mih(this, 197)"><a href="/products/teen-supreme-his.html?pcid=234" title="Teen Supreme&trade; His " class="pt">Teen Supreme&trade; His </a></div><strong><a href="/products/multivitamins-and-minerals/children.html">Children</a></strong><div onMouseOver="mih(this, 88)"><a href="/products/chewable-kiddievite.html?pcid=233" title="Chewable Kiddievite&trade; ">Chewable Kiddievite&trade; </a></div><div onMouseOver="mih(this, 34)"><a href="/products/chewable-maxi-health.html?pcid=233" title="Chewable Maxi Health&reg;">Chewable Maxi Health&reg;</a></div><div onMouseOver="mih(this, 262)"><a href="/products/multi-yums.html?pcid=233" title="Multi Yums!&trade;" class="pt">Multi Yums!&trade;</a></div></div><div class="clmn"><strong><a href="/products/multivitamins-and-minerals/adults.html">Adults</a></strong><div onMouseOver="mih(this, 116)"><a href="/products/maxi-health-supreme.html?pcid=235" title="Maxi Health Supreme&reg;">Maxi Health Supreme&reg;</a></div><div onMouseOver="mih(this, 117)"><a href="/products/maxi-health-two-complete.html?pcid=235" title="Maxi Health Two Complete&trade; ">Maxi Health Two Complete&trade; </a></div><div onMouseOver="mih(this, 209)"><a href="/products/maxi-health-two-complete-no-iron.html?pcid=235" title="Maxi Health Two Complete&trade; No Iron">Maxi Health Two Complete&trade; No Iron</a></div><div onMouseOver="mih(this, 148)"><a href="/products/maxicaps-supreme.html?pcid=235" title="Maxicaps Supreme&trade;">Maxicaps Supreme&trade;</a></div><div onMouseOver="mih(this, 150)"><a href="/products/maxivite-complete.html?pcid=235" title="Maxivite Complete&trade; ">Maxivite Complete&trade; </a></div><div onMouseOver="mih(this, 149)"><a href="/products/maxivite.html?pcid=235" title="Maxivite&trade;" class="pt">Maxivite&trade;</a></div><strong><a href="/products/multivitamins-and-minerals/infants-children.html">Infants/Children</a></strong><div onMouseOver="mih(this, 89)"><a href="/products/kiddievite-liquid.html?pcid=232" title="Kiddievite&trade; (liquid)" class="pt">Kiddievite&trade; (liquid)</a></div></div><div class="clmn"><strong><a href="/products/multivitamins-and-minerals/prenatal.html">Prenatal</a></strong><div onMouseOver="mih(this, 282)"><a href="/products/chewable-maxi-prenatal.html?pcid=236" title="Chewable Maxi Prenatal&trade;">Chewable Maxi Prenatal&trade;</a></div><div onMouseOver="mih(this, 180)"><a href="/products/maxi-health-one-prenatal.html?pcid=236" title="Maxi Health One Prenatal&trade;">Maxi Health One Prenatal&trade;</a></div><div onMouseOver="mih(this, 141)"><a href="/products/maxi-prenatal-caps.html?pcid=236" title="Maxi Prenatal Caps &trade; ">Maxi Prenatal Caps &trade; </a></div><div onMouseOver="mih(this, 179)"><a href="/products/maxi-prenatal.html?pcid=236" title="Maxi Prenatal&trade;" class="pt">Maxi Prenatal&trade;</a></div><strong><a href="/products/multivitamins-and-minerals/above-50.html">Above 50</a></strong><div onMouseOver="mih(this, 238)"><a href="/products/maxi-longevity-for-men.html?pcid=237" title="Maxi Longevity for Men&trade;">Maxi Longevity for Men&trade;</a></div><div onMouseOver="mih(this, 239)"><a href="/products/maxi-longevity-women.html?pcid=237" title="Maxi Longevity for Women&trade;" class="pt">Maxi Longevity for Women&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/fish-oils-omega-3/">Omega-3 Fish Oil</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/fish-oils-omega-3/fish-oils-omega-3.html">Fish Oils/Omega 3</a></strong><div onMouseOver="mih(this, 164)"><a href="/products/chewable-omega-yums-1000.html?pcid=218" title="Chewable Omega Yums 1000&trade;">Chewable Omega Yums 1000&trade;</a></div><div onMouseOver="mih(this, 278)"><a href="/products/chewable-omega-yums-1000-with-d3-orange-burst.html?pcid=218" title="Chewable Omega Yums 1000&trade; with D3 - Orange Burst">Chewable Omega Yums 1000&trade; with D3 - Orange Burst</a></div><div onMouseOver="mih(this, 259)"><a href="/products/chewable-omega-yums-2000.html?pcid=218" title="Chewable Omega Yums 2000&trade;">Chewable Omega Yums 2000&trade;</a></div><div onMouseOver="mih(this, 272)"><a href="/products/enriched-liquid-maxi-omega-3.html?pcid=218" title="EnricheD Liquid Maxi Omega-3&trade;">EnricheD Liquid Maxi Omega-3&trade;</a></div><div onMouseOver="mih(this, 216)"><a href="/products/enriched-maxi-omega-3-with-e-and-d3.html?pcid=218" title="EnricheD Maxi Omega-3 with E and D3 ">EnricheD Maxi Omega-3 with E and D3 </a></div><div onMouseOver="mih(this, 273)"><a href="/products/Liquid-Maxi-Omega-3.html?pcid=218" title="Liquid Maxi Omega-3&trade;">Liquid Maxi Omega-3&trade;</a></div><div onMouseOver="mih(this, 128)"><a href="/products/maxi-omega-3-2000-kosher-fish-oil.html?pcid=218" title="Maxi Omega-3&trade; 2000">Maxi Omega-3&trade; 2000</a></div><div onMouseOver="mih(this, 130)"><a href="/products/maxi-omega-3-concentrate.html?pcid=218" title="Maxi Omega-3&trade; Concentrate ">Maxi Omega-3&trade; Concentrate </a></div><div onMouseOver="mih(this, 236)"><a href="/products/maxi-omega-3-concentrate-bonus-pack.html?pcid=218" title="Maxi Omega-3&trade; Concentrate Bonus Pack">Maxi Omega-3&trade; Concentrate Bonus Pack</a></div><div onMouseOver="mih(this, 131)"><a href="/products/maxi-omega-3-eye-formula.html?pcid=218" title="Maxi Omega-3&trade; Eye Formula">Maxi Omega-3&trade; Eye Formula</a></div><div onMouseOver="mih(this, 132)"><a href="/products/maxi-omega-3-focus-formula.html?pcid=218" title="Maxi Omega-3&trade; Focus Formula">Maxi Omega-3&trade; Focus Formula</a></div><div onMouseOver="mih(this, 133)"><a href="/products/maxi-omega-3-heart-formula.html?pcid=218" title="Maxi Omega-3&trade; Heart Formula">Maxi Omega-3&trade; Heart Formula</a></div><div onMouseOver="mih(this, 134)"><a href="/products/maxi-omega-3-joint-formula.html?pcid=218" title="Maxi Omega-3&trade; Joint Formula">Maxi Omega-3&trade; Joint Formula</a></div><div onMouseOver="mih(this, 136)"><a href="/products/maxi-omega-3-memory-formula.html?pcid=218" title="Maxi Omega-3&trade; Memory Formula">Maxi Omega-3&trade; Memory Formula</a></div><div onMouseOver="mih(this, 137)"><a href="/products/maxi-omega-3-mood-formula.html?pcid=218" title="Maxi Omega-3&trade; Mood Formula">Maxi Omega-3&trade; Mood Formula</a></div><div onMouseOver="mih(this, 245)"><a href="/products/maxi-omega-prenatal-partner.html?pcid=218" title="Maxi Omega-3&trade; Prenatal Partner">Maxi Omega-3&trade; Prenatal Partner</a></div><div onMouseOver="mih(this, 139)"><a href="/products/maxi-omega-3-prostate-formula.html?pcid=218" title="Maxi Omega-3&trade; Prostate Formula">Maxi Omega-3&trade; Prostate Formula</a></div><div onMouseOver="mih(this, 199)"><a href="/products/triple-maxi-omega-3-concentrate-with-d3.html?pcid=218" title="Triple Maxi Omega-3&trade; Concentrate with D3" class="pt">Triple Maxi Omega-3&trade; Concentrate with D3</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/probiotics/">Probiotics</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/probiotics/probiotics.html">probiotics</a></strong><div onMouseOver="mih(this, 5)"><a href="/products/chewable-oraldophilus.html?pcid=239" title="Chewable Oraldophilus&trade; ">Chewable Oraldophilus&trade; </a></div><div onMouseOver="mih(this, 68)"><a href="/products/floramax.html?pcid=239" title="Floramax&trade; ">Floramax&trade; </a></div><div onMouseOver="mih(this, 84)"><a href="/products/hi-po-dophilus.html?pcid=239" title="Hi-PO Dophilus&trade;">Hi-PO Dophilus&trade;</a></div><div onMouseOver="mih(this, 10)"><a href="/products/maxi-5m.html?pcid=239" title="Maxi 5M&trade; ">Maxi 5M&trade; </a></div><div onMouseOver="mih(this, 12)"><a href="/products/maxi-7m-supreme.html?pcid=239" title="Maxi 7M Supreme&trade;">Maxi 7M Supreme&trade;</a></div><div onMouseOver="mih(this, 104)"><a href="/products/maxi-active-pro-10-chewable-probiotic.html?pcid=239" title="Maxi Active Pro 10&trade; Chewable Probiotic ">Maxi Active Pro 10&trade; Chewable Probiotic </a></div><div onMouseOver="mih(this, 105)"><a href="/products/maxi-active-pro-10-powder-probiotic.html?pcid=239" title="Maxi Active Pro 10&trade; Powder Probiotic ">Maxi Active Pro 10&trade; Powder Probiotic </a></div><div onMouseOver="mih(this, 102)"><a href="/products/maxi-active-pro-20.html?pcid=239" title="Maxi Active Pro 20&trade;">Maxi Active Pro 20&trade;</a></div><div onMouseOver="mih(this, 11)"><a href="/products/maxi-active-pro5-womans-probiotic.html?pcid=239" title="Maxi Active Pro 5&trade; Woman&#039;s Probiotic">Maxi Active Pro 5&trade; Woman&#039;s Probiotic</a></div><div onMouseOver="mih(this, 103)"><a href="/products/maxi-active-pro-50.html?pcid=239" title="Maxi Active Pro 50&trade;">Maxi Active Pro 50&trade;</a></div><div onMouseOver="mih(this, 94)"><a href="/products/lysine-complex.html?pcid=239" title="Maxi Lysine Complex&trade; ">Maxi Lysine Complex&trade; </a></div><div onMouseOver="mih(this, 212)"><a href="/products/probiotic-5m.html?pcid=239" title="Probiotic 5M&trade;">Probiotic 5M&trade;</a></div><div onMouseOver="mih(this, 166)"><a href="/products/yummie-oraldophilus.html?pcid=239" title="Yummie Oraldophilus&trade;" class="pt">Yummie Oraldophilus&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/speciatly-formulas/">Specialty Formulas</a><div class="sub cc3"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/speciatly-formulas/other-specialty-formulas.html">Other Specialty Formulas</a></strong><div onMouseOver="mih(this, 18)"><a href="/products/bee-pollen-cleanser.html?pcid=246" title="Bee Pollen Cleanser&trade;">Bee Pollen Cleanser&trade;</a></div><div onMouseOver="mih(this, 37)"><a href="/products/chromium-supreme.html?pcid=246" title="Chromium Supreme&trade; ">Chromium Supreme&trade; </a></div><div onMouseOver="mih(this, 40)"><a href="/products/circumax.html?pcid=246" title="Circumax&trade; ">Circumax&trade; </a></div><div onMouseOver="mih(this, 61)"><a href="/products/empty-maxicaps-single-zero.html?pcid=246" title="EMPTY &quot;0&quot; MAXICAPS&trade;">EMPTY &quot;0&quot; MAXICAPS&trade;</a></div><div onMouseOver="mih(this, 62)"><a href="/products/empty-maxicaps-double-zero.html?pcid=246" title="Empty &quot;00&quot; MAXICAPS&trade;">Empty &quot;00&quot; MAXICAPS&trade;</a></div><div onMouseOver="mih(this, 67)"><a href="/products/fibermax-supreme.html?pcid=246" title="Fibermax Supreme&trade; ">Fibermax Supreme&trade; </a></div><div onMouseOver="mih(this, 66)"><a href="/products/fibermax.html?pcid=246" title="Fibermax&trade; ">Fibermax&trade; </a></div><div onMouseOver="mih(this, 3)"><a href="/products/focusmax-two.html?pcid=246" title="FocusMax Two&trade;">FocusMax Two&trade;</a></div><div onMouseOver="mih(this, 241)"><a href="/products/formula-605.html?pcid=246" title="Formula 605&trade; ">Formula 605&trade; </a></div><div onMouseOver="mih(this, 92)"><a href="/products/lecithin-with-imported-bee-pollen.html?pcid=246" title="Lecithin with Imported Bee Pollen&trade; ">Lecithin with Imported Bee Pollen&trade; </a></div><div onMouseOver="mih(this, 98)"><a href="/products/max-energee.html?pcid=246" title="Max Energee&trade; ">Max Energee&trade; </a></div><div onMouseOver="mih(this, 106)"><a href="/products/maxi-allergy-support.html?pcid=246" title="Maxi Allergy Support&trade; ">Maxi Allergy Support&trade; </a></div><div onMouseOver="mih(this, 247)"><a href="/products/maxi-dmg-complex.html?pcid=246" title="Maxi DMG Complex&trade;">Maxi DMG Complex&trade;</a></div><div onMouseOver="mih(this, 119)"><a href="/products/maxi-lactation-pure-more.html?pcid=246" title="Maxi Lactation Pure &amp; More&trade; ">Maxi Lactation Pure &amp; More&trade; </a></div><div onMouseOver="mih(this, 4)"><a href="/products/maxi-lipoic-supreme.html?pcid=246" title="Maxi Lipoic Supreme&trade;">Maxi Lipoic Supreme&trade;</a></div><div onMouseOver="mih(this, 123)"><a href="/products/maxi-mens-formula.html?pcid=246" title="Maxi Mens Formula&trade;">Maxi Mens Formula&trade;</a></div><div onMouseOver="mih(this, 248)"><a href="/products/maxi-methyl-dmg-plus.html?pcid=246" title="Maxi Methyl DMG Plus">Maxi Methyl DMG Plus</a></div><div onMouseOver="mih(this, 174)"><a href="/products/maxi-premium-efa.html?pcid=246" title="Maxi Premium EFA&trade;">Maxi Premium EFA&trade;</a></div><div onMouseOver="mih(this, 176)"><a href="/products/maxi-premium-epo.html?pcid=246" title="Maxi Premium EPO&trade;">Maxi Premium EPO&trade;</a></div><div onMouseOver="mih(this, 178)"><a href="/products/maxi-premium-primrose.html?pcid=246" title="Maxi Premium Primrose&trade;">Maxi Premium Primrose&trade;</a></div><p><a href="/products/speciatly-formulas/other-specialty-formulas.html" class="view-all-prods">View All</a></p></div><div class="clmn"><strong><a href="/products/speciatly-formulas/weight-management-formulas.html">Weight Mangement Formulas</a></strong><div onMouseOver="mih(this, 49)"><a href="/products/d-s-support.html?pcid=245" title="D&amp;S Support&trade; ">D&amp;S Support&trade; </a></div><div onMouseOver="mih(this, 306)"><a href="/products/maxi-g-c-complex.html?pcid=245" title="Maxi G-C Complex">Maxi G-C Complex</a></div><div onMouseOver="mih(this, 219)"><a href="/products/maxi-green-tea-concentrate.html?pcid=245" title="Maxi Green Tea Concentrate&trade;">Maxi Green Tea Concentrate&trade;</a></div><div onMouseOver="mih(this, 145)"><a href="/products/maxi-thin-supreme.html?pcid=245" title="Maxi Thin Supreme&trade; ">Maxi Thin Supreme&trade; </a></div><div onMouseOver="mih(this, 158)"><a href="/products/naturemax-plus.html?pcid=245" title="Naturemax Plus&trade;">Naturemax Plus&trade;</a></div><div onMouseOver="mih(this, 154)"><a href="/products/naturemax.html?pcid=245" title="Naturemax&trade;" class="pt">Naturemax&trade;</a></div><strong><a href="/products/speciatly-formulas/cholesterol-formulas.html">Cholesterol Formulas</a></strong><div onMouseOver="mih(this, 28)"><a href="/products/ch-control.html?pcid=241" title="CH Control&trade;">CH Control&trade;</a></div><div onMouseOver="mih(this, 82)"><a href="/products/maxi-hdl.html?pcid=241" title="Maxi HDL&trade; ">Maxi HDL&trade; </a></div><div onMouseOver="mih(this, 184)"><a href="/products/maxi-red-yeast-rice.html?pcid=241" title="Maxi Red Yeast Rice&trade;" class="pt">Maxi Red Yeast Rice&trade;</a></div><strong><a href="/products/speciatly-formulas/urinary-tract-support-formulas.html">Urinary Tract Support Formulas</a></strong><div onMouseOver="mih(this, 48)"><a href="/products/cran-max-supreme.html?pcid=244" title="Cran-Max Supreme&trade;">Cran-Max Supreme&trade;</a></div><div onMouseOver="mih(this, 146)"><a href="/products/maxi-uti.html?pcid=244" title="Maxi UTI" class="pt">Maxi UTI</a></div></div><div class="clmn"><strong><a href="/products/speciatly-formulas/stress-formulas.html">Stress Formulas</a></strong><div onMouseOver="mih(this, 284)"><a href="/products/chewable-yummie-calm.html?pcid=243" title="Chewable Yummie Calm&trade;">Chewable Yummie Calm&trade;</a></div><div onMouseOver="mih(this, 99)"><a href="/products/max-relax-caps.html?pcid=243" title="Max Relax Caps">Max Relax Caps</a></div><div onMouseOver="mih(this, 100)"><a href="/products/max-relax.html?pcid=243" title="Max Relax&trade; ">Max Relax&trade; </a></div><div onMouseOver="mih(this, 36)"><a href="/products/maxi-chew-quick-calm.html?pcid=243" title="Maxi Chew Quick Calm&trade; ">Maxi Chew Quick Calm&trade; </a></div><div onMouseOver="mih(this, 86)"><a href="/products/maxi-itc.html?pcid=243" title="Maxi ITC&trade;">Maxi ITC&trade;</a></div><div onMouseOver="mih(this, 185)"><a href="/products/relax-to-the-max.html?pcid=243" title="Relax To The Max&trade;" class="pt">Relax To The Max&trade;</a></div><strong><a href="/products/speciatly-formulas/sleep-aid-formulas.html">Sleep Aid Formulas</a></strong><div onMouseOver="mih(this, 118)"><a href="/products/maxi-l-tryptophan-500.html?pcid=242" title="Maxi L-Tryptophan 500&trade;">Maxi L-Tryptophan 500&trade;</a></div><div onMouseOver="mih(this, 152)"><a href="/products/mel-o-max.html?pcid=242" title="Mel O Max&trade;">Mel O Max&trade;</a></div><div onMouseOver="mih(this, 151)"><a href="/products/mel-o-chew.html?pcid=242" title="Mel-O-Chew&trade; ">Mel-O-Chew&trade; </a></div><div onMouseOver="mih(this, 218)"><a href="/products/mel-o-drop.html?pcid=242" title="Mel-O-Drop&trade;" class="pt">Mel-O-Drop&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li><a href="/products/vitamins/">Vitamins </a><div class="sub cc3"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/vitamins/vitami-b.html">Vitamin B</a></strong><div onMouseOver="mih(this, 15)"><a href="/products/b-12-lozenges.html?pcid=248" title="B12 Lozenges&trade; ">B12 Lozenges&trade; </a></div><div onMouseOver="mih(this, 305)"><a href="/products/chewable-maxi-b-12-5000.html?pcid=248" title="Chewable Maxi B-12 5000&trade;">Chewable Maxi B-12 5000&trade;</a></div><div onMouseOver="mih(this, 227)"><a href="/products/liquid-b-complex.html?pcid=248" title="Liquid B Complex&trade;">Liquid B Complex&trade;</a></div><div onMouseOver="mih(this, 14)"><a href="/products/maxi-b-50-complex.html?pcid=248" title="Maxi B-50 Complex&trade; ">Maxi B-50 Complex&trade; </a></div><div onMouseOver="mih(this, 17)"><a href="/products/maxi-b-6.html?pcid=248" title="Maxi B-6&trade;">Maxi B-6&trade;</a></div><div onMouseOver="mih(this, 210)"><a href="/products/maxi-b12-with-biotin.html?pcid=248" title="Maxi B12&trade; with Biotin">Maxi B12&trade; with Biotin</a></div><div onMouseOver="mih(this, 301)"><a href="/products/maxi-biotin-5000.html?pcid=248" title="Maxi Biotin 5000&trade;">Maxi Biotin 5000&trade;</a></div><div onMouseOver="mih(this, 70)"><a href="/products/maxi-folic-acid.html?pcid=248" title="Maxi Folic Acid&trade; ">Maxi Folic Acid&trade; </a></div><div onMouseOver="mih(this, 160)"><a href="/products/maxi-niacin.html?pcid=248" title="Maxi Niacin&trade;">Maxi Niacin&trade;</a></div><div onMouseOver="mih(this, 169)"><a href="/products/pantocaps.html?pcid=248" title="Pantocaps&trade;">Pantocaps&trade;</a></div><div onMouseOver="mih(this, 170)"><a href="/products/pantomax-supreme.html?pcid=248" title="Pantomax Supreme&trade;">Pantomax Supreme&trade;</a></div><div onMouseOver="mih(this, 171)"><a href="/products/pantothenic-acid.html?pcid=248" title="Pantothenic Acid 500&trade;">Pantothenic Acid 500&trade;</a></div><div onMouseOver="mih(this, 198)"><a href="/products/triple-b-lozenges.html?pcid=248" title="Triple B Lozenges&trade; " class="pt">Triple B Lozenges&trade; </a></div><strong><a href="/products/vitamins/vitamin-k.html">Vitamin K</a></strong><div onMouseOver="mih(this, 302)"><a href="/products/calciyum-with-vitamin-k2-chocolate-flavor.html?pcid=252" title="CalciYum! with Vitamin K2 - Chocolate Flavor">CalciYum! with Vitamin K2 - Chocolate Flavor</a></div><div onMouseOver="mih(this, 202)"><a href="/products/vitamin-k-max.html?pcid=252" title="Vitamin K-Max" class="pt">Vitamin K-Max</a></div></div><div class="clmn"><strong><a href="/products/vitamins/vitamin-c.html">Vitamin C</a></strong><div onMouseOver="mih(this, 204)"><a href="/products/chewable-yummie-c-250.html?pcid=249" title="Chewable Yummie C 250&trade; ">Chewable Yummie C 250&trade; </a></div><div onMouseOver="mih(this, 96)"><a href="/products/max-c-bio-600.html?pcid=249" title="Max C Bio 600 &trade; ">Max C Bio 600 &trade; </a></div><div onMouseOver="mih(this, 97)"><a href="/products/max-c-gram-plus.html?pcid=249" title="Max C Gram Plus&trade;">Max C Gram Plus&trade;</a></div><div onMouseOver="mih(this, 22)"><a href="/products/max-c-1000.html?pcid=249" title="Max-C 1000&trade; ">Max-C 1000&trade; </a></div><div onMouseOver="mih(this, 23)"><a href="/products/max-c-500.html?pcid=249" title="Max-C 500&trade; ">Max-C 500&trade; </a></div><div onMouseOver="mih(this, 21)"><a href="/products/maxi-buffered-vitamin-c-powder.html?pcid=249" title="Maxi Buffered Vitamin C Powder&trade; ">Maxi Buffered Vitamin C Powder&trade; </a></div><div onMouseOver="mih(this, 153)"><a href="/products/msm-pureway-c-complex.html?pcid=249" title="MSM Pureway-C&reg; Complex&trade;">MSM Pureway-C&reg; Complex&trade;</a></div><div onMouseOver="mih(this, 167)"><a href="/products/panto-c-powder.html?pcid=249" title="Panto C Powder&trade;">Panto C Powder&trade;</a></div><div onMouseOver="mih(this, 168)"><a href="/products/panto-c-liquid.html?pcid=249" title="Panto C&trade; (Liquid)">Panto C&trade; (Liquid)</a></div><div onMouseOver="mih(this, 182)"><a href="/products/pure-c-bio-600.html?pcid=249" title="Pure C Bio 600&trade;">Pure C Bio 600&trade;</a></div><div onMouseOver="mih(this, 268)"><a href="/products/pure-c-bio-capsules.html?pcid=249" title="Pure-C-Bio Capsules&trade;">Pure-C-Bio Capsules&trade;</a></div><div onMouseOver="mih(this, 183)"><a href="/products/pureway-c-max.html?pcid=249" title="PureWay C&reg; Max " class="pt">PureWay C&reg; Max </a></div><strong><a href="/products/vitamins/vitamin-e.html">Vitamin E</a></strong><div onMouseOver="mih(this, 235)"><a href="/products/circu-e-200.html?pcid=251" title="Circu E 200&trade;">Circu E 200&trade;</a></div><div onMouseOver="mih(this, 39)"><a href="/products/circu-e-400.html?pcid=251" title="Circu E 400&trade; ">Circu E 400&trade; </a></div><div onMouseOver="mih(this, 173)"><a href="/products/maxi-premium-e-complete.html?pcid=251" title="Maxi Premium E Complete&trade;" class="pt">Maxi Premium E Complete&trade;</a></div></div><div class="clmn"><strong><a href="/products/vitamins/vitamin-d3.html">Vitamin D3</a></strong><div onMouseOver="mih(this, 27)"><a href="/products/cal-m-d.html?pcid=250" title="CAL-M-D&trade;">CAL-M-D&trade;</a></div><div onMouseOver="mih(this, 303)"><a href="/products/calciyum-strawberry-flavor.html?pcid=250" title="CalciYum! - Strawberry Flavor">CalciYum! - Strawberry Flavor</a></div><div onMouseOver="mih(this, 302)"><a href="/products/calciyum-with-vitamin-k2-chocolate-flavor.html?pcid=250" title="CalciYum! with Vitamin K2 - Chocolate Flavor">CalciYum! with Vitamin K2 - Chocolate Flavor</a></div><div onMouseOver="mih(this, 29)"><a href="/products/chew-d-max-1000.html?pcid=250" title="Chew-D-Max-1000&trade; ">Chew-D-Max-1000&trade; </a></div><div onMouseOver="mih(this, 30)"><a href="/products/chew-d-max-400.html?pcid=250" title="Chew-D-Max-400&trade; ">Chew-D-Max-400&trade; </a></div><div onMouseOver="mih(this, 51)"><a href="/products/maxi-d3-1000.html?pcid=250" title="Maxi D3 1000&trade; ">Maxi D3 1000&trade; </a></div><div onMouseOver="mih(this, 52)"><a href="/products/maxi-d3-2000.html?pcid=250" title="MAXI D3 2000&trade; ">MAXI D3 2000&trade; </a></div><div onMouseOver="mih(this, 221)"><a href="/products/maxi-d3-3000.html?pcid=250" title="Maxi D3 3000&trade;">Maxi D3 3000&trade;</a></div><div onMouseOver="mih(this, 50)"><a href="/products/maxi-d3-400.html?pcid=250" title="Maxi D3 400&trade; ">Maxi D3 400&trade; </a></div><div onMouseOver="mih(this, 53)"><a href="/products/maxi-d3-5000.html?pcid=250" title="MAXI D3 5000&trade; ">MAXI D3 5000&trade; </a></div><div onMouseOver="mih(this, 54)"><a href="/products/maxi-d3-concentrate.html?pcid=250" title="Maxi D3 Concentrate&trade; ">Maxi D3 Concentrate&trade; </a></div><div onMouseOver="mih(this, 158)"><a href="/products/naturemax-plus.html?pcid=250" title="Naturemax Plus&trade;" class="pt">Naturemax Plus&trade;</a></div><strong><a href="/products/vitamins/vitamin-a.html">Vitamin A</a></strong><div onMouseOver="mih(this, 239)"><a href="/products/maxi-longevity-women.html?pcid=264" title="Maxi Longevity for Women&trade;">Maxi Longevity for Women&trade;</a></div><div onMouseOver="mih(this, 158)"><a href="/products/naturemax-plus.html?pcid=264" title="Naturemax Plus&trade;">Naturemax Plus&trade;</a></div><div onMouseOver="mih(this, 154)"><a href="/products/naturemax.html?pcid=264" title="Naturemax&trade;" class="pt">Naturemax&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li><li class="kiddie_max"><a href="/products/kiddiemax/" title="">&nbsp;</a><div class="sub cc1"><a href="#" class="close" onClick="menuClose()">&nbsp;</a><div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c"><div class="c2"><div class="c3"><div class="clmn"><strong><a href="/products/kiddiemax/kiddieMax%C2%AE-.html">KiddieMax&reg;</a></strong><div onMouseOver="mih(this, 303)"><a href="/products/calciyum-strawberry-flavor.html?pcid=274" title="">CalciYum! - Strawberry Flavor</a></div><div onMouseOver="mih(this, 302)"><a href="/products/calciyum-with-vitamin-k2-chocolate-flavor.html?pcid=274" title="">CalciYum! with Vitamin K2 - Chocolate Flavor</a></div><div onMouseOver="mih(this, 32)"><a href="/products/chewable-calci-yum.html?pcid=274" title="">Chewable Calci-Yum&trade;</a></div><div onMouseOver="mih(this, 88)"><a href="/products/chewable-kiddievite.html?pcid=274" title="">Chewable Kiddievite&trade; </a></div><div onMouseOver="mih(this, 204)"><a href="/products/chewable-yummie-c-250.html?pcid=274" title="">Chewable Yummie C 250&trade; </a></div><div onMouseOver="mih(this, 229)"><a href="/products/immune-support-kiddievite.html?pcid=274" title="">Immune Support&trade; (for children)</a></div><div onMouseOver="mih(this, 87)"><a href="/products/kiddie-boost.html?pcid=274" title="">Kiddie Boost&trade; </a></div><div onMouseOver="mih(this, 89)"><a href="/products/kiddievite-liquid.html?pcid=274" title="">Kiddievite&trade; (liquid)</a></div><div onMouseOver="mih(this, 227)"><a href="/products/liquid-b-complex.html?pcid=274" title="">Liquid B Complex&trade;</a></div><div onMouseOver="mih(this, 262)"><a href="/products/multi-yums.html?pcid=274" title="">Multi Yums!&trade;</a></div><div onMouseOver="mih(this, 167)"><a href="/products/panto-c-powder.html?pcid=274" title="">Panto C Powder&trade;</a></div><div onMouseOver="mih(this, 168)"><a href="/products/panto-c-liquid.html?pcid=274" title="">Panto C&trade; (Liquid)</a></div><div onMouseOver="mih(this, 212)"><a href="/products/probiotic-5m.html?pcid=274" title="">Probiotic 5M&trade;</a></div><div onMouseOver="mih(this, 166)"><a href="/products/yummie-oraldophilus.html?pcid=274" title="" class="pt">Yummie Oraldophilus&trade;</a></div></div><div class="clear_both"></div></div></div></div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div></div></li>        </ul>
	</div>
	<div class="b"></div>

<ul id="left-menu-btm">
<li class="left-menu-btm-btn"><a href="/search/alphabetically/">Products A to Z</a></li>
<li class="left-menu-btm-btn"><a href="/search/by-ingredients.html">Ingredients A to Z</a></li>
<li class="left-menu-btm-video"><a href="/video-leaders-in-nutritional-Science.html">play video</a></li>
</ul>
<div id="sidebar-adgroup">
       <div class="sidebar-slide-dash"></div>
       <div id="jsSidebarSlidesZoomWrpr">
        <div class="sidebar-zoom-icon js-largezoom hidden">enlarge</div>
        <div class="sidebar-slides">

       <div class="js-gallery-data" data-id="53" data-link="http://maxihealth.com/products/new.html" title="Top Rated Products"><a href="http://maxihealth.com/products/new.html" target="_blank"><img src="/images/ads/53.png" alt="Top Rated Products"></a></div><div class="js-gallery-data" data-id="52" data-link="http://maxihealth.com/products/speciatly-formulas/stress-formulas.html" title="Relax!"><a href="http://maxihealth.com/products/speciatly-formulas/stress-formulas.html" target="_blank"><img src="/images/ads/52.png" alt="Relax!"></a></div><div class="js-gallery-data" data-id="51" data-link="http://maxihealth.com/" title="Quality Products from Quality Ingredients"><a href="http://maxihealth.com/" target="_blank"><img src="/images/ads/51.png" alt="Quality Products from Quality Ingredients"></a></div><div class="js-gallery-data" data-id="50" data-link="http://maxihealth.com/products/triple-maxi-omega-3-concentrate-with-d3.html?pcid=" title="3 Time Better Absorbed"><a href="http://maxihealth.com/products/triple-maxi-omega-3-concentrate-with-d3.html?pcid=" target="_blank"><img src="/images/ads/50.png" alt="3 Time Better Absorbed"></a></div><div class="js-gallery-data" data-id="49" data-link="http://maxihealth.com/products/chewable-maxi-prenatal.html" title="Try our Delicious Chewable Prenatal Vitamin"><a href="http://maxihealth.com/products/chewable-maxi-prenatal.html" target="_blank"><img src="/images/ads/49.png" alt="Try our Delicious Chewable Prenatal Vitamin"></a></div>
        </div>
       </div>
       <a href="/our-ads.html" class="left-menu-seeads">See All</a>
</div>

</div><div id="header">
	<div class="tr_links">
		<a href="/reviews.html" title="Reviews">Reviews</a> &nbsp; | &nbsp;
		<a href="/sitemap.html" title="Site Map">Site Map</a> &nbsp; | &nbsp;
		<a href="/contact-us.html" title="Contact us">Contact Us</a>
	</div>
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
            <form class="form-inline search-form" action="/stores/index.html" method="get">
              <input name="location" id="dealerSearch" type="text" placeholder="Enter address, postal code, city, state/province or country" autocomplete="off" value="" required>
              <button type="submit" id="dealerSubmitBtn"><i></i></button>
            </form>
          </li>
          <li class="view-all"><a href="/stores/index.html?location=United States">View All Stores</a></li>
        </ul>        
      </div>
    </div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="body" class="pl20">

	<div id="breadcrumb">

		<a href="/" title="">Home</a> &gt;

		Multi Yums!&trade;
	</div>

 	<div id="print_mail">

 		<a href="#" class="print" onClick="window.open('?print', 'print', 'width=600,menubar=1')" title="Print this product">Print</a>

 		<a href="#" id="email_friend_link" class="mail" title="Email a link to this product">Email</a></br></div>

 	

 	<h1><?php echo $product['name']; ?></h1>

 	

 	<div class="ovfla">

	 	<div id="product_photo">

	 		<div class="ph">

	 			<img src="<?php echo WEB_DIR_IMAGES_PRODUCTS, $product['id'] ?>.png?dateStamp=<?php echo time() ?>" alt="<?php echo $product['name'] ?>" />

	 		</div>



	 	</div>

	 	<div id="product_top_right">

	 		<p></p><p></p>

            

   

            

            

			<div class="forms">

				<div class="form" style="background-image:url(/images/forms/7.png)">90 or 180 Chewable Tablets</div>
			</div>

			<div class="ovfla">


				<?php 

				$res = query ('select pa.ad_id '.

					' from products_ads pa '.

					' left join ads a on (a.id = pa.ad_id) '.

					' where pa.product_id = '.$product['id']);

$row = mysql_fetch_assoc($res);

if ($row['ad_id']) {
					echo '<a href="/images/ads/', $row['ad_id'], '_large.png" title="See our ad" class="see_our_ad" target="_blank"><img src="/images/ads/', $row['ad_id'], '.png" alt="See Our Ad" /> <span class="btn white">See Our Ad</span></a>';
}
				?>


				<ul class="features"><li style="background-image:url(/images/features/2.png)">Strawberry Flavor</li><li style="background-image:url(/images/features/15.png)">Fruit Punch Flavor</li><li style="background-image:url(/images/features/24.png)">Gluten Free</li><li style="background-image:url(/images/features/47.png)">Assorted Flavors (Orange, Punch, Strawberry)</li></ul>
			</div>

	 	</div>

 	</div>
			<?php
				$image_file2 = DIR_IMAGES_PRODUCTS.$product['id'].'_2.png';
				$image_file3 = DIR_IMAGES_PRODUCTS.$product['id'].'_3.png';
				$image_file4 = DIR_IMAGES_PRODUCTS.$product['id'].'_4.png';

if (file_exists($image_file2)) {
					echo '<ul id="itemThumbList">';
					echo '<li title="', $product['image_name'], '"><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_t.png" alt="', $product['image_name'], '"></a></li>';
					echo '<li title="', $product['image_2_name'], '"><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_2_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_2_t.png" alt="', $product['image_2_name'], '"></a></li>';
}
if (file_exists($image_file3)) {
					echo '<li title="', $product['image_3_name'], '"><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_3_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_3_t.png" alt="', $product['image_3_name'], '"></a></li>';
}
if (file_exists($image_file4)) {
					echo '<li title="', $product['image_4_name'], '"><a href="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_4_original.png" target="_blank"><img src="', WEB_DIR_IMAGES_PRODUCTS, $product['id'], '_4_t.png" alt="', $product['image_4_name'], '"></a></li>';
}
if (file_exists($image_file2)) {
					echo '</ul>';
}
			?>    




<section id="socialMediaWrpr">
<div class="fb-like" data-send="false" data-width="290" data-show-faces="true"></div>

<!-- Place this tag where you want the +1 button to render -->
<g:plusone size="medium"></g:plusone>

<!-- Place this render call where appropriate -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</section>
 	<div id="product_bottom">

 		<div class="tabs_container">

 			<div class="tabs_top">

 				<a href="#" class="exp" id="expand_all_btn" onClick="return showExpandedView()">Expanded View</a>

 				<a href="#" class="tab" id="description_tab_btn" title="Description" onClick="return switchTab(0)">Description</a>

 				<a href="#" class="tab selected" id="supplemental_facts_tab_btn" title="Directions &amp; Supplement Facts" onClick="return switchTab(1)">Directions &amp; Supplement Facts</a>

 					<a href="#" class="tab" title="Reviews" id="reviews_tab_btn" onClick="return switchTab(2)">Reviews</a>
 			</div>

 			<div class="tabs">

 				<div id="description_tab" style="display:none">

 					
                    <p>These statements have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure, or prevent any diseases.</p>

 				</div>

 				<div id="supplemental_facts_tab" style="display:block">

                

                

                

                                

<p><strong>Directions:</strong> Chew one (1) tablet daily, or as directed.</p>


                                    

<div id="supFactsWrpr">
  <div class="ifChrt">
    <div class="ifChrtInr">
      <div class="ifTtl">Supplement Facts</div>
      <div class="ifSngSz">
      Serving Size: 1 Tablet
      </div>
      <div class="ifHdrSep"></div>
      <table cellspacing="0" cellpadding="0" border="0" class="ifITbl">
        <tbody>
          <tr>
            <td class="ifNcol ifAPShdr">Amount Per Serving</td>
            <td class="ifAcol ifAPShdr"></td>
            <td class="ifDVcol ifDVhdr">%DV</td>
          </tr>
          <tr>
            <td colspan="3"><div class="ifColHdrSep">
                <div></div>
              </div></td>
          </tr>
		  <tr><td class="ifNcol">Calories
</td><td class="ifAcol">4 </td><td class="ifDVcol"> </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Total Fat
</td><td class="ifAcol">0 g </td><td class="ifDVcol">0% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Trans Fat
</td><td class="ifAcol">0 g </td><td class="ifDVcol"> </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Sodium 
</td><td class="ifAcol">0 g  </td><td class="ifDVcol">0% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Total Carbohydrates 
</td><td class="ifAcol">1 g  </td><td class="ifDVcol"><1%  </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Sugars
</td><td class="ifAcol">1 g </td><td class="ifDVcol"> </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Protein
</td><td class="ifAcol">0 g </td><td class="ifDVcol"> </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin A (beta-carotene) 
</td><td class="ifAcol">2500 IU  </td><td class="ifDVcol">50% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin C (ascorbic acid) 
</td><td class="ifAcol">60 mg  </td><td class="ifDVcol">100% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin D3 (cholecalciferol) 
</td><td class="ifAcol">200 IU  </td><td class="ifDVcol">50% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin E (D-alpha tocopheryl)
</td><td class="ifAcol">30 IU  </td><td class="ifDVcol">100% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin B-1 (Thiamine) 
</td><td class="ifAcol">3 mg  </td><td class="ifDVcol">200% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin B2 (Riboflavin) 
</td><td class="ifAcol">1.5 mg  </td><td class="ifDVcol">88% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin B-3 (Niacinamide) 
</td><td class="ifAcol">3 mg  </td><td class="ifDVcol">15% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin B6 (Pyridoxine HCl) 
</td><td class="ifAcol">3 mg  </td><td class="ifDVcol">150% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Folate (Folic Acid) 
</td><td class="ifAcol">400 mcg  </td><td class="ifDVcol">100% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Vitamin B-12 (Cyanocobalamin)
</td><td class="ifAcol">10 mcg  </td><td class="ifDVcol">167% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Biotin 
</td><td class="ifAcol">300 mcg  </td><td class="ifDVcol">100% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Pantothenic Acid (D-Calcium pantothenate)
</td><td class="ifAcol">3 mg  </td><td class="ifDVcol">30% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Calcium (Citrate) 
</td><td class="ifAcol">10 mg  </td><td class="ifDVcol">1% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Iron (Amino Acid Chelate) 
</td><td class="ifAcol">2 mg  </td><td class="ifDVcol">11% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Magnesium (Oxide) 
</td><td class="ifAcol">5 mg  </td><td class="ifDVcol">1% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Zinc (Oxide) 
</td><td class="ifAcol">3 mg  </td><td class="ifDVcol">20% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Selenium (Amino Acid Chelate) 
</td><td class="ifAcol">10 mcg  </td><td class="ifDVcol">14% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Copper (Gluconate) .
</td><td class="ifAcol">0.25 mg  </td><td class="ifDVcol">13% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Manganese (Amino Acid Chelate) 
</td><td class="ifAcol">2 mg </td><td class="ifDVcol">100% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Chromium (Polynicotinate) 
</td><td class="ifAcol">50 mcg  </td><td class="ifDVcol">42% </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Potassium (Citrate)
</td><td class="ifAcol">2mg</td><td class="ifDVcol"> < 1% </td></tr>
			<tr><td colspan='3'><div class='ifHdrSep'></div></td></tr>
		  <tr><td class="ifNcol">Barley Grass (Hordeum volgare) (aerial parts) powder
</td><td class="ifAcol">5 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Broccoli powder (Brassica oleracea) (stems and buds)
</td><td class="ifAcol">5 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Carrot powder (Daucus carota) (root) 
</td><td class="ifAcol">5 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol"> Citrus Bioflavonoid Complex 
</td><td class="ifAcol">5 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Inositol 
</td><td class="ifAcol">3 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Lecithin (from soybeans) 
</td><td class="ifAcol">15 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Biolut™ marigold flowers extract Biolut™ Marigold flowers
extract (Tagates erecta)
[providing Lutein esters 90% (2.0 mg)
equivalent to 45% free lutein (1 mg),
Trans-zeaxanthin 2% (44 mcg),
Other carotenoids 0.475% (10 mcg)]"
</td><td class="ifAcol">2.2 mg </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">PABA (para-aminobenzoic acid)
</td><td class="ifAcol">3 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Papaya fruit powder (carrica papaya)
</td><td class="ifAcol">5 mg  </td><td class="ifDVcol">* </td></tr>
    		<tr><td colspan='3'><div class='ifBl'></div></td></tr>
			
		  <tr><td class="ifNcol">Spinach powder (spinada oleracea)
</td><td class="ifAcol">5 mg  </td><td class="ifDVcol">* </td></tr>
	     <tr><td colspan="3"><div class="ifBl2"><div></div></div></td></tr>   
        </tbody>
      </table>
<div class="ifFn">*%Daily Value not established.</div>
<div class="ifFn">** Daily Values are based on a 2,000 calorie per day diet.</div>

    </div>
  </div>
</div>


<p><strong>Other Ingredients:</strong> Dextrose, fructose, natural fruit flavors, stearic acid, natural food color, magnesium stearate, silicon dioxide, sucralose, and Enzymax® (calcium carbonate, bromelain, papain, lipase, amylase, protease, silica).
</p><p>
Contains soy.
</p><p>
This product contains no wheat, gluten, yeast, salt, milk, artificial flavors, colorings or preservatives.</p><p>Store tightly closed in a cool, dry place. Keep out of reach of children.</p>


<p><strong>Available packaged in the following units:</strong> 90 or 180 Chewable Tablets</p><p>These statements have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure, or prevent any diseases. </p> <p><strong>Abbreviations:</strong> <br> I.U. : International Units <br> mg. : milligrams <br> mcg. : micrograms </p>
                  



                    

                    

 				</div>

 				<div id="reviews_tab">

 					<h1>Be the first to write a review!</h1>
 					<div id="product_post_review">

	 					<div class="ttl">Post your story</div>

	 					<p>Please make sure you fill in all the fields. Comments are moderated. Please don't spam</p>

	 					<div id="review_send_result"></div>

	 					<form method="post" action="/ajax/post-review.json" id="review_form">

	 						<input type="hidden" name="pid" value="262" />

	 						<input type="hidden" name="not_ajax" value="true" />

	 						<div class="form">

	 							<div class="l">

	 								<label>Name</label>

	 								<input type="text" name="name" class="text" />

	 							</div>

	 							<div class="r">

	 								<label>Email</label> <span>(will not be published)</span>

	 								<input type="text" name="email" class="text" />

	 							</div>

	 							<label>Your story</label>

	 							<textarea rows="5" cols="40" name="text"></textarea>

                                <!--<button class="btn" name="submit" type="submit">Submit</button>-->

                                <input type="submit" value="Submit" class="btn" name="submit" />

	 						</div>

	 					</form>

	 				</div>

 				</div>

 			</div>

 		</div>

 		
 	</div>

 	<div id="product_popup">

 		<div class="t">

			<div class="l"></div><div class="r"></div><div class="m" id="product_popup_title">E-mail a friend</div>

			<a href="#" class="close" onClick="EmailFriend.close()"></a>

		</div>

		<div class="m">

			<form action="" method="post" id="email_friend_form">
                                <input name="product_url" type="hidden" value="multi-yums" />
				<div id="email_friend_send_result"></div>

				<label>Your name</label>

				<input type="text" class="text" name="name" />

				<label>Your e-mail</label>

				<input type="text" class="text" name="email" />

				<label>Recipient's name</label>

				<input type="text" class="text" name="recipient_name" />

				<label>Recipient's e-mail</label>

				<input type="text" class="text" name="recipient_email" />

				<div>

                    <button class="btn" name="submit" type="submit" id="btn_email_friend"  >Submit</button>

					<div id="email_friend_sending" class="ajax_sending">Sending, please wait!</div>

				</div>

			</form>

		</div>

		<div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div>

	</div>

</div>

<div class="clear_both"></div>

</div>
<div id="footer">
	<div class="clmn first"><strong><a href="/products/age-gender/" title="*Age/Gender*">*Age/Gender*</a></strong><a href="/products/age-gender/children-s-nutrition.html" title="Children&#039;s Nutrition">Children&#039;s Nutrition</a><a href="/products/age-gender/kiddiemax.html" title="KiddieMax&reg;">KiddieMax&reg;</a><a href="/products/age-gender/teen-formulas.html" title="Teen Formulas">Teen Formulas</a><a href="/products/age-gender/women-s-formulations.html" title="Women&#039;s Formulations">Women&#039;s Formulations</a><a href="/products/age-gender/men-s-formulations.html" title="Men&#039;s Formulations">Men&#039;s Formulations</a><strong><a href="/products/ailments/" title="*Ailments*">*Ailments*</a></strong><a href="/products/ailments/add-and-adhd-formulas.html" title="ADD &amp; ADHD Formulas">ADD &amp; ADHD Formulas</a><a href="/products/ailments/allergy-formulas.html" title="Allergy Formulas">Allergy Formulas</a><a href="/products/ailments/antioxidant-formulations.html" title="Antioxidant Formulations">Antioxidant Formulations</a><a href="/products/ailments/anxiety.html" title="Anxiety">Anxiety</a><a href="/products/ailments/blood-sugar-formulas.html" title="Blood Sugar Formulas">Blood Sugar Formulas</a><a href="/products/ailments/bone-builders.html" title="Bone Builders">Bone Builders</a><a href="/products/ailments/constipation-formulas.html" title="Constipation Formulas">Constipation Formulas</a><a href="/products/ailments/depression-formulas.html" title="Depression Formulas">Depression Formulas</a><a href="/products/ailments/detox-formulas.html" title="Detox Formulas">Detox Formulas</a><a href="/products/ailments/digestion-formulas.html" title="Digestion Formulas">Digestion Formulas</a><a href="/products/ailments/energizing-nutrient-complexes.html" title="Energizing Nutrient Complexes">Energizing Nutrient Complexes</a><a href="/products/ailments/eye-support-formulas.html" title="Eye Support Formulas">Eye Support Formulas</a><a href="/products/ailments/focus-formulas.html" title="Focus Formulas">Focus Formulas</a></div><div class="clmn"><a href="/products/ailments/hair-builders.html" title="Hair Builders">Hair Builders</a><a href="/products/ailments/headache.html" title="Headache">Headache</a><a href="/products/ailments/heartburn-fighters.html" title="Heartburn Fighters">Heartburn Fighters</a><a href="/products/ailments/hormonal-balance-formulas.html" title="Hormonal Balance Formulas">Hormonal Balance Formulas</a><a href="/products/ailments/immune-boosters.html" title="Immune Boosters">Immune Boosters</a><a href="/products/ailments/inflammation-formulas.html" title="Inflammation Formulas">Inflammation Formulas</a><a href="/products/ailments/joint-health-formulas.html" title="Joint Health Formulas">Joint Health Formulas</a><a href="/products/ailments/kidney-stones.html" title="Kidney Stones">Kidney Stones</a><a href="/products/ailments/lactation-formulas.html" title="Lactation Formulas">Lactation Formulas</a><a href="/products/ailments/liver-support-formulas.html" title="Liver Support Formulas">Liver Support Formulas</a><a href="/products/ailments/memory-formulas.html" title="Memory Formulas">Memory Formulas</a><a href="/products/ailments/menopause-formulation.html" title="Menopause Formulation">Menopause Formulation</a><a href="/products/ailments/mood-formulas.html" title="Mood Formulas">Mood Formulas</a><a href="/products/ailments/nail-formulations.html" title="Nail Formulations">Nail Formulations</a><a href="/products/ailments/nerve-system-formula.html" title="Nerve System Formula">Nerve System Formula</a><a href="/products/ailments/parasite-formulas.html" title="Parasite Formulas">Parasite Formulas</a><a href="/products/ailments/pms-formulation.html" title="PMS Formulation">PMS Formulation</a><a href="/products/ailments/prenatal-formulas.html" title="Prenatal Formulas">Prenatal Formulas</a><a href="/products/ailments/prostate-formulas.html" title="Prostate Formulas">Prostate Formulas</a><a href="/products/ailments/skin-formulations.html" title="Skin Formulations">Skin Formulations</a></div><div class="clmn"><a href="/products/ailments/sleep-aid-formulations.html" title="Sleep Aid Formulations">Sleep Aid Formulations</a><a href="/products/ailments/stress-formulations.html" title="Stress Formulations">Stress Formulations</a><a href="/products/ailments/urinary-tract-support-formulas.html" title="Urinary Tract Support Formulas">Urinary Tract Support Formulas</a><a href="/products/ailments/varicose-veins.html" title="Varicose Veins">Varicose Veins</a><a href="/products/ailments/weight-management-formulas.html" title="Weight Management Formulas">Weight Management Formulas</a><a href="/products/ailments/periodotal-health.html" title="Periodontal Health">Periodontal Health</a><a href="/products/ailments/cardiovascular.html" title="Cardiovascular">Cardiovascular</a><a href="/products/ailments/metabolism.html" title="Metabolism">Metabolism</a><a href="/products/ailments/colds-and-flu.html" title="Colds and Flu">Colds and Flu</a><a href="/products/ailments/yeast-and-fungus-fighters.html" title="Yeast and Fungus Fighters">Yeast and Fungus Fighters</a><a href="/products/ailments/cholesterol.html" title="Cholesterol">Cholesterol</a><strong><a href="/products/form/" title="*Form*">*Form*</a></strong><a href="/products/form/chewable-supplements.html" title="Chewable Supplements">Chewable Supplements</a><a href="/products/form/liquid-supplements.html" title="Liquid Supplements">Liquid Supplements</a><a href="/products/form/powder-supplements.html" title="Powder Supplements">Powder Supplements</a><strong><a href="/products/ingredients/" title="*Ingredients*">*Ingredients*</a></strong><a href="/products/ingredients/acidophilus-formulas.html" title="Acidophilus Formulas">Acidophilus Formulas</a><a href="/products/ingredients/amino-acids.html" title="Amino Acids">Amino Acids</a><a href="/products/ingredients/calcium-formulations.html" title="Calcium Formulations">Calcium Formulations</a><a href="/products/ingredients/coenzyme-q-10.html" title="Coenzyme Q-10">Coenzyme Q-10</a></div><div class="clmn"><a href="/products/ingredients/dmg-formulas.html" title="DMG Formulas">DMG Formulas</a><a href="/products/ingredients/enzymes-formulas.html" title="Enzymes Formulas">Enzymes Formulas</a><a href="/products/ingredients/essential-fatty-acids.html" title="Essential Fatty Acids">Essential Fatty Acids</a><a href="/products/ingredients/fiber-supplements.html" title="Fiber Supplements">Fiber Supplements</a><a href="/products/ingredients/ginkgo-biloba-formulations.html" title="Ginkgo Biloba Formulations">Ginkgo Biloba Formulations</a><a href="/products/ingredients/green-food-supplements.html" title="Green Food Supplements">Green Food Supplements</a><a href="/products/ingredients/herbal-formulations.html" title="Herbal Formulations">Herbal Formulations</a><a href="/products/ingredients/iron-gentle.html" title="Iron (gentle)">Iron (gentle)</a><a href="/products/ingredients/menopause-formulation.html" title="Menopause Formulation">Menopause Formulation</a><a href="/products/ingredients/mineral-formulations.html" title="Mineral Formulations">Mineral Formulations</a><a href="/products/ingredients/multi-vitamin-mineral.html" title="Multi Vitamin Mineral">Multi Vitamin Mineral</a><a href="/products/ingredients/probiotic-formulations.html" title="Probiotic Formulations">Probiotic Formulations</a><a href="/products/ingredients/pureway-c.html" title="PureWay-C&reg;">PureWay-C&reg;</a><a href="/products/ingredients/sulfur-formulas.html" title="Sulfur Formulas">Sulfur Formulas</a><a href="/products/ingredients/super-foods.html" title="Super Foods">Super Foods</a><a href="/products/ingredients/vegetarian-empty-capsules.html" title="Vegetarian Empty Capsules">Vegetarian Empty Capsules</a><a href="/products/ingredients/zinc-formulas.html" title="Zinc Formulas">Zinc Formulas</a><a href="/products/ingredients/garlic-kyolic.html" title="Garlic / Kyolic&reg;">Garlic / Kyolic&reg;</a><a href="/products/ingredients/glucosamine.html" title="Glucosamine">Glucosamine</a><a href="/products/ingredients/echinacea.html" title="Echinacea">Echinacea</a></div><div class="clmn"><a href="/products/ingredients/omega-3-fish-oil.html" title="Omega-3 Fish Oil">Omega-3 Fish Oil</a><a href="/products/ingredients/bioflavonoids.html" title="Bioflavonoids">Bioflavonoids</a><a href="/products/ingredients/glucosamine.html" title="Glucosamine">Glucosamine</a><a href="/products/ingredients/green-coffee-bean-extract.html" title="Green Coffee Bean Extract">Green Coffee Bean Extract</a><a href="/products/ingredients/garcinia-cambogia.html" title="Garcinia Cambogia">Garcinia Cambogia</a><strong><a href="/products/vitamins-/" title="*Vitamins*">*Vitamins*</a></strong><a href="/products/vitamins-/vitamin-a-.html" title="Vitamin A">Vitamin A</a><a href="/products/vitamins-/vitaimin-b-.html" title="Vitamin B">Vitamin B</a><a href="/products/vitamins-/vitamin-c-.html" title="Vitamin C">Vitamin C</a><a href="/products/vitamins-/vitamin-d3-.html" title="Vitamin D3">Vitamin D3</a><a href="/products/vitamins-/vitamin-e-.html" title="Vitamin E">Vitamin E</a><a href="/products/vitamins-/vitamin-k-.html" title="Vitamin K">Vitamin K</a></div></div><div id="sub_footer">
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
	<span class="m5">Questions? Call 1-800-544-MAXI</span>
	<span class="m5">Email us: <a href="mailto:info@maxihealth.com" title="Email Maxihealth">info@maxihealth.com</a></span>
	<span class="m5">Follow Maxihealth on 
		<a href="http://www.google.com/profiles/maxihealthresearch" title="Follow Maxihealth on Google Buzz"><img src="/images/google-buzz.png" alt="Google Buzz" /></a>
		<a href="http://twitter.com/Maxihealth" title="Follow Maxihealth on Twitter"><img src="/images/twitter.png" alt="Twitter" /></a>
	</span>
	<span class="m5">Copyright &copy; 2013 Maxihealth Research LLC. All rights reserved.</span>
</div>
<!--Note: Script order important to avoid conflict between prototype and jquery-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.cycle/2.99/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/dev-base.js"></script>
<script type="text/javascript" src="/js/menu.js"></script>
<script type="text/javascript" src="js/dev-products-page.js"></script>


</body>
</html>