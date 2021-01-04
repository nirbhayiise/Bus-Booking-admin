<?php
include_once("database/dbconfig.php");

$i=0;
$arr=array();
$OTP= $_REQUEST['OTP'];
$user_mobile= $_REQUEST['user_mobile'];

if(!empty($OTP))
{ 
    
	
	$result = mysql_query("SELECT *FROM enrollment WHERE MOBILE_NO ='$user_mobile'");
	
	$rowdata=mysql_num_rows($result);
	
	
if($rowdata==0) {
     
   
		
		
			$status = "0";
			$msg = "Mobile Number not registered.";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;   
			
				
		
   
		$json = json_encode($arr);
		echo $json;
} else {
   
$query = "SELECT * FROM enrollment WHERE MOBILE_NO ='$user_mobile'";

$result = mysql_query($query);
$rowInfo= mysql_fetch_assoc($result);
      $getOTP=$rowInfo["OTP"];
    
  if($OTP == $getOTP)
    {
			$status = "1";
			$msg = "User Authenticated.";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;   
			  
   $cityTem=getCityName($rowInfo['CITY']);
    $stateTem=getStateName($rowInfo['STATE']);
   $arr['response']['data']['USER_ID'] = $rowInfo['CONTRACTOR_ID'];
   $arr['response']['data']['ENROLL_TYPE'] = $rowInfo['ENROLL_TYPE'];
   $arr['response']['data']['USER_NAME'] = $rowInfo['CONTACT_PERSON'];
   $arr['response']['data']['STORE_NAME'] = $rowInfo['STORE_NAME'];
    $arr['response']['data']['HOUSE_NO'] = $rowInfo['ADDRESS_1'];
    $arr['response']['data']['LOCALITY'] = $rowInfo['ADDRESS_2'];
    $arr['response']['data']['STATE'] = $stateTem;
   $arr['response']['data']['CITY'] = $cityTem;
    $arr['response']['data']['PINCODE'] = $rowInfo['PINCODE'];
   $arr['response']['data']['GSTIN'] = $rowInfo['GSTIN'];
  $arr['response']['data']['TOTAL_INVOICES'] = $rowInfo['TOTAL_INVOICES'];
  $arr['response']['data']['TOTAL_POINTS'] = $rowInfo['TOTAL_POINTS'];
  $arr['response']['data']['POINTS_REDEEMED'] = $rowInfo['POINTS_REDEEMED'];
  $arr['response']['data']['POINTS_BALANCE'] = $rowInfo['POINTS_BALANCE'];
  $arr['response']['data']['MOBILE_NO'] = $rowInfo['MOBILE_NO'];
  
  }
  else{
	  $status = "0";
     $msg = "Incorrect OTP.";
     $arr['response']['status']=$status;
     $arr['response']['message']=$msg; 
  }
   
 $json = json_encode($arr);	
 echo $json;
}
	
	
	

}else{
     $status = "0";
     $msg = "Incorrect OTP.";
     $arr['response']['status']=$status;
     $arr['response']['message']=$msg;

         
     $json = json_encode($arr);
     echo $json;
}
function getCityName($idCty)
{
	$query = "SELECT * FROM cities WHERE id= '$idCty' ";
$result = mysql_query($query);
$res = mysql_fetch_assoc($result);

$nameCity=$res["name"]; 
	return $nameCity; 
}
function getStateName($stateId)
{
$query = "SELECT * FROM states WHERE id='$stateId'";
$result = mysql_query($query);
$res = mysql_fetch_assoc($result);

$stateName=$res["name"]; 
	return $stateName; 

}
?>