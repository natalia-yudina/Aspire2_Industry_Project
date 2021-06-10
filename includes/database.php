<?php
error_reporting(0);

  //Connecting to a database
  // NI 08-06-2021 begin
//  $db_hostname = 'localhost';
//  $db_database = 'dbRoster';
//  $db_username = 'root';
//  $db_password = NULL;
//
//  $mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);
//
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// }

  $dbConn = mysqli_connect ($db_hostname, $db_username, $db_password, $db_database);

  function dbQuery($sql)
  {
  	global $dbConn;
  	$result = mysqli_query($dbConn,$sql); //or die(mysql_error());
  	return $result;
  }
  // NI 08-06-2021 end

//Preventing SQL Injection
function cl($data) {
    $data = stripslashes($data);
    $data = mysqli_real_escape_string($GLOBALS['mysqli'], $data);
    $data = str_replace("'", "`", $data);
    return $data;
}

// NI 08-06-2021 begin
function dbFetchAssoc($result)
{
	return mysqli_fetch_assoc($result);
}

function getHolidayRecords() {
	$per_page = 10;
	$page 	= (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 1;
	$start 	= ($page-1)*$per_page;
	$sql 	= "SELECT * FROM holidays ORDER BY id DESC LIMIT $start, $per_page";
	//echo $sql;
	$result = dbQuery($sql);
	$records = array();
	while($row = dbFetchAssoc($result)) {
		extract($row);
		$records[] = array("hid" => $id, "hdate" => $date,"hreason" => $reason);
	}//while
	return $records;
}

// NI 08-06-2021 end

// KU 09/06/2021 begin
function getAvailabilityRecords() {
<<<<<<< HEAD
	
	$sql 	= "SELECT class.weekday, course.course_name, class.start_time, class.end_time 
=======

	$sql 	= "SELECT class.weekday, course.course_name, class.start_time, class.end_time
>>>>>>> 743b9eff940122e6cdb2906ea509930366321662
	           FROM class
			   INNER JOIN course
			   ON class.id_course=course.id_course";
	$result = dbQuery($sql);
	$records = array();
	while($row = dbFetchAssoc($result)) {
		extract($row);
		$records[] = array("wday" => $weekday, "cname" => $course_name,"stime" => $start_time,"etime" => $end_time,"wday" => $weekday);
	}
	return $records;
}

// KU 09/06/2021 end
<<<<<<< HEAD


=======
 ?>
>>>>>>> 743b9eff940122e6cdb2906ea509930366321662
