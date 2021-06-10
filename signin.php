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
  <link rel="stylesheet" href="mystyle.css">
</head>
<body>

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
<h1>Login</h1>
<form action="/action_page.php">
    <div class="form-group">
      <label for="email">Enter your email</label>
      <input type="email" class="form-control" id="email" placeholder="Email address" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Enter your password</label>
      <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
    </div>
    <button type="submit" class="btn btn-default">Login</button>
  </form>
</div>

<div class="col-md-6 bg2">
<p>-Est. 1958-</p>
<h1>MURRAYS BAY<br>SAILING CLUB</h1>
<h2> Roster System <br> v1</h2>
</div>
 
</div>

</body>
</html>
