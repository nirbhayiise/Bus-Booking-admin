<?php

include_once("database/dbconfig.php");

$arr=array();

 

$PRO_ID  = $_REQUEST['PRO_ID'];


$sql1= "SELECT * FROM producttype WHERE PRO_ID ='$PRO_ID'";
    //echo $sql1;
    
$check = mysql_query($sql1);

 $num_count = mysql_num_rows($check);

if($num_count)
{

	$status = "1";	
	$msg = "Successfully got PRODUCT TYPES.";	
	$arr['response']['status']=$status;     
	$arr['response']['message']=$msg;
	$i=1;
	$arr['response']['data'][0]['PRO_TYPE_ID'] = '0';
	$arr['response']['data'][0]['PRO_TYPE_NAME'] = 'Select Product Type';
	while($rowInfo = mysql_fetch_array($check)) 
	{
		// echo "xxxxx";
		//echo $rowInfo['PRO_TYPE_NAME'];
		//echo '</br>';
		$arr['response']['data'][$i]['PRO_TYPE_ID'] = $rowInfo['PRO_TYPE_ID'];
		$arr['response']['data'][$i]['PRO_TYPE_NAME'] = $rowInfo['PRO_TYPE_NAME'];
		$i++;
		//echo $rowInfo['PRO_TYPE_NAME'];
	}
    
	//print_r($arr);
	$json = json_encode($arr);
 	echo $json;
    

 }
 else
 {
  $status = "0";	
 $msg = "Doesn't get PRODUCT TYPES.";
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg; 
  $json = json_encode($arr);     	
 echo $json;
 }
 
 ?>
