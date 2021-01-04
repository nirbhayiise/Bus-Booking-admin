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
                                    <div class="box-header"><h3 class="box-title">View FeedBack</h3></div>
                                  
                                    <div class="box-body">
                                            <!--<table id="example1" class="table table-bordered table-striped">-->
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bkcolor">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email </th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                    <tr>
                                                        <td>Nirbhay</td>
                                                        <td>n@gmail.com</td>
                                                        <td>Good app to visit place</td>
                                                        <td>
                                                            <button type="button"class="btn btn-danger btn-sm" onClick="myActive('<?php echo $row['CONTRACTOR_ID']; ?>')">Delete</button>
                                                            
                                                        </td>
                                                    </tr>

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



				//for deletion
				function myActive(uid) {
					$.ajax({
						url: 'delete_retailer.php',
						type: 'POST',
						data: {eid: uid},
						success: function (data) {
							location.reload();
						},
						error: function (data) {
							alert("error" + data);
						}
					});
				}
				//status active deactive
				function myActive1(uid, status1) {
					$.ajax({
						url: 'active_deactive_retailer.php',
						type: 'POST',
						data: {eid1: uid, status1: status1},
						success: function (data) {
							location.reload();
						},
						error: function (data) {
							alert("error" + data);
						}
					});
				}
				</script>
                <!----end listing data in table with search-------->
