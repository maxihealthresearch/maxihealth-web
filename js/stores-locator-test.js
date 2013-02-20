jQuery.noConflict();

// Put all your jquery code in your document ready area to avoid conflict with prototype
jQuery(document).ready(function($) {

/*$.mockjax({
  url: '/ajax/stores-locator4.json',
  responseTime: 750,
  responseText: {
  "total_target_stores": 114,
  "target_stores": [
    {
      "id": "233",
      "name": "Sunshine Pharmacy",
      "address": "369 North Fairfax",
      "address2": "",
      "city": "Los Angelos",
      "state": "CA",
      "postal": "90036",
      "country": "United States",
      "usa": true,
      "phone": "323-653-8692",
      "url": "",
      "lat": "34.0781076",
      "lng": "-118.361425"
    },
    {
      "id": "3",
      "name": "Erewhon Natural Food Market",
      "address": "7660 Beverly Blvd",
      "address2": "",
      "city": "Los Angeles",
      "state": "CA",
      "postal": "90036",
      "country": "United States",
      "usa": true,
      "phone": "323-937-0777",
      "url": "",
      "lat": "34.075322",
      "lng": "-118.356846"
    },
    {
      "id": "231",
      "name": "B E Kosher",
      "address": "1436 Alton Rd",
      "address2": "",
      "city": "Miami Beach",
      "state": "FL",
      "postal": "33139",
      "country": "United States",
      "usa": true,
      "phone": "305-531-7060",
      "url": "",
      "lat": "25.7866612",
      "lng": "-80.1412401"
    }
  ],
  "nearby_stores": [
    
  ]
}
});*/


	//Display US map with markers for all US stores
	/*initMap('United States');*/

    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: 4,
      center: new google.maps.LatLng(37.090240, -95.7128910),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
var infowin = [];


function initMap(location) {
	//using location parameter make a call to json. temporarily use mockjax
	//extract all lat and lng values
	//using lat and lng values - generate markers and show map of the location with markers on top of them
	//display stores_list
	
var jsonurl = '/ajax/stores-locator4.json?location=' + location;
  $.getJSON(jsonurl, function(response){

/*alert(response.target_stores[0].lat);*/



    for (i = 0; i < response.total_target_stores; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(response.target_stores[i].lat, response.target_stores[i].lng),
        map: map
      });

//figure out how to use template instead of 
/*    var popuptemplate = $('#infowindow').html();
    var popuphtml = Mustache.to_html(popuptemplate, response.target_stores[i].name);*/

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

initMap('United States');

/*var locations = [
      ['Cronulla Beach', 43.219778, -87.926058],
      ['Manly Beach', 43.219778, -88.047582],
      ['Maroubra Beach', 43.03865, -88.026628]
    ];
*/


/*    for (i = 0; i < locations.length; i++) {  
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
    }*/


});