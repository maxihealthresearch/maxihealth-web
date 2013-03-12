jQuery.noConflict();



function showMap(lat, lng) {
	var latlng = new google.maps.LatLng(lat, lng);
	var myOptions = {
		zoom: 15,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	var marker = new google.maps.Marker({
		map: map,
		position: latlng
	});

}

// Put all your jquery code in your document ready area to avoid conflict with prototype
jQuery(document).ready(function($) {



	var infowindow = new google.maps.InfoWindow();
	var marker, i;
	var infowin = [];
var query = window.location.search.substring(10);
query = decodeURIComponent(query);

	function showMarkers(map, location) {

		var jsonurl = '/ajax/stores-locator4.json?location=' + location;

		$.getJSON(jsonurl, function(response) {

			for (i = 0; i < response.total_target_stores; i++) {
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(response.target_stores[i].lat, response.target_stores[i].lng),
					map: map
				});

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent('<strong>' + response.target_stores[i].name + '</strong><br>'
						+ response.target_stores[i].address + '<br>'
						+ response.target_stores[i].city); /*infowindow.setContent(popuphtml);*/
						infowindow.open(map, marker);
					}
				})(marker, i));
			}

		});

	}


	function showGoogleMap(location) {

		var geocoder = new google.maps.Geocoder();

		if (geocoder) {
			geocoder.geocode({
				'address': location
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					var bounds = new google.maps.LatLngBounds();
					bounds = results[0].geometry.viewport;

					var map = new google.maps.Map(document.getElementById('map_canvas'), {
						zoom: 4,
						center: results[0].geometry.location,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					});

					showMarkers(map, location)
					map.fitBounds(bounds);
				}
				else {
					console.log("Geocoding failed: " + status);
				}
			});
		}

	}

	/*showGoogleMap(location);*/

	function showMapAndStores(location) {

		showGoogleMap(location);

		var jsonurl = '/ajax/stores-locator4.json?location=' + location;
		$.getJSON(jsonurl, function(data) {

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

	//Show initial location
	showMapAndStores(query);



	$('#search_location_form').submit(function(evt) {
		evt.preventDefault();

		var inputs = $('#location').val();
		//Display map and display stores
		showMapAndStores(inputs);

	});


});