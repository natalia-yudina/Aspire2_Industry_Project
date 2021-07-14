<?php 
session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) 
{

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    if (empty($email)) {

        header("Location:../signin.php?error=* Email Address is Required");
    } else if (empty($password)) {
        header("Location:../signin.php?error=* Password is Required");
    } else {
        // Hashing the Password
        $password = md5($password);

        $sql = "SELECT * FROM users where email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
         
        if (mysqli_num_rows($result)===1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email']===$email && $row['password']===$password && $row['id_role'] !== '2') 
            {
              
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['fname'] = $row['first_name'];
                $_SESSION['lname'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone_number'];   
                $_SESSION['address'] = $row['address'];
                $_SESSION['role'] = $row['id_role'];

               header("Location: ../my-profile.php");
            } 
            
            
            else {
                if ($row['email']===$email && $row['password']===$password && $row['id_role'] !== '1') 
            {
           
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['fname'] = $row['first_name'];
                $_SESSION['lname'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone_number'];   
                $_SESSION['address'] = $row['address'];
                $_SESSION['role'] = $row['id_role'];

               header("Location: ../roster.php");
            } 
                 }


            } 
            
            else {
                header("Location:../signin.php?error=Incorrect Email or password");
                 }
        }
    }


else {
    header("Location:../signin.php");
}
?>