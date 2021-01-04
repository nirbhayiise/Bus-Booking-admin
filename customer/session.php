<?php 
session_start();
if (!isset($_SESSION['ADMIN_USERID']) || $_SESSION['ADMIN_USERID'] == '')
{
  header('Location: ..\index.php');
}
?>

