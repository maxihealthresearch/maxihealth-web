 jQuery.noConflict();
     
     // Put all your jquery code in your document ready area to avoid conflict with prototype
     jQuery(document).ready(function($){
	            $("#searchInput").autocomplete({
	                source: "/ajax/suggest4.json",
	                minLength: 2,
					focus: function( event, ui ) {
					$( "#searchInput" ).val( ui.item.label );
					return false;
					},
	select: function(event, ui) { 
	var pageURL = $("#ui-active-menuitem").attr("href");
	if (pageURL != '') {
	window.location.href = pageURL;	
	}

	if (ui.item.url) {
	window.location.href = "/products/" +ui.item.url+".html"; 
	}
	
	},
	open: function(event, ui) {
		$("ul.ui-autocomplete, ul.ui-autocomplete li a" ).removeClass( "ui-corner-all" );
			$('<li class="ui-menu-item other-search" id="saLink"><a href="/search/alphabetically/">Search&nbsp;Alphabetically</a></li><li class="ui-menu-item other-search" id="sbiLink"><a href="/search/by-ingredients.html" style="border:0">Search&nbsp;by&nbsp;Ingredients</a></li>').appendTo('ul.ui-autocomplete.ui-menu');

			/*$("#saLink a, #sbiLink a").hover(function () {$(this).toggleClass("ui-state-hover")});*/
			$("#saLink a, #sbiLink a").mouseover(function(){
					$(this).addClass("ui-state-hover");
					$(this).attr('id', 'ui-active-menuitem');
 			 });
  			$("#saLink a, #sbiLink a").mouseout(function(){
				$(this).removeClass("ui-state-hover");
				$(this).attr('id', '');
  			});
			
			$("#saLink a, #sbiLink a").click(function () {window.location.href = $("#ui-active-menuitem").attr("href")});
       
		}
}).data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( '<a><ul id="autocomleteItem"><li><img src="/images/products/' + (item.value) + '_t.png?dateStamp=' + App.timestamp + '"></li><li>' + item.label + '</li></ul></a>' )
				.appendTo( ul );
		}
		

     });