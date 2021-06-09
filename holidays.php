<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>
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
<div class="row">

<div class="col-md-5">
  <?php
   include('holidayform.php');
  ?>
</div>
<!-- /.col -->
<div class="col-md-7">
  <?php
    include('holidayslist.php');
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
