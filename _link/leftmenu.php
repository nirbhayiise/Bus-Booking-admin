<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<section class="sidebar">
		
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<!--<li class="header">Akado Dashboard</li>-->
			<li class="header"></li>
            <?php
			$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			if($actual_link == 'http://localhost/mytest/home.php')
			{
			?>
            <li class="active"><a href="home.php" style="color: #fff !important;"><i class="fa fa-home"></i><span>Home</span></a></li>
            <?php
			}else{
			?>
            <li><a href="home.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <?php
			}
			?>
            
            <?php
            if($actual_link == 'http://localhost/mytest/listManageUser.php')
			{
			?>
            <li class="active"><a href="listManageUser.php"  style="color: #fff !important;"><i class="fa fa-users"></i><span> Manage User</span></a></li>
            <?php
			}else{
			?>
            <li><a href="listManageUser.php"><i class="fa fa-users"></i><span> Manage User</span></a></li>
            <?php
			}
			?>
            
			
			<?php
            if($actual_link == 'http://localhost/mytest/listBus.php')
			{
			?>
            <li class="active"><a href="listBus.php"  style="color: #fff !important;"><i class="fa fa-bus"></i><span> Manage Bus</span></a></li>
            <?php
			}else{
			?>
            <li><a href="listBus.php"><i class="fa fa-bus"></i><span> Manage Bus</span></a></li>
            <?php
			}
			?>



			<?php
            if($actual_link == 'http://localhost/mytest/listRoute.php')
			{
			?>
            <li class="active"><a href="listBus.php"  style="color: #fff !important;"><i class="fa fa-road"></i><span> Bus Route</span></a></li>
            <?php
			}else{
			?>
            <li><a href="listRoute.php"><i class="fa fa-road"></i><span> Bus Route</span></a></li>
            <?php
			}
			?>
			
			
			
			
			
            <?php
            if($actual_link == 'http://localhost/mytest/listTourPackage.php')
			{
			?>
            <li class="active"><a href="listTourPackage.php" style="color: #fff !important;"><i class="fa fa-bus"></i><span> Manage Tour Package</span></a></li>
            <?php
			}else{
			?>
            <li><a href="listTourPackage.php"><i class="fa fa-bus"></i><span> Manage Tour Package</span></a></li>
            <?php
			}
			?>
            
            
            
            
            
            <?php
            if($actual_link == 'http://localhost/mytest/listTicketBooking.php')
			{
			?>
            <li class="active"><a href="listTicketBooking.php" style="color: #fff !important;"><i class="fa fa-user-plus"></i><span>Manage Ticket Booking</span></a></li>
            <?php
			}else{
			?>
            <li><a href="listTicketBooking.php"><i class="fa fa-user-plus"></i><span>Manage Ticket Booking</span></a></li>
            <?php
			}
			?>
            
            <?php
            if($actual_link == 'http://localhost/mytest/listCity.php')
			{
			?>
            <li class="active"><a href="listCity.php" style="color: #fff !important;"><i class="fa fa-map"></i><span>Manage City</span></a></li>
            <?php
			}else{
			?>
            <li><a href="listCity.php"><i class="fa fa-map"></i><span>Manage City</span></a></li>
            <?php
			}
			?>
			
			
			
			<?php
            if($actual_link == 'http://localhost/mytest/listFare.php')
			{
			?>
            <li class="active"><a href="listFare.php" style="color: #fff !important;"><i class="fa fa-map"></i><span>Manage Fare</span></a></li>
            <?php
			}else{
			?>
            <li><a href="listFare.php"><i class="fa fa-inr"></i><span>Manage Fare</span></a></li>
            <?php
			}
			?>
			
			
            
            <?php
            if($actual_link == 'http://localhost/mytest/viewCancellation.php')
			{
			?>
            <li class="active"><a href="viewCancellation.php" style="color: #fff !important;"><i class="fa fa-eye"></i><span>View Cancellation</span></a></li>
            <?php
			}else{
			?>
            <li><a href="viewCancellation.php"><i class="fa fa-eye"></i><span>View Cancellation</span></a></li>
            <?php
			}
			?>
            
         
           
            <?php
            if($actual_link == 'http://localhost/mytest/viewFeedback.php')
			{
			?>
            <li class="active"><a href="viewFeedback.php" style="color: #fff !important;"><i class="fa fa-envelope"></i><span>View Feedback</span></a></li>
            <?php
			}else{
			?>
            <li><li><a href="viewFeedback.php"><i class="fa fa-envelope"></i><span>View Feedback</span></a></li></li>
            <?php
			}
			?>
		</ul>
	</section>
</aside>