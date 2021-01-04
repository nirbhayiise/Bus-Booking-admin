<!DOCTYPE html>
<html>
	<?php include_once('session.php');?>
	<?php include_once('_link/head.php');?>
	<?php include_once('database/dbconfig.php');?>
	
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php include_once('_link/topbar.php');?>
			<?php include_once('_link/leftmenu.php');?>
			
			
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<div class="box-header with-border"><h3 class="box-title">Update Password</h3></div>
								<div class="box-body">
									<form method="post" enctype="multipart/form-data">
										<?php
										print_r($_SESSION);
											echo $sadmin	=	$_SESSION['ADMIN_USERID'];
											//$id=$_REQUEST['id'];
											$result= mysql_query("SELECT a.*  FROM access_users a WHERE ADMIN_USERID='$sadmin' AND USER_TYPE='C'") or die (mysql_error());
											while ($row= mysql_fetch_array ($result) ){
											$id=$row['ADMIN_ID'];
											?>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php echo $row['ADMIN_PASSWORD']; ?>" placeholder="Password" name="ADMIN_PASSWORD">
													<i class="fa fa-lock form-control-feedback"></i>
												</div>
											</div>
											
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="New Password" name="pass1">
													<i class="fa fa-lock form-control-feedback"></i>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="Confirm Password" name="pass2">
													<i class="fa fa-lock form-control-feedback"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-2  pull-right">
												<input type="submit" name="update"  class="btn btn-primary btn-raised btn-block" value="UPDATE">
											</div>
											<!-- /.col -->
										</div>
										<?php
										}
										?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		
<?php include_once('_link/footer.php');?>
<?php 
	if(isset($_POST['update'])) {
	
	$ADMIN_PASSWORD=$_POST['ADMIN_PASSWORD'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	$spswd='';
	if($pass1==$pass2)
		
		{
			$spswd=$pass1;
			$qry="UPDATE access_users SET ADMIN_PASSWORD='$spswd' WHERE  ADMIN_USERID='$sadmin' AND USER_TYPE ='C'";	
			mysql_query($qry)or die(mysql_error());
			echo "<script>alert('Client Password Updated Successfully'); </script>";
			echo '<script>window.location.href = "home.php";</script>';
		}
	else
	{
		echo "<script>alert('Password & Confirn Password Should Be Same...!'); </script>";
		echo '<script>window.location.href = "resetPassword.php";</script>';
	}
	
    }
	?>


		