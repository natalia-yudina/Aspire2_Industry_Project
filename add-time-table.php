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
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php $page = 'add-time-table';  include('includes/sidebar.php'); ?>
        <!-- Sidebar END -->
        
        
        <div id="page-content-wrapper">
            <!-- Top Navbar -->
            <?php include('includes/nav.php'); ?>
            <!-- Top Navbar END -->
            <!-- Content -->
            <div class="container-fluid px-5">
                <div class="row d-flex justify-content-center g-3 my-2 content-bg">
                    <div class="col-md-6 ">
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
    <select class="form-select" id="day">
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
    <div class="form-group pt-3">
    <label for="colorpicker">Select a Class Color</label>
      <span class="d-flex "><input class="colorPicker" type='color' id='colorPicker' value="#FFC817"></span>
    </div>
    <!-- NI 03-06-2021 begin -->
        <!-- <button type="submit" class="btn btn-dark mt-4 mb-5 "> Add Course </button> -->
        
        <button type="button" class="btn add_new_class"> Add <i class="fas fa-plus "></i></button>
        
    		
    <!-- NI 03-06-2021 end -->
  </form>
                    </div>
                </div>
            </div>
              <!-- Content END -->
        </div>
    </div>

    <!-- Sidebar JS -->
    <script type = "text/javascript" src="js/sidebar.js"></script>  
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    
</body>
<!-- NI 03-06-2021 begin -->
<script src="js/add_class.js"></script>
  <!-- NI 03-06-2021 end -->
</html>