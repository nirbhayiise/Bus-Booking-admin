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
                            <div class="box-header with-border"><h3 class="box-title">Add Tour Package</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Passanger Name" name="pkg_passenger">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
										<div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="calendar" class="form-control" placeholder="date(YYYY-MM-DD)" name="pkg_date">
                                                <i class="fa fa-calendar form-control-feedback"></i>
                                            </div>
                                        </div>
										
                                    </div>
									
									<div class="row">
										<div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="From(Source)" name="pkg_from">
                                                <i class="fa fa-map form-control-feedback"></i>
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="To(Destination)" name="pkg_to">
                                                <i class="fa fa-map-marker form-control-feedback"></i>
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
	
	$pkg_passenger=$_POST['pkg_passenger'];
	
	$pkg_from=$_POST['pkg_from'];
	$pkg_to=$_POST['pkg_to'];
	$pkg_date=$_POST['pkg_date'];
	
	
	$addTourPkg = $user->add_tour_pkg($pkg_passenger,$pkg_from,$pkg_to,$pkg_date);
	if ($addTourPkg) {
	
	echo "<script>alert('Tour Package Added sucessfully'); window.location='listTourPackage.php'</script>";
	} else {
	
	echo "<script>alert('Tour Package not added!'); window.location='listTourPackage.php'</script>";
	
	}
	}
	else {
			//assume btnSubmit
		}
	?>   