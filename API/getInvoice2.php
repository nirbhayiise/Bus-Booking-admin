<?php
include_once("database/dbconfig.php");
 $uploads_dir1="http://" . $_SERVER['SERVER_NAME']."/uploads/";

$quryStr="";
$j=0;
$arr=array();
$arr1=array();
    $Flag = "";
 
   $user_mobile  = $_REQUEST['user_mobile'];
   $startDate  = $_REQUEST['startDate'];
   $endDate  = $_REQUEST['endDate'];
   $statusType  = $_REQUEST['statusType'];
   $user_type  = $_REQUEST['user_type'];
   if(!empty($user_mobile))
   {
	 // $mobiletemp=$user_mobile;
	   $quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile') "; 
   }
   if(!empty($user_mobile) && !empty($statusType)&& $statusType!='null')
   {
	   if($statusType=='All')
	   {
	    $quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile')";   
	   }
	      else{
		   $quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile') and INV_STATUS_TYPE='$statusType' and ENROLL_TYPE='$user_type'";   
	   }
   }
   if(!empty($user_mobile) && !empty($startDate) && !empty($endDate) && $startDate!='null' && $endDate!='null')
   {
	 $quryStr="SELECT * FROM invoice WHERE FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile' and (CAST(RET_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE)) ";  
   }
   
   if(!empty($user_mobile) && !empty($startDate) && !empty($endDate) && $startDate!='null' && $endDate!='null' && !empty($statusType) && $statusType!='null')
   {
	    if($statusType=='All')
	   {
	    $quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile') and (CAST(RET_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE))";   
	   }
	      else{
		    $quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile') and (CAST(RET_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE)) and INV_STATUS_TYPE = '$statusType'";  
	   }
	   
	
   }

//$ret_user_mobile  = $_REQUEST['ret_user_mobile'];
/*
if($statusType == "All" || $statusType == "null")
{
$statusType = "";
}

if((!empty($startDate) )&& (!empty($endDate)) && (!empty($statusType)))
{
   $check ="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile') and (CAST(RET_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE)) and INV_STATUS_TYPE = '$statusType'" ;
}
else if((!empty($startDate) )&& (!empty($endDate)))
 {
 $check ="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile') and CAST(RET_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE)" ; 
 
 
 }
 else if(!empty($statusType))
 {
 $check = "SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile') and INV_STATUS_TYPE = '$statusType'";

 }
 else
 {
 $check = "SELECT * FROM invoice WHERE FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile'";
     
 }
*/
 $result=mysql_query($quryStr);

 $num_count = mysql_num_rows($result);  
 
 if($num_count>0)
 {		

     $i=0;
     while($rowInfo = mysql_fetch_array($result)) {
		 
		 if(!empty($rowInfo['INV_ID']))
		 {
		 $status = "1";	
 $msg = "success";	
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg;  
    if ($user_type = "Fabricator" && !empty($rowInfo['FAB_INV_NO']))
    {
        $arr['response']['data'][$i]['INV_ID'] = $rowInfo['INV_ID'];
        $arr['response']['data'][$i]['FAB_NAME'] = $rowInfo['FAB_NAME'];
        $arr['response']['data'][$i]['FAB_MOBILE'] = $rowInfo['FAB_MOBILE'];
        $arr['response']['data'][$i]['FAB_POINTS'] = $rowInfo['FAB_POINTS'];
        $arr['response']['data'][$i]['FAB_PRO_WT'] = $rowInfo['FAB_PRO_WT'];
        $arr['response']['data'][$i]['FAB_INV_IMG'] = $uploads_dir1.$rowInfo['FAB_INV_IMG'];
        $arr['response']['data'][$i]['FAB_INV_DATE'] = $rowInfo['FAB_INV_DATE'];
        $arr['response']['data'][$i]['FAB_INV_NO'] = $rowInfo['FAB_INV_NO'];
        $arr['response']['data'][$i]['FAB_INV_VALUE'] = $rowInfo['FAB_INV_VALUE'];
        $arr['response']['data'][$i]['FAB_PRO_NAME'] = $rowInfo['FAB_PRO_NAME'];
        $arr['response']['data'][$i]['FAB_PRO_TYPE'] = $rowInfo['FAB_PRO_TYPE'];
        $arr['response']['data'][$i]['FAB_PRO_SIZE'] = $rowInfo['FAB_PRO_SIZE'];
        $arr['response']['data'][$i]['FAB_PRO_QTY'] = $rowInfo['FAB_PRO_QTY'];
        $arr['response']['data'][$i]['RET_NAME'] = $rowInfo['RET_NAME'];
        $arr['response']['data'][$i]['RET_MOBILE'] = $rowInfo['RET_MOBILE'];
        $arr['response']['data'][$i]['RET_POINTS'] = $rowInfo['RET_POINTS'];
        $arr['response']['data'][$i]['RET_PRO_WT'] = $rowInfo['RET_PRO_WT'];
        $arr['response']['data'][$i]['RET_INV_IMG'] = $uploads_dir1.$rowInfo['RET_INV_IMG'];
        $arr['response']['data'][$i]['RET_INV_DATE'] = $rowInfo['RET_INV_DATE'];
        $arr['response']['data'][$i]['RET_INV_NO'] = $rowInfo['RET_INV_NO'];
        $arr['response']['data'][$i]['RET_INV_VALUE'] = $rowInfo['RET_INV_VALUE'];
        $arr['response']['data'][$i]['RET_PRO_NAME'] = $rowInfo['RET_PRO_NAME'];
        $arr['response']['data'][$i]['RET_PRO_TYPE'] = $rowInfo['RET_PRO_TYPE'];
        $arr['response']['data'][$i]['RET_PRO_SIZE'] = $rowInfo['RET_PRO_SIZE'];
        $arr['response']['data'][$i]['RET_PRO_QTY'] = $rowInfo['RET_PRO_QTY'];
        $arr['response']['data'][$i]['INV_STATUS_TYPE'] = $rowInfo['INV_STATUS_TYPE'];
        $arr['response']['data'][$i]['INV_STATUS'] = $rowInfo['INV_STATUS'];
        $i++;

    }
     else if ($user_type = "Retailer" && empty($rowInfo['RET_INV_NO']))
     {
         $arr['response']['data'][$i]['INV_ID'] = $rowInfo['INV_ID'];
         $arr['response']['data'][$i]['FAB_NAME'] = $rowInfo['FAB_NAME'];
         $arr['response']['data'][$i]['FAB_MOBILE'] = $rowInfo['FAB_MOBILE'];
         $arr['response']['data'][$i]['FAB_POINTS'] = $rowInfo['FAB_POINTS'];
         $arr['response']['data'][$i]['FAB_PRO_WT'] = $rowInfo['FAB_PRO_WT'];
         $arr['response']['data'][$i]['FAB_INV_IMG'] = $uploads_dir1.$rowInfo['FAB_INV_IMG'];
         $arr['response']['data'][$i]['FAB_INV_DATE'] = $rowInfo['FAB_INV_DATE'];
         $arr['response']['data'][$i]['FAB_INV_NO'] = $rowInfo['FAB_INV_NO'];
         $arr['response']['data'][$i]['FAB_INV_VALUE'] = $rowInfo['FAB_INV_VALUE'];
         $arr['response']['data'][$i]['FAB_PRO_NAME'] = $rowInfo['FAB_PRO_NAME'];
         $arr['response']['data'][$i]['FAB_PRO_TYPE'] = $rowInfo['FAB_PRO_TYPE'];
         $arr['response']['data'][$i]['FAB_PRO_SIZE'] = $rowInfo['FAB_PRO_SIZE'];
         $arr['response']['data'][$i]['FAB_PRO_QTY'] = $rowInfo['FAB_PRO_QTY'];
         $arr['response']['data'][$i]['RET_NAME'] = $rowInfo['RET_NAME'];
         $arr['response']['data'][$i]['RET_MOBILE'] = $rowInfo['RET_MOBILE'];
         $arr['response']['data'][$i]['RET_POINTS'] = $rowInfo['RET_POINTS'];
         $arr['response']['data'][$i]['RET_PRO_WT'] = $rowInfo['RET_PRO_WT'];
         $arr['response']['data'][$i]['RET_INV_IMG'] = $uploads_dir1.$rowInfo['RET_INV_IMG'];
         $arr['response']['data'][$i]['RET_INV_DATE'] = $rowInfo['RET_INV_DATE'];
         $arr['response']['data'][$i]['RET_INV_NO'] = $rowInfo['RET_INV_NO'];
         $arr['response']['data'][$i]['RET_INV_VALUE'] = $rowInfo['RET_INV_VALUE'];
         $arr['response']['data'][$i]['RET_PRO_NAME'] = $rowInfo['RET_PRO_NAME'];
         $arr['response']['data'][$i]['RET_PRO_TYPE'] = $rowInfo['RET_PRO_TYPE'];
         $arr['response']['data'][$i]['RET_PRO_SIZE'] = $rowInfo['RET_PRO_SIZE'];
         $arr['response']['data'][$i]['RET_PRO_QTY'] = $rowInfo['RET_PRO_QTY'];
         $arr['response']['data'][$i]['INV_STATUS_TYPE'] = $rowInfo['INV_STATUS_TYPE'];
         $arr['response']['data'][$i]['INV_STATUS'] = $rowInfo['INV_STATUS'];
         $i++;
     }
		 }
		 else{
			
 $status = "0";	
 $msg = "Data not found";	
 $arr['response']['status']=$status;     
 $arr['response']['message']=$msg;  			
		 }
 }
 		$json = json_encode($arr);	
 echo $json;
 
 	
 }
 else{    $status = "0";   
 $msg = "No data for selected status.";     
 $arr['response']['status']=$status;    
 $arr['response']['message']=$msg;       
 $arr['response']['data'] = array();        
 $json = json_encode($arr);     	
 echo $json;	
 }	
   //echo "Fetched data successfully\n";
?>
