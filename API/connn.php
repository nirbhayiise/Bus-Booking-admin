<?php
$con = mysqli_connect("localhost","indian_tracker","tracker@1234567890","indian_tracker");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
	  echo 'loko';
  }
?>