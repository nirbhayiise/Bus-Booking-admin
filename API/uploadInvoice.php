<?php

include_once("database/dbconfig.php");
$i = 0;
$arr = array();
//$proArr=array();

$USER_MOBILE = $_REQUEST['USER_MOBILE'];
$MOBILE = $_REQUEST['MOBILE'];
$INV_DATE = $_REQUEST['INV_DATE'];
$INV_NO = str_replace(" ","",$_REQUEST['INV_NO']);//$_REQUEST['INV_NO'];




$INV_VALUE = $_REQUEST['INV_VALUE'];
$PRO_NAME = $_REQUEST['PRO_NAME'];
$PRO_TYPE = $_REQUEST['PRO_TYPE'];
$PRO_SIZE = $_REQUEST['PRO_SIZE'];
$PRO_QTY = $_REQUEST['PRO_QTY'];
$USER_TYPE = $_REQUEST['USER_TYPE'];
$NAME = $_REQUEST['NAME'];
$INV_IMG = $_REQUEST['INV_IMG'];
$INV_WT = $_REQUEST['INV_WT'];
$PRO_STATUS_TYPE = "Approval Pending";
$INV_STATUS = "1";

$c_date = date("Y-m-d H:i:s");

$array_PRO_NAME = explode("#", $PRO_NAME);
$array_PRO_TYPE = explode("#", $PRO_TYPE);
$array_PRO_SIZE = explode("#", $PRO_SIZE);
$array_PRO_QTY = explode("#", $PRO_QTY);

$a = count($array_PRO_NAME);
$b = count($array_PRO_TYPE);
$c = count($array_PRO_SIZE);
$d = count($array_PRO_QTY);

$arr['response']['status'] = 0;
    $arr['response']['message'] = 'Sales Upload Not Allowed';
    $json = json_encode($arr);
    echo $json;


die;
/* $str = $a.'-'.$b .'-'.$c.'-'.$d;

  $status = "0";
  $msg = "Please select products";
  $arr['response']['status']=$status;
  $arr['response']['message']=$str,;
  $json = json_encode($arr);
  echo $json;

  die;
 */

if (($a==$b) && ($b==$c) && ($c==$d) && ($a==$d)) 
{
    if (empty($PRO_NAME)) {
        $status = "0";
        $msg = "Please select product name.";
        $arr['response']['status'] = $status;
        $arr['response']['message'] = $msg;
        $json = json_encode($arr);
        echo $json;
    } else if (empty($PRO_TYPE)) {
        $status = "0";
        $msg = "Please select product type.";
        $arr['response']['status'] = $status;
        $arr['response']['message'] = $msg;
        $json = json_encode($arr);
        echo $json;
    } else if (empty($PRO_SIZE)) {
        $status = "0";
        $msg = "Please select product size.";
        $arr['response']['status'] = $status;
        $arr['response']['message'] = $msg;
        $json = json_encode($arr);
        echo $json;
    } else if (empty($PRO_QTY)) {
        $status = "0";
        $msg = "Please select product quantity.";
        $arr['response']['status'] = $status;
        $arr['response']['message'] = $msg;
        $json = json_encode($arr);
        echo $json;
    } else {
        if ($USER_TYPE == "Retailer") {
            $user_typ = "Fabricator";
            $result1 = mysql_query("SELECT * FROM enrollment WHERE MOBILE_NO ='$MOBILE' and ENROLL_TYPE='$user_typ'");
            $rowdata1 = mysql_num_rows($result1);
            if ($rowdata1) {
                $result = mysql_query("SELECT * FROM invoice WHERE RET_INV_NO ='$INV_NO' and RET_MOBILE = '$USER_MOBILE' and INV_STATUS_TYPE !='Rejected'");
                $rowdata = mysql_num_rows($result);
                if ($rowdata) {
                    $status = "0";
                    $msg = "You have already billed against this invoice number.";
                    $arr['response']['status'] = $status;
                    $arr['response']['message'] = $msg;
                    $json = json_encode($arr);
                    echo $json;
                } else {
                    $result2 = mysql_query("SELECT * FROM invoice WHERE FAB_INV_NO ='$INV_NO' and RET_MOBILE = '$USER_MOBILE' and INV_STATUS_TYPE !='Rejected'");
                    $rowdata2 = mysql_num_rows($result2);


                    if ($rowdata2) {
                        $sql1 = "UPDATE invoice SET RET_NAME ='$NAME', FAB_MOBILE ='$MOBILE', RET_INV_DATE ='$INV_DATE', RET_INV_NO ='$INV_NO', RET_INV_VALUE ='$INV_VALUE', RET_PRO_NAME ='$PRO_NAME', RET_PRO_TYPE ='$PRO_TYPE', RET_PRO_SIZE ='$PRO_SIZE' , RET_INV_IMG ='$INV_IMG' ,RET_PRO_QTY ='$PRO_QTY', RET_PRO_WT ='$INV_WT', INV_STATUS ='$INV_STATUS', UPLOAD_STATUS = '2', RET_INV_UPLOAD_DATE = '$c_date' WHERE FAB_INV_NO='$INV_NO'";
                        mysql_query($sql1);
                        $status = "1";
                        $msg = "Invoice Successfully inserted1.";
                        $arr['response']['status'] = $status;
                        $arr['response']['message'] = $msg;
                        $json = json_encode($arr);
                        echo $json;
                    } 
					else 
					{
                        $sql1 = "INSERT INTO invoice (RET_MOBILE ,FAB_MOBILE, RET_NAME, RET_INV_DATE, RET_INV_NO, RET_INV_VALUE, RET_PRO_NAME, RET_PRO_TYPE, RET_PRO_SIZE, RET_PRO_QTY, RET_PRO_WT, RET_INV_IMG, INV_STATUS_TYPE, INV_STATUS, RET_INV_UPLOAD_DATE)
						VALUES ('$USER_MOBILE','$MOBILE', '$NAME', '$INV_DATE', '$INV_NO', '$INV_VALUE', '$PRO_NAME', '$PRO_TYPE', '$PRO_SIZE', '$PRO_QTY', '$INV_WT', '$INV_IMG', '$PRO_STATUS_TYPE', '$INV_STATUS', '$c_date')";
                        mysql_query($sql1);
                        $status = "1";
                        $msg = "Invoice Successfully inserted2.";
                        $arr['response']['status'] = $status;
                        $arr['response']['message'] = $msg;
                        $json = json_encode($arr);
                        echo $json;
                    }
                }
            } else {
                $status = "0";
                $msg = "Fabricator number doesn't exist.";
                $arr['response']['status'] = $status;
                $arr['response']['message'] = $msg;
                $json = json_encode($arr);
                echo $json;
            }
        } 
		else if ($USER_TYPE == "Fabricator") 
		{
            $user_typ = "Retailer";
            $result1 = mysql_query("SELECT * FROM enrollment WHERE MOBILE_NO ='$MOBILE' and ENROLL_TYPE='$user_typ'");
            $rowdata1 = mysql_num_rows($result1);
            if ($rowdata1) {

                $result = mysql_query("SELECT * FROM invoice WHERE FAB_INV_NO ='$INV_NO' and RET_MOBILE = '$MOBILE' and INV_STATUS_TYPE !='Rejected'");
                $rowdata = mysql_num_rows($result);
                if ($rowdata) {
                    $status = "0";
                    $msg = "You have already billed against this invoice number.";
                    $arr['response']['status'] = $status;
                    $arr['response']['message'] = $msg;
                    $json = json_encode($arr);
                    echo $json;
                } else {
                    $result2 = mysql_query("SELECT * FROM invoice WHERE RET_INV_NO ='$INV_NO' and FAB_MOBILE = '$USER_MOBILE' and INV_STATUS_TYPE !='Rejected'");
                    $rowdata2 = mysql_num_rows($result2);
                    if ($rowdata2) {
                        $sql1 = "UPDATE invoice SET FAB_NAME ='$NAME', RET_MOBILE ='$MOBILE', FAB_INV_DATE ='$INV_DATE', FAB_INV_NO ='$INV_NO', FAB_INV_VALUE ='$INV_VALUE', FAB_PRO_NAME ='$PRO_NAME', FAB_PRO_TYPE ='$PRO_TYPE', FAB_PRO_SIZE ='$PRO_SIZE' , FAB_INV_IMG ='$INV_IMG' , FAB_PRO_QTY ='$PRO_QTY' , FAB_PRO_WT ='$INV_WT' , INV_STATUS ='$INV_STATUS', UPLOAD_STATUS = '2', FAB_INV_UPLOAD_DATE = '$c_date' WHERE RET_INV_NO='$INV_NO'";

                        mysql_query($sql1);
                        $status = "1";
                        $msg = "Invoice Successfully inserted";
                        $arr['response']['status'] = $status;
                        $arr['response']['message'] = $msg;
                        $json = json_encode($arr);
                        echo $json;
                    } else {
                        
                     
                        $sql1 = "INSERT INTO invoice (FAB_MOBILE, RET_MOBILE, FAB_NAME, FAB_INV_DATE, FAB_INV_NO, FAB_INV_VALUE, FAB_PRO_NAME, FAB_PRO_TYPE, FAB_PRO_SIZE, FAB_PRO_QTY, FAB_PRO_WT, FAB_INV_IMG, INV_STATUS_TYPE, INV_STATUS, FAB_INV_UPLOAD_DATE)
						VALUES ('$USER_MOBILE',  '$MOBILE', '$NAME', '$INV_DATE', '$INV_NO', '$INV_VALUE', '$PRO_NAME', '$PRO_TYPE', '$PRO_SIZE', '$PRO_QTY', '$INV_WT', '$INV_IMG', '$PRO_STATUS_TYPE', '$INV_STATUS', '$c_date')";

                        mysql_query($sql1);
                        $status = "1";
                        $msg = "Invoice Successfully inserted";
                        $arr['response']['status'] = $status;
                        $arr['response']['message'] = $msg;
                        $json = json_encode($arr);
                        echo $json;
                    }
                }
            } else {
                $status = "0";
                $msg = "Retailer number doesn't exist.";
                $arr['response']['status'] = $status;
                $arr['response']['message'] = $msg;
                $json = json_encode($arr);
                echo $json;
            }
        }
    }
} else {
    $status = "0";
	if(!isset($array_PRO_NAME)){
	    $msg="empty";
	}else{
	    $msg = $PRO_NAME."sfuoduh:".$PRO_TYPE."".json_encode($array_PRO_SIZE)." counts:".$a."".$b."".$c."".$d;

	}
    $arr['response']['status'] = $status;
    $arr['response']['message'] = $msg;
    $json = json_encode($arr);
    echo $json;
}
?>
