
<?php
	session_start();
  require_once '../config.php';
?>

<?php
  // NI 05-07-2021
  // $myid = $_POST['id'];
  // $id = str_replace('',',', $myid);
  //
  // $mainSQL	= "SELECT class.id_class, class.weekday, course.course_name, class.start_time, class.end_time FROM class
	// 		   INNER JOIN course ON class.id_course=course.id_course where id_class in ($id)";
  // $result = dbQuery($mainSQL);
  // while($row = dbFetchAssoc($result)) {
  //   $newvalue = $row['id_class'];
  //   $addSQL = "INSERT INTO availability(id_class, id_user) VALUES ($newvalue, 1)";
  //   $result = dbQuery($addSQL);
  //   }


      // list of checked id_class in format $myid = '3 5 7';
      $myid = $_POST['id'];
      $id_user = $_SESSION['id'];
      // change list for using in the query
      $id = str_replace(' ',',', $myid);

      //close unselected classes which were selected before (v -> _)

      $date_calculate_end = date('Y-m-d', strtotime('next Sunday'));
      $close_av = "UPDATE availability SET close_date=('$date_calculate_end') WHERE not id_class in ($id) and id_user = '$id_user'";
      $close_result = dbQuery($close_av);

      //delete selected before classes from the list  (v -> v)
      $checked_lines = dbQuery("SELECT id_class FROM availability WHERE id_class in ($id) and id_user = '$id_user'");
      $array_to_delete = array();
      while ($row = dbFetchAssoc($checked_lines))
      {
          $array_to_delete[] = intval($row['id_class']);
      }

      // create array from the list
      $myid_array = explode(",", $id);
      // values of the arrays to integer
      $myid_array = array_map('intval', $myid_array);
      $array_to_delete = array_map('intval', $array_to_delete);
      // array of id_class to add in the availability table
      $myid_new = array_diff($myid_array, $array_to_delete);
      // delete Null values
      $myid_new = array_values(array_filter($myid_new,'strlen'));


      // add new available classes (_ -> v)
      // array to string
      $space_separated = implode(" ", $myid_new);
      // change string for using in the query in format "(id_class, id_user)")
      // $id_user = 1;
      $user_string = ', ' . $id_user . '), (';
      $data_string = '('. str_replace(' ',$user_string, $space_separated) . ', ' . $id_user . ')';
      $addSQL = "INSERT availability (id_class, id_user) VALUES " . $data_string;
      dbQuery($addSQL);

      header('Content-type: application/json; charset=utf-8');
      $massiv_jasone['resultOK'] = true;
      $massiv_jasone['message']  = "Ok";
      $jason_encode              = json_encode($massiv_jasone);
      echo $jason_encode;

 ?>
