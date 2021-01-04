<?php
include_once("database/dbconfig.php");
$i=0;
$arr=array();

 

$mob  = $_REQUEST['mob'];





$sql1= "SELECT * FROM enrollment WHERE MOBILE_NO ='$mob'";
$check = mysql_query($sql1);

 $num_count = mysql_num_rows($check);

if($num_count)
{

 
  $status = "1";	
 $msg = "Successfully got cities.";	
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg;

while($rowInfo = mysql_fetch_array($check)) {
    

$arr['response']['data']['OTP'] = $rowInfo['OTP'];
 $i++;
}
      $json = json_encode($arr);
 echo $json;
    

 }
 else
 {
  $status = "0";	
 $msg = "Doesn't get city list.";
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg; 
  $json = json_encode($arr);     	
 echo $json;
 }
 
 ?>
