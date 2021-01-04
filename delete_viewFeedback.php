<?php

include_once 'include/class.php';

$user = new User();
$table = "feedback";
if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $res=$user->delete_viewFeedback($table,$id);
 if($res)
 {
  ?>
  <script>
  alert('Record Deleted ...')
        window.location='viewFeedback.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Record can not Deleted !!!')
        window.location='viewFeedback.php'
        </script>
  <?php
 }
}