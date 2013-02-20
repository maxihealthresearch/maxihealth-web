jQuery.noConflict();


/*function showMap(lat, lng) {
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

function initMap(location) {
	//using location parameter make a call to json. temporarily use mockjax
	//extract all lat and lng values
	//using lat and lng values - generate markers and show map of the location with markers on top of them
	//display stores_list

}*/

// Put all your jquery code in your document ready area to avoid conflict with prototype
jQuery(document).ready(function($) {

	//Display US map with markers for all US stores
	/*initMap('United States');*/

var locations = [
      ['Cronulla Beach', 43.219778, -87.926058],
      ['Manly Beach', 43.219778, -88.047582],
      ['Maroubra Beach', 43.03865, -88.026628]
    ];

    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: 4,
      center: new google.maps.LatLng(37.090240, -95.7128910),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }


});