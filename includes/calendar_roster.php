

<div id="calendar"></div>
<div class="box box-primary">

  <div class="box-body no-padding">
    <!-- THE CALENDAR -->
    <div id="calendar"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->

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
      // $("#successModal").modal("show");

      // $("#successModal .modal-title p").text(event.title);
      // $("#successModal .modal-title #hc").text(event.hc);
      // $("#successModal .modal-body p").text(event.description);
      // console.log(event);
      // id_class.val(event.ev_id_class);

       var id_class = event.ev_id_class;
       var jc_1 = event.jc_list[0];
       var jc_2 = event.jc_list[1];
       var jc_3 = event.jc_list[2];
       var jc_4 = event.jc_list[3];

          $.ajax({
              type: 'post',
              url: 'ajax/jc_list_ajax.php',
              data: {
                  id_class: id_class,
                  jc_1: jc_1,
                  jc_2: jc_2,
                  jc_3: jc_3,
                  jc_4: jc_4
              },
              success: function(response) {
                  $('.modal-dialog').html(response);
                  $("#successModal .modal-title p").text(event.title);
                  $("#successModal .modal-title #hc").text(event.hc);
                  $('#id_class_text').val(event.ev_id_class);
                  $('#successModal').modal('show');
                  console.log(event.jc_list[0]);
              }
          });

    },

		eventAfterRender : function(ev, element, view) {
			if(ev.block == true) {
				var start = ev.start.format();
				$("td.fc-day[data-date='"+ start +"']").addClass('fc-disabled');
			}
		}

	});
});//off
</script>

<!-- fc-agendaWeek-view -->
