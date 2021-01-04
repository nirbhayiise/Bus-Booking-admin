<?php
include_once("database/dbconfig.php");
$i=1;
$arr=array();

 

$PRO_TYPE_ID  = $_REQUEST['PRO_TYPE_ID'];


$sql1= "SELECT * FROM productsize WHERE PRO_TYPE_ID ='$PRO_TYPE_ID'";
$check = mysql_query($sql1);

 $num_count = mysql_num_rows($check);

if($num_count)
{

  $status = "1";	
 $msg = "Successfully got PRODUCT Sizes.";	
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg;
    $arr['response']['data'][0]['PRO_SIZE_ID'] = '0';
    $arr['response']['data'][0]['PRO_SIZE'] = 'Select Product Size';
while($rowInfo = mysql_fetch_array($check)) {
    
 $arr['response']['data'][$i]['PRO_SIZE_ID'] = $rowInfo['PRO_SIZE_ID'];
$arr['response']['data'][$i]['PRO_SIZE'] = $rowInfo['PRO_SIZE'];
 $i++;
}
      $json = json_encode($arr);
 echo $json;
    

 }
 else
 {
  $status = "0";	
 $msg = "Doesn't get PRODUCT Sizes.";
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg; 
  $json = json_encode($arr);     	
 echo $json;
 }
 
 ?>
