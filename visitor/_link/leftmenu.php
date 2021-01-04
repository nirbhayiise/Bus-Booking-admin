<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"></li>

            <?php
            $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            if ($actual_link == 'http://everest.akkado.in/Telecaller/invoiceApproval.php') {
                ?>
                <li class="active"><a href="invoiceApproval.php" style="color: #fff !important;"><i class="fa fa-file-photo-o"></i><span>Invoice  List</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="invoiceApproval.php"><i class="fa fa-file-photo-o"></i><span>Invoice  List</span></a></li>
                <?php
            }
            

            if ($actual_link == 'http://everest.akkado.in/Telecaller/home.php') {
                ?>
<!--                <li class="active"><a href="home.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Home</span></a></li>-->
                <?php
            } else {
                ?>
<!--                <li class=""><a href="home.php"><i class="fa fa-home"></i><span>Home</span></a></li>-->
                <?php
            }


            if ($actual_link == 'http://everest.akkado.in/Telecaller/listRetailer.php') {
                ?>
                <li class="active"><a href="listRetailer.php" style="color: #fff !important;"><i class="fa fa-users"></i><span>Retailer</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="listRetailer.php"><i class="fa fa-users"></i><span>Retailer</span></a></li>
                <?php
            }


            if ($actual_link == 'http://everest.akkado.in/Telecaller/listFabricator.php') {
                ?>
                <li class="active"><a href="listFabricator.php" style="color: #fff !important;"><i class="fa fa-users"></i><span>Fabricator</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="listFabricator.php"><i class="fa fa-users"></i><span>Fabricator</span></a></li>
                <?php
            }

            if ($actual_link == 'http://everest.akkado.in/Telecaller/listSalesTeam.php') {
                ?>
                <li class="active"><a href="listSalesTeam.php" style="color: #fff !important;"><i class="fa fa-users"></i><span>Sales Team</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="listSalesTeam.php"><i class="fa fa-users"></i><span>Sales Team</span></a></li>
                <?php
            }

            

            if ($actual_link == 'http://everest.akkado.in/Telecaller/uploadInvoice.php') {
                ?>
             <li class="active"><a href="uploadInvoice.php" style="color: #fff !important;"><i class="fa fa-upload"></i><span> Upload Invoice</span></a></li>
                <?php
            } else {
                ?>
               <li><a href="uploadInvoice.php"><i class="fa fa-upload"></i><span> Upload Invoice</span></a></li>
                <?php
            }


            if ($actual_link == 'http://everest.akkado.in/Telecaller/resetPassword.php') {
                ?>
                <li class="active"><a href="resetPassword.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Reset Password</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="resetPassword.php"><i class="fa fa-home"></i><span>Reset Password</span></a></li>
                            <?php
                        }
                        ?>




        </ul>
    </section>
</aside>