<?php
include('dbcon.php');

$i=0;
$arr=array();
$b_uid= $_REQUEST['b_uid'];
$b_passanger_name= $_REQUEST['b_passanger_name'];

$b_mob= $_REQUEST['b_mob'];
$b_from= $_REQUEST['b_from'];

$b_to= $_REQUEST['b_to'];
$b_date= $_REQUEST['b_date'];



$b_date_of_jry= $_REQUEST['b_date_of_jry'];
$b_fare= $_REQUEST['b_fare'];

$b_dist= $_REQUEST['b_dist'];
$pass= $_REQUEST['pass'];

$b_bus_id= $_REQUEST['b_bus_id'];
$b_status= $_REQUEST['b_status'];

if(!empty($b_uid) && !empty($b_passanger_name) && !empty($b_mob) && !empty($b_from) && !empty($b_to) && !empty($b_date) && !empty($b_date_of_jry) && !empty($b_fare)
&& !empty($b_dist)
&& !empty($pass)&& !empty($b_bus_id))
{ 
    
$rendStr=mt_rand(1000,9999);  
$date1 =getDatetimeNow();
$qrystr="insert into ticket_booking (b_uid,b_passanger_name,b_mob,b_from,b_to,b_date,b_date_of_jry,b_fare,b_dist,b_bus_id,b_status) Values 
('$b_uid','$b_passanger_name','$b_mob','$b_from','$b_to','$b_date','$b_date_of_jry','$b_fare','$b_dist','$pass','$b_bus_id','1')";
  
   $qry = mysqli_query($db,$qrystr); 
        
		$addressId = mysqli_insert_id($db);
		if($qry){
		
		
			$status = "1";
			$msg = "Booking successfully .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;   
			
			//Query for OTP find and send 
			
				
		}else{
			$status = "0";
			$msg = "Failed Booking.";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			
						
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