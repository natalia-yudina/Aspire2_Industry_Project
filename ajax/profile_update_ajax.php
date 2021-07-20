<?php
// STD702 s00009622 Natalia Iudina 20.07.2021
?>

<?php
		session_start();
    require_once '../config.php';

	if ($_POST["id"] != '') {

		$id     = $_POST["id"];

    $fname         = $_POST["fname"];
    $lname         = $_POST["lname"];
		$email         = $_POST["email"];
		$phone         = $_POST["phone"];
		$address       = $_POST["address"];

		$sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email', phone_number='$phone', address='$address' WHERE id_user='$id'";
    dbQuery($sql);
    $_SESSION['fname'] 		= $fname;
		$_SESSION['lname'] 		= $lname;
    $_SESSION['email']    = $email;
    $_SESSION['phone']    = $phone;
    $_SESSION['address']  = $address;


    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK : ".$id;
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
} else {
    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = false;
    $massiv_jasone['message']  = "ERROR";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
}

?>
