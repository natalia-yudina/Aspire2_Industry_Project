<?php
  require_once 'config.php';
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

      <?php include('includes/calendar.php')?>

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
</html>
