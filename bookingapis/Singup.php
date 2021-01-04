<?php
include('dbcon.php');

$i=0;
$arr=array();
$name= $_REQUEST['name'];
$address= $_REQUEST['address'];

$mobile= $_REQUEST['mobile'];

$mail= $_REQUEST['mail'];
$pass= $_REQUEST['pass'];

if(!empty($name) && !empty($address) && !empty($mobile) && !empty($mail) && !empty($pass))
{ 
    
$rendStr=mt_rand(1000,9999);  
$date1 =getDatetimeNow();
$qrystr="insert into user (u_name,u_mob,u_add,email,pass,u_status) Values ('$name','$mobile','$address','$mail','$pass','1')";
  
   $qry = mysqli_query($db,$qrystr); 
        
		$addressId = mysqli_insert_id($db);
		if($addressId>0){
		
		
			$status = "1";
			$msg = "Singup successfully .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;   
			
			
				
		}else{
			$status = "0";
			$msg = "failed Singup.";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			 $arr['response']['OTP']='not found';  
						
		}
   
		$json = json_encode($arr);
		echo $json;

}else{
     $status = "0";
     $msg = "missing some required parameter.";
     $arr['response']['status']=$status;
     $arr['response']['message']=$msg;

         
     $json = json_encode($arr);
     echo $json;
}

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Kolkata');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}

?>