<?php
/*
$mysql_hostname = "localhost";
$mysql_user = "lannet_imgupload";
$mysql_password = "pass@1234";
$mysql_database = "lannet_upload";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
*/
?>

<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'indian_tracker');
	define('DB_PASSWORD', 'tracker@1234567890');
	define('DB_DATABASE', 'indian_tracker');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>