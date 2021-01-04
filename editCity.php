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
                            <div class="box-header with-border"><h3 class="box-title">Update City</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <?php
									$id=$_REQUEST['id'];
										
									include_once 'include/class.php';
									$user = new User();
									$res = $user->edit_city($id);
									while($row=mysqli_fetch_array($res))
									{
									?>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="City Name" name="city_name" value="<?php echo $row['city_name']; ?>">
                                                <i class="fa fa-map form-control-feedback"></i>
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
	$city_name=$_POST['city_name'];
	
	$updateCity = $user->update_city($id,$city_name);
	if ($updateCity) {
	// updated user Successfully
	echo "<script>alert('Updated Successfully'); window.location='listCity.php'</script>";
	} else {
	
	echo "<script>alert('Not Updated'); window.location='listCity.php'</script>";
	} 
}
	?>

     
      

      