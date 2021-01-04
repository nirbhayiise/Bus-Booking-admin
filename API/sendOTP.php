<?php

include_once("database/dbconfig.php");
$qry = "";
$rendStr = "";
$user_mobile = $_REQUEST['user_mobile'];


$rendStr = rand(1000, 9999);
$qry = "UPDATE enrollment SET OTP='$rendStr' WHERE MOBILE_NO='$user_mobile'";
mysql_query($qry);



$mobExist = mobileExist($user_mobile);
if ($mobExist == 1) {
    otpsend($user_mobile, $rendStr);
    $status = "1";
    $msg = "OTP send.";
    $arr['response']['status'] = $status;
    $arr['response']['message'] = $msg;
} else {
    $status = "0";
    $msg = "This number does not exist";
    $arr['response']['status'] = $status;
    $arr['response']['message'] = $msg;
}
$json = json_encode($arr);
echo $json;

function otpsend($mobile, $rendStr1) {
    $curl = curl_init();

    $msg = urlencode('Your OTP is ' . $rendStr1);

    curl_setopt($curl, CURLOPT_URL, 'https://alerts.solutionsinfini.com/api/v4/?%20api_key=A07828fe31c451c1fd2a06cb129844c31&method=sms&message=Your+OTP+is+' . $rendStr1 . '&to=' . $mobile . '&sender=EVERST');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);

    curl_close($curl);
}

function mobileExist($mob) {
    $query = mysql_query("SELECT * FROM enrollment WHERE MOBILE_NO='$mob'");
    $row = mysql_fetch_array($query);

    $no = $row['CONTRACTOR_ID'];
    if ($no > 0) {
        return 1;
    } else {
        return 0;
    }
}

?>