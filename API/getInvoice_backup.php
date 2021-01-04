<?php
	include_once("database/dbconfig.php");
	$uploads_dir1="http://" . $_SERVER['SERVER_NAME']."/uploads/";

	$i=0;
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
   
   
   

   
   
  /* $flag= mobileIdFinder($user_mobile,$statusType);
   
   if($flag>0)
   {*/
    
   if(!empty($user_mobile))
   {
	   if($user_type == 'Fabricator')
	   $quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' and FAB_INV_DATE <> '') "; 
	   else
	   $quryStr="SELECT * FROM invoice WHERE (RET_MOBILE ='$user_mobile' and RET_INV_DATE <> '' ) "; 

   }
   //echo $quryStr;
   
   
   
   if(!empty($user_mobile) && !empty($statusType)&& $statusType!='null')
   {
	   
	   if($statusType=='All')
		{
			if($user_type == 'Fabricator'){
			$quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' and FAB_INV_DATE != '') "; 
			}
			else
			$quryStr="SELECT * FROM invoice WHERE (RET_MOBILE ='$user_mobile' and RET_INV_DATE <> '' ) "; 	   
		}
	    else
		{
			if($user_type == 'Fabricator')
			$quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' and FAB_INV_DATE <> '') and INV_STATUS_TYPE='$statusType'"; 
			else
			$quryStr="SELECT * FROM invoice WHERE (RET_MOBILE ='$user_mobile' and RET_INV_DATE <> '' ) and INV_STATUS_TYPE='$statusType'"; 
	   }
	   
   }
   if(!empty($user_mobile) && !empty($startDate) && !empty($endDate) && $startDate!='null' && $endDate!='null')
   {
	 //$quryStr="SELECT * FROM invoice WHERE FAB_MOBILE ='$user_mobile' or RET_MOBILE ='$user_mobile' and (CAST(RET_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE)) ";  
	 if($user_type == 'Fabricator'){
	 	$quryStr="SELECT * FROM invoice WHERE (FAB_MOBILE ='$user_mobile' and (CAST(FAB_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE)))"; 
	 }else{
	 	$quryStr="SELECT * FROM invoice WHERE (RET_MOBILE ='$user_mobile' and (CAST(RET_INV_DATE As DATE) BETWEEN CAST('$startDate' As DATE) and CAST('$endDate' As DATE))";  
	 }
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

echo $quryStr;
die;
	
$check = mysql_query($quryStr);
$num_count = mysql_num_rows($check);

if($num_count > 0) {
	    $status = "1";
	$msg = "success";
    $arr['response']['message'] = $msg; 
    $arr['response']['status'] = $status; 
	while($rowInfo = mysql_fetch_array($check)) {
   		
		
		$fab_name = $rowInfo['FAB_NAME'];
		if($fab_name == '')
		{
			$fab_mobile = $rowInfo['FAB_MOBILE'];
			$q = "select CONTACT_PERSON from enrollment where ENROLL_TYPE = 'Fabricator' AND MOBILE_NO='".$fab_mobile."'";
			$result=mysql_query($q);
			$r = mysql_fetch_assoc($result);
			$fab_name = $r['CONTACT_PERSON'];
		}
		
	
		
		
		$ret_name = $rowInfo['RET_NAME'];
		if($ret_name == '')
		{
			$ret_mobile = $rowInfo['RET_MOBILE'];
			$q = "select CONTACT_PERSON from enrollment where ENROLL_TYPE = 'Retailer' AND MOBILE_NO='".$ret_mobile."'";
			$result=mysql_query($q);
			$r = mysql_fetch_assoc($result);
			$ret_name = $r['CONTACT_PERSON'];
		}

		
		
		
		

        //$fabNo=$rowInfo['FAB_INV_NO']
		if($user_type = "Fabricator")
		{
			$arr['response']['data'][$i]['INV_ID'] = $rowInfo['INV_ID'];
        $arr['response']['data'][$i]['FAB_NAME'] = $fab_name;//$rowInfo['FAB_NAME'];
        $arr['response']['data'][$i]['FAB_MOBILE'] = $rowInfo['FAB_MOBILE'];
        $arr['response']['data'][$i]['FAB_POINTS'] = $rowInfo['FAB_POINTS'];
        $arr['response']['data'][$i]['FAB_PRO_WT'] = $rowInfo['FAB_PRO_WT'];
        $arr['response']['data'][$i]['FAB_INV_IMG'] = $uploads_dir1.$rowInfo['FAB_INV_IMG'];
        $arr['response']['data'][$i]['FAB_INV_DATE'] = $rowInfo['FAB_INV_DATE'];//date("Y-m-d",strtotime($rowInfo['FAB_INV_DATE']));
        $arr['response']['data'][$i]['FAB_INV_NO'] = $rowInfo['FAB_INV_NO'];
        $arr['response']['data'][$i]['FAB_INV_VALUE'] = $rowInfo['FAB_INV_VALUE'];
        $arr['response']['data'][$i]['FAB_PRO_NAME'] = $rowInfo['FAB_PRO_NAME'];
        $arr['response']['data'][$i]['FAB_PRO_TYPE'] = $rowInfo['FAB_PRO_TYPE'];
        $arr['response']['data'][$i]['FAB_PRO_SIZE'] = $rowInfo['FAB_PRO_SIZE'];
        $arr['response']['data'][$i]['FAB_PRO_QTY'] = $rowInfo['FAB_PRO_QTY'];
        $arr['response']['data'][$i]['RET_NAME'] = $ret_name;//$rowInfo['RET_NAME'];
        $arr['response']['data'][$i]['RET_MOBILE'] = $rowInfo['RET_MOBILE'];
        $arr['response']['data'][$i]['RET_POINTS'] = $rowInfo['RET_POINTS'];
        $arr['response']['data'][$i]['RET_PRO_WT'] = $rowInfo['RET_PRO_WT'];
        $arr['response']['data'][$i]['RET_INV_IMG'] = $uploads_dir1.$rowInfo['RET_INV_IMG'];
        $arr['response']['data'][$i]['RET_INV_DATE'] = $rowInfo['RET_INV_DATE'];//date("Y-m-d",strtotime($rowInfo['RET_INV_DATE']));
        $arr['response']['data'][$i]['RET_INV_NO'] = $rowInfo['RET_INV_NO'];
        $arr['response']['data'][$i]['RET_INV_VALUE'] = $rowInfo['RET_INV_VALUE'];
        $arr['response']['data'][$i]['RET_PRO_NAME'] = $rowInfo['RET_PRO_NAME'];
        $arr['response']['data'][$i]['RET_PRO_TYPE'] = $rowInfo['RET_PRO_TYPE'];
        $arr['response']['data'][$i]['RET_PRO_SIZE'] = $rowInfo['RET_PRO_SIZE'];
        $arr['response']['data'][$i]['RET_PRO_QTY'] = $rowInfo['RET_PRO_QTY'];
        $arr['response']['data'][$i]['INV_STATUS_TYPE'] = $rowInfo['INV_STATUS_TYPE'];
        $arr['response']['data'][$i]['INV_STATUS'] = $rowInfo['INV_STATUS'];
		}
		else if($user_type = "Retailer")
		{
		
			
          $arr['response']['data'][$i]['INV_ID'] = $rowInfo['INV_ID'];
         $arr['response']['data'][$i]['FAB_NAME'] = $fab_name;//$rowInfo['FAB_NAME'];
         $arr['response']['data'][$i]['FAB_MOBILE'] = $rowInfo['FAB_MOBILE'];
         $arr['response']['data'][$i]['FAB_POINTS'] = $rowInfo['FAB_POINTS'];
         $arr['response']['data'][$i]['FAB_PRO_WT'] = $rowInfo['FAB_PRO_WT'];
         $arr['response']['data'][$i]['FAB_INV_IMG'] = $uploads_dir1.$rowInfo['FAB_INV_IMG'];
         $arr['response']['data'][$i]['FAB_INV_DATE'] =$rowInfo['FAB_INV_DATE'];//date("Y-m-d",strtotime($rowInfo['FAB_INV_DATE']));
         $arr['response']['data'][$i]['FAB_INV_NO'] = $rowInfo['FAB_INV_NO'];
         $arr['response']['data'][$i]['FAB_INV_VALUE'] = $rowInfo['FAB_INV_VALUE'];
         $arr['response']['data'][$i]['FAB_PRO_NAME'] = $rowInfo['FAB_PRO_NAME'];
         $arr['response']['data'][$i]['FAB_PRO_TYPE'] = $rowInfo['FAB_PRO_TYPE'];
         $arr['response']['data'][$i]['FAB_PRO_SIZE'] = $rowInfo['FAB_PRO_SIZE'];
         $arr['response']['data'][$i]['FAB_PRO_QTY'] = $rowInfo['FAB_PRO_QTY'];
         $arr['response']['data'][$i]['RET_NAME'] = $ret_name;//$rowInfo['RET_NAME'];
         $arr['response']['data'][$i]['RET_MOBILE'] = $rowInfo['RET_MOBILE'];
         $arr['response']['data'][$i]['RET_POINTS'] = $rowInfo['RET_POINTS'];
         $arr['response']['data'][$i]['RET_PRO_WT'] = $rowInfo['RET_PRO_WT'];
         $arr['response']['data'][$i]['RET_INV_IMG'] = $uploads_dir1.$rowInfo['RET_INV_IMG'];
         $arr['response']['data'][$i]['RET_INV_DATE'] = $rowInfo['RET_INV_DATE'];//date("Y-m-d",strtotime($rowInfo['RET_INV_DATE']));
         $arr['response']['data'][$i]['RET_INV_NO'] = $rowInfo['RET_INV_NO'];
         $arr['response']['data'][$i]['RET_INV_VALUE'] = $rowInfo['RET_INV_VALUE'];
         $arr['response']['data'][$i]['RET_PRO_NAME'] = $rowInfo['RET_PRO_NAME'];
         $arr['response']['data'][$i]['RET_PRO_TYPE'] = $rowInfo['RET_PRO_TYPE'];
         $arr['response']['data'][$i]['RET_PRO_SIZE'] = $rowInfo['RET_PRO_SIZE'];
         $arr['response']['data'][$i]['RET_PRO_QTY'] = $rowInfo['RET_PRO_QTY'];
         $arr['response']['data'][$i]['INV_STATUS_TYPE'] = $rowInfo['INV_STATUS_TYPE'];
         $arr['response']['data'][$i]['INV_STATUS'] = $rowInfo['INV_STATUS'];
		}
		
		
		$i++;
    }
		
    $json = json_encode($arr);
	echo $json;
}else{
	$status = "0";
	$msg = "Data Not Found";
	$arr['response']['status']  = $status;
	$arr['response']['message'] = $msg;
	$arr['response']['data'] 	= array();
 
	$json = json_encode($arr);
	echo $json;
}


function downloadImage($url,$imgaepath)
{
    
 $ch = curl_init($url);
$fp = fopen($imgaepath, 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);
}

function save_image($inPath,$outPath)
{
$filename =$inPath ;
// Specify file path.
$path = $outPath; // '/uplods/'
$download_file =  $path.$filename;

if(!empty($filename)){
    // Check file is exists on given path.
    if(file_exists($download_file))
    {
      header('Content-Disposition: attachment; filename=' . $filename);  
      readfile($download_file); 
      exit;
    }
    else
    {
      echo 'File does not exists on given path';
    }
}}


/*function mobileIdFinder($mob,$typeUser)
{
	if($typeUser == 'Fabricator')
	{
		$sql3 = "SELECT INV_ID FROM invoice WHERE FAB_MOBILE ='$mob' AND ENROLL_TYPE='$typeUser' AND FAB_INV_NO!==''";		
	}
	else
	{
		$sql3 = "SELECT INV_ID FROM invoice WHERE RET_MOBILE ='$mob' AND ENROLL_TYPE='$typeUser' AND RET_INV_NO!==''";	
	}
	
	

$check3 = mysql_query($sql3);
$row_city = mysql_num_rows($check3);
$rowInfo3 = mysql_fetch_array($check3);
$mob_id = $rowInfo3['INV_ID']; 

return $mob_id;	
}*/
?>