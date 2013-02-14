     jQuery.noConflict();
     
     // Put all your jquery code in your document ready area to avoid conflict with prototype
     jQuery(document).ready(function($){

$('#mapform').submit(function (evt) {
evt.preventDefault();
var inputs = $('#address_input').val() + ', ' + $('#city_input').val() + ', ' + $('#postal_input').val() + ', ' + $('#country_input').val();

/*console.log(inputs);*/

var jqxhr = $.getJSON("http://maps.googleapis.com/maps/api/geocode/json?sensor=true",
  {
    address: inputs
  },
  function(data) {
  

  var status =  data.status;


  if(status === "OK") {
  var lat = data.results[0].geometry.location.lat;
  var lng = data.results[0].geometry.location.lng;
    $('#lat_input').val(lat);
    $('#lng_input').val(lng);
/*    console.log($('#lat_input').val()); 
    console.log($('#lng_input').val());*/

  //submit form once everything is properly filled out
  $('#mapform').unbind('submit').submit();
    
  } else {
      /*console.log(status);*/
    alert("Google Can't find this location.");
        return false;

  }

})
.error(function() { 
  alert("Having trouble connecting to Google maps url http://maps.googleapis.com/maps/api/geocode/json?sensor=true.\nContact Dmitry to troublshoot or try again later"); 
});


});


     });