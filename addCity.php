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
                            <div class="box-header with-border"><h3 class="box-title">Add City</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="City Name" name="city_name">
                                                <i class="fa fa-map form-control-feedback"></i>
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
	
	$city_name=$_POST['city_name'];
	
	$addCity = $user->add_city($city_name);
	if ($addCity) {
	
	echo "<script>alert('City Added sucessfully'); window.location='listCity.php'</script>";
	} else {
	
	echo "<script>alert('City not added!'); window.location='listCity.php'</script>";
	
	}
	}
	else {
			//assume btnSubmit
		}
	?>       
      

      