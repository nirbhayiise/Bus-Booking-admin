<?php


$mobi=$_REQUEST['mob'];
$mg=$_REQUEST['message'];

 $url1="http://www.smszone.in/sendsms.asp?page=SendSmsBulk&username=918377990404&password=18D4&number=".$mobi."&message=".urlencode($mg)."";

//$url1="http://smsmedia.online/vendorsms/pushsms.aspx?user=mobilehub&password=RW99QD3T&msisdn=".$mobi."&sid=SWMHUB&msg=".urlencode($mg)."&fl=0&gwid=2";

//$url1="http://manage.opitsolution.com/index.php/smsapi/httpapi/?uname=greenf&password=B@B@1234&sender=GREENF&receiver="."91".$mobi."&route=TA&msgtype=1&sms=".urlencode($mg)."";
//$url1="http://indsm.opitsolution.com/api/mt/SendSMS?user=oism501&password=wash@123&senderid=GFRIST&channel=Trans&DCS=0&flashsms=0&number=".$mobi."&text=".urlencode($mg)."&route=3";



    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
 
    $output=curl_exec($ch);
 
    curl_close($ch);
   



?>     