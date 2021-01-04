<?php
include_once("database/dbconfig.php");
$i=1;
$arr=array();

 







  $sql1=  "SELECT * FROM product";

 $check = mysql_query($sql1);    
  
 	   
 $num_count = mysql_num_rows($check);  
 if($num_count)
{
  
  $status = "1";	
 $msg = "Successfully got products list";	
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg;
    $arr['response']['data'][0]['PRO_ID'] = '0';
    $arr['response']['data'][0]['PRO_NAME'] = 'Select Product';
while($rowInfo = mysql_fetch_array($check)) {
    
 $arr['response']['data'][$i]['PRO_ID'] = $rowInfo['PRO_ID'];
$arr['response']['data'][$i]['PRO_NAME'] = $rowInfo['PRO_NAME'];
 $i++;
}
      $json = json_encode($arr);
 echo $json;
    

 }
 else
 {
  $status = "0";	
 $msg = "Doesn't get products list.";
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg; 
  $json = json_encode($arr);     	
 echo $json;
 }
 
 ?>
