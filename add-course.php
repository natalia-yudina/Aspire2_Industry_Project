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
        <?php $page = 'add-course';  include('includes/sidebar.php'); ?>
        <!-- Sidebar END -->
        
        
        <div id="page-content-wrapper">
            <!-- Top Navbar -->
            <?php $page = 'add-course'; include('includes/nav.php'); ?>
            <!-- Top Navbar END -->
            <!-- Content -->
            <div class="container-fluid px-5 ">
                <div class="row d-flex g-3 my-2 content-bg justify-content-center shadow ">
                    <div class="col-md-6 pb-5">
                   
<!-- NI 02-06-2021 begin -->
<!-- <form action="/action_page.php"> -->
<form>
<!-- NI 02-06-2021 end -->
<div class="form-group pt-3">
      <label for="fname">Course Name</label>
      <input type="text" class="form-control" id="cname" placeholder="Enter Course Name" name="cname">
    </div>
    <div class="form-group pt-3">
      <label for="sdate">Start Date</label>
      <input type="date" class="form-control" id="sdate"  name="sdate">
    </div>
    <div class="form-group pt-3">
      <label for="edate">End Date</label>
      <input type="date" class="form-control" id="edate" name="edate">
    </div>
<!-- NI 02-06-2021 begin -->
    <!-- <button type="submit" class="btn btn-dark mt-4 "> Add Course </button> -->
		<button type="button" class="btn btn-dark mt-4 add_new_course"> Add Course </button>
<!-- NI 02-06-2021 end -->
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
<script src="js/add_course.js"></script>
</html>