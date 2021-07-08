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

function getClassesRecords() {
	$per_page = 10;
	$page 	= (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 1;
	$start 	= ($page-1)*$per_page;
	$sql 	= "SELECT class.id_class, course.course_name, class.start_time, class.end_time, class.weekday, users.last_name
	FROM class
	INNER JOIN course
	ON class.id_course=course.id_course
	INNER JOIN users
	ON class.id_user=users.id_user
	ORDER BY id_class DESC LIMIT $start, $per_page";
	//echo $sql;
	$result = dbQuery($sql);
	$records = array();
	while($row = dbFetchAssoc($result)) {
		extract($row);
		$records[] = array("cid" => $id_class, "ccoach" => $last_name, "courid" => $course_name,
		"cday" => $weekday, "cstart" => $start_time, "cend" => $end_time);
	}//while
	return $records;
}

// NI 08-06-2021 end

// KU 09/06/2021 begin
function getAvailabilityRecords() {

	$sql 	= "SELECT class.weekday, course.course_name, class.start_time, class.end_time
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
?>
