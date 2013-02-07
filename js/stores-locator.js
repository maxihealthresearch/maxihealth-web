//Script created by Kalman's team.
//Dmitry's edited on 12-22-2012
var Locator = {

	init: function () {

		var mapOptions = {

			zoom: 3,

			mapTypeId: google.maps.MapTypeId.ROADMAP,

			center: new google.maps.LatLng (40.178873, -96.723633)

		};

		this.map = new google.maps.Map($('map_canvas'), mapOptions);

		google.maps.event.addListener(this.map, 'bounds_changed', this.updateStoresListDelayed.bind(this));

		

		this.browserSupportsGeolocation = false;

		if(navigator.geolocation) {

			this.browserSupportsGeolocation = true;

			navigator.geolocation.getCurrentPosition(this.onSensorGeolocation.bind(this, 1), this.onSensorGeolocationFailed.bind(this));

		} else if (google.gears) { 		  // Try Google Gears Geolocation

			this.browserSupportsGeolocation = true;

			var geo = google.gears.factory.create('beta.geolocation');

			geo.getCurrentPosition(this.onSensorGeolocation.bind(this, 2), this.onSensorGeolocationFailed.bind(this));

		} else {		// Browser doesn't support Geolocation

		}

		

		this._updateStoresList = this.updateStoresList.bind(this);

		

		this.storesListElement = $('stores_list');

		

		new Ajax.Request ('/ajax/stores-locator.json', {

			onSuccess: this.onStoresReceived.bind(this),

			evalJSON: true

		});

		

		this.geocoder = new google.maps.Geocoder();

		this._onGeocoderUpdated = this.onGeocoderUpdated.bind(this);

		

		this.searchLocationForm = $('search_location_form');

		this.searchLocationInput = $('zip_search_input');

		this.searchLocationForm.observe('submit', this.onFormSubmit.bindAsEventListener(this));

	},

	

	onSensorGeolocation: function (type, position) {

		var location;

		if (type == 1) {

			location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

		} else {

			location = new google.maps.LatLng(position.latitude, position.longitude);

		}

		// determine if there is a nearby store

		var nearbyStore = false;

		for (var i = 0; i < this.storesMarkers.length; i ++) {

			var dist = google.maps.geometry.spherical.computeDistanceBetween(location, this.storesMarkers.getPosition());

			if (dist < 50000) { // 50 kilometers

				nearbyStore = true;

			}

		}

		if (nearbyStore) {

			this.map.setCenter(location);

			this.map.setZoom(11);

		} // else the map remains centere over all of USA

		

	},

	

	onSensorGeolocationFailed: function () {

		// nothing to do here really

	},

	onStoresReceived: function (ajaxTransport) {

		this.storesData = ajaxTransport.responseJSON;

		this.storesMarkers = new Array();

		for (var i = 0, c = this.storesData.length; i < c; i ++) {

			var marker = new google.maps.Marker ({

				map: this.map,

				position: new google.maps.LatLng(this.storesData[i].lat, this.storesData[i].lng)

			});

			google.maps.event.addListener(marker, 'click', this.onMarkerClick.bind(this, i));

			this.storesMarkers.push(marker);

		}

		

		this.infoWindow = new google.maps.InfoWindow({

		    content: ''

		});

	},

	onMarkerClick: function (index) {

		this.infoWindow.setContent(this.storesData[index].name + '<br>' + this.storesData[index].postal + '<br>' + this.storesData[index].text);

		this.infoWindow.open(this.map, this.storesMarkers[index]);

	},

	updateStoresListDelayed: function () {

		if (this.uslTimer)

			clearTimeout(this.uslTimer);

		

		this.uslTimer = setTimeout(this._updateStoresList, 500);

	},

	updateStoresList: function () {

		this.storesListElement.innerHTML = '';

		var bounds = this.map.getBounds();

		

		var found = false;

		tmp = '';

		for (var i = 0, c = this.storesMarkers.length; i < c; i ++) {

			if (bounds.contains(this.storesMarkers[i].getPosition())) {

				tmp += '<p class="store"><a href="#" onclick="Locator.focusStore(' + i + '); return false;">';
				if (this.storesData[i].text === "") {
				tmp += this.storesData[i].name + '</a><br>' + this.storesData[i].address + '<br>' + this.storesData[i].city + ', ' + this.storesData[i].state + ' ' + this.storesData[i].postal;
				
				if (this.storesData[i].country !== "United States") {
				tmp += '<br>' + this.storesData[i].country;
				}

				if (this.storesData[i].phone !== "") {
				tmp += '<br>' + this.storesData[i].phone;
				}
				
				if (this.storesData[i].url !== "") {
				tmp += '<br><a href="' + this.storesData[i].url + '" target="_blank">Visit Website</a>';
				}
				
				} else {
				tmp += this.storesData[i].text ;	
				}
				tmp += '</p>';


				found = true;

			}

		}

		this.storesListElement.innerHTML = tmp;

		if (!found) {

			this.storesListElement.innerHTML = '<div class="none">' +

					'We are sorry but there are no stores in the selected area that offer our products!' +

				'</div>';

		}

	},

	

	onFormSubmit: function (event) {

		Event.stop(event);

		var addr = this.searchLocationInput.value;

		if (!addr)

			return;

		this.geocoder.geocode({'address': addr}, this._onGeocoderUpdated);

	},

	onGeocoderUpdated: function(results, status) {

		if (status == google.maps.GeocoderStatus.OK) {

			//marker.setPosition(results[0].geometry.location);

			this.map.fitBounds(results[0].geometry.viewport);

		} else {

			alert("Could not find the specified address! Sorry");

		}

	},

	focusStore: function (index) {

		this.map.setCenter(this.storesMarkers[index].getPosition());

		this.map.setZoom(15);

		this.infoWindow.setContent (this.storesData[index].name + '<br>' + this.storesData[index].postal + '<br>' + this.storesData[index].text);

		this.infoWindow.open (this.map, this.storesMarkers[index]);

	}

}



Event.observe(window, 'load', Locator.init.bind(Locator));