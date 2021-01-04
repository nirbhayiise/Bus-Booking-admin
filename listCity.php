<!DOCTYPE html>

<html>
    <?php include_once('session.php'); ?>
    <?php include_once('_link/head.php'); ?>
    <?php include_once('database/dbconfig.php'); ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <style>
                .btn:not(.btn-raised).btn-primary, .input-group-btn .btn:not(.btn-raised).btn-primary {
                    color: aliceblue !important;

                </style>
                <?php include_once('_link/topbar.php'); ?>
                <?php include_once('_link/leftmenu.php'); ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header"><h3 class="box-title">List City</h3></div>
                                    <a href="addCity.php" class="btn bg-navy pull-right btnadd">ADD City</a>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                            <!--<table id="example1" class="table table-bordered table-striped">-->
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bkcolor">
                                                <tr>
                                                    <th>City Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
											include_once 'include/class.php';
											$user = new User();
											$res = $user->list_city();
											
											while($row=mysqli_fetch_array($res))
											{
												$id=$row['city_id'];
											?>  
												<tr>
													<td><?php echo $row['city_name']; ?></td>
													<td>
														<a class="btn btn-primary btn-sm editbtn" href="editManageUser.php<?php echo '?id=' . $id; ?>">Edit</a>
														<a class="btn btn-danger btn-sm"href="javascript:del_id(<?php echo $row['city_id']; ?>)">Delete</a>
													</td>
												</tr>
											<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <?php include_once('_link/footer.php'); ?>


	<!------listing data in table with search--------->
			<!--<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>-->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
	$(function () {
		/*$("#example1").DataTable();*/
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,

			"autoWidth": false

		});
	});

	/*for scroll horizontally*/
	$(document).ready(function () {
		$('#example1').DataTable({
			"scrollX": true
		});
	});

	</script>
	<!----end listing data in table with search-------->
		<script>
	//for delete the records
	function del_id(id)
	{
	 if(confirm('Sure to delete this record ?'))
	 {
	  window.location='delete_city.php?delete_id='+id
	 }
	}
	</script>
