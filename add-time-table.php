<?php
session_start();

if (isset($_SESSION['email']))
{ ?>


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
<?php
  if ($_SESSION['role'] == '2')
   { ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php $page = 'add-time-table';  include('includes/sidebar.php'); ?>
        <!-- Sidebar END -->


        <div id="page-content-wrapper">
            <!-- Top Navbar -->
            <?php include('includes/nav.php'); ?>
            <!-- Top Navbar END -->
            <!-- Content -->
            <div class="container-fluid">
                <div class="row d-flex justify-content-center g-3 my-2 content-bg">
                    <div class="col-md-4 py-3">
<!-- NI 03-06-2021 begin -->
<!-- <form action="/action_page.php"> -->
<h5 class="px-4"><i class="fas fa-circle ui-text p-2 fs-6 "></i>Add</h5>
<form class="px-4">
<!-- NI 03-06-2021 end -->
<div class="col-md-12 form-group py-2">
    <label for="hcname">Who is Head Coach?</label>
    <select class="form-control form-select" id="hcname">
      <!-- NI 03-06-2021 begin -->
			<!-- <option>Jane Doe</option>
      <option>Jhone Doe</option> -->
			<option value="0">-Select-</option>
			<?php
			// NI 08-06-2021 begin
			// $query = $mysqli->query("SELECT id_user, last_name FROM users");
			$sql="SELECT id_user, last_name FROM users where id_role = '2'";
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
  <div class="col-md-12 form-group pt-3">
    <label for="cname">Choose the Course</label>
    <select class="form-control form-select" id="cname">
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
  <div class="col-md-12 form-group pt-3">
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

  <div class="row pb-2">
  <div class="col-sm-6 form-group pt-3">
      <label for="stime">Start</label>
      <input type="time" class="form-control" id="stime" name="stime">
    </div>
    <div class="col-sm-6 form-group pt-3">
      <label for="etime">End</label>
      <input type="time" class="form-control" id="etime" name="etime">
    </div>
    </div>

    <!-- NI 03-06-2021 begin -->
        <!-- <button type="submit" class="btn btn-dark mt-4 mb-5 "> Add Course </button> -->

        <div class="col-md-12">
        <button type="button" class="btn add_new_class my-4 py-3  w-100" onClick="window.location.reload();"> Add Class<i class="fas fa-plus px-2"></i></button>
        </div>

    <!-- NI 03-06-2021 end -->
  </form>


                    </div>
                    <div class="col-md-8 px-4 py-3">

        <?php include('classeslist.php'); ?>

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
    <script src="js/add_class.js"></script>
    <?php } ?>
</body>
<!-- NI 03-06-2021 begin -->

  <!-- NI 03-06-2021 end -->
</html>

<?php } else {
  header("location: signin.php");
} ?>
