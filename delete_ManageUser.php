<?php
include_once('database/dbconfig.php');
$id=$_REQUEST['eid'];
$sql1="delete from enrollment where CONTRACTOR_ID='$id'";
echo $sql1;
mysql_query($sql1)or die(mysql_error());
echo "<script>alert('Deleted Successfully.'); </script>";
//header("Location: home.php/");
?>
