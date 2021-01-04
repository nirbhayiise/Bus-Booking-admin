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
                            <div class="box-header with-border"><h3 class="box-title">Add Fare</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Base Fare" name="fare_base_fare">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
										 <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                               <select class="form-control" name="fare_city_id">
													<option>Select City Name</option>
													<?php
													include_once 'include/class.php';
													$user = new User();
													$res = $user->list_city();
													while($row=mysqli_fetch_array($res))
													{?>
													<option value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
													<?php } ?>
												</select>
												<i class="fa fa-chevron-down form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="row">
                                        <div class="col-xs-2  pull-right">
                                            <button type="submit" name="save" id="save"  class="btn btn-primary btn-raised btn-block" value="SAVE">SAVE</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php include_once('_link/footer.php'); ?>
        
   <?php 
	include_once 'include/class.php';
	$user = new User();
	if (isset($_POST['save'])) 
	{
	
	$fare_base_fare=$_POST['fare_base_fare'];
	$fare_city_id=$_POST['fare_city_id'];
	
	
	$addFare = $user->add_fare($fare_base_fare,$fare_city_id);
	if ($addFare) {
	
	echo "<script>alert('Fare Added sucessfully'); window.location='listFare.php'</script>";
	} else {
	
	echo "<script>alert('Fare not added!'); window.location='listFare.php'</script>";
	
	}
	}
	else {
			//assume btnSubmit
		}
	?>   