<?php
include_once("database/dbconfig.php");
$i=0;
$arr=array();

 $PRO_ID  = $_REQUEST['PRO_ID'];
$PRO_TYPE_ID  = $_REQUEST['PRO_TYPE_ID'];
$PRO_SIZE_ID  = $_REQUEST['PRO_SIZE_ID'];


$sql1= "SELECT * FROM productweight WHERE PRO_ID ='$PRO_ID' and PRO_TYPE_ID ='$PRO_TYPE_ID' and PRO_SIZE_ID ='$PRO_SIZE_ID'";
$check = mysql_query($sql1);

 $num_count = mysql_num_rows($check);

if($num_count)
{

  $status = "1";	
 $msg = "Successfully got PRODUCT weight.";	
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg;

while($rowInfo = mysql_fetch_array($check)) {
    
 $arr['response']['data'][$i]['PRO_WT_ID'] = $rowInfo['PRO_WT_ID'];
$arr['response']['data'][$i]['PRO_WT'] = $rowInfo['PRO_WT'];
 $i++;
}
      $json = json_encode($arr);
 echo $json;
    

 }
 else
 {
  $status = "0";	
 $msg = "Doesn't get PRODUCT weight.";
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg; 
  $json = json_encode($arr);     	
 echo $json;
 }
 
 ?>
