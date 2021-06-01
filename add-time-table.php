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
        
      <div class="d-flex justify-content-center pt-5">
<div class="col-md-6">
<h2>Add Time Table</h2>
<form action="/action_page.php">
<div class="form-group pt-3">
    <label for="hcname">Who is Head Coach?</label>
    <select class="form-control" id="hcname">
      <option>Jane Doe</option>
      <option>Jhone Doe</option>
    </select>
  </div>
  <div class="form-group pt-3">
    <label for="cname">Choose the Course</label>
    <select class="form-control" id="cname">
      <option>Blue Fleet</option>
      <option>Green Fleet</option>
    </select>
  </div>
  <div class="form-group pt-3">
    <label for="day">Choose a Day</label>
    <select class="form-control" id="day">
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
    <button type="submit" class="btn btn-dark mt-4 mb-5 "> Add Course </button>
  </form>
</div>
      </div>
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