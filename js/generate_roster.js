$(document).ready(function() {

    // Button "Generate roster" click begin
     $(document).on('click', '.generate_roster', function() {

       $.ajax({
 				url	: 'api/process.php?cmd=rosterview',
 				dataType: 'json',
 				type	: 'POST',
 				data	: {
 					start	: $('#calendar').fullCalendar('getView').intervalStart.format(),
 					end		: $('#calendar').fullCalendar('getView').intervalEnd.format()
 				},
        success: function(response) {

          //remove old data
          $('#calendar').fullCalendar('removeEvents');

          //Getting new event json data
          $("#calendar").fullCalendar('addEventSource', response);

          //Updating new events
          // $('#calendar').fullCalendar('rerenderEvents');

          //getting latest Events
          //$('#fullCalendar').fullCalendar( 'refetchEvents' );

          //getting latest Resources
          $('#calendar').fullCalendar( 'refetchResources' );
 				}
 			});

    });
    // Button "Generate roster" click end
});
