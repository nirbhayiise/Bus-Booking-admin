<?php

include_once 'include/class.php';
$user = new User();
if (isset($_GET['q'])){
$user->user_logout();
header("location:index.php");
}

?>

