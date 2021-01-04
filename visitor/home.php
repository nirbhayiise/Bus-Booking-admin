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
				<section class="content-header"><h1>Telecaller Dashboard</h1></section>
				<section class="content">
					<div class="row">
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-aqua">
								<?php
								$result= mysql_query("SELECT COUNT(*) AS `count` FROM enrollment WHERE ENROLL_TYPE='Fabricator'") or die (mysql_error());
								while ($row= mysql_fetch_array ($result) ){
								$count = $row['count'];
								?>
							
								<div class="inner"><h3><?php echo $count; ?></h3><p>No of Registered Fabricators</p></div>
								<?php } ?>
								<div class="icon"><i class="ion ion-person-add"></i></div>
								<a href="listFabricator.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-green">
								<?php
								$result1= mysql_query("select  COUNT(FAB_INV_DATE) As count1  from invoice where FAB_NAME!='' AND `FAB_INV_DATE` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)") or die (mysql_error());
								while ($row1= mysql_fetch_array ($result1) ){
								$count1 = $row1['count1'];
								?>
								<div class="inner"><h3><?php echo $count1; ?></h3><p> Active Fabricators</p></div>
								<div class="icon"><i class="ion ion-person-stalker"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-olive">
								<div class="inner"><h3>50</h3><p> Total MT Billed</p></div>
								<div class="icon"><i class="ion ion-navicon-round"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
								
					<div class="row">
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-purple">
								<?php
								$result3= mysql_query("select INV_STATUS_TYPE,COUNT(INV_STATUS_TYPE) As count3  from invoice where INV_STATUS_TYPE='Approved'") or die (mysql_error());
								while ($row3= mysql_fetch_array ($result3) ){
								$invtsts=$row3['INV_STATUS_TYPE'];	
								$count3 = $row3['count3'];
								?>
								<div class="inner"><h3><?php echo $count3; ?></h3><p> Total Approved Invoices</p></div>
								<div class="icon"><i class="ion ion-drag"></i></div>
								<a href="invoiceApproval.php<?php echo '?INVT_STS='.$invtsts; ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-maroon">
								<?php
								$result4= mysql_query("select INV_STATUS_TYPE,COUNT(INV_STATUS_TYPE) As count4  from invoice where INV_STATUS_TYPE='Approval Pending'") or die (mysql_error());
								while ($row4= mysql_fetch_array ($result4) ){
								$invtsts=$row4['INV_STATUS_TYPE'];	
								$count4 = $row4['count4'];
								?>
								<div class="inner"><h3><?php echo $count4; ?></h3><p> Total Unapproved Invoices</p></div>
								<div class="icon"><i class="ion ion-ios-list-outline"></i></div>
								<a href="invoiceApproval.php<?php echo '?INVT_STS='.$invtsts; ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-purple">
								<?php
								$result5= mysql_query("select INV_STATUS_TYPE,COUNT(INV_STATUS_TYPE) As count5  from invoice where INV_STATUS_TYPE='Rejected'") or die (mysql_error());
								while ($row5= mysql_fetch_array ($result5) ){
								$invtsts=$row5['INV_STATUS_TYPE'];
								$count5 = $row5['count5'];
								?>
								<div class="inner"><h3><?php echo $count5; ?></h3><p>Disputed Transactions</p></div>
								<div class="icon"><i class="ion ion-ios-list-outline"></i></div>
								<a href="invoiceApproval.php<?php echo '?INVT_STS='.$invtsts; ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								<?php } ?>
							</div>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<!-- BAR CHART -->
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title">Bar Graph for Billing Volume</h3>
									<div class="box-tools pull-right">
										<!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<?php
									$dataPoints = array( 
										array("y" => 5, "label" => "Standard Board" ),
										array("y" => 9, "label" => "Designer Board" ),
										array("y" => 6, "label" => "HD Board" ),
										array("y" => 5, "label" => "Cement Wood Planks" ),
										array("y" => 4, "label" => "Designer Ceiling" ),
										array("y" => 10, "label" => "Rapicon" ),
										array("y" => 15, "label" => "Traded Item" )
									);
									 
								?>
								<script>
									window.onload = function() {
									 
									var chart = new CanvasJS.Chart("chartContainer", {
										animationEnabled: true,
										theme: "light2",
										title:{
											text: "Billing Volume"
										},
										axisY: {
											title: "Value(in number)"
										},
										data: [{
											type: "column",
											yValueFormatString: "#,##0.## No.",
											dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
										}]
									});
									chart.render();
									 
									}
								</script>
								<div class="box-body"><div id="chartContainer" style="height: 370px; width: 100%;"></div></div>
								<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
							</div>
						</div>
						<!-- /.col (RIGHT) -->
					</div>
				</section>
			</div>
			
<?php include_once('_link/footer.php');?>			