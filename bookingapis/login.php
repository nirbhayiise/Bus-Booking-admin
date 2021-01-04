<?php
include('dbcon.php');

    $email = $_REQUEST['mail'];
    $password = $_REQUEST['password'];
	
	
    $check = mysqli_query($db,"select * from user where email= '".$email."' and pass='".$password."' and u_status='1'");    
    $num_count = mysqli_num_rows($check);
    if($num_count == 1){
	$rowInfo = mysqli_fetch_array($check); 
	
	$status = "1";
	    $msg = "success";
		$arr['response']['status']=$status;
        	$arr['response']['message']=$msg;  
	$arr['response']['id'] 		= $rowInfo['u_id'];
            	$arr['response']['name'] 		= $rowInfo['u_name'];
				
				$arr['response']['aadress'] 			= $rowInfo['u_add'];
				$arr['response']['mobile'] 			= $rowInfo['u_mob'];
	
		$arr['response']['email'] 			= $rowInfo['email'];
	
				$arr['response']['pass'] 		= $rowInfo['pass'];
				
	$json = json_encode($arr);
		echo $json;
		
	}else{
    $status = "0";
     	$msg = "Email not varified. Please check your email ";
     	$arr['response']['status']=$status;
     	$arr['response']['message']=$msg;
        $arr['response']['data'] = array();
         
     	$json = json_encode($arr);
     	echo $json;
	}

?>