<!DOCTYPE html>
<html>
    <?php include_once('session.php'); ?>
    <?php include_once('_link/head.php'); ?>
    <?php include_once('database/dbconfig.php'); ?>
   
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include_once('_link/topbar.php'); ?>
<?php include_once('_link/leftmenu.php'); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border"><h3 class="box-title">Update User</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
									<?php
									$id=$_REQUEST['id'];
										
									include_once 'include/class.php';
									$user = new User();
									$res = $user->edit_user($id);
									while($row=mysqli_fetch_array($res))
									{
									?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="User Name" name="u_name" value="<?php echo $row['u_name']; ?>">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Mobile No." name="u_mob" value="<?php echo $row['u_mob']; ?>">
                                                <i class="fa fa-phone form-control-feedback"></i>
                                            </div>
                                        </div>	
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Address " name="u_add" value="<?php echo $row['u_add']; ?>">
                                                <i class="fa fa-book form-control-feedback"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Pin Code" name="u_pin" value="<?php echo $row['u_pin']; ?>">
                                                <i class="fa fa-thumb-tack form-control-feedback"></i>
                                            </div>
                                        </div>	
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2  pull-right">
											<button type="submit" name="submit" class="btn btn-primary btn-raised btn-block" value="Update">Update</button>
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

<?php include_once('_link/footer.php'); ?>
<?php 
if (isset($_POST['submit'])) {
	
	
	$u_name=$_POST['u_name'];
	$u_mob=$_POST['u_mob'];
	$u_add=$_POST['u_add'];
	$u_pin=$_POST['u_pin'];
	
	
	$updateUser = $user->update_user($id,$u_name,$u_mob,$u_add,$u_pin);
	if ($updateUser) {
	// updated user Successfully
	echo "<script>alert('Updated Successfully'); window.location='listManageUser.php'</script>";
	} else {
	
	echo "<script>alert('Not Updated'); window.location='listManageUser.php'</script>";
	} 
}
	?>
   