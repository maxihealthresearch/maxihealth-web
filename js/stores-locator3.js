jQuery.noConflict();


function showMap(lat, lng) {
	var latlng = new google.maps.LatLng(lat, lng);
	var myOptions = {
		zoom: 15,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	
					var marker = new google.maps.Marker({
						map: map, 
						position: latlng
					});
	
}

// Put all your jquery code in your document ready area to avoid conflict with prototype
jQuery(document).ready(function($) {

//initial location is main store - 1305 Avenue U, Brooklyn
showMap(40.598903, -73.957932);

//this function displays list of stores using inputs(search) parameter
var outputStores = function(inputs) {

		var jqxhr = $.getJSON("http://maxihealth.com/ajax/stores-locator4.json", {
			location: inputs
		}, function(data) {

// if stores found then execute this code block
if (data.total_target_stores > 0) {

//hide error message if it pops
$('.stores_locations_body .msg_error').hide();

// Display number of stores found
$('.stores-found h2 span').prepend(data.total_target_stores);

//use mustache.js to display all found stores
    var template = $('#listTpl').html();
    var html = Mustache.to_html(template, data);
    $('#stores_list').html(html);
//

if (data.nearby_stores.length > 0) {

//if nearby stores are found then display nearby title
	$('.nearby-title').show();
}

	} else {
	//Display message if 0 stores found
	$('#stores_list').empty();
	$('.stores_locations_body .msg_error').show();
	}
			
		}).error(function() {
			alert("Error connecting to Maxihealth stores database");
		});
	
}


//When page loads initially it displays default location
outputStores('1309 Avenue U');

$('#search_location_form').submit(function(evt) {
		evt.preventDefault();

		var inputs = $('#location').val();
outputStores(inputs);

	});


});