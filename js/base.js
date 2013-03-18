	var App = {
		timestamp: Number(new Date())
	}

        Modernizr.load({
            test: Modernizr.input.placeholder,
            nope: [
                    '/js/Placeholders.min.js',
                    '/js/placeholders.init.js',
                  ]
        });
		
     jQuery.noConflict();
     
     // Put all your jquery code in your document ready area to avoid conflict with prototype
     jQuery(document).ready(function($){

// To do this on hover I need to redo entire menu to ul instead of a tags. Also include hover intent script
/*$("#header .menu .m>a.last").click(function (e) {
        e.preventDefault();
});


    $("#header .menu .m>a.last").hover(

    function () {
        var div = $("#storesDropDown");
        div.stop(true, true);
        div.slideDown(500);
    }, function () {
        var div = $("#storesDropDown");
        div.stop(true, true);
        div.slideUp(500);
    });*/
	
	
	

    $("#header .menu .m>a.last").click(function (event) {
		event.preventDefault();
      $(this).toggleClass('active');
      $('#storesDropDown').slideToggle('active');	  
    });

     });