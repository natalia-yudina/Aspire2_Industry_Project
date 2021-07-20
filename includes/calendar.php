<div id="calendar"></div>

<!-- NI 10-06-2021 begin -->
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
		//timeFormat: 'H(:mm)t',
    timeFormat: 'H:mm',
		header: {
        	left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
		},
        buttonText: {
            today: 'today',
            month: 'month',
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
					// console.log('events #########');
					callback(doc);
				}
			});
		},
    displayEventEnd: true,
    selectable: true,
    allDaySlot: false,
    minTime: "08:00:00",
    maxTime: "22:00:00",    
    weekNumbers: true,
    navLinks: true, // can click day/week names to navigate views
		eventAfterRender : function(ev, element, view) {
			if(ev.block == true) {
				var start = ev.start.format();
				$("td.fc-day[data-date='"+ start +"']").addClass('fc-disabled');
			}
		}

	});
});
</script>
<!-- NI 10-06-2021 end -->
