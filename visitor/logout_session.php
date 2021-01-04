<?php
//logout.php
session_start(); 
session_destroy(); 
header("location: http://everest.akkado.in"); 
?>