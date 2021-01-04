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
				<section class="content-header"><h1>Akkado Admin</h1></section>
				<style>
				.canvasjs-chart-canvas{ display:ncone !important;}
				</style>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-aqua">
								<?php
								$result= mysql_query("SELECT COUNT(*) AS `count` FROM enrollment WHERE ENROLL_TYPE='Fabricator'") or die (mysql_error());
								while ($row= mysql_fetch_array ($result) ){
								$count = $row['count'];
								?>
							
								<div class="inner"><h3><?php echo $count; ?></h3><p>No of Fabricators</p></div>
								<?php } ?>
								<div class="icon"><i class="ion ion-person-add"></i></div>
								<a href="listFabricator.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-4 col-xs-6">
							<!--<div class="small-box bg-green">
								<?php
								//$result1= mysql_query("select  COUNT(FAB_INV_DATE) As count1  from invoice where FAB_NAME!='' AND `FAB_INV_DATE` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)") or die (mysql_error());
								//while ($row1= mysql_fetch_array ($result1) ){
								//$count1 = $row1['count1'];
								?>
								<div class="inner"><h3><?php echo $count1; ?></h3><p> Active Fabricators</p></div>
								<div class="icon"><i class="ion ion-person-stalker"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								<?php //} ?>
							</div>-->
                            <div class="small-box bg-green">
								<?php
								$result11= mysql_query("SELECT COUNT(*) AS `count11` FROM enrollment WHERE ENROLL_TYPE='Retailer'") or die (mysql_error());
								while ($row11= mysql_fetch_array ($result11) ){
								$count11 = $row11['count11'];
								?>
								<div class="inner"><h3><?php echo $count11; ?></h3><p>No of Retailer</p></div>
								<div class="icon"><i class="ion ion-person-stalker"></i></div>
								<a href="listRetailer.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
								<?php } ?>
							</div>
						</div>
						<?php
						/*$chart = @$_GET['chart'];
						if(!empty($chart))
						{
							if($chart == 'march')
							{
								$result= mysql_query("SELECT FAB_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed') AND MONTH(`FAB_INV_DATE`) = 3") or die (mysql_error());
							}
							if($chart == 'april')
							{
								$result= mysql_query("SELECT FAB_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed') AND MONTH(`FAB_INV_DATE`) = 4") or die (mysql_error());
							}
							if($chart == 'all')
							{
								$result= mysql_query("SELECT FAB_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed')") or die (mysql_error());
							}
						}
						else
						{
							$result= mysql_query("SELECT FAB_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed')") or die (mysql_error());
						}*/
						/*$products=array();
						while($row = mysql_fetch_assoc($result)) 
						{
							$products=array_merge($products,explode('#',$row['FAB_PRO_NAME']));
						}
						$count=array_count_values($products);
						if(isset($count['Fiber Cement Board'])){
							$standard_board_count=$count['Fiber Cement Board']; }
						else{ $standard_board_count=0; }
						if(isset($count['Designer Board'])){
							$designer_board_count=$count['Designer Board'];
						}else{
							$designer_board_count=0; 
						}
						if(isset($count['Heavy Duty Board']))$hd_board_count=$count['Heavy Duty Board']; else $hd_board_count=0; 
						if(isset($count['Cement Wood Plank'])) $cement_wood_planks_count=$count['Cement Wood Plank']; else $cement_wood_planks_count=0; 
						if(isset($count['Stone Cladding']))$designer_ceiling_count=$count['Stone Cladding']; else $designer_ceiling_count=0; 
						if(isset($count['Rapicon Wall'])) $rapicon_count=$count['Rapicon Wall']; else  $rapicon_count=0; 
						$total_count = $standard_board_count+$designer_board_count+$hd_board_count+$cement_wood_planks_count+$designer_ceiling_count+$rapicon_count;*/
								   
								   
								   
// Total Mt billed function  here 	
$chart = @$_GET['chart'];
if(!empty($chart))
{
	if($chart == 'march')
	{
		$res_wt	= mysql_query("SELECT RET_PRO_WT,RET_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed') AND MONTH(`FAB_INV_DATE`) = 3") or die (mysql_error());
	}
	if($chart == 'april')
	{
		$res_wt	= mysql_query("SELECT RET_PRO_WT,RET_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed') AND MONTH(`FAB_INV_DATE`) = 4") or die (mysql_error());
	}
	if($chart == 'may')
	{
		$res_wt	= mysql_query("SELECT RET_PRO_WT,RET_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed') AND MONTH(`FAB_INV_DATE`) = 5") or die (mysql_error());
	}
	if($chart == 'all')
	{
		$res_wt	= mysql_query("SELECT RET_PRO_WT,RET_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed')") or die (mysql_error());
	}
}
else
{
	$res_wt	= mysql_query("SELECT RET_PRO_WT,RET_PRO_NAME FROM invoice WHERE (INV_STATUS_TYPE='Approved' OR INV_STATUS_TYPE='Completed')") or die (mysql_error());
}

					

$p=array();
$total_mt_bill = 0;
$Cement_Wood_Plank = 0;
$Designer_Board = 0;
$Heavy_Duty_Board = 0;
$Rapicon_Wall = 0;
$Fiber_Cement_Board = 0;
$Stone_Cladding = 0;
while($row_wt = mysql_fetch_assoc($res_wt)) 
{
	//Total calcultion
	
	//Total pro name
	$t=explode('#',$row_wt['RET_PRO_WT']);
	$prot=explode('#',$row_wt['RET_PRO_NAME']);
	for($protmt=0;$protmt<count($prot);$protmt++)
	{
		//echo $prot[$protmt];
		if($prot[$protmt] == 'Cement Wood Plank')
		{
			$Cement_Wood_Plank = $Cement_Wood_Plank + $t[$protmt];
		}
		if($prot[$protmt] == 'Designer Board')
		{
			$Designer_Board = $Designer_Board + $t[$protmt];
		}
		if($prot[$protmt] == 'Heavy Duty Board')
		{
			$Heavy_Duty_Board = $Heavy_Duty_Board + $t[$protmt];
		}
		if($prot[$protmt] == 'Rapicon Wall')
		{
			$Rapicon_Wall = $Rapicon_Wall + $t[$protmt];
		}
		if($prot[$protmt] == 'Fiber Cement Board')
		{
			$Fiber_Cement_Board = $Fiber_Cement_Board + $t[$protmt];
		}
		if($prot[$protmt] == 'Stone Cladding')
		{
			$Stone_Cladding = $Stone_Cladding + $t[$protmt];
		}
	}
}

$total_mt_bill = $Cement_Wood_Plank +  $Designer_Board +  $Heavy_Duty_Board +  $Rapicon_Wall + $Fiber_Cement_Board +  $Stone_Cladding ;
?>
						<div class="col-lg-4 col-xs-6">
							<div class="small-box bg-olive">
								<div class="inner"><h3><?php echo round($total_mt_bill,2); ?></h3><p> Total MT Billed</p></div>
								<div class="icon"><i class="ion ion-navicon-round"></i></div>
								<a href="javascript:void(0);" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
								
					<div class="row">
						<!--<div class="col-lg-4 col-xs-6">
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
						</div>-->
						<div class="col-lg-4 col-xs-6" style="display:none;">
							<div class="small-box bg-maroon">
								<?php
								//$result4= mysql_query("select INV_STATUS_TYPE,COUNT(INV_STATUS_TYPE) As count4  from invoice where INV_STATUS_TYPE='Approval Pending'") or die (mysql_error());
								$result4= mysql_query("select COUNT(*) As count4  from invoice where escalate_staus='1'") or die (mysql_error());
								
								
								
								while ($row4= mysql_fetch_array ($result4) ){
								//$invtsts=$row4['INV_STATUS_TYPE'];	
								$count4 = $row4['count4'];
								?>
								<div class="inner"><h3><?php echo $count4; ?></h3><p> Total Unapproved Invoices</p></div>
								<div class="icon"><i class="ion ion-ios-list-outline"></i></div>
								<!--<a href="invoiceApproval.php<?php echo '?INVT_STS='.$invtsts; ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>-->
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-4 col-xs-6" style="display:none;">
							<div class="small-box bg-purple">
								<?php
								$result5= mysql_query("select INV_STATUS_TYPE,COUNT(INV_STATUS_TYPE) As count5  from invoice where INV_STATUS_TYPE='Rejected'") or die (mysql_error());
								while ($row5= mysql_fetch_array ($result5) ){
								$invtsts=$row5['INV_STATUS_TYPE'];	
								$count5 = $row5['count5'];
								
								if($count5 == 0)
								{
									$invtstss = 'Rejected';
								}
								?>
								<div class="inner"><h3><?php echo $count5; ?></h3><p>Disputed Transactions</p></div>
								<div class="icon"><i class="ion ion-ios-list-outline"></i></div>
								<a href="invoiceApproval.php<?php echo '?INVT_STS='.$invtstss; ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
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
                                    	<select id="month_bar">
                                            <option value="">Select</option>
                                            <option value="all">All</option>
                                            <option value="march">March</option>
                                            <option value="april">April</option>
                                            <option value="may">May</option>
                                        </select>
									</div>
								</div>
								<?php
								

								
								
									$dataPoints = array( 
										array("y" => $Cement_Wood_Plank, "label" => "Cement Wood Plank" ),
										array("y" => $Designer_Board, "label" => "Designer Board" ),
										array("y" => $Heavy_Duty_Board, "label" => "Heavy Duty Board" ),
										array("y" => $Rapicon_Wall, "label" => "Rapicon Wall" ),
										array("y" => $Fiber_Cement_Board, "label" => "Fiber Cement Board" ),
										array("y" => $Stone_Cladding, "label" => "Stone Cladding" )
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
											yValueFormatString: "#,##0.## MT",
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
<script>
$(document).ready(function(){
	var url      = window.location.href;
	var parameter   = url.split("=");
	$("#month_bar").val(parameter[1]);
	
	$("#month_bar").change(function(){
		var month_bar	=	$("#month_bar").val();
		if(month_bar == 'all')
		{
			window.location.href = "home.php?chart=all";
		}
		if(month_bar == 'march')
		{
			window.location.href = "home.php?chart=march";
		}
		if(month_bar == 'april')
		{
			window.location.href = "home.php?chart=april";
		}
		if(month_bar == 'may')
		{
			window.location.href = "home.php?chart=may";
		}
	});
});
</script>