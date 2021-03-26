<?php

include 'Database/connection.php';
session_start();


$S_srn = $_SESSION['id'];
$sql = "SELECT * from `students` join Class on students.Class_id=Class.Class_id WHERE
 S_srn = '$S_srn' ORDER BY Created_on DESC";



$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);



if (isset($_POST['submit'])) {


	$Password = $_POST['Password'];

	$Password2 = $_POST['Password2'];

	$OldPassword = $_POST['OldPassword'];
	
	$op=$result['S_password'];


	$error = false;


	if ($OldPassword == $op) {


		if ($Password == $Password2) {




			if ($row == 1) {

				$update = mysqli_query($Conn, "UPDATE students SET S_password ='$Password' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());
			}
		} else {

			$error_msg['d'] = 'Please Enter same passwords';
		$error = true;


		}
	} else {

		$error_msg['C'] = ' Your old password is incorrect';
		$error = true;
	}
}












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
	<link rel="stylesheet" href="css/log_style.css">
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
									<li><a href="student_chat.php">Chat</a></li>
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
		<!--single student detail start-->
		<div class="ed_dashboard_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="ed_sidebar_wrapper">
							<!-- <div class="ed_profile_img">
								<img src="http://placehold.it/263X263" alt="Dashboard Image" />
							</div> -->
							<h3><?php echo $result['S_name'];  ?></h3>
							<div class="ed_tabs_left">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#dashboard" data-toggle="tab">dashboard</a></li>

									<li><a href="#profile" data-toggle="tab">profile</a></li>
									<li><a href="#setting" data-toggle="tab">setting</a></li>
									<li><a href="Logout.php">Logout</a></li>

								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<div class="ed_dashboard_tab">
							<div class="tab-content">
								<div class="tab-pane active" id="dashboard">
									<div class="ed_dashboard_tab_info">
										<h1>hello, <span><?php echo $result['S_name'];  ?></span></h1>
										<h1>welcome to dashboard</h1>
										<p>Hi <strong> <?php echo $result['S_name'];  ?></strong>, here you have to see your profile, notifications and change your password.</p>
									</div>
								</div>


								<div class="tab-pane" id="profile">
									<div class="ed_dashboard_inner_tab">
										<div role="tabpanel">
											<!-- Nav tabs -->
											<!-- <ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">view</a></li>
												<li role="presentation"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">edit</a></li>
												<li role="presentation"><a href="#change" aria-controls="change" role="tab" data-toggle="tab">change profile photo</a></li>
											</ul> -->
											<!-- Tab panes -->
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="view">
													<div class="ed_dashboard_inner_tab">
														<h2>your profile</h2>
														<table id="profile_view_settings">
															<tbody>

																<tr>
																	<td><b>Name</b></td>
																	<td><?php echo $result['S_name'];  ?>
																</tr>



																<tr>
																	<td><b>Id</b></td>
																	<td><?php echo $result['S_grn'];  ?></td>
																</tr>

																<tr>
																	<td><b>Contact no</b></td>
																	<td><?php echo $result['S_contact'];  ?></td>
																</tr>

																<tr>
																	<td><b>Student DOB</b></td>
																	<td><?php echo $result['S_dob'];  ?></td>
																</tr>

																<tr>
																	<td><b> Class</b></td>
																	<td><?php echo $result['C_no'];  ?></td>
																</tr>

																<tr>
																	<td><b> Stream</b></td>
																	<td><?php echo $result['Stream'];  ?></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>


											</div>
										</div>
										<!--tab End-->
									</div>
								</div>
								<div class="tab-pane" id="setting">
									<div class="ed_dashboard_inner_tab">
										<div role="tabpanel">
											<!-- Nav tabs -->


											<!-- Tab panes -->
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="general">
													<div class="ed_dashboard_inner_tab">

														<form class="ed_tabpersonal" method="POST">

															<div class="form-group">
																<p>Change Password <strong>(leave blank for no change)</strong></p>
															</div>
															<div class="form-group">
																<input type="password" name="OldPassword" class="form-control" placeholder="Old Password">
																<?php

																if (isset($error_msg['C'])) {
																	echo "<div class='invalid'><p>" . $error_msg['C'] . "</p></div>";
																}


																?>
															</div>


															<div class="form-group">
																<input type="password" name="Password" class="form-control" placeholder="New Password">
															</div>
															<div class="form-group">
																<input type="password" name="Password2" class="form-control" placeholder="Repeat New Password">
																<?php

																if (isset($error_msg['d'])) {
																	echo "<div class='invalid'><p>" . $error_msg['d'] . "</p></div>";
																}


																?>
															</div>
															<div class="form-group">
																<input type="submit" class="btn ed_btn ed_green" name="submit" value="save changes">
															</div>
														</form>
													</div>
												</div>


											</div>

										</div>
										<!--tab End-->
									</div>
								</div>

								<!--tab End-->
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
	</div>
	<!--single student detail end-->
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
	<script type="text/javascript" src="js/custom.js"></script>

	<!--main js file end-->
</body>

</html>