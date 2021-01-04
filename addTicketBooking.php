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
                            <div class="box-header with-border"><h3 class="box-title">Add Ticket Booking</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Passanger Name" name="b_passanger_name">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
										 <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Mobile No." name="b_mob">
                                                <i class="fa fa-phone form-control-feedback"></i>
                                            </div>
                                        </div>
                                       <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Bus Id" name="b_bus_id">
                                                <i class="fa fa-taxi form-control-feedback"></i>
                                            </div>
                                        </div>
										
                                    </div>
									
									 <div class="row">
                                       
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="From(Source)" name="b_from">
                                                <i class="fa fa-map form-control-feedback"></i>
                                            </div>
                                        </div>	
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="To(Destination)" name="b_to">
                                                <i class="fa fa-map-marker form-control-feedback"></i>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="datetime" class="form-control" placeholder="Booking date" name="b_date">
                                                <i class="fa fa-calendar form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="datetime" class="form-control" placeholder=" Date Of Journey" name="b_date_of_jry">
                                                <i class="fa fa-calendar form-control-feedback"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Fare" name="b_fare">
                                                <i class="fa fa-inr form-control-feedback"></i>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Distance(km)" name="b_dist">
                                                <i class="fa fa-thumb-tack form-control-feedback"></i>
                                            </div>
                                        </div>
										
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2  pull-right">
                                            <button type="submit" name="save" id="save"  class="btn btn-primary btn-raised btn-block" value="SAVE">
                                                SAVE
                                            </button>
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
	
	$b_passanger_name=$_POST['b_passanger_name'];
	$b_mob=$_POST['b_mob'];
	$b_from=$_POST['b_from'];
	$b_to=$_POST['b_to'];
	$b_date=$_POST['b_date'];
	$b_date_of_jry=$_POST['b_date_of_jry'];
	$b_fare=$_POST['b_fare'];
	$b_dist=$_POST['b_dist'];
	$b_bus_id=$_POST['b_bus_id'];
	
	$addTicketBooking = $user->add_ticket_booking($b_passanger_name,$b_mob,$b_from,$b_to,$b_date,$b_date_of_jry,$b_fare,$b_dist,$b_bus_id);
	if ($addTicketBooking) {
	
	echo "<script>alert('Booking Added sucessfully'); window.location='listTicketBooking.php'</script>";
	} else {
	
	echo "<script>alert('Booking not added!'); window.location='listTicketBooking.php'</script>";
	
	}
	}
	else {
			//assume btnSubmit
		}
	?>   