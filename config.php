<?php
// STD702 s00009622 Natalia Iudina 08.06.2021
?>

<?php
ini_set('display_errors', 'on');

// start the session
session_start();

// database connection config

$db_hostname = 'localhost';
$db_database = 'dbRoster';
$db_username = 'root';
$db_password = NULL;


//Project data
$site_title 	= '';
$email_id 		= '';

$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$webRoot  = str_replace(array($docRoot, 'config.php'), '', $thisFile);
$srvRoot  = str_replace('config.php', '', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);


// if (!get_magic_quotes_gpc()) {
	if (isset($_POST)) {
		foreach ($_POST as $key => $value) {
			$_POST[$key] =  trim(addslashes($value));
		}
	// }

	if (isset($_GET)) {
		foreach ($_GET as $key => $value) {
			$_GET[$key] = trim(addslashes($value));
		}
	}
}

 require_once 'includes/database.php';

?>
