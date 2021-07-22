


<?php
	session_start();
  require_once '../config.php';

$id_user = $_SESSION['id'];
$mainSQL	= "SELECT class.id_class, class.weekday, course.course_name, class.start_time, class.end_time, availability.id_user, availability.close_date FROM class
  			   INNER JOIN course ON class.id_course=course.id_course
                 left join availability ON
                 class.id_class=availability.id_class and availability.id_user ='$id_user'";
?>

<form style="overflow-x:auto;" class="pb-3">
  <table class="table display" id="availability">
  <thead>
      <tr>
        <th style="width: 10px">Select</th>
        <th>#</th>
        <th>Day</th>
        <th>Course Name</th>
        <th>Start Time</th>
        <th>End Time</th>
      </tr>
  </thead>
  <tbody>
<?php
  $result = dbQuery($mainSQL);
	while($row = dbFetchAssoc($result)) {

		// link table row and id_class
  	echo "<tr id='record_".$row['id_class']."' >";
          if ($row['id_user'] > 0 and is_null($row['close_date'])){
						// checked
						echo "<td><input checked type='checkbox' class='w-100 checkitem' name='check[".$row['id_class']."]' value=".$row['id_class']."></td>";
          } else {
						// regular
						echo "<td><input type='checkbox' class='w-100 checkitem' name='check[".$row['id_class']."]' value=".$row['id_class']."></td>";
          }
					$time_start = date('H:i', strtotime($row['start_time']));
					$time_end = date('H:i', strtotime($row['end_time']));
		      echo "<td>" . $row['id_class'] . "</td>";
          echo "<td id='recordMake_".$row['id_class']."'>" . $row['weekday'] . "</td>";
          echo "<td id='recordYear_".$row['id_class']."'>" . $row['course_name'] . "</td>";
					echo "<td id='recordPlate_number_".$row['id_class']."'>" . $time_start . "</td>";
          echo "<td id='recordAvailable_".$row['id_class']."'>" . $time_end . "</td>";
		echo "</tr>";
        }
?>
 </tbody>
 </table>
</form>

<div class="col-md-3 mx-auto">
<button type="button" class="btn w-100 update_availability" id="btid"> Update Days <i class="fas fa-sync-alt p-2"></i> </button>
 <div class="box-footer clearfix">
 </div>
 </div>
