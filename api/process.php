
<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>


<?php
	session_start();
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

              // event start time
              $reffulldate = $start_class . ' ' . $start_time;
              $timestamp = strtotime($reffulldate);

              $date_calculate_roster = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp), $timestamp));

              $date_calculate_roster_new = Carbon::createFromDate($date_calculate_roster, 'UTC');
              $date_calculate_roster_copy = $date_calculate_roster_new->toImmutable();

              // event end time
              $reffulldate_end = $start_class . ' ' . $end_time;
              $timestamp_end = strtotime($reffulldate_end);

              $date_calculate_roster_end = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp_end), $timestamp_end));

              $date_calculate_roster_new_end = Carbon::createFromDate($date_calculate_roster_end, 'UTC');
              $date_calculate_roster_copy_end = $date_calculate_roster_new_end->toImmutable();

               while($date_calculate_roster_copy->format('Y-m-d') <= $end_class)
               {
                  $book = new Booking();
                  // $mutable = $date_calculate_roster_copy->isMutable();
                  $book->title = $course_name;
                  $book->start = $date_calculate_roster_copy;
                  $book->end  = $date_calculate_roster_copy_end;
                  $bgClr = '#f39c12';
                  $book->backgroundColor = $bgClr;
                  $book->borderColor = $bgClr;
                  $bookings[] = $book;
                  $date_calculate_roster_copy = $date_calculate_roster_copy->copy()->addWeek();
                  $date_calculate_roster_copy_end = $date_calculate_roster_copy_end->copy()->addWeek();

               }

           }

  // NI 24-06-2021 end
	echo json_encode($bookings);
 // NI 10-06-2021 end
}

function rosterView() {

	$start = $_POST['start'];
	$end   = $_POST['end'];
  $current_id_user = $_SESSION['id'];
  $current_id_role = $_SESSION['role'];

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

  // Assigned coaches
  $sql_coaches = "SELECT h.id_class,
    GROUP_CONCAT(u.first_name, ' ', u.last_name SEPARATOR '; ') AS coaches
    FROM history_availability as h join users as u on h.id_user=u.id_user
    WHERE shift_date BETWEEN '$start' and '$end' group by h.id_class";

  $result_coaches = dbQuery($sql_coaches);
  while($row = dbFetchAssoc($result_coaches)) {
    	extract($row);
      // Array of coaches with class and shift dates
      $assigned_coaches[] =  array($id_class, $coaches);
  }

  // Classes of courses

  $sql2 = "SELECT cl.weekday, cl.id_class, c.id_course as course_from_class, c.course_name, cl.start_time, cl.end_time,
  u.first_name as hc_first_name, u.last_name as hc_last_name
  			   FROM course c JOIN class cl ON c.id_course = cl.id_course JOIN users u ON u.id_user = cl.id_user
  			   WHERE (c.start_date <= '$end' AND c.end_date >= '$start')";

  $sql2jc =  "SELECT cl.weekday, cl.id_class, c.id_course as course_from_class, c.course_name, cl.start_time, cl.end_time,
             u.first_name as hc_first_name, u.last_name as hc_last_name, h.shift_date
             			   FROM course c JOIN class cl ON c.id_course = cl.id_course JOIN users u ON u.id_user = cl.id_user
                          JOIN history_availability h ON h.id_class = cl.id_class
             			   WHERE (c.start_date <= '$end' AND c.end_date >= '$start') and h.id_user = '$current_id_user'";
  if ($_SESSION['role'] == '2') {
    $result2 = dbQuery($sql2);
  }
  else {
    $result2 = dbQuery($sql2jc);
  };

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

              // event start time
              $reffulldate = $start_class . ' ' . $start_time;
              $timestamp = strtotime($reffulldate);
              $date_calculate_roster = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp), $timestamp));
              $date_calculate_roster_new = Carbon::createFromDate($date_calculate_roster, 'UTC');
              $date_calculate_roster_copy = $date_calculate_roster_new->toImmutable();

              // event end time
              $reffulldate_end = $start_class . ' ' . $end_time;
              $timestamp_end = strtotime($reffulldate_end);
              $date_calculate_roster_end = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp_end), $timestamp_end));
              $date_calculate_roster_new_end = Carbon::createFromDate($date_calculate_roster_end, 'UTC');
              $date_calculate_roster_copy_end = $date_calculate_roster_new_end->toImmutable();

              // coaches list
              $coaches_list = "";
              foreach($assigned_coaches as $val_coaches => $massiv) {
                if ($massiv[0] == $id_class) {
                  $coaches_list = "Jr. Coaches List: " . $massiv[1];
                }
               }

               // one week (current week)
               while($date_calculate_roster_copy->format('Y-m-d') <= $end_class)
               {

                 // if ($_SESSION['role'] !== '2' and $date_calculate_roster_copy->format('Y-m-d') == $shift_date) {
                 //   // code...

                  $book = new Booking();
                  $book->title = $course_name . "\n\nHead coach: " . $hc_first_name . " " . $hc_last_name;
                  $book->start = $date_calculate_roster_copy;
                  $book->end   = $date_calculate_roster_copy_end;
                  $bgClr = '#f39c12';
                  $book->backgroundColor = $bgClr;
                  $book->borderColor = $bgClr;
                  $book->description = $coaches_list;
                  $bookings[] = $book;
                  $date_calculate_roster_copy = $date_calculate_roster_copy->copy()->addWeek();
                  // $date_calculate_roster_copy_end = $date_calculate_roster_copy_end->copy()->addWeek();
                  // }
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
              // event start time
              $reffulldate = $start_class . ' ' . $start_time;
              $timestamp = strtotime($reffulldate);
              $date_calculate_roster = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp), $timestamp));
              $date_calculate_roster_new = Carbon::createFromDate($date_calculate_roster, 'UTC');
              $date_calculate_roster_copy = $date_calculate_roster_new->toImmutable();

              // event end time
              $reffulldate_end = $start_class . ' ' . $end_time;
              $timestamp_end = strtotime($reffulldate_end);
              $date_calculate_roster_end = date('Y-m-d H:i:s', strtotime('next ' . $weekday . ' ' . date('H:i:s', $timestamp_end), $timestamp_end));
              $date_calculate_roster_new_end = Carbon::createFromDate($date_calculate_roster_end, 'UTC');
              $date_calculate_roster_copy_end = $date_calculate_roster_new_end->toImmutable();

              // NI 14-07-2021 begin
              // Available coaches
              $av_users = [];
              $assigned_coaches = [];
              $id_class_value = $row['id_class'];

              $sql3 = "SELECT a.id_user, u.first_name, u.last_name FROM availability a JOIN users u ON a.id_user = u.id_user
              WHERE a.id_class= '$id_class_value' and close_date is null LIMIT 4 ";
              $result3 = dbQuery($sql3);
              while($row_user = dbFetchAssoc($result3)) {
                	extract($row_user);
                  // Array of names of available coaches
                  // $av_users[] =  "id = " . $id_user . " name = " . $first_name . " " . $last_name;
                  $av_users[] =  $first_name . " " . $last_name;

                  // $assigned_coaches[] = array($id_user, $first_name, $last_name);
                  $assigned_coaches[] = $id_user;
              }
              // NI 14-07-2021 end

               while($date_calculate_roster_copy->format('Y-m-d') <= $end_class)
               {
                  $book = new Booking();
                  $book->title = $course_name . "\n\nHead coach: " . $hc_first_name . " " . $hc_last_name;

                  $separator = "";
                  $description = "";
                  $description_start = "Jr. Coaches List: ";
                  foreach($av_users as $jcoach => $jc_value){

                    $description = $description_start . $description . $separator . $jc_value;
                    $separator = ", ";
                    $description_start = "";

                  }
                  $book->description = $description;
                  $book->start = $date_calculate_roster_copy;
                  $book->end = $date_calculate_roster_copy_end;
                  $bgClr = '#f39c12';
                  // $bgClr = 'green';
                  $book->backgroundColor = $bgClr;
                  $book->borderColor = $bgClr;
                  // $book->color = 'blue';
                  $book->jc_list = $assigned_coaches;
                  $book->ev_id_class = $id_class_value;
                  $book->hc = "Head coach: " . $hc_first_name . " " . $hc_last_name;

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
