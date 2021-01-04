<!DOCTYPE html>
<html>
    <?php include_once('session.php'); ?>
    <?php include_once('_link/head.php'); ?>
    <?php include_once('database/dbconfig.php'); ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include_once('_link/topbar.php'); ?>
            <?php include_once('_link/leftmenu.php'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header"><h3 class="box-title">Invoice Approval</h3></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label></label>
                                        <div class="form-group">
                                            <div class="input-group" style="margin-left:10px;">
                                                <input type="text" name="table_search" class="form-control pull-right" id="myInput" onkeyup="myFunction()" placeholder="Search for name">

                                                <!--<button type="submit" class="btn btn-default"></button>---->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="input-group">
                                                <select class="form-control" id="group_name" onchange="getgroup(this.value);">
                                                    <option value="0">Select Status</option>
                                                    <option value="Rejected"> Rejected</option>
                                                    <option value="Approved">Approved </option>
                                                    <option value="Completed"> Completed</option>
                                                    <option value="Approval Pending">Approval Pending</option>
                                                </select>
                                                <input id="test2" name="test2" type="hidden"/>
                                            </div>
                                        </div>	
                                    </div>
                                    <script type='text/javascript'>
                                        var val1, val2, val3;
                                        function getgroup(val) {
                                            var x = document.getElementById("group_name");
                                            var y = document.getElementById("test2");
                                            y = x.value;
                                            val1 = y;
                                            window.location.href = "invoiceApproval.php?sdrpval=" + val1;
                                            //getSetDate1(val1);
                                        }

                                        function getSetDate1(val) {
                                            var x = document.getElementById("orgdt1");
                                            var y = document.getElementById("dt1").value = x;
                                            var getX = document.getElementById("orgdt1").value;
                                            getSetDate2(getX)
                                            //alert(getX);


                                        }

                                        function getSetDate2(val) {
                                            var x = document.getElementById("orgdt2");
                                            var y = document.getElementById("dt2").value = x;
                                            var getX2 = document.getElementById("orgdt2").value;
                                            var selectdropdownl = document.getElementById("test2").value;
                                            var getX = document.getElementById("orgdt1").value;
                                            //alert(getX);
                                            val3 = getX2;

                                            if (val.length != 0 && getX2.length != 0)
                                            {
                                                window.location.href = "invoiceApproval.php?dt1=" + val + "&dt2=" + getX2;
                                            }

                                        }
                                    </script>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Start Date:</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control pull-right" name="orgdt1" id="orgdt1" onchange="getSetDate1(this.value);">
                                                <input id="dt1" name="dt1" type="hidden"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1" style="margin-top:45px;">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>To:</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>End Date:</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control pull-right" id="orgdt2" name="orgdt2" onchange="getSetDate1(this.value);">
                                                <input id="dt2" name="dt2" type="hidden"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="myTable">
                                                    <tr>
                                                        <th>Invoice#</th>
                                                        <th>Retailer Name</th>
                                                        <th>Invoice Date</th>
                                                        <th>Fabricator Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php
                                                    $seldrpval;
                                                    $result;
                                                    $sdt1;
                                                    $sdt2;

                                                    if (isset($_GET['sdrpval'])) {//From js post data

                                                        $seldrpval = $_GET['sdrpval'];
                                                        //$sdrp1=$SESSION['sdrpval'];
                                                        if ($seldrpval == "Approved" || $seldrpval == "Approval Pending" || $seldrpval == "Rejected" || $seldrpval == "Completed") {
                                                            $result = mysql_query("SELECT * FROM invoice WHERE INV_STATUS='0' AND INV_STATUS_TYPE='$seldrpval'") or die(mysql_error());
                                                        }
                                                    } else if (isset($_GET['dt1']) && ($_GET['dt1'])) {
                                                        $sdt1 = $_GET['dt1'];
                                                        $sdt2 = $_GET['dt2'];
                                                        $qry = "SELECT * FROM invoice WHERE CAST(RET_INV_DATE AS DATE) BETWEEN CAST('$sdt1' AS DATE) AND CAST('$sdt2' AS DATE) AND INV_STATUS='0'";
                                                        //echo $qry;
                                                        //die;
                                                        $result = mysql_query($qry) or die(mysql_error());
                                                    } else if (isset($_REQUEST['INVT_STS'])) {//for view selected status for home page directed data
                                                        $invtsts;
                                                        $invtsts = $_REQUEST['INVT_STS'];
                                                        if ($invtsts == 'Approved') {
                                                            $result = mysql_query("SELECT * FROM invoice WHERE INV_STATUS='1' AND INV_STATUS_TYPE='$invtsts'") or die(mysql_error());
                                                        } else if ($invtsts == 'Approval Pending') {
                                                            $result = mysql_query("SELECT * FROM invoice WHERE INV_STATUS_TYPE='$invtsts'") or die(mysql_error());
                                                        } else if ($invtsts == 'Rejected') {
                                                            $result = mysql_query("SELECT * FROM invoice WHERE INV_STATUS_TYPE='$invtsts'") or die(mysql_error());
                                                        }
                                                    } else {

                                                        $result = mysql_query("SELECT * FROM invoice WHERE INV_STATUS='0'") or die(mysql_error());
                                                    }

                                                    //$result= mysql_query("SELECT * FROM invoice") or die (mysql_error());
													
													if(count($result)>0)
													{
                                                    while ($row = mysql_fetch_array($result)) {

                                                        $id = $row['INV_ID'];
                                                        $status = $row['INV_STATUS_TYPE'];

                                                        $inv_dt = '';
                                                        /*if ($row['RET_INV_DATE'] == '' || $row['RET_INV_DATE'] == '0000-00-00 00:00:00') {
                                                            $inv_dt = $row['FAB_INV_DATE'];
                                                        } else if ($row['FAB_INV_DATE'] == '' || $row['FAB_INV_DATE'] == '0000-00-00 00:00:00') {
                                                            $inv_dt = $row['RET_INV_DATE'];
                                                        } else {
                                                            $inv_dt = $row['RET_INV_DATE'];
                                                        }*/
														$inv_dt = $row['escalate_date'];
                                                        ?>
                                                        <tr>
                                                            <td>
                                                        <?php
                                                        if ($row['RET_INV_NO'] == '') {
                                                            echo $row['FAB_INV_NO'];
                                                        } else if ($row['FAB_INV_NO'] == '') {
                                                            echo $row['RET_INV_NO'];
                                                        } else {
                                                            echo $row['RET_INV_NO'];
                                                        }
                                                        ?>
                                                            </td>

                                                           <td>
                                                                <?php
                                                                 if(!empty($row['RET_MOBILE'])){
                                                                $quey = mysql_query("SELECT * FROM enrollment WHERE MOBILE_NO='".$row['RET_MOBILE']."'");
                                                                $ret=mysql_fetch_assoc($quey);
                                                                
                                                            }
                                                            if(!empty($ret['CONTACT_PERSON'])){
                                                                echo $ret['CONTACT_PERSON'];
                                                            }else{
                                                                 echo $rname = $row['RET_NAME'];
                                                            }
                                                            
                                                               
                                                                ?>
                                                            </td>
                                                            <td><?php echo date("d-m-Y",strtotime($inv_dt)); ?> </td>
                                                           
                                                            <td><?php 
                                                              if(!empty($row['FAB_MOBILE'])){
                                                                $quey = mysql_query("SELECT * FROM enrollment WHERE MOBILE_NO='".$row['FAB_MOBILE']."'");
                                                                $ret1=mysql_fetch_assoc($quey);
                                                                
                                                            }
                                                            if(!empty($ret1['CONTACT_PERSON'])){
                                                                echo $ret1['CONTACT_PERSON'];
                                                            }else{
                                                                 echo $rname = $row['FAB_NAME'];
                                                            }
                                                           
                                                            
                                                             ?>
                                                            
                                                            
                                                            
                                                            </td>
                                                            <td>
                                                        <?php
                                                        if ($status == 'Approved') {
                                                            ?>
                                                                    <span class="label label-success"><?php echo $status; ?></span>
                                                                <?php
                                                                } else if ($status == 'Approval Pending') {
                                                                    ?>
                                                                    <span class="label label-warning"><?php echo $status; ?></span>
                                                                <?php
                                                                } else if ($status == 'Completed') {
                                                                    ?>
                                                                    <span class="label label-primary"><?php echo $status; ?></span>
                                                                <?php } else {
                                                                    ?>
                                                                    <span class="label label-danger"><?php echo $status; ?></span>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><a class="btn btn-success btn-sm editbtn" href="viewInvoice.php<?php echo '?id=' . $id; ?>">View</a></td>
                                                        </tr>
    <?php
}
													}
?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
                                                            <?php include_once('_link/footer.php'); ?>


            <!------listing data in table with search--------->
            <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
            <script>
                                                    $(function () {
                                                        $("#example1").DataTable();
                                                        $('#example2').DataTable({
                                                            "paging": true,
                                                            "lengthChange": false,
                                                            "searching": false,
                                                            "ordering": true,
                                                            "info": true,
                                                            "autoWidth": false
                                                        });
                                                    });
                                                    function myFunction() {
                                                        var input, filter, table, tr, td, i;
                                                        input = document.getElementById("myInput");
                                                        filter = input.value.toUpperCase();
                                                        table = document.getElementById("myTable");
                                                        tr = table.getElementsByTagName("tr");
                                                        for (i = 0; i < tr.length; i++) {
                                                            td = tr[i].getElementsByTagName("td")[1];
                                                            if (td) {
                                                                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                                    tr[i].style.display = "";
                                                                } else {
                                                                    tr[i].style.display = "none";
                                                                }
                                                            }
                                                        }
                                                    }


            </script>

            <script>


            </script>
            <!----end listing data in table with search-------->
