

<div class="box box-primary">

  <div class="box-body no-padding">
    <!-- THE CALENDAR -->
    <div id="calendar"></div>
  </div>

</div>


<!-- The Modal form begin -->
<div class="modal fade" id="successModal">
	<div class='modal-dialog'>
	</div>
</div>
<!-- The Modal form end -->

<style>
.fc-disabled {
  background-color: #F0F0F0 !important;
  color: #000;
  cursor: default;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	/* font-size:10px; */
}

.fc-unthemed th,
	.fc-unthemed td,
	.fc-unthemed thead,
	.fc-unthemed tbody,
	.fc-unthemed .fc-divider,
	.fc-unthemed .fc-row,
	.fc-unthemed .fc-content,
	.fc-unthemed .fc-popover,
	.fc-unthemed .fc-list-view,
	.fc-unthemed .fc-list-heading td {
		border-color: #414141;
	}

	.fc-unthemed td.fc-today {
    background: #353535;
}

.fc-state-default {
	background-image: none;
	background-color: #ffda63;
	font-weight: 400;
	box-shadow: none;
	text-shadow: none;
}

.fc-state-active {
	background-color: #fafafa;
	font-weight: 400;
	text-shadow: none;
}

.fc-state-disabled {
	opacity: 0.8;
}
.fc-head {
color: #637373;
}

.fc-day-number {
	color:#fafafa;
}

.fc button .fc-icon {
	color: #121212;
}

.fc-state-disabled {
    opacity: 0.2;
}
</style>


<script language="javascript">
$(function () {

var event_id;

	$('#calendar').fullCalendar({
    // like '7p', for all other views
    // timeFormat: 'H(:mm)t',
    // like '5:00', for agendaWeek and agendaDay
		timeFormat: 'h:mm',
		header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaWeek, agendaDay'
      // right: 'month,agendaWeek,agendaDay'
  	},
    buttonText: {
      today: 'today',
      // month: 'month',
      week: 'week',
      day: 'day'
    },

    events: function(start, end, timezone, callback) {
			$.ajax({
				url	: '<?php echo WEB_ROOT; ?>api/process.php?cmd=rosterview',
				dataType: 'json',
				type	: 'POST',
				data	: {
					start	: start.format(),
					end		: end.format()
				},
				success: function(doc) {

          //remove old data
          $('#calendar').fullCalendar('removeEvents');
					var events = [];
					callback(doc);
				}
			});

		},

    selectable: true,
    // defaultView: 'basicWeek',
    defaultView: 'agendaWeek',
    allDaySlot: false,
    minTime: "08:00:00",
    maxTime: "22:00:00",
    height: 'auto',

    // slotMinHeight: 500,
    // eventMinHeight: 500,
    // eventShortHeight: 500,
    // agendaEventMinHeight: 1000,

     // editable: true,
    // selectHelper: true,

    //     editable: true,
    //     droppable: true, // this allows things to be dropped onto the calendar !!!
    //     drop: function (date, allDay) { },
		// eventClick: function(calEvent, jsEvent, view) {
    //
		// },
		// dayRender: function(date, cell){
		// 	 $(cell).css('opacity', 1);
		// },
		 // viewRender: function(view, element) {},
		eventRender: function(ev, element, view) {
      element.css("font-size", "0.8em");
      element.css("padding", "5px");
      element.css("height", "200px");
      element.find('.fc-title').append("<br>" + ev.description)
		},
    eventClick: function(event) {

      // $("#successModal .modal-title p").text(event.title);
      // $("#successModal .modal-title #hc").text(event.hc);
      // $("#successModal .modal-body p").text(event.description);

      // id_class.val(event.ev_id_class);
      if (event.jc_list !== null) {
       var id_class = event.ev_id_class;
       var jc_1 = event.jc_list[0];
       var jc_2 = event.jc_list[1];
       var jc_3 = event.jc_list[2];
       var jc_4 = event.jc_list[3];
       // var event_id = event._id;

          $.ajax({
              type: 'post',
              url: 'ajax/jc_list_ajax.php',
              data: {
                  id_class: id_class,
                  jc_1: jc_1,
                  jc_2: jc_2,
                  jc_3: jc_3,
                  jc_4: jc_4
                  // ,
                  // event_id: event_id
              },
              success: function(response) {
                  // Show The Modal Form
                  $('.modal-dialog').html(response);
                  // $("#successModal .modal-title p").text(event.title);
                  $("#successModal .modal-title p").text(event.title.replace(event.hc, ''));
                  $("#successModal .modal-title #hc").text(event.hc);
                  $('#id_event_text').val(event._id);
                  $('#successModal').modal('show');
              }
          });
        }

    },

		eventAfterRender : function(ev, element, view) {
			if(ev.block == true) {
				var start = ev.start.format();
				$("td.fc-day[data-date='"+ start +"']").addClass('fc-disabled');
			}
		}

	});

  $(document).on('click', '.ev_update', function() {

    // var id = $(this).attr('data-id');

    var event_id = $('#id_event_text').val();
    var result_set = $('#calendar').fullCalendar( 'clientEvents', event_id);
    var event_to_update = result_set[0];

    var selected_jc1_id = $('#s1').val();
    var selected_jc2_id = $('#s2').val();
    var selected_jc3_id = $('#s3').val();
    var selected_jc4_id = $('#s4').val();

    var selected_jc1_string = $("#s1 option:selected").text();
    var selected_jc2_string = $("#s2 option:selected").text();
    var selected_jc3_string = $("#s3 option:selected").text();
    var selected_jc4_string = $("#s4 option:selected").text();

    event_to_update.jc_list =[];
    event_to_update.jc_list = [selected_jc1_id, selected_jc2_id, selected_jc3_id, selected_jc4_id];

    event_to_update.description = "Jr. Coaches List: \n " + selected_jc1_string + ",\n" + selected_jc2_string + ",\n" + selected_jc3_string + ",\n" + selected_jc4_string;
    $('#calendar').fullCalendar('updateEvent', event_to_update);

  });

});
</script>

<!-- fc-agendaWeek-view -->
