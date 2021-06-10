
<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>


<?php
 require_once '../config.php';
 // NI 10-06-2021 begin
 require_once 'Booking.php';
 // NI 10-06-2021 end
$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch($cmd) {

	case 'holiday':
		addHoliday();
	break;

	case 'hdelete':
		deleteHoliday();
	break;

 // NI 10-06-2021 begin
  case 'calview':
		calendarView();
	break;
 // NI 10-06-2021 end
	default :
	break;
}

function addHoliday() {
	$date 		= $_POST['date'];
	$reason 	= $_POST['reason'];

  $sql = "INSERT INTO holidays (date, reason) VALUES ('$date','$reason')";
  dbQuery($sql);
  header('Location: ../holidays.php');
  exit();
}


function deleteHoliday() {
	$holyId	= $_GET['hId'];

	$sql	= "DELETE FROM holidays WHERE id = $holyId";
	dbQuery($sql);
  header('Location: ../holidays.php');
  exit();
}

 // NI 10-06-2021 begin
function calendarView() {
	$start 	= $_POST['start'];
	//$sdate	= date("Y-m-d\TH:i\Z", time($start));
	$end 	= $_POST['end'];
	//$edate	= date("Y-m-d\TH:i\Z", time($end));
	$bookings = array();

	//execute SQLs to get the Holiday blocking days List within the limit of start, end date;
	$hsql	= "SELECT * FROM holidays
			   WHERE (date BETWEEN '$start' AND '$end')";
	$hresult = dbQuery($hsql);
	while($hrow = dbFetchAssoc($hresult)) {
		extract($hrow);
		$b = new Booking();
		$b->block = true;
		$b->title = $reason;
		$b->start = $date;
		$b->allDay = true;
		$b->borderColor = '#F0F0F0';
		$b->className = 'fc-disabled';
		$bookings[] = $b;
	}//while
	echo json_encode($bookings);
}
 // NI 10-06-2021 end
?>
