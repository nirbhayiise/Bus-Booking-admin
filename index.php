<!DOCTYPE html>
<html>

<?php session_start(); ?>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Booking</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css?v=1">
	<link rel="stylesheet" href="dist/css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="dist/css/ripples.min.css">
	<link rel="stylesheet" href="dist/css/MaterialAdminLTE.min.css">
 
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo"><a href="javascript:void(0);"><img src="dist/img/logobooking.png" height="150" width="150" style="margin-top:0px;"></a></div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<form  method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="User Name" name="ADMIN_USERID">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="ADMIN_PASSWORD">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<button type="submit" name="login" class="btn btn-primary btn-raised btn-block btn-flat" style="background-color:#EF3F42">Login</button>
					</div>
			  </div>
			</form>
	  </div>
	</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/material.min.js"></script>
<script src="dist/js/ripples.min.js"></script>
<script>
    $.material.init();
</script>
</body>
</html>

	<?php
	include_once 'include/class.php';
	$user = new User();
	
	if (isset($_REQUEST['login'])) {
	    
	$ADMIN_USERID= $_POST['ADMIN_USERID'];
	$ADMIN_PASSWORD= $_POST['ADMIN_PASSWORD'];
	
	//extract($_REQUEST);
	$login = $user->check_login($ADMIN_USERID, $ADMIN_PASSWORD);
	if ($login) {
	// Login Successfully
//	header("location:home.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='home.php';
    </script>");
	} else {
	// failed to login
	echo "<script>alert('Invalid Username and Password! Try again.'); window.location='index.php'</script>";
	}
	}
	?>
	
	
	
