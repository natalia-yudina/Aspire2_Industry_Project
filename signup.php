<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="mystyle.css">
</head>
<body>

<?php

	include 'db.php';
  
?>

<nav class="navbar navigation">
  <div class="container-fluid">
    <div class="navbar-header ">
      <a class="navbar-brand" href="#">LOGO</a>
    </div>
  
    <ul class="nav navbar-nav navbar-right text-dark">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container-fluid">
<div class="col-md-6">
<h1>Signup</h1>
<form method="post" name="singup" onsubmit="return validateFormDataOne()">
<div class="form-group">
      <label for="fname">First Name (required)</label>
      <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" required>
    </div>
    <div class="form-group">
      <label for="lname">Last Name (required)</label>
      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
    </div>
    <div class="form-group">
      <label for="email">Enter your email (required)</label>
      <input type="email" class="form-control" id="email" onBlur="checkAvailability()" placeholder="Email address" name="email" required>
      <span id="user-availability-status" style="font-size:12px;"></span>
    </div>
    <div class="form-group">
      <label for="phone">Enter your phone number (required)</label>
      <input type="tel" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
    </div>
    <div class="form-group">
      <label for="address">Enter your Address </label>
      <input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
    </div>
    <div class="form-group">
      <label for="pwd">Enter your password</label>  
      <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required>
    </div>
    <button type="submit" name="singup" class="btn btn-default">Signup</button>
  </form>

  <?php
						if(isset($_POST['singup'])){
							include 'db.php';
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$address = $_POST['address'];              
							$pwd = $_POST['pwd'];
							
							$qry = "INSERT INTO user_table (firstName,lastName, userEmail, phoneNumber, userAddress, userPassword)
							VALUES('$fname','$lname','$email','$phone','$address','$pwd')";
							$result = $conn->query($qry);
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



<div class="col-md-6 bg2">
<p>-Est. 1958-</p>
<h1>MURRAYS BAY<br>SAILING CLUB</h1>
<h2> Roster System <br> v1</h2>
</div>
 
</div>

</body>
</html>
