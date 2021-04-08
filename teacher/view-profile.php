<?php

include 'connection.php';
session_start();


$T_srn = $_SESSION['t_id'];
$sql = "SELECT * from `teachers` WHERE T_srn = '$T_srn'";



$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);



if (isset($_POST['submit'])) {


	$Password = $_POST['Password'];

	$Password2 = $_POST['Password2'];

	$OldPassword = $_POST['OldPassword'];
	
	$op=$result['Password'];


	$error = false;


	if ($OldPassword == $op) {


		if ($Password == $Password2) {




			if ($row == 1) {

				$update = mysqli_query($Conn, "UPDATE teachers SET Password ='$Password' WHERE T_srn ='$T_srn' ") or die(mysqli_connect_error());
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
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
	

	 <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
	<!-- end theme style -->
	<!-- favicon links -->
</head>

<body>
	  <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  
	<!--Page main section start-->
	

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
	<!--Footer Bottom section end-->
	</div>
	<!--Page main section end-->
	<!--main js file start-->
	<script type="text/javascript" src="../js/jquery-1.12.2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	

	<!--main js file end-->
</body>

</html>