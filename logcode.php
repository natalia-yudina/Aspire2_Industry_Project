<?php
  session_start();
  require_once 'config.php';
$message='';

  if(isset($_POST['login'])){
				
	$email = $_POST['email'];
	$pass = $_POST['password'];
					
	$query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
	$result = mysqli_query($dbConn, $query);

	if(mysqli_num_rows($result) > 0) {
         
        while($row = mysqli_fetch_assoc($result)){
             

			if($row['id_role'] == "1"){
                $_SESSION['email'] = $rows['email'];
                $_SESSION['password'] = $rows['password'];
                header('location: update-work-days.php');	
              }
              else{
                $_SESSION['email'] = $rows['email'];
                $_SESSION['password'] = $rows['password'];
                header('location: time-table.php');	
              }
            }
          }
          else{
			echo "<script type = \"text/javascript\">
			alert(\"Invalid email or password\");
			window.location = (\"signin.php\")
			</script>";
				//header ("location : signin.php");
				//$message = 'Invalid email or password';
          }
        }

				/*if(isset($_POST['login'])){
					include 'config.php';
					
					$email = $_POST['email'];
					$pass = $_POST['password'];
					
					$query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass' limit 1";
					$rs = $dbConn->query($query);
					$num = $rs->num_rows;
					$rows = $rs->fetch_assoc();
					if($num == 1){
            $logged_in_user = mysqli_fetch_assoc($rs);
						if ($logged_in_user['id_role'] == '2'){ 
              session_start();
              $_SESSION['user'] = $logged_in_user;
              $_SESSION['success']  = "You are now logged in";
              header('location: availability.php');		
						  /*$_SESSION['email'] = $rows['email'];
					  	$_SESSION['password'] = $rows['password'];

					  	echo "<script type = \"text/javascript\">
									alert(\"Login Successful.................\");
									window.location = (\"availability.php\")
									</script>";/
					} else {
						session_start();
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";
            header('location: time-table.php');	
            /*$_SESSION['email'] = $rows['email'];
            $_SESSION['password'] = $rows['password'];
						echo "<script type = \"text/javascript\">
									alert(\"Login Successful.................\");
									window.location = (\"time-table.php\")
									</script>";/
					} }else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"signin.php\")
									</script>";
					}
        
				}*/
?>