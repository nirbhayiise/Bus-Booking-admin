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
                            <div class="box-header with-border"><h3 class="box-title">Add Bus</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Bus Name" name="bus_name">
                                                <i class="fa fa-bus form-control-feedback"></i>
                                            </div>
                                        </div>	
										<div class="col-md-4">
                                             <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Bus Number" name="bus_number">
                                                <i class="fa fa-cab form-control-feedback"></i>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                             <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Total Seats" name="totalSeats">
                                                <i class="fa fa-building form-control-feedback"></i>
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
	
	$bus_name=$_POST['bus_name'];
	$bus_number=$_POST['bus_number'];
	$totalSeats=$_POST['totalSeats'];
	
	$addBus = $user->add_bus($bus_name,$bus_number,$totalSeats);
	if ($addBus) {
	
	echo "<script>alert('Bus Added sucessfully'); window.location='listBus.php'</script>";
	} else {
	
	echo "<script>alert('Bus not added!'); window.location='listBus.php'</script>";
	
	}
	}
	else {
			//assume btnSubmit
		}
	?>   