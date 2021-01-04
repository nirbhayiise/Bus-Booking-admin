<?php

include_once 'include/class.php';

$user = new User();
$table = "package";
if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $res=$user->delete_tour_package($table,$id);
 if($res)
 {
  ?>
  <script>
  alert('Record Deleted ...')
        window.location='listTourPackage.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Record can not Deleted !!!')
        window.location='listTourPackage.php'
        </script>
  <?php
 }
}