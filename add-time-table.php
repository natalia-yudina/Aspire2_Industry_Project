<?php
	 // NI 08-06-2021 begin
	 // include $_SERVER['DOCUMENT_ROOT'] . "/Aspire2_Industry_Project/includes/database.php";
	 require_once 'config.php';
	 // NI 08-06-2021 end
?>

<!doctype html>
<html lang="en">
  <head>
  <?php include('includes/head.php'); ?>
  </head>
  <body>

      <!-- Top Navbar -->
      <?php include('includes/nav.php'); ?>
    <!-- END Top Navbar -->

    <!-- Sidebar -->
    <?php include('includes/sidebar.php'); ?>
    <!-- END Sidebar-->
      <div id="main">

      <div class="d-flex justify-content-center pt-5">
<div class="col-md-6">
<h2>Add Time Table</h2>
<!-- NI 03-06-2021 begin -->
<!-- <form action="/action_page.php"> -->
<form>
<!-- NI 03-06-2021 end -->
<div class="form-group pt-3">
    <label for="hcname">Who is Head Coach?</label>
    <select class="form-control" id="hcname">
      <!-- NI 03-06-2021 begin -->
			<!-- <option>Jane Doe</option>
      <option>Jhone Doe</option> -->
			<option value="0">-Select-</option>
			<?php
			// NI 08-06-2021 begin
			// $query = $mysqli->query("SELECT id_user, last_name FROM users");
			$sql="SELECT id_user, last_name FROM users";
			$query = dbQuery($sql);
			// NI 08-06-2021 end
			while($row = mysqli_fetch_assoc($query)) {
			$selected = ($row['id_user'] == $myrow['last_name']) ? ' selected' : '';
			echo "<option ".$selected." value=".$row['id_user'].">".$row['last_name']."</option>";
			}
			?>
			<!-- NI 03-06-2021 end -->
    </select>
  </div>
  <div class="form-group pt-3">
    <label for="cname">Choose the Course</label>
    <select class="form-control" id="cname">
      <!-- NI 03-06-2021 begin -->
            <!-- <option>Blue Fleet</option>
            <option>Green Fleet</option> -->
      			<option value="0">-Select-</option>
      			<?php
			// NI 08-06-2021 begin
			// $query = $mysqli->query("SELECT id_course, course_name FROM course");
			$sql="SELECT id_course, course_name FROM course";
			$query = dbQuery($sql);
			// NI 08-06-2021 end
      while($row = mysqli_fetch_assoc($query)) {
      $selected = ($row['id_course'] == $myrow['course_name']) ? ' selected' : '';
      echo "<option ".$selected." value=".$row['id_course'].">".$row['course_name']."</option>";
      }
      ?>
      <!-- NI 03-06-2021 end -->
    </select>
  </div>
  <div class="form-group pt-3">
    <label for="day">Choose a Day</label>
    <select class="form-control" id="day">
      <option>Monday</option>
      <option>Tuesday</option>
      <option>Wednesday</option>
      <option>Thursday</option>
      <option>Friday</option>
      <option>Saturday</option>
      <option>Sunday</option>
    </select>
  </div>
  <div class="form-group pt-3">
      <label for="stime">Start</label>
      <input type="time" class="form-control" id="stime" name="stime">
    </div>
    <div class="form-group pt-3">
      <label for="etime">End</label>
      <input type="time" class="form-control" id="etime" name="etime">
    </div>
    <!-- NI 03-06-2021 begin -->
        <!-- <button type="submit" class="btn btn-dark mt-4 mb-5 "> Add Course </button> -->
    		<button type="button" class="btn btn-dark mt-4 mb-5 add_new_class"> Add Class </button>
    <!-- NI 03-06-2021 end -->
  </form>
</div>
      </div>
      </div>

      <script>
      function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

      </script>

  </body>
  <!-- NI 03-06-2021 begin -->
  	<script src="js/add_class.js"></script>
  <!-- NI 03-06-2021 end -->

</html>
