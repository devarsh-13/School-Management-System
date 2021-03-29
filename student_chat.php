<?php

require 'Database/connection.php';
session_start();


// $S_srn = $_SESSION['id'];
// $sql = "SELECT * from `students` join Class on students.Class_id=Class.Class_id WHERE
//  S_srn = '$S_srn' ORDER BY Created_on DESC";
$sql = "SELECT * FROM `teachers` where 'is_deleted'=0";


$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);

// $result = mysqli_fetch_array($query);


?>



<!DOCTYPE html>
<!-- 
Template Name: Educo
Version: 3.0.0
Author: 
Website: 
Purchase: 
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Begin Head -->

<head>

	<title>ighs</title>

	<!--srart theme style -->
	<link href="css/main.css" rel="stylesheet" type="text/css" />
	<link href="css/chat.css" rel="stylesheet" type="text/css" />
	<script src="js/chat.js"></script>
	<!-- end theme style -->
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
</head>

<body>
	<!--Page main section start-->
	<div id="educo_wrapper">
		<!--Header start-->
		<header id="ed_header_wrapper">
			<!--<div class="ed_header_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<p>welcome to our new session of education</p>
					<div class="ed_info_wrapper">
						<a href="#" id="login_button">Login</a>
							<div id="login_one" class="ed_login_form">
								<h3>log in</h3>
								<form class="form">
									<div class="form-group">
										<label class="control-label">Email :</label>
										<input type="text" class="form-control" >
									</div>
									<div class="form-group">
										<label  class="control-label">Password :</label>
										<input type="password" class="form-control">
									</div>
									<div class="form-group">
										<button type="submit">login</button>
										<a href="signup.html">registration</a>	
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
			<div class="ed_header_bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2">
							<div class="educo_logo"> <a href="index.html"><img src="images/header/Logo.png" alt="logo" /></a> </div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
							</div>
							<div class="edoco_menu">
								<ul class="collapse navbar-collapse" id="ed_menu">
									<li><a href="main.php">Home</a></li>
									<li><a href="#event">events</a></li>
									<li><a href="gallery.php">Gallery</a></li>
									<li><a href="courses.html">Resources</a></li>
									<li><a href="student_profile.php">Profile</a></li>
									<li><a href="contact.html">Chat</a></li>
									<li><a href="about.html">about us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<div class="educo_call"><i class="fa fa-phone"></i><a href="#">1-220-090</a></div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--header end -->
		<!--Breadcrumb start-->

		<!--Breadcrumb end-->
		<!--Section fourteen Contact form start-->
		<div class="ed_transprentbg ed_bottompadder80">
			<div id="root">
				<header>
				
					<nav>
						<ul>
							
						</ul>
					</nav>
				</header>
				<section class="main-view"><label for="toggle">&lt; Chatrooms</label><input id="toggle" type="checkbox" checked="">
					<aside class="chat-rooms">
						
						<ul>

							<?php


							// // foreach ($result as  $key => $value) {


								while($result=mysqli_fetch_array($query))
								{  
								echo '<li class=><a href="/chat/chat-1">'.$result['T_name']. ' </a></li>';


								}
							// // 
							// echo $row;
							// echo sizeof($result);

							// echo '<pre>'; print_r($result); echo '</pre>';


							
	





						


							?>

						</ul>
					</aside>
					<main class="chat">
						<ul class="messages-container">
							<li class=" system">
								<div class="content">Phone joined the chat</div>
								<div class="time-stamp">6 days ago</div>
							</li>
							<li class="">
								<div class="sender">Phone</div>
								<div class="content">Is anybody here??</div>
								<div class="time-stamp">6 days ago</div>
							</li>
							<li class=" system">
								<div class="content">Computer joined the chat</div>
								<div class="time-stamp">6 days ago</div>
							</li>
							<li class="own">
								<div class="sender">Computer</div>
								<div class="content">I am here!</div>
								<div class="time-stamp">6 days ago</div>
							</li>
						</ul>
						<form class="new-message"><input type="text" placeholder="message..." value=""><input type="submit" value="Send"></form>
					</main>
				</section>
			</div>
		</div>
		<!--Section fourteen Contact form start-->
		<!--Section fifteen Contact form start-->

		<!--Section fifteen Contact form start-->
		<!--Newsletter Section six start--
<div class="ed_newsletter_section">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
						<div class="ed_newsletter_section_heading">
							<h4>Let us inform you about everything important directly.</h4>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-3">
						<div class="row">
							<div class="ed_newsletter_section_form">
								<form class="form">
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										<input class="form-control" type="text" placeholder="Newsletter Email" />
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<button class="btn ed_btn ed_green">confirm</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
</div>
<!-Newsletter Section six end-->
		<!--Footer Top section start-->
		<div class="ed_footer_wrapper">
			<div class="ed_footer_top">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="widget text-widget">
								<p><a href="index.html"><img src="images/footer/F_Logo.png" alt="Footer Logo" /></a></p>
								<p>Edution is an outstanding PSD template targeting educational institutions, helping them establish strong identity on the internet without any real developing knowledge.
								</p>
								<div class="ed_sociallink">

								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="widget text-widget">
								<h4 class="widget-title">find us</h4>
								<p><i class="fa fa-safari"></i>Wimbledon Street 42a, 45290 Wimbledon, <br />United Kingdom</p>
								<p><i class="fa fa-envelope-o"></i><a href="#">info@edutioncollege.gov.co.uk</a> <a href="#">public@edutioncollege.gov.co.uk</a></p>
								<p><i class="fa fa-phone"></i> 1-220-090-080</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="widget text-widget">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Footer Top section end-->
		<!--Footer Bottom section start-->
		<div class="ed_footer_bottom">
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="ed_footer_menu">
								<ul>
									<li><a href="index.html">home</a></li>
									<li><a href="private_policy.html">private policy</a></li>
									<li><a href="about.html">about</a></li>
									<li><a href="contact.html">contact us</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Footer Bottom section end-->
	</div>
	<!--Page main section end-->

	<!--main js file start-->
	<script type="text/javascript" src="js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script type="text/javascript" src="js/smooth-scroll.js"></script>
	<script type="text/javascript" src="js/plugins/revel/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="js/plugins/revel/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="js/plugins/revel/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="js/plugins/revel/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="js/plugins/revel/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="js/plugins/countto/jquery.countTo.js"></script>
	<script type="text/javascript" src="js/plugins/countto/jquery.appear.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="js/gmaps.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script>
		var map;
		$(document).ready(function() {
			map = new GMaps({
				el: '#map',
				zoom: 16,
				lat: -12.043333,
				lng: -77.028333,
				scrollwheel: false,
				draggable: false,
				zoomControl: false,
				navigationControl: false,
				mapTypeControl: false,
				scaleControl: false,
				disableDoubleClickZoom: true,
				streetViewControl: false,
				overviewMapControl: false,
				panControl: false
			});

		});
	</script>
	<!--main js file end-->
</body>

</html>