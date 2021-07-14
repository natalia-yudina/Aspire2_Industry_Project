<?php 
session_start();

if (isset($_SESSION['email']))
{ ?>


<?php
require_once 'config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
    <style>
        .fc-icon {
  display: inline-block;
  height: 1em;
  line-height: 1em;
  font-size: 1.1em;
  color: #ffda63; 
}
        </style>
</head>

<body>
<?php  
  if ($_SESSION['role'] == '2')
   { ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php $page = 'time-table';  include('includes/sidebar.php'); ?>
        <!-- Sidebar END -->
        
        
        <div id="page-content-wrapper">
            <!-- Top Navbar -->
            <?php include('includes/nav.php'); ?>
            <!-- Top Navbar END -->
            <!-- Content -->
            <div class="container-fluid ">
                <div class="row g-3 mt-0 content-bg">
                    <div class="col-md-12">
                        <?php include('includes/calendar.php') ?>
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
    <?php } ?>
</body>
</html>

<?php } else {
  header("location: signin.php");
} ?>