
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
    <style>
 label {
   color: #1F1F1F;
   font-weight: 600;
 }
 .btn {
  width: auto;
  height: 50px;
  line-height: 1;
  font-weight: 500;
  color: black;
  margin-bottom: 20px;
  margin-top: 20px;
  border: 1px solid #212529;
  border-radius: 6px;
  background:none;
 
  
}

.btn:hover {
  color: #fafafa;
  background-color: #212529 ;
  border: 1px solid  #212529;
  transition: 0.5ms;
}

    </style>
</head>
<body class="bg-light text-body">

<?php include('includes/login-nav.php'); ?>
  
<div class="container-fluid bg-light px-5 pb-5">
  <div class="row">

  <div class="col-md-6 login-bg text-dark login-box">
    <h1 class="text-center text-dark py-4">Sign In</h1>
    <?php if (isset($_GET['error'])){?>
       
      <div class="d-flex justify-content-center" >
    <div class="alert alert-danger col-md-9" role="alert">
         <?=$_GET['error']?>
    </div>
      </div>
    <?php } ?>
  <div class="d-flex justify-content-center ">

<form class="w-75 text-dark " action="includes/check_login.php" method="POST">
    <div class="form-group">
      <label for="email">Your Email</label>
      <input type="email" class="form-control mb-3" placeholder="Email" name="email" id="email">
    </div>
    <div class="form-group">
      <label for="pwd">Enter your password</label>
      <input type="password" class="form-control mb-2" placeholder="Password" name="password" id="password">
    </div>
   
  
   
    <input type="submit" class="btn w-100 " name="login" value="Sign In"></td>
    
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