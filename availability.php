<<<<<<< HEAD

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
<div class="content-wrapper">
<section class="content">
<div class="row d-flex justify-content-center pt-5">
<!-- /.col -->
<div class="col-md-10">
  <?php
    include('availabilitylist.php');
  ?>
</div>
<!-- /.col -->

</div>
</section>
</div>

</body>
<script>
function openNav() {
document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}


</script>
</html>
=======

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
    <?php include('includes/user-sidebar.php'); ?>
    <!-- END Sidebar-->
<div class="content-wrapper">
<section class="content">
<div class="row d-flex justify-content-center pt-5">
<!-- /.col -->
<div class="col-md-10">
  <?php
    include('availabilitylist.php');
  ?>
</div>
<!-- /.col -->

</div>
</section>
</div>

</body>
<script>
function openNav() {
document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}


</script>
</html>
>>>>>>> 743b9eff940122e6cdb2906ea509930366321662
