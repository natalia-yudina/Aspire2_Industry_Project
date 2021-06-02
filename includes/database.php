<?php
error_reporting(0);

  //Connecting to a database

 $db_hostname = 'localhost';
 $db_database = 'dbRoster';
 $db_username = 'root';
 $db_password = NULL;

 $mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


//Preventing SQL Injection
function cl($data) {
    $data = stripslashes($data);
    $data = mysqli_real_escape_string($GLOBALS['mysqli'], $data);
    $data = str_replace("'", "`", $data);
    return $data;
}
 ?>
