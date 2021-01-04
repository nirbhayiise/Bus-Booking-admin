<?php
include_once("database/dbconfig.php");
$i=0;
$arr=array();

 

$country_id  = "101";


$sql1= "SELECT * FROM states WHERE countryID ='$country_id'";
$check = mysql_query($sql1);

 $num_count = mysql_num_rows($check);

if($num_count)
{


 
  
  $status = "1";	
 $msg = "Successfully got states";	
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
 $msg = "Doesn't get states list.";
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg; 
  $json = json_encode($arr);     	
 echo $json;
 }
 
 ?>
