<button type="button" class="btn generate_roster"> Generate roster </button>

<div id="calendar"></div>
<div class="box box-primary">

  <div class="box-body no-padding">
    <!-- THE CALENDAR -->
    <div id="calendar"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->
<style>
.fc-disabled {
  background-color: #F0F0F0 !important;
  color: #000;
  cursor: default;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	/* font-size:10px; */
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
				url	: '<?php echo WEB_ROOT; ?>api/process.php?cmd=calview',
				dataType: 'json',
				type	: 'POST',
				data	: {
					start	: start.format(),
					end		: end.format()
				},
				success: function(doc) {
					var events = [];
					callback(doc);
				}
			});

		},

    selectable: true,
    // defaultView: 'basicWeek',
    defaultView: 'agendaWeek',
    allDaySlot: false,
    slotMinHeight: 500,
    eventMinHeight: 500,
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
		// eventRender: function(ev, element, view) {
		// },

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
