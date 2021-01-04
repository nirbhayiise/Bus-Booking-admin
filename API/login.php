<?php
error_reporting(E_ALL);



$con = mysqli_connect("localhost","root","root","admin_everest");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
	  //echo 'loko';
  }
$i=0;
$arr=array();

 
//$user_email  = $_REQUEST['user_email'];
//$user_password  = $_REQUEST['user_password'];
//$token= $_REQUEST['token'];
$user_mobile  = $_REQUEST['user_mobile'];



$result = mysqli_query($con, "SELECT * FROM enrollment WHERE MOBILE_NO ='$user_mobile'");
$rowdata=mysqli_num_rows($result);




if($rowdata)
{
	
	$sql1="SELECT * from enrollment where MOBILE_NO='$user_mobile'";
	
	
	
	
	
	$check = mysqli_query($con, $sql1);    
	$rowInfo = mysqli_fetch_array($check); 	   
	
	//print_r($rowInfo);
	
	$num_count = mysqli_num_rows($check);  
	
	
	$status = "1";	
	$msg = "User Login Successful";	
	$arr['response']['status']=$status;     
	$arr['response']['message']=$msg;
	
	if($rowInfo['TOTAL_INVOICES'] == '')
	{
	 $rowInfo['TOTAL_INVOICES'] =  "0";
	}
	
	if($rowInfo['TOTAL_POINTS'] == '')
	{
	 $rowInfo['TOTAL_POINTS'] =  "0";
	}
	
	if($rowInfo['ENROLL_TYPE'] == 'Fabricator')
	{
		$sql1_tot="SELECT count(*) as cnt from  invoice  where FAB_MOBILE='$user_mobile' AND FAB_INV_NO !=''";
		$result100=mysqli_query($con,$sql1_tot);
		$rowInfo100 = mysqli_fetch_array($result100); 	
		$num_count_tot = $rowInfo100['cnt'];
	}else{
		$sql1_tot="SELECT count(*) as cnt from  invoice  where RET_MOBILE='$user_mobile' AND RET_INV_NO !=''";
		$result100=mysqli_query($con,$sql1_tot);
		$rowInfo100 = mysqli_fetch_array($result100); 
		$num_count_tot = $rowInfo100['cnt'];	
	}
	 
	 
 
	$cityTem=getCityName($rowInfo['CITY']);
	$stateTem=getStateName($rowInfo['STATE']);
	$arr['response']['data'][$i]['USER_ID'] = $rowInfo['CONTRACTOR_ID'];
	$arr['response']['data'][$i]['ENROLL_TYPE'] = $rowInfo['ENROLL_TYPE'];
	$arr['response']['data'][$i]['USER_NAME'] = $rowInfo['CONTACT_PERSON'];
	$arr['response']['data'][$i]['STORE_NAME'] = $rowInfo['STORE_NAME'];
	$arr['response']['data'][$i]['HOUSE_NO'] = $rowInfo['ADDRESS_1'];
	$arr['response']['data'][$i]['LOCALITY'] = $rowInfo['ADDRESS_2'];
	$arr['response']['data'][$i]['STATE'] = $stateTem;
	$arr['response']['data'][$i]['CITY'] = $cityTem;
	$arr['response']['data'][$i]['STATE_ID'] = $rowInfo['STATE'];
	$arr['response']['data'][$i]['CITY_ID'] = $rowInfo['CITY'];
	$arr['response']['data'][$i]['PINCODE'] = $rowInfo['PINCODE'];
	$arr['response']['data'][$i]['GSTIN'] = $rowInfo['GSTIN'];
	$arr['response']['data'][$i]['TOTAL_INVOICES'] = $num_count_tot;//$rowInfo['TOTAL_INVOICES'];
	$arr['response']['data'][$i]['TOTAL_POINTS'] = $rowInfo['TOTAL_POINTS'];
	$arr['response']['data'][$i]['POINTS_REDEEMED'] = $rowInfo['POINTS_REDEEMED'];
	$arr['response']['data'][$i]['POINTS_BALANCE'] = $rowInfo['POINTS_BALANCE'];
	$arr['response']['data'][$i]['MOBILE_NO'] = $rowInfo['MOBILE_NO'];
	$arr['response']['data'][$i]['VERSION_CODE'] = '16';
	$json = json_encode($arr);
	echo $json;
	
	
	date_default_timezone_set('Asia/Kolkata');
	$sql_test = "INSERT INTO  login_tracking (mobile) VALUES ('".$user_mobile."')";
	mysqli_query($con, $sql_test); 
    
 }
 else
 {
  $status = "0";	
 $msg = "User does not exist";
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg; 
  $json = json_encode($arr);     	
 echo $json;
 }
 
 
 function getCityName($idCty)
{
	$con = mysqli_connect("localhost","root","root","admin_everest");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
	  //echo 'loko';
  }
	$query = "SELECT * FROM cities WHERE id= '$idCty' ";
	$result = mysqli_query($con, $query);
	$res = mysqli_fetch_assoc($result);

$nameCity=$res["name"]; 
	return $nameCity; 
}
function getStateName($stateId)
{
	$con = mysqli_connect("localhost","root","root","admin_everest");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
	  //echo 'loko';
  }
$query = "SELECT * FROM states WHERE id='$stateId'";
$result = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($result);

$stateName=$res["name"]; 
	return $stateName; 

}


/*
function sendOTP($mob)
{
$rendStr=rand(1000,9999);
$curl = curl_init();
		
		$msg = urlencode('Your OTP is '.$rendStr);
		
		curl_setopt($curl, CURLOPT_URL,'https://alerts.solutionsinfini.com/api/v4/?%20api_key=A07828fe31c451c1fd2a06cb129844c31&method=sms&message=Your+OTP+is+'.$rendStr.'&to='.$mob.'&sender=EVERST');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		$qry="UPDATE enrollment SET OTP='$rendStr' WHERE MOBILE_NO= '$mob'";
		$check1 = mysql_query($qry);
	
}
*/
 ?>
