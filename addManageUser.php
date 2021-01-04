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
                            <div class="box-header with-border"><h3 class="box-title">Add User</h3></div>
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="User Name" name="u_name" id="u_name">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                        </div>	
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Mobile No." name="u_mob" id="u_mob" maxlength="10">
                                                <i class="fa fa-phone form-control-feedback"></i>
                                            </div>
                                        </div>	
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Address " name="u_add" id="u_add">
                                                <i class="fa fa-book form-control-feedback"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control" placeholder="Pin Code" name="u_pin"  id="u_pin" maxlength="6">
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
	
	$u_name=$_POST['u_name'];
	$u_mob=$_POST['u_mob'];
	$u_add=$_POST['u_add'];
	$u_pin=$_POST['u_pin'];

	
	$addUser = $user->add_user($u_name,$u_mob,$u_add,$u_pin);
	if ($addUser) {
	
	echo "<script>alert('User Added sucessfully'); window.location='listManageUser.php'</script>";
	} else {
	
	echo "<script>alert('User not added!'); window.location='listManageUser.php'</script>";
	
	}
	}
	else {
			//assume btnSubmit
		}
	?>       
      

        <script>
            $(document).ready(function ()
            {
                $(document).on("click","#save",function() 
				//$("#save").click(function ()
                {
                    var u_name = $("#u_name").val();
                    if (u_name == '')
                    {
                        alert('Please enter Retailer Name');
                        $("#u_name").focus();
                        return false;
                    }


                    var u_mob = $("#u_mob").val();
                    if (u_mob == '')
                    {
                        alert('Please enter Mobile Number');
                        $("#u_mob").focus();
                        return false;

                    }
                    if (!IsNumeric(u_mob)) {
                        alert("Please enter numeric Mobile Number");
                        $("#u_mob").focus();
                        return false;
                    }
                    if ((u_mob.length < 9)) {
                        alert("Please enter Mobile Number Minimum 10 digit");
                        $("#mobile").focus();
                        return false;
                    }

                    var u_pin = $("#u_pin").val();
                    if (u_pin == '')
                    {
                        alert('Please enter Pin Code');
                        $("#u_pin").focus();
                        return false;

                    }
                    if (!IsNumeric(u_pin)) {
                        alert("Please enter numeric u_pin");
                        $("#u_pin").focus();
                        return false;
                    }
                    if ((u_pin.length < 5)) {
                        alert("Please enter u_pin Minimum 5 digit");
                        $("#u_pin").focus();
                        return false;
                    }

                });
            });

            function IsNumeric(strString)
            {
                var strValidChars = "0123456789";
                var strChar;
                var blnResult = true;
                if (strString.length == 0)
                    return false;
                for (i = 0; i < strString.length && blnResult == true; i++)
                {
                    strChar = strString.charAt(i);
                    if (strValidChars.indexOf(strChar) == -1)
                    {
                        blnResult = false;
                    }
                }
                return blnResult;
            }
           
        </script>