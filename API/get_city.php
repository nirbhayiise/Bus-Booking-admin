<?php
include_once("database/dbconfig.php");
$i=0;
$arr=array();

 

$state_id  = $_REQUEST['state_id'];





$sql1= "SELECT * FROM cities WHERE stateID ='$state_id'";
$check = mysql_query($sql1);

 $num_count = mysql_num_rows($check);

if($num_count)
{

 
  $status = "1";	
 $msg = "Successfully got cities.";	
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg;

while($rowInfo = mysql_fetch_array($check)) {
    
 $arr['response']['data'][$i]['id'] = $rowInfo['id'];
$arr['response']['data'][$i]['name'] = $rowInfo['name'];
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
