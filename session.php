<?php
session_start();
include_once 'include/class.php';
$user = new User();
//$user = $_SESSION['username'];
$_SESSION['username'];
if (!$user->get_session()){
header("location:index.php");
}


if (isset($_GET['q'])){
$user->user_logout();
header("location:index.php");
}
?>
