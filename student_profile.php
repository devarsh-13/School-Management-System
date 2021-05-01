<?php

include 'Database/connection.php';
include('admin/store_data.php');

session_start();

$log=new Log();
$action="In Student Profile";

if (!isset($_SESSION['s_id'])) 
{
	$log->success_entry($action,$Conn,"Unsuccessful");
	header("location:login.php");
}
else
{
	$log->success_entry($action,$Conn);

	$S_srn = $_SESSION['s_id'];
	$sql = "SELECT * from `students` join Class on students.Class_id=Class.Class_id WHERE
	S_srn = '$S_srn' AND `is_deleted`='0' AND `updated`='0' ORDER BY Created_on DESC";

	$query = mysqli_query($Conn, $sql);
	$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);


?>

<!DOCTYPE html>

<html lang="en">


<head>
	
 
    
    
    <link rel="stylesheet" href="teacher/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="teacher/assets/css/themify-icons.css">
    <link rel="stylesheet" href="teacher/assets/css/metisMenu.css">
    <link rel="stylesheet" href="teacher/assets/css/default-css.css">
    <link rel="stylesheet" href="teacher/assets/css/styles.css">
   
	<meta charset="utf-8" />

	
	<title> Student Profile | IGHS</title>
	
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta name="MobileOptimized" content="320" />

	<link href="css/main.css" rel="stylesheet" type="text/css" />

	<link rel="shortcut icon" type="image/png" href="images/header/IGHS(1).png" />
</head>

<body>

	<div id="educo_wrapper">
		<?php include('header.php'); ?>

		<div class="ed_dashboard_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="ed_sidebar_wrapper">
							<div class="ed_profile_img">
								<img src="user_photos/student/<?php echo $result['S_photo']; ?>" alt="">
							</div>
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
										<p>Hi <strong> <?php echo $result['S_name'];  ?></strong>, here you can see your profile and can change your password.</p>
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
														<script src="profile_student.js"></script>
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

		<?php
		include "footer.php";
		?>

	</div>

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


    <script src="teacher/assets/js/metisMenu.min.js"></script>
    <script src="teacher/assets/js/jquery.slimscroll.min.js"></script>
    <script src="teacher/assets/js/jquery.slicknav.min.js"></script>
    <script src="teacher/assets/js/plugins.js"></script>
    <script src="teacher/assets/js/scripts.js"></script>
</body>

</html>

<?php

}
?>