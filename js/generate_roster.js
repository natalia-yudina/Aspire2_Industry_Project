$(document).ready(function() {

    // Button "Generate roster" click begin
     $(document).on('click', '.generate_roster', function() {

       $.ajax({
 				url	: 'api/process.php?cmd=assignedCoaches',
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

    // Button "Save roster" click begin
     $(document).on('click', '.save_roster', function() {
       //get an array of all events
       var all_events = $('#calendar').fullCalendar('clientEvents');
       console.log(all_events);

       // create string from array for ajax
       var  all_events_string= JSON.stringify(all_events,['start','ev_id_class', 'jc_list']);

       var test = "test-test-test";
       console.log(all_events_string);
       // var a = $.JSON.encode(all_events);
       $.ajax({
 				url	: 'ajax/roster_update_ajax.php',
 				dataType: 'json',
        data	: {
            all_events_string: all_events_string
 				},
 				type	: 'POST',
        success: function(response) {
          // console.log(response.resultOK);

        Swal.fire(
            'Congratulations!',
            'Roster has just been saved',
            'success'
        )
 				}
 			});

    });
    // Button "Save roster" click end
});
