<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Alumni Management System</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Vigor Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href=//fonts.googleapis.com/css?family=Simonetta:400,900 rel=stylesheet type=text/css>
<link href=//fonts.googleapis.com/css?family=Questrial rel=stylesheet type=text/css>
<script src="js/bootstrap.min.js"></script>
<!--pop-up-box-->
	<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>  
	<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--pop-up-box-->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->

</head>
<body>
<!--header-->
<div class="header">
	<div class="container">
		<div class="header-top">
			<div class="col-sm-2 header-login">
				<div class=" logo animated wow shake" data-wow-duration="1000ms" data-wow-delay="500ms">
					<h1><a href="index.php">ALUMNI MANAGEMENT SYSTEM</a>	</h1>
				</div>
			</div>	
			<div class="col-sm-10 header-social ">
							
				 <ul class="social-icon">
				 <?php
				 if(!isset($_SESSION['type']))
				 {
				 /* ### */  ?>
						<li><a href="adminlogin.php" style="font-weight:bold;">Admin Login</a></li>
				 <?php
				 }
				 else
				 {
					 echo "<li><a href=# style=font-weight:bold;>Welcome ".$_SESSION['name']."</a></li>";
				 }
				 /* ### */  ?>
						<!--<li><a href="#"><i class="ic1"></i></a></li>
						<li><a href="#"><i class="ic2"></i></a></li>
						<li><a href="#"><i class="ic3"></i></a></li>
						<li><a href="#"><i class="ic4"></i></a></li>-->
					</ul> 
					<div class="clearfix"> </div>
     		<div class="head">
			<nav class="navbar navbar-default"  style="background-color: #4a3131;">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					 <ul class="nav navbar-nav" >
						<li ><a class="nav-in" href="index.php"><span data-letters="Home">Home</span></a> </li>
						<?php
						if(!isset($_SESSION['type']))
						{
					    /* ### */  ?>
						<li ><a class="nav-in" href="about.php"><span data-letters="About">About</span></a> </li> 
						<li><a class="nav-in" href="event.php"><span data-letters="Events">Events</span></a></li>
						<li><a class="nav-in" href="gallery.php"><span data-letters="Gallery">Gallery</span></a></li> 
						<li><a class="nav-in" href="login.php"><span data-letters="Login">Login</span></a></li>
						<li><a class="nav-in" href="reg.php"><span data-letters="New Alumni">New Alumni</span></a></li>
						<li><a class="nav-in" href="staffreg.php"><span data-letters="New Staff">New Staff</span></a></li>
						<li><a class="nav-in" href="contact.php"><span data-letters="Contact">Contact</span></a></li>
						<?php
						}
						else if(isset($_SESSION['type']) && $_SESSION[type] == admin)
						{
							/* ### */  ?>
							<li><a class="nav-in" href="addadmin.php"><span data-letters="New Admin">New Admin</span></a></li>
							<li><a class="nav-in" href="managecourse.php"><span data-letters="Manage Course">Manage Course</span></a></li>
							 <li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Verify<span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="verify_reg.php" style=color:black><span data-letters="Alumni">Alumni</span></a></li>
								<li><a href="verify_staff.php" style=color:black><span data-letters="Staff">Staff</span></a></li>
							  </ul>
							</li>
							 <li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events<span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="alumnimeet.php" style=color:black><span data-letters="Add">Add</span></a></li>
								<li><a href="manage_events.php" style=color:black><span data-letters="View/Update">View/Update</span></a></li>
							  </ul>
							</li>
								<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  <li><a href="gallery.php" style=color:black><span data-letters="View Gallery">View Gallery</span></a></li>
								<li><a href="alumnigallery.php" style=color:black><span data-letters="Update Gallery">Update Gallery</span></a></li>
							  </ul>
							</li>
						<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Office Bearers<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  	<li><a href="region.php" style=color:black><span data-letters="Add Region">Add Region</span></a></li>
								<li><a href="regionoffice.php" style=color:black><span data-letters="Add">Add Office Bearears</span></a></li>
								<li><a href="alumnioffice.php" style=color:black><span data-letters="View/Update">View/Update</span></a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fund<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  	<li><a href="viewfund.php" style=color:black><span data-letters="View Collection">View Collection</span></a></li>
								<li><a href="invest.php" style=color:black><span data-letters="Update Investment">Update Investment</span></a></li>
								<li><a href="viewinvest.php" style=color:black><span data-letters="View Investment">View Investment</span></a></li>
							  </ul>
							</li>
						 
								<li><a class="nav-in" href="verifyjob.php"><span data-letters="Job Postings">Job Postings</span></a></li>
								
								<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Training<span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="training.php" style=color:black><span data-letters="Add">Add</span></a></li>
								<li><a href="viewtraining.php" style=color:black><span data-letters="View/Update">View/Update</span></a></li>
							  </ul>
							</li>
							<li><a class="nav-in" href="feedback.php"><span data-letters="Feedback">Feedback</span></a></li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="changepass.php" style=color:black><span data-letters="Change Password">Change Password</span></a></li>
								<li><a href="logout.php" style=color:black><span data-letters="Logout">Logout</span></a></li>
							  </ul>
							</li>
						
							<?php
						}
						else if(isset($_SESSION['type']) && $_SESSION[type] == alumni)
						{
							/* ### */  ?>
								<li><a class="nav-in" href="event.php"><span data-letters="Events">Events</span></a></li>
							<li><a class="nav-in" href="job.php"><span data-letters="Jobs">Jobs</span></a></li>
								<li><a class="nav-in" href="search.php"><span data-letters="Friends">Friends</span></a></li>
							<li><a class="nav-in" href="officesearch.php"><span data-letters="Office Bearers">Office Bearers</span></a></li>
							<li><a class="nav-in" href="viewtraining.php"><span data-letters="Training">Training</span></a></li>
							
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fund<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  	<li><a href="raisefunds.php" style=color:black><span data-letters="Donate Fund">Donate Fund</span></a></li>
								<li><a href="viewfund.php" style=color:black><span data-letters="View Donations">View Donations</span></a></li>
								<li><a href="viewinvest.php" style=color:black><span data-letters="View Utilized Fund">View Utilized Fund</span></a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  <li><a href="gallery.php" style=color:black><span data-letters="View Gallery">View Gallery</span></a></li>
								<li><a href="alumnigallery.php" style=color:black><span data-letters="Update Gallery">Update Gallery</span></a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  <li><a href="alumniprofile.php" style=color:black><span data-letters="Update Profile">Update Profile</span></a></li>
								<li><a href="changepass.php" style=color:black><span data-letters="Change Password">Change Password</span></a></li>
								<li><a href="logout.php" style=color:black><span data-letters="Logout">Logout</span></a></li>
							  </ul>
							</li>
							
							
							<?php
						}
						else if(isset($_SESSION['type']) && $_SESSION[type] == staff)
						{
							/* ### */  ?>
							<li><a class="nav-in" href="job.php"><span data-letters="Jobs">Jobs</span></a></li>
							<li><a class="nav-in" href="event.php"><span data-letters="View Events">View Events</span></a></li>
							<li><a class="nav-in" href="officesearch.php"><span data-letters="Office Bearers">Office Bearers</span></a></li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  <li><a href="gallery.php" style=color:black><span data-letters="View Gallery">View Gallery</span></a></li>
								<li><a href="alumnigallery.php" style=color:black><span data-letters="Update Gallery">Update Gallery</span></a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
							  <ul class="dropdown-menu">
							  <li><a href="staffprofile.php" style=color:black><span data-letters="Update Profile">Update Profile</span></a></li>
								<li><a href="changepass.php" style=color:black><span data-letters="Change Password">Change Password</span></a></li>
								<li><a href="logout.php" style=color:black><span data-letters="Logout">Logout</span></a></li>
							  </ul>
							</li>
					
							
							<?php
						}
							/* ### */  ?>
							
					</ul>
					 	</div><!-- /.navbar-collapse -->
					
				</nav>
				
		</div>
					
			</div>
				<div class="clearfix"> </div>
		</div>

	</div>
</div>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>