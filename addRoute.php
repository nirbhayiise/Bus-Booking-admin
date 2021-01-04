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
                            <div class="box-header with-border"><h3 class="box-title">Add Bus Route</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Bus Source" name="bus_source">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
										
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Bus Destination" name="bus_des">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
										
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Bus pick-up Point" name="bus_pickup">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
									</div>	
									<div class="row">	
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
												<label>Source Time</label>
                                                <input type="time" class="form-control" placeholder="Source Time" name="source_time">
                                                <i class="fa fa-clock-o form-control-feedback"></i>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
												<label>Destination Time</label>
                                                <input type="time" class="form-control" placeholder="Destination Time" name="des_time">
                                                <i class="fa fa-clock-o form-control-feedback"></i>
                                            </div>
                                        </div>
										
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
                                               <br/>
											   <select class="form-control" name="fare_city_id">
													<option>Select Bus Name</option>
													<?php
													include_once 'include/class.php';
													$user = new User();
													$res = $user->getBusList();
													while($row=mysqli_fetch_array($res))
													{?>
													<option value="<?php echo $row['bus_id'];?>"><?php echo $row['bus_name'];?></option>
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
	
	$sourceBus=$_POST['bus_source'];
	$desBus=$_POST['bus_des'];
	$pickpoint=$_POST['bus_pickup'];
	$busid=$_POST['fare_city_id'];
	$source_time=$_POST['source_time'];
	$des_time=$_POST['des_time'];
	$addFare = $user->addBusRoute($sourceBus,$desBus,$pickpoint,$busid,$source_time,$des_time);
	if ($addFare) {
	
	echo "<script>alert('Bus Route Added sucessfully'); window.location='listRoute.php'</script>";
	} else {
	
	echo "<script>alert('Bus Route not added!'); window.location='listRoute.php'</script>";
	
	}
	}
	else {
			//assume btnSubmit
		}
	?>    