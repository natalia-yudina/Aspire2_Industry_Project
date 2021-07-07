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
    <div class="d-flex user-bg" id="wrapper">
        <!-- Sidebar -->
        <?php $page = 'user-roster'; include('includes/user-sidebar.php'); ?>
        <!-- Sidebar END -->    
        <div id="page-content-wrapper">
            <!-- Top Navbar -->
            <?php include('includes/user-nav.php'); ?>
            <!-- Top Navbar END -->
            <!-- Content -->
            <div class="container-fluid">
                <div class="row d-flex g-3 my-2 content-bg justify-content-center">
                    <div class="col-md-12 p-3">
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
    
</body>

</html>