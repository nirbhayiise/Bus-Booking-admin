<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"></li>
            <?php
            $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            if ($actual_link == 'http://everest.akkado.in/Client/home.php') {
                ?>
                <li class="active"><a href="home.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Home</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="home.php"><i class="fa fa-home"></i><span>Home</span></a></li>
                <?php
            }
            ?>


            <?php
            if ($actual_link == 'http://everest.akkado.in/Client/listRetailer.php') {
                ?>
                <li class="active"><a href="listRetailer.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Retailer</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="listRetailer.php"><i class="fa fa-home"></i><span>Retailer</span></a></li>
                <?php
            }
            ?>

            <?php
            if ($actual_link == 'http://everest.akkado.in/Client/listFabricator.php') {
                ?>
                <li class="active"><a href="listFabricator.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Fabricator</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="listFabricator.php"><i class="fa fa-home"></i><span>Fabricator</span></a></li>
                <?php
            }
            ?>


            <?php
            if ($actual_link == 'http://everest.akkado.in/Client/listSalesTeam.php') {
                ?>
                <li class="active"><a href="listSalesTeam.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Sales Team</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="listSalesTeam.php"><i class="fa fa-home"></i><span>Sales Team</span></a></li>
                <?php
            }
            ?>



            <?php
            if ($actual_link == 'http://everest.akkado.in/Client/resetPassword.php') {
                ?>
                <li class="active"><a href="resetPassword.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Reset Password</span></a></li>
                <?php
            } else {
                ?>
                <li><a href="resetPassword.php"><i class="fa fa-home"></i><span>Reset Password</span></a></li>
                <?php
            }
            ?>








        <!--<li><a href="resetPassword.php"><i class="fa fa-lock"></i><span>Reset Password</span></a></li>	-->
        </ul>
    </section>
</aside>