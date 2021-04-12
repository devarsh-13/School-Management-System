<?php

include  'connection.php';
session_start();
if (!isset($_SESSION['t_id'])) {
	header("location:teacher_login.php");
}

$T_srn = $_SESSION['t_id'];
$sql = "SELECT * from `teachers` WHERE T_srn = '$T_srn'";



$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);


?>

<!DOCTYPE html>

<html lang="en">


<head>
	<meta charset="utf-8" />
	<title>Educo Multipurpose Responsive HTML Template</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Educo" />
	<meta name="keywords" content="Educo, html template, Education template" />
	<meta name="author" content="Kamleshyadav" />
	<meta name="MobileOptimized" content="320" />

	<link href="../css/main.css" rel="stylesheet" type="text/css" />

	<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
</head>

<body>

	<div id="educo_wrapper">


		<div class="ed_dashboard_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="ed_sidebar_wrapper">
							<div class="ed_profile_img">
								<img src="../user_photos/<?php echo $result['T_photo']; ?>" alt="">
							</div>
							<h3><?php echo $result['T_name'];  ?></h3>
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
										<h1>hello, <span><?php echo $result['T_name'];  ?></span></h1>
										<h1>welcome to dashboard</h1>
										<p>Hi <strong> <?php echo $result['T_name'];  ?></strong>, here you have to see your profile, notifications and change your password.</p>
									</div>
								</div>
								<div class="tab-pane" id="profile">
									<div class="ed_dashboard_inner_tab">
										<div role="tabpanel">

											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="view">
													<div class="ed_dashboard_inner_tab">
														<h2>your profile</h2>
														<table id="profile_view_settings">
															<tbody>

																<tr>
																	<td><b>Name</b></td>
																	<td><?php echo $result['T_name'];  ?>
																</tr>



																<tr>
																	<td><b>Id</b></td>
																	<td><?php echo $result['T_srn'];  ?></td>
																</tr>

																<tr>
																	<td><b>Contact no</b></td>
																	<td><?php echo $result['Contact'];  ?></td>
																</tr>

																<tr>
																	<td><b>Teacher DOB</b></td>
																	<td><?php echo $result['DOB'];  ?></td>
																</tr>

																<tr>
																	<td><b>Joining Date </b></td>
																	<td><?php echo $result['Joining_date'];  ?></td>
																</tr>

																<tr>
																	<td><b>Retire Date</b></td>
																	<td><?php echo $result['Retire_date'];  ?></td>
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
																<input id="change_done" disabled style=" background-color:transparent;border:none;width: 100%; color: #228B22;" ;>
																
																
															</div>
														</form>
														<script src="profile_teacher.js"></script>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>

							</div>
						</div>
					</div>


				</div>
			</div>
		</div>



	</div>

	<script type="text/javascript" src="../js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/modernizr.js"></script>
	<script type="text/javascript" src="../js/owl.carousel.js"></script>
	<script type="text/javascript" src="../js/smooth-scroll.js"></script>
	<script type="text/javascript" src="../js/plugins/revel/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="../js/plugins/revel/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="../js/plugins/revel/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="../js/plugins/revel/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="../js/plugins/revel/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="../js/plugins/countto/jquery.countTo.js"></script>
	<script type="text/javascript" src="../js/plugins/countto/jquery.appear.js"></script>
	<script type="text/javascript" src="../js/custom.js"></script>


</body>

</html>