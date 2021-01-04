<?php

include_once 'include/class.php';

$user = new User();
$table = "ticket_booking";
if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $res=$user->delete_ticket_booking($table,$id);
 if($res)
 {
  ?>
  <script>
  alert('Record Deleted ...')
        window.location='listTicketBooking.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Record can not Deleted !!!')
        window.location='listTicketBooking.php'
        </script>
  <?php
 }
}