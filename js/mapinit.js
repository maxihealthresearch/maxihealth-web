function mapinit() {
	var address = "Brooklyn, NY";
	geocoder = new google.maps.Geocoder();

	geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {

			var myOptions = {
				zoom: 11,
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