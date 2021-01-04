<?php

include_once 'include/class.php';

$user = new User();
$table = "cancellation";
if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $res=$user->delete_cancellation($table,$id);
 if($res)
 {
  ?>
  <script>
  alert('Record Deleted ...')
        window.location='viewCancellation.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Record can not Deleted !!!')
        window.location='viewCancellation.php'
        </script>
  <?php
 }
}