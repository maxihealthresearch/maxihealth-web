jQuery.noConflict();

(function ($) {

    $('.home-slideshow').cycle({
                fx: 'fade',
                force: 1,
                timeout: 8000,
                pause: 1,
                pauseOnPagerHover: 1,
                pager: '.home-slideshow-pager'
    });
		   
})(jQuery);		   