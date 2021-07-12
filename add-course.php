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
            <div class="container-fluid ">
                <div class="row d-flex g-3 my-2 px-3 content-bg justify-content-center ">
                    <div class="col-md-4 p-3">
											<!-- NI 12-07-2021 begin -->
                                            <h5 class=""><i class="fas fa-circle ui-text px-2 fs-6 "></i>Add</h5> 
											<?php include('courseform.php'); ?>
											<!-- NI 12-07-2021 end -->
                    </div>
  									<div class="col-md-8 p-3">
                    	<?php include('courseslist.php'); ?>
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
<!-- <script src="js/add_course.js"></script> -->
</html>
