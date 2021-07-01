


<?php

  require_once '../config.php';

$mainSQL	= "SELECT class.id_class, class.weekday, course.course_name, class.start_time, class.end_time, availability.id_user FROM class
  			   INNER JOIN course ON class.id_course=course.id_course
                 left join availability ON
                 class.id_class=availability.id_class";

?>

<form>
  <!-- <table class="table table-bordered display" id="availability"> -->
  <table class="table display" id="availability">
  <thead>
      <tr>

        <!-- <th></th> -->
        <th>#</th>
        <th style="width: 10px">Select</th>
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

    // if ($row['id_user'] > 0){
    // 	echo "<tr class='selected' id='record_".$row['id_class']."' >";
    // } else {
    	echo "<tr id='record_".$row['id_class']."' >";
    // }
			      // echo "<td></td>";

            // echo "<td><input type='checkbox' name='check[".$row['id_class']."]' value='1'></td>";
            if ($row['id_user'] > 0){
            echo "<td><input checked type='checkbox' class='w-100 checkitem' name='check[".$row['id_class']."]' value=".$row['id_class']."></td>";
            } else {
            echo "<td><input type='checkbox' class='w-100 checkitem' name='check[".$row['id_class']."]' value=".$row['id_class']."></td>";
            }
			      echo "<td>" . $row['id_class'] . "</td>";
            echo "<td id='recordMake_".$row['id_class']."'>" . $row['weekday'] . "</td>";
            echo "<td id='recordYear_".$row['id_class']."'>" . $row['course_name'] . "</td>";
            echo "<td id='recordPlate_number_".$row['id_class']."'>" . $row['start_time'] . "</td>";
            echo "<td id='recordAvailable_".$row['id_class']."'>" . $row['end_time'] . "</td>";
		echo "</tr>";
        }
?>
 </tbody>
 </table>
 <!-- <button type="button" class="btn btn-dark mt-4 mb-5 update_availability" id="btid">Update Your Availability </button> -->
 <button type="button" class="btn w-25 update_availability" id="btid"> Update Work Days <i class="fas fa-sync-alt p-2"></i> </button>
 <div class="box-footer clearfix">
</form>
