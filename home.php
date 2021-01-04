<!DOCTYPE html>
<html>
	<?php include_once('session.php');
	$myArr = array();
	$i=0;
	?>
	<?php include_once('_link/head.php');?>
	<?php include_once('database/dbconfig.php');?>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php include_once('_link/topbar.php');?>
			<?php include_once('_link/leftmenu.php');?>
			<div class="content-wrapper">
				<section class="content-header"><h1>Booking Admin</h1></section>
				<style>
				.canvasjs-chart-canvas{ display:ncone !important;}
				</style>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-lg-4 col-xs-4">
							<div class="small-box bg-aqua">
								<div class="inner"><h3></h3><p>Manage User</p></div>
								<div class="icon"><i class="ion ion-person-add"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-4 col-xs-4">
                            <div class="small-box bg-green">
								<div class="inner"><h3></h3><p>Manage Tour Package</p></div>
								<div class="icon"><i class="ion ion-person-stalker"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								
							</div>
						</div>

						<div class="col-lg-4 col-xs-4">
							<div class="small-box bg-olive">
								<div class="inner"><h3></h3><p> List User</p></div>
								<div class="icon"><i class="ion ion-navicon-round"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
								
					<div class="row">
						<div class="col-lg-4 col-xs-4" >
							<div class="small-box bg-green">
								<div class="inner"><h3></h3><p> Manage Ticket Booking</p></div>
								<div class="icon"><i class="ion ion-ios-list-outline"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						
						
						<div class="col-lg-4 col-xs-4" >
							<div class="small-box bg-maroon">
								<div class="inner"><h3></h3><p> View Cancellation</p></div>
								<div class="icon"><i class="ion ion-ios-list-outline"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-4 col-xs-4" >
							<div class="small-box bg-purple">
								
								<div class="inner"><h3></h3><p>View Feedback</p></div>
								<div class="icon"><i class="ion ion-ios-list-outline"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								
							</div>
						</div>
					</div>
				
					
				</section>
			</div>
  
<?php include_once('_link/footer.php');?>	
