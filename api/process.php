
<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>


<?php
 // NI 24-06-2021 begin
 require '../vendor/autoload.php';
 use Carbon\Carbon;
 // NI 24-06-2021 end
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

  case 'udelete':
		deleteUser();
	break;
  // NI 12-07-2021 begin
   case 'course':
 		addCourse();
 	break;
  // NI 12-07-2021 end
	case 'cordelete':
		deleteCourse();
	break;

  case 'cdelete':
		deleteClass();
	break;

 // NI 10-06-2021 begin
  case 'calview':
		calendarView();
	break;
 // NI 10-06-2021 end
 // NI 12-07-2021 begin
   case 'rosterview':
 		rosterView();
 	break;
 // NI 12-07-2021 end
 // NI 14-07-2021 begin
   case 'assignedCoaches':
 		assignedCoaches();
 	break;
 // NI 14-07-2021 end
	default :
	break;
}

// ===== Holidays actions =====

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

// ===== User actions =====

function deleteUser() {
	$idUser	= $_GET['uid'];

	$sql	= "DELETE FROM users WHERE id_user = $idUser";
	dbQuery($sql);
  header('Location: ../user-list.php');
  exit();
}

// ===== Course actions =====

function addCourse() {

  $course_name  = $_POST['cname'];
  $start_date   = $_POST['sdate'];
  $end_date     = $_POST['edate'];

  $sql = "INSERT INTO course (course_name, start_date, end_date) VALUES ('$course_name', '$start_date', '$end_date')";
  dbQuery($sql);
  header('Location: ../add-course.php');
  exit();
}

function deleteCourse() {
	$corId	= $_GET['corId'];

	$sql	= "DELETE FROM course WHERE id_course = $corId";
	dbQuery($sql);
  header('Location: ../add-course.php');
  exit();
}

// ===== Class actions =====

function deleteClass() {
	$classId	= $_GET['cId'];

	$sql	= "DELETE FROM class WHERE id_class = $classId";
	dbQuery($sql);
  header('Location: ../add-time-table.php');
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

  // NI 24-06-2021 begin
  $sql1	= "SELECT c.id_course AS id_course, c.start_date AS start_date, c.end_date AS end_date
             			   FROM course c
             			   WHERE c.start_date <= '$end' AND c.end_date >= '$start'";

    $result1 = dbQuery($sql1);
    while($row = dbFetchAssoc($result1)) {
      	extract($row);
        $start_calculate = max($start_date, $start);
        $end_calculate = min($end_date, $end);
        $active_courses[] =  array($id_course, $start_calculate, $end_calculate);
    }

  $sql2 = "SELECT cl.weekday, cl.id_class, c.id_course as course_from_class, c.course_name, cl.start_time, cl.end_time
  			   FROM course c JOIN class cl ON c.id_course = cl.id_course
  			   WHERE (c.start_date <= '$end' AND c.end_date >= '$start')";
  $result2 = dbQuery($sql2);
           while($row = dbFetchAssoc($result2)) {
             	extract($row);

              foreach($active_courses as $val_arr) {
                $index = array_search($course_from_class,$val_arr,true);
                if ($index !== false) {
                  $start_class = $val_arr[1];
                  $end_class = $val_arr[2];
                  unset($val_arr);
                }
              }

              $reffulldate = $start_class . ' ' . $start_time;
              $timestamp = strtotime($reffulldate);

              $date_calculate_roster = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp), $timestamp));

              $date_calculate_roster_new = Carbon::createFromDate($date_calculate_roster, 'UTC');
              $date_calculate_roster_copy = $date_calculate_roster_new->toImmutable();

               while($date_calculate_roster_copy->format('Y-m-d') <= $end_class)
               {
                  $book = new Booking();
                  // $mutable = $date_calculate_roster_copy->isMutable();
                  $book->title = $date_calculate_roster1 . $course_name;
                  $book->start = $date_calculate_roster_copy;
                  $bgClr = '#f39c12';
                  $book->backgroundColor = $bgClr;
                  $book->borderColor = $bgClr;
                  $bookings[] = $book;
                  $date_calculate_roster_copy = $date_calculate_roster_copy->copy()->addWeek();

               }

           }

  // NI 24-06-2021 end
	echo json_encode($bookings);
 // NI 10-06-2021 end
}

function rosterView() {

	$start = $_POST['start'];
	$end   = $_POST['end'];

	$bookings = array();
  // Courses in the current period
  $sql1	= "SELECT c.id_course AS id_course, c.start_date AS start_date, c.end_date AS end_date
           			   FROM course c
           			   WHERE c.start_date <= '$end' AND c.end_date >= '$start'";

  $result1 = dbQuery($sql1);
  while($row = dbFetchAssoc($result1)) {
    	extract($row);
      $start_calculate = max($start_date, $start);
      $end_calculate = min($end_date, $end);
      // Array of courses with start and end date
      $active_courses[] =  array($id_course, $start_calculate, $end_calculate);
  }

  // Classes of courses
  $sql2 = "SELECT cl.weekday, cl.id_class, c.id_course as course_from_class, c.course_name, cl.start_time, cl.end_time,
  u.first_name as hc_first_name, u.last_name as hc_last_name
  			   FROM course c JOIN class cl ON c.id_course = cl.id_course JOIN users u ON u.id_user = cl.id_user
  			   WHERE (c.start_date <= '$end' AND c.end_date >= '$start')";
  $result2 = dbQuery($sql2);
           while($row = dbFetchAssoc($result2)) {
             // take class
             extract($row);
             // find course in $active_courses array -> take start and end date
             foreach($active_courses as $val_arr) {
               $index = array_search($course_from_class,$val_arr,true);
                if ($index !== false) {
                  $start_class = $val_arr[1];
                  $end_class = $val_arr[2];
                  unset($val_arr);
                }
              }
                $reffulldate = $start_class . ' ' . $start_time;
                $timestamp = strtotime($reffulldate);

                $date_calculate_roster = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp), $timestamp));

               $mycounter = 0;
                $date_calculate_roster_new = Carbon::createFromDate($date_calculate_roster, 'UTC');
              $date_calculate_roster_copy = $date_calculate_roster_new->toImmutable();

              // $date_calculate_roster = (new Carbon('first ' . $weekday . $start_time, 'UTC'));
              //   $date_calculate_roster_copy = $date_calculate_roster->copy();

               while($date_calculate_roster_copy->format('Y-m-d') <= $end_class)
               {
                  $book = new Booking();
                  // $mutable = $date_calculate_roster_copy->isMutable();
                  $book->title = $date_calculate_roster1 . $course_name . "\n\nHead coach: " . $hc_first_name . " " . $hc_last_name;
                  // $book->description = "description123:";
                  $book->start = $date_calculate_roster_copy;
                  $bgClr = '#f39c12';
                  $book->backgroundColor = $bgClr;
                  $book->borderColor = $bgClr;
                  $book->description = "description test";
                  $bookings[] = $book;
                  $date_calculate_roster_copy = $date_calculate_roster_copy->copy()->addWeek();
               }
           }

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

function assignedCoaches() {

	$start = $_POST['start'];
	$end   = $_POST['end'];

	$bookings = array();
  // Courses in the current period
  $sql1	= "SELECT c.id_course AS id_course, c.start_date AS start_date, c.end_date AS end_date
           			   FROM course c
           			   WHERE c.start_date <= '$end' AND c.end_date >= '$start'";

  $result1 = dbQuery($sql1);
  while($row = dbFetchAssoc($result1)) {
    	extract($row);
      $start_calculate = max($start_date, $start);
      $end_calculate = min($end_date, $end);
      // Array of courses with start and end date
      $active_courses[] =  array($id_course, $start_calculate, $end_calculate);
  }

  // Classes of courses
  $sql2 = "SELECT cl.weekday, cl.id_class, c.id_course as course_from_class, c.course_name, cl.start_time, cl.end_time,
  u.first_name as hc_first_name, u.last_name as hc_last_name
  			   FROM course c JOIN class cl ON c.id_course = cl.id_course JOIN users u ON u.id_user = cl.id_user
  			   WHERE (c.start_date <= '$end' AND c.end_date >= '$start')";
  $result2 = dbQuery($sql2);
           while($row = dbFetchAssoc($result2)) {
             // take class
             extract($row);
             // find course in $active_courses array -> take start and end date
             foreach($active_courses as $val_arr) {
               $index = array_search($course_from_class,$val_arr,true);
                if ($index !== false) {
                  $start_class = $val_arr[1];
                  $end_class = $val_arr[2];
                  unset($val_arr);
                }
              }
                $reffulldate = $start_class . ' ' . $start_time;
                $timestamp = strtotime($reffulldate);

                $date_calculate_roster = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp), $timestamp));

               $mycounter = 0;
                $date_calculate_roster_new = Carbon::createFromDate($date_calculate_roster, 'UTC');
              $date_calculate_roster_copy = $date_calculate_roster_new->toImmutable();

              // $date_calculate_roster = (new Carbon('first ' . $weekday . $start_time, 'UTC'));
              //   $date_calculate_roster_copy = $date_calculate_roster->copy();

               while($date_calculate_roster_copy->format('Y-m-d') <= $end_class)
               {
                  $book = new Booking();
                  // $mutable = $date_calculate_roster_copy->isMutable();
                  $book->title = $date_calculate_roster1 . $course_name . "\n\nHead coach: " . $hc_first_name . " " . $hc_last_name;
                  $book->description = "description124:";
                  $book->start = $date_calculate_roster_copy;
                  // $bgClr = '#f39c12';
                  $bgClr = 'green';
                  $book->backgroundColor = $bgClr;
                  $book->borderColor = $bgClr;
                  // $book->color = 'blue';
                  // $book->end = $end_calculate;
                  $book->extendedProps = "kk";
                  // $book->id = "klk";
                    // $department = 'BioChemistry'

                  $bookings[] = $book;
                  $date_calculate_roster_copy = $date_calculate_roster_copy->copy()->addWeek();
               }
           }

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
?>
