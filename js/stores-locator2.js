jQuery.noConflict();

function mapinit() {
	var address = "1309 Avenue U, Brooklyn, NY";
	geocoder = new google.maps.Geocoder();

	geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {

			var myOptions = {
				zoom: 15,
				center: results[0].geometry.location,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);

			var marker = new google.maps.Marker({
				map: map, 
				position: results[0].geometry.location
			});
		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
	});
	
}

function showMap(address) {
	geocoder = new google.maps.Geocoder();

	geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {

			var myOptions = {
				zoom: 15,
				center: results[0].geometry.location,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);

			var marker = new google.maps.Marker({
				map: map, 
				position: results[0].geometry.location
			});
		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
	});
}

// Put all your jquery code in your document ready area to avoid conflict with prototype
jQuery(document).ready(function($) {

mapinit();

var storeTemplate = function(mydata, wrapper) {


				for (var i = 0; i < mydata.length; i++) {
					$(wrapper).append('<a href="#" onclick="showMap(\'' + mydata[i].address + ' ' + mydata[i].city + ' ' + mydata[i].postal + ' ' + mydata[i].country + '\');return false">' + mydata[i].name + '</a><br>' + mydata[i].address + '<br>' + mydata[i].city + ', ' + mydata[i].state + ', ' + mydata[i].postal + '<br>' + mydata[i].phone + '<br><br>');
				}
	
}

//this function displays list of stores using inputs(search) parameter
var outputStores = function(inputs) {

		var jqxhr = $.getJSON("http://maxihealth.com/ajax/stores-locator2.json", {
			location: inputs
		}, function(data) {

//empty out previously found locations before displaying new locations.
$('.stores-found h2 span, .stores-found div').empty();

			//If no stores found - throw error
			if (data.length === 0) {
				$('.stores_locations_body .msg_error').show();
			} else {
				$('.stores_locations_body .msg_error').hide();
					$('.stores-found h2 span').prepend(data.length);
					$('.other-stores').hide();

				/*$('#stores_list').text("");*/

storeTemplate(data, ".stores-found div")

//Now search for nearby stores using latitude and logitude of the first found item
		var jqxhr2 = $.getJSON("http://maxihealth.com/ajax/stores-nearby.json", {
			lat: data[0].lat,
			lng: data[0].lng
		}, function(neardata) {



//if stores found nearby output them
			if (neardata.length > 0) {
				$('.other-stores').show();
				$('.other-stores div').empty();

//figure out how to display only other stores nearby without 'stores found' data. tried below but that didn't work
/*			for (var j = 0; j < data.length; j++) {				
while(neardata[j].id != data[j].id) {
storeTemplate(neardata, ".other-stores div");

}
					}*/
storeTemplate(neardata, ".other-stores div");

				
			}
//
		});
//

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