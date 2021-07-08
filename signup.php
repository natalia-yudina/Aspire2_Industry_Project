<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
    <style>
 label {
   color: #1F1F1F;
   font-weight: 600;
 }
    </style>
</head>
<body class="bg-light text-body">

<?php include('includes/login-nav.php'); ?>
  
<div class="container-fluid bg-light px-5  ">
  <div class="row">

  <div class="col-md-6 second-text login-bg text-dark login-box">
    <h1 class="text-center text-black py-4">Signup</h1>
  <div class="d-flex justify-content-center ">
<form class="w-75 fw-bold" method="post" name="singup" onsubmit="return validateFormDataOne()">
<div class="form-group ">
      <label for="fname">First Name (required)</label>
      <input type="text" class="form-control mb-3" id="fname" placeholder="First Name" name="fname" required>
    </div>
    <div class="form-group">
      <label for="lname">Last Name (required)</label>
      <input type="text" class="form-control mb-3" id="lname" placeholder="Last Name" name="lname" required>
    </div>
    <div class="form-group">
      <label for="email">Enter your email (required)</label>
      <input type="email" class="form-control mb-3" id="email" onBlur="checkAvailability()" placeholder="Email address" name="email" required>
      <span id="user-availability-status" style="font-size:12px;"></span>
    </div>
    <div class="form-group">
      <label for="phone">Enter your phone number (required)</label>
      <input type="tel" class="form-control mb-3" id="phone" placeholder="Phone Number" name="phone" required>
    </div>
    <div class="form-group">
      <label for="address">Enter your Address </label>
      <input type="text" class="form-control mb-3" id="address" placeholder="Address" name="address" required>
    </div>
    <div class="form-group">
      <label for="pwd">Enter your password</label>  
      <input type="password" class="form-control mb-3" id="pwd" placeholder="Password" name="pwd" required>
    </div>
    <button type="submit" name="singup" class="btn btn-dark py-3">Signup</button>
  </form>
  
  <?php
						if(isset($_POST['singup'])){
							include 'config.php';
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$address = $_POST['address'];              
							$pwd = $_POST['pwd'];
							
							$qry = "INSERT INTO users (first_name,last_name, email, phone_number, address, password, id_role)
							VALUES('$fname','$lname','$email','$phone','$address','$pwd', '1')";
							$result = $dbConn->query($qry);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered.\");
											window.location = (\"signin.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"signup.php\")
											</script>";
							}
						}
						
					  ?>
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
