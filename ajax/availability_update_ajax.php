
<?php
  require_once '../config.php';
?>

<?php

  $myid = $_POST['id'];
  $id = str_replace('',',', $myid);

  $mainSQL	= "SELECT class.id_class, class.weekday, course.course_name, class.start_time, class.end_time FROM class
			   INNER JOIN course ON class.id_course=course.id_course where id_class in ($id)";
  $result = dbQuery($mainSQL);
  while($row = dbFetchAssoc($result)) {
    $newvalue = $row['id_class'];
    $addSQL = "INSERT INTO availability(id_class, id_user) VALUES ($newvalue, 1)";
    $result = dbQuery($addSQL);
    }

 ?>
