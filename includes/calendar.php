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
</style>


<script language="javascript">
$(function () {
	$('#calendar').fullCalendar({
		//timeFormat: 'H(:mm)t',
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
    selectable: true,
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
