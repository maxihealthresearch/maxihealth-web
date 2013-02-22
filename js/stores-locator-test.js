//Notes
//Functions
//1. Draw initial map in map_canvas div
//		a. using location parameter make a call to json
//		b. using lat and lng values - generate markers and show map of the location with markers on top of them
//2. Render template in stores_list div using json data I got in step 1
//3. When person submits new address - showMapAndStores function is invoked with location and zoom parameter(zoom 15 for closeup)
//4. When store name is clicked
//      a. clicked address is highlighted(do this later)
//		b. shopMap function is called with (latitude, longitude, and zoom 15)
//
//To Do
//Change stores-locator4.json to display stores nearby location that's not found like 11235
//Info window should render mustache template
//
//Ideas
//create showMap function
//create initMap
//do it the dirty way first buy call json twice and see then how you can refactor
// 
//Dirty Way
//1.	a. Show Initial Map
//		b. Output markers
//		c. Render template in stores_list
//2.    When person clicks store name showmap function is invoked with latitude and longitude sent 

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





	//Display US map with markers for all US stores
	/*initMap('United States');*/



var infowindow = new google.maps.InfoWindow();
var marker, i;
var infowin = [];

function showStores(response) {

  	var template = $('#listTpl').html();
    var html = Mustache.to_html(template, response);
    $('#stores_list').html(html);
	
}

function showMarkers(map, response) {

    for (i = 0; i < response.total_target_stores; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(response.target_stores[i].lat, response.target_stores[i].lng),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<strong>' + response.target_stores[i].name + '</strong><br>' + response.target_stores[i].address + '<br>' + response.target_stores[i].city);
          /*infowindow.setContent(popuphtml);*/
		infowindow.open(map, marker);
        }
      })(marker, i));
    }
	
}

function showMarkersTwo(map, location) {

var jsonurl = '/ajax/stores-locator4.json?location=' + location;

  $.getJSON(jsonurl, function(response){
							  
    for (i = 0; i < response.total_target_stores; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(response.target_stores[i].lat, response.target_stores[i].lng),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<strong>' + response.target_stores[i].name + '</strong><br>' + response.target_stores[i].address + '<br>' + response.target_stores[i].city);
          /*infowindow.setContent(popuphtml);*/
		infowindow.open(map, marker);
        }
      })(marker, i));
    }

  });

}

/*function showGoogleMap(location) {

   var geocoder = new google.maps.Geocoder();
   var address = 'London, UK';

   if (geocoder) {
      geocoder.geocode({ 'address': address }, function (results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
            alert(results[0].geometry.lat);
         }
         else {
            alert("Geocoding failed: " + status);
         }
      });
   }    


	
}*/

function initialize(location) {
	//This function shows initial map and outputs list of stores
	//using location parameter make a call to json.
	//extract all lat and lng values
	//using lat and lng values - generate markers and show map of the location with markers on top of them
	//display stores_list

    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: 4,
      center: new google.maps.LatLng(37.090240, -95.7128910),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

var jsonurl = '/ajax/stores-locator4.json?location=' + location;
  $.getJSON(jsonurl, function(response){


showStores(response);

//Create markers and infowindows
showMarkers(map, response);

  });	

}

initialize('United States');

function showMapAndStores(location) {

// show stores
var jsonurl = '/ajax/stores-locator4.json?location=' + location;
  $.getJSON(jsonurl, function(response){

// show stores
showStores(response);

  });
// show map of the location
/*showGoogleMap(location);*/

   var geocoder = new google.maps.Geocoder();

   if (geocoder) {
      geocoder.geocode({ 'address': location }, function (results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
		var bounds = new google.maps.LatLngBounds();
        bounds = results[0].geometry.viewport;
		alert(bounds);

    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: 4,
      center: results[0].geometry.location,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });			

showMarkersTwo(map, location)
    map.fitBounds(bounds);
         }
         else {
            console.log("Geocoding failed: " + status);
         }
      });
   } 



}

$('#search_location_form').submit(function(evt) {
		evt.preventDefault();

		var inputs = $('#location').val();
		//Display map and display stores
showMapAndStores(inputs);

	});


});