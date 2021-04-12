<?php

include 'connection.php';
session_start();

include 'store_data.php';

$a_srn = $_SESSION['a_id'];
$sql = "SELECT * from `admin` WHERE A_id = '$a_srn'";



$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);

if (!(isset($_POST['submit']))) {
	$action = "Profile";
	$log = new Log();
	$log->success_entry($action, $Conn);
}

if (isset($_POST['submit'])) {
	$Password = $_POST['Password'];
	$Password2 = $_POST['Password2'];
	$OldPassword = $_POST['OldPassword'];

	$op = $result['A_password'];

	$error = false;
	if ($OldPassword == $op) {
		if ($Password == $Password2) {
			if ($row == 1) {

				$update = mysqli_query($Conn, "UPDATE `admin` SET A_password ='$Password' WHERE A_id ='$a_srn' ") or die(mysqli_connect_error());
				if ($update) {
					$action = "Change Password";
					$log = new Log();
					$log->success_entry($action, $Conn);
				}
			}
		} else {
			$action = "Change Password";
			$log = new Log();
			$log->success_entry($action, $Conn, "Unchanged");

			$error_msg['d'] = 'Please Enter same passwords';
			$error = true;
		}
	} else {
		$action = "Change Password";
		$error_msg['C'] = ' Your old password is incorrect';
		$error = true;

		$log = new Log();
		$log->success_entry($action, $Conn, "Unchanged");
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
	<link href="../css/main.css" rel="stylesheet" type="text/css" />


	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
	<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
	<link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
	<link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
	<link rel="stylesheet" href="css/main.css" media="screen">
	<script src="js/modernizr/modernizr.min.js"></script>
	<!-- end theme style -->
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
	<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
	<link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
	<link rel="stylesheet" href="css/icheck/skins/line/blue.css">
	<link rel="stylesheet" href="css/icheck/skins/line/red.css">
	<link rel="stylesheet" href="css/icheck/skins/line/green.css">
	<link rel="stylesheet" href="css/main.css" media="screen">
	<script src="js/modernizr/modernizr.min.js"></script>
	<!-- favicon links -->
</head>

<body>
	<div class="main-wrapper">

		<!-- ========== TOP NAVBAR ========== -->
		<?php include('includes/topbar.php'); ?>
		<!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
		<div class="content-wrapper">
			<div class="content-container">
				<?php include('includes/leftbar.php'); ?>
				<!--Page main section start-->


				<!--Breadcrumb end-->
				<!--single student detail start-->
				<div class="ed_dashboard_wrapper">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="ed_sidebar_wrapper">
									<div class="ed_profile_img">
										<img src="../user_photos/<?php echo $result['A_Photo']; ?>" alt="">
									</div>
									<h3><?php echo $result['A_name'];  ?></h3>
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
												<h1>hello, <span><?php echo $result['A_name'];  ?></span></h1>
												<h1>welcome to dashboard</h1>
												<p>Hi <strong> <?php echo $result['A_name'];  ?></strong>, here you have to see your profile, notifications and change your password.</p>
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
																			<td><?php echo $result['A_name'];  ?>
																		</tr>



																		<tr>
																			<td><b>Id</b></td>
																			<td><?php echo $result['A_id'];  ?></td>
																		</tr>

																		<tr>
																			<td><b>Contact no</b></td>
																			<td><?php echo $result['A_mobile'];  ?></td>
																		</tr>

																		<tr>
																			<td><b>Date of Birth</b></td>
																			<td><?php echo $result['A_dob'];  ?></td>
																		</tr>
																		<tr>
																			<td><b>Address</b></td>
																			<td><?php echo $result['A_address'];  ?></td>
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
																		<input type="password" name="OldPassword" id="oldpassword" class="form-control" placeholder="Old Password">
																		<input id="error1" disabled style=" background-color:transparent;border:none;width: 100%; color: #ff0000;" ;>
																	</div>


																	<div class="form-group">
																		<input type="password" name="Password" id="password" class="form-control" placeholder="New Password">
																		<input disabled style=" background-color:transparent;border:none;width: 100%" ;>
																	</div>
																	<div class="form-group">
																		<input type="password" name="Password2" id="password2" class="form-control" placeholder="Repeat New Password">
																		<input id="error2" disabled style=" background-color:transparent;border:none;width: 100%; color: #ff0000;" ;>
																	</div>
																	<div class="form-group">
																		<input type="button" id="submit" class="btn ed_btn ed_green" value="SAVE CHANGE">
																	</div>
																</form>
																<script src="profile_admin.js"></script>
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
		<!--Footer Bottom section end-->
	</div>
	<!--Page main section end-->
	<!--main js file start-->
	<script type="text/javascript" src="../js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>


	<!--main js file end-->
	<!-- ========== COMMON JS FILES ========== -->
	<script src="js/jquery/jquery-2.2.4.min.js"></script>
	<script src="js/jquery-ui/jquery-ui.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/pace/pace.min.js"></script>
	<script src="js/lobipanel/lobipanel.min.js"></script>
	<script src="js/iscroll/iscroll.js"></script>

	<!-- ========== PAGE JS FILES ========== -->
	<script src="js/prism/prism.js"></script>
	<script src="js/waypoint/waypoints.min.js"></script>
	<script src="js/counterUp/jquery.counterup.min.js"></script>
	<script src="js/amcharts/amcharts.js"></script>
	<script src="js/amcharts/serial.js"></script>
	<script src="js/amcharts/plugins/export/export.min.js"></script>
	<link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
	<script src="js/amcharts/themes/light.js"></script>
	<script src="js/toastr/toastr.min.js"></script>
	<script src="js/icheck/icheck.min.js"></script>

	<!-- ========== THEME JS ========== -->
	<script src="js/main.js"></script>
	<script src="js/production-chart.js"></script>
	<script src="js/traffic-chart.js"></script>
	<script src="js/task-list.js"></script>
	<script>
		$(function() {

			// Counter for dashboard stats
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});

			// Welcome notification
			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
			toastr["success"]("Welcome to student Result Management System!");

		});
	</script>
</body>

</html>