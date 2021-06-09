<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>


<?php
 require_once '../config.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch($cmd) {

	case 'holiday':
		addHoliday();
	break;

	case 'hdelete':
		deleteHoliday();
	break;

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

?>
