<?php
  include "logcode.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
</head>
<body class="bg-light text-body">

<?php include('includes/login-nav.php'); ?>
  
<div class="container-fluid bg-light px-5 pb-5">
  <div class="row">

  <div class="col-md-6 login-bg text-dark login-box">
    <h1 class="text-center text-dark py-4">Sign In</h1>
  <div class="d-flex justify-content-center ">

<form class="w-75 text-dark" action="logcode.php" method="post">
    <div class="form-group">
      <label for="email">Enter your email</label>
      <input type="email" class="form-control mb-3" placeholder="Email address" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Enter your password</label>
      <input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
    </div>
    <p>
    <?php echo $message;?>
    </p>
    <input type="submit" class="btn btn-dark py-3" name="login" value="Login Here"></td>
    
  </form>

  </div>
</div>



<div class="col-md-6  main-text text-center py-4 ">

<span class="d-flex justify-content-center fw-bold">-Est. 1958-</span>
<h1>MURRAYS BAY<br>SAILING CLUB</h1>
<h2> Roster System  v1</h2>

<img src="images/sign-up-bg.png" class="" width="400" height="250">
</div>
 
</div>
</div>

</body>
</html>