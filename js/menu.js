var menuCloseTimeout = 500;
var menuCloseTimer	= 0;
var menuCurrentItem	= 0;
var menuRoot;
	
function buildMenu () {
	menuRoot = $('left_menu_l1');
	var cns = menuRoot.childNodes;
	for (var i = 0, c = cns.length; i < c; i ++) {
		if (!cns[i].tagName || cns[i].tagName.toLowerCase() != 'li')
			continue;
		
		var li = cns[i];
		var divs = li.getElementsByTagName('div');
		//disabled flyout on left navigation(line below) until I figure out how to do delay - dmitry - 6-13-2012
		//li.onmouseover = menuOpen.bind(window, 'menu_' + i);
		li.onmouseout = menuSetupCloseTimer;
		li.id = 'menu_' + i;
	}
}

function menuOpen(id) {
	menuCancelCloseTimer();
	if (menuCurrentItem && id == menuCurrentItem.id)
		return;
	if (menuCurrentItem)
		Element.removeClassName(menuCurrentItem, 'hover');
	menuCurrentItem = $(id);
	Element.addClassName(menuCurrentItem, 'hover');
	
	// position the sub element and the "arrow" properly
	var sub = menuCurrentItem.getElementsByTagName('div');
	sub = $(sub[0]);
	
	var p = sub.getElementsBySelector('div.p');
	p = $(p[0]);
	
	p.style.height = menuCurrentItem.offsetHeight - 1 + 'px';
	
	var liPos = menuCurrentItem.cumulativeOffset();
	var subPos = sub.cumulativeOffset();
	var h = document.viewport.getHeight();
	var so = document.viewport.getScrollOffsets();
	var menuRootPos = menuRoot.cumulativeOffset();
	var subHeight = sub.offsetHeight - 4; // remove some pixels for the shadow
	
	var ro = - (subHeight - menuCurrentItem.offsetHeight) / 2;
	
	// check if the bottom border goes below the bottom of the screen
	if (liPos.top + ro + subHeight > h + so.top) {
		var t = h + so.top - subHeight;
		if (t < so.top)
			t = so.top;
		
		ro = t - liPos.top + 3;
	}
	
	// check if the top border goes above the top edge of the menu
	if (liPos.top + ro < menuRootPos.top)
		ro = menuRootPos.top - liPos.top;
	
	// check if the top border goes above the top edge of the screen
	if (liPos.top + ro < so.top) {
		ro = so.top - liPos.top;
	}
	
	sub.style.top = ro + 'px';
	p.style.top = - ro + 'px';
}

function menuClose() {
	Element.removeClassName(menuCurrentItem, 'hover');
	menuCurrentItem = null;
}

function menuSetupCloseTimer() {
	if(menuCloseTimer)
		window.clearTimeout(menuCloseTimer);
	menuCloseTimer = window.setTimeout('menuClose()', menuCloseTimeout);
}

function menuCancelCloseTimer() {
	if(menuCloseTimer) {
		window.clearTimeout(menuCloseTimer);
		menuCloseTimer = null;
	}
}

Event.observe(window, 'load', buildMenu);
Event.observe(document.body, 'click', menuClose);

var previewDetailsBox = null;
var preh = '<div class="t"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="c">';
var posth = '</div><div class="b"><div class="l"></div><div class="r"></div><div class="m"></div></div><div class="p"></div>';
var productFlyoutAjax = null;
function loadDetailsForProduct () {
	if (lastHoveredElement && lastHoveredID) {
		if (!previewDetailsBox) {
			previewDetailsBox = document.createElement('div');
			previewDetailsBox.className = 'sub dtls';
		}
		previewDetailsBox.innerHTML = preh + ' <div class="ld"></div> ' + posth;
		lastHoveredElement.appendChild (previewDetailsBox);
		if (productFlyoutAjax)
			productFlyoutAjax.abort();
		productFlyoutAjax = new Ajax.Request ('/ajax/menu-popout.json',{
			method:'get',
			parameters: {pid:lastHoveredID},
			onSuccess: onMenuPopupLoaded,
			onFailure: onMenuPopupFailed
		})
	}
}
function onMenuPopupLoaded (ajaxTransport) {
	previewDetailsBox.innerHTML = preh + ajaxTransport.responseText + posth;
	productFlyoutAjax = null;
}
function onMenuPopupFailed (ajaxTransport) {
	previewDetailsBox.innerHTML = preh + ' <div class="ld">Error! Sorry</div> ' + posth;
	productFlyoutAjax = null;
}
var previewElement = document.createElement('div');
previewElement.className = 'preview_element';
previewElement.onmouseover = loadDetailsForProduct;
var lastHoveredID = 0;
var lastHoveredElement = null;
function mih (element, id) {
	if (element.childNodes.length > 0)
		element.insertBefore (previewElement, element.childNodes[0]);
	else
		element.appendNode (previewElement);
	element.onmouseout = miuh;
	lastHoveredID = id;
	lastHoveredElement = element;
}
function miuh () {
	/*if (lastHoveredElement)
		lastHoveredElement.removeChild(previewElement);
	lastHoveredID = 0;
	lastHoveredElement = null;*/
}


/* ------ Search Box ------ */
var searchSuggestionsBox = null, searchSuggestionsContent = null, searchSuggestionsInput = null, 
	searchSuggestionsTimer = null, searchSuggestionQuery = null, searchSuggstionsLastSearchedValue = '';
function setupSearchInput () {
	searchSuggestionsBox = $('search_suggestions_box');
	searchSuggestionsInput = $('search_input');
	searchSuggestionsContent = $('search_suggestions_contents');
	searchSuggestionsInput.autocomplete = 'off';
}
function onSearchInputFocus () {
	searchSuggestionsBox.style.display = 'block';
	if (searchSuggestionsInput.value != searchSuggstionsLastSearchedValue && searchSuggestionsInput.value.length >= 2)
		onSearchInputChangeDelayed();
}
function onSearchInputChange () {
	if (searchSuggestionsInput.value == searchSuggstionsLastSearchedValue) return;
	if (searchSuggestionsInput.value.length < 2) {
		searchSuggestionsContent.innerHTML = '';
		return;
	}
	searchSuggstionsLastSearchedValue = searchSuggestionsInput.value; 
	if (searchSuggestionsTimer) clearTimeout(searchSuggestionsTimer);
	if (searchSuggestionQuery) searchSuggestionQuery.abort();
	searchSuggestionQuery = null;
	searchSuggestionsTimer = setTimeout('onSearchInputChangeDelayed()', 300);
}
function onSearchInputChangeDelayed () {
	if (searchSuggestionsInput.value.length < 2) {
		searchSuggestionsContent.innerHTML = '';
		return;
	}
	searchSuggestionsTimer = null;
	searchSuggestionsContent.innerHTML = '<div>Looking for suggestions</div>';
	searchSuggestionQuery = new Ajax.Request ('/ajax/suggest.json', {
		method:'get', parameters:{kw:searchSuggestionsInput.value},
		onSuccess: onSuggestionsReceived
	});
}
function onSuggestionsReceived (ajaxTransport) {
	searchSuggestionQuery = null;
	var res = null;
	try {
		eval ('res=' + ajaxTransport.responseText);
	} catch(e) {		
		return; 	
	}
	if (res && res.success) {
		searchSuggestionsContent.innerHTML = '';
		if (res.spelling)
			searchSuggestionsContent.innerHTML += '<div>Did you mean "' + res.spelling + '"?</div>'; 
		for (var i = 0; i < res.results.length; i ++) {
			searchSuggestionsContent.innerHTML += '<a href="/search/results.html?q=' + res.results[i] + '">' + res.results[i] + '</a>';
		}
		searchSuggestionsContent.innerHTML += '<a href="/search/results.html?q=' + searchSuggestionsInput.value + '" class="all">View all search results &raquo;</a>';
	} else {
		searchSuggestionsContent.innerHTML = '<div>No suggestions found</div>';
	}
}
function onSearchInputBlur () {
	setTimeout('onSearchInputBlurDelayed()', 200);
}
function onSearchInputBlurDelayed() {
	if (searchSuggestionsTimer) clearTimeout(searchSuggestionsTimer);
	if (searchSuggestionQuery) searchSuggestionQuery.abort();
	searchSuggestionsBox.style.display = 'none';
}
Event.observe(window, 'load', setupSearchInput);

window.isRTL = /^(rtl|heb)/.test(document.location.host);