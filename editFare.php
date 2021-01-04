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
                            <div class="box-header with-border"><h3 class="box-title">Update Fare</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <?php
									$id=$_REQUEST['id'];
										
									include_once 'include/class.php';
									$user = new User();
									$res = $user->edit_fare($id);
									while($row=mysqli_fetch_array($res))
									{
									?>
								   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Base Fare" name="fare_base_fare" value="<?php echo $row['city_name']; ?>">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
										 <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                               <select class="form-control" name="fare_city_id">
													<option value="<?php echo $row['fare_city_id'];?>"><?php echo $row['cityName'];?></option>
													<option>Select City Name</option>
													<?php
													$res1 = $user->list_city();
													while($row1=mysqli_fetch_array($res1))
													{?>
													<option value="<?php echo $row1['city_id'];?>"><?php echo $row1['city_name'];?></option>
													<?php } ?>
												</select>
												<i class="fa fa-chevron-down form-control-feedback"></i>
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
			$fare_base_fare=$_POST['fare_base_fare'];
			$fare_city_id=$_POST['fare_city_id'];
			$updateFare = $user->update_fare($id,$fare_base_fare,$fare_city_id);
			if ($updateFare) {
			// updated user Successfully
			echo "<script>alert('Updated Successfully'); window.location='listFare.php'</script>";
			} else {
			
			echo "<script>alert('Not Updated'); window.location='listFare.php'</script>";
			} 
		}
	?>    
   
  