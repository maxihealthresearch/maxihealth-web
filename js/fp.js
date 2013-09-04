var FPBannersContainer = null, FPBannerCurrentIndex = 0, FPBanners = null, FPBannerLinks = [],
	FPBannerLinksContainer = null,
	FPBannerSwitchDelay = 5000,
	FPWaitingTimer = 0, FPBannerAnimating = false,
	FPBannerAnimatingToIndex = null, FPBannerTransitionDIV = null, 
	FBBannerAnimationOpacityStep = 0.05, FBBannerAnimationOpacity = 0, 
	FBBannerAnimationOpacityFrameDuration = 40, FPBannerAnimationTimer = null,
	FPWaitingRestartTimer = null;

function setupBanners () {
	FPBannersContainer = $('fp_banner');
	FPBannersContainer.observe('mouseover', function () { onMouseOverBanners(); });
	FPBannersContainer.observe('mouseout', function () { onMouseOutBanners(); });
	FPBannerLinksContainer = $('fp_banner_indicators');
	FPBanners = FPBannersContainer.getElementsBySelector('.b');
	for (var i = 0; i < FPBanners.length; i ++) {
		var a = $(document.createElement('a'));
		a.href = '#';
		a.observe('click', onBannerLinkClick.bindAsEventListener(window, i));
		FPBannerLinksContainer.appendChild(a);
		FPBannerLinks.push(a);
		
		var chunk = /id_(\d*)/.exec(FPBanners[i].className); 
		var src = '/images/fp-banners/' + chunk[1] + '.png';
		
		// preload the image
		/*var img = new Image();
		img.src = src;*/
		
		FPBanners[i].style.backgroundImage = 'url(' + src + ')'; 
	}
	
	FPBannerCurrentIndex = 0;
	for (var i = 0; i < FPBannerLinks.length; i ++)
		FPBannerLinks[i].className = (i == 0 ? 'active' : '');
	
	FPWaitingTimer = setTimeout(onBannerTimer, FPBannerSwitchDelay);
}

function onMouseOverBanners () {
	if (FPWaitingRestartTimer)
		clearTimeout(FPWaitingRestartTimer);
	if (FPWaitingTimer)
		clearTimeout(FPWaitingTimer);
	FPWaitingTimer = null;
	FPWaitingRestartTimer = null;
}
function onMouseOutBanners () {
	FPWaitingRestartTimer = setTimeout(FPRestartTimer, 1000);
}
function FPRestartTimer () {
	FPWaitingRestartTimer = null;
	// we have already waited 1 sec to get here
	FPWaitingTimer = setTimeout(onBannerTimer, FPBannerSwitchDelay - 1000);
}

function onBannerLinkClick (event, linkIndex) {
	Event.stop(event);
	showFPBannerWithIndex (linkIndex);
}

function onBannerTimer () {
	if (FPBannerCurrentIndex >= FPBanners.length - 1)
		showFPBannerWithIndex (0);
	else
		showFPBannerWithIndex (FPBannerCurrentIndex + 1);
}

function showFPBannerWithIndex (index) {
	if (FPBannerAnimating)
		return;
	FPBannerAnimating = true;
	FPBannerAnimatingToIndex = index;
	if (FPWaitingTimer) {
		clearTimeout(FPWaitingTimer);
		FPWaitingTimer = null;
	}
	
	FBBannerAnimationOpacity = 0;
	FPBanners[index].setOpacity(0);
	FPBanners[index].style.display = 'block';
	FPBannersContainer.insertBefore(FPBanners[index], FPBannerLinksContainer);
	
	for (var i = 0; i < FPBannerLinks.length; i ++)
		FPBannerLinks[i].className = (i == index ? 'active' : '');
	
	FPBannerAnimationTimer = setInterval(onFPBannerAnimationTimer, FBBannerAnimationOpacityFrameDuration);
}

function onFPBannerAnimationTimer () {
	FBBannerAnimationOpacity += FBBannerAnimationOpacityStep;
	FPBanners[FPBannerAnimatingToIndex].setOpacity(FBBannerAnimationOpacity);
	if (FBBannerAnimationOpacity > 0.999) { 
		clearInterval(FPBannerAnimationTimer);
		FPBannerAnimationTimer = null;
		onFPBannerAnimationOver();
	}
}

function onFPBannerAnimationOver () {
	FPBannerAnimating = false;
	
	FPBanners[FPBannerCurrentIndex].style.display = 'none';
	
	FPBannerCurrentIndex = FPBannerAnimatingToIndex;
	
	FPWaitingTimer = setTimeout(onBannerTimer, FPBannerSwitchDelay);
}

Event.observe(window, 'load', setupBanners);