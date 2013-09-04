var lastOpenedGroup = null, productsLinksSetup = false;
function showGroup (element) {
	// we do the setup here because otherwise the products popup may not be loaded yet with window.onload
	if (!productsLinksSetup) {
		setupProductPopup();
		productsLinksSetup = true;
	}
	element = element.parentNode;
	if (element.className == 'open')
		element.className = '';
	else {
		if (lastOpenedGroup)
			lastOpenedGroup.className = '';
		element.className = 'open';
	}
	lastOpenedGroup = element;
}

function setupProductPopup () {
	var body = $('body');
	var itms = body.getElementsByTagName ('a');
	for (var i = 0; i < itms.length; i ++) {
		var li = itms[i];
		if (/^product_(.*)_(\d*)$/.match(li.id)) {
			li.parentNode.onmouseover = AllProductsPopup.showButton.bind(AllProductsPopup, li.id);
			li.parentNode.onmouseout = AllProductsPopup._hideButton;
		}
	}
}