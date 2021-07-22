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

<?php include('add-class-form.php'); ?>

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
