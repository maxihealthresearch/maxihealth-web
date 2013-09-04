     jQuery.noConflict();
     
     // Put all your jquery code in your document ready area to avoid conflict with prototype
     jQuery(document).ready(function($){
		 


$( "#holiday-btn" ).click(function() {
$( "#holidayDialog" ).load("/holiday-schedule.php").dialog( "open" );
   return false;

		});

   $("#holidayDialog").dialog({
           autoOpen: false,
           modal: true,
           width: 500
       });

     });