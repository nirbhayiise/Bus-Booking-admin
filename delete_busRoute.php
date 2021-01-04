<?php

include_once 'include/class.php';

$user = new User();
$table = "bus_route";
if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $res=$user->delete_busRoute($table,$id);
 if($res)
 {
  ?>
  <script>
  alert('Record Deleted ...')
        window.location='listRoute.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Record can not Deleted !!!')
        window.location='listRoute.php'
        </script>
  <?php
 }
}