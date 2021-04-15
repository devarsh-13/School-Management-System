<?php

include  'connection.php';
session_start();

include 'store_data.php';
$log=new Log();
$action="In Admin profile";

if (!isset($_SESSION['a_id'])) {
	header("location:admin_login.php");
}

$a_srn = $_SESSION['a_id'];
$sql = "SELECT * from `admin` WHERE A_id = '$a_srn'";


$log->success_entry($action,$Conn);

$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);


?>

<!DOCTYPE html>

<html lang="en">


<head>
<meta charset="utf-8" />
	<title>IGHS | Admin Profile</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Educo" />
	<meta name="keywords" content="Educo, html template, Education template" />
	<meta name="author" content="Kamleshyadav" />
	<meta name="MobileOptimized" content="320" />
	<link href="../css/main.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
	<link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
	<link rel="stylesheet" href="../css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
	<link rel="stylesheet" type="text/css" href="../js/DataTables/datatables.min.css" />
	<link rel="stylesheet" href="../css/main.css" media="screen">
	<script src="js/modernizr/modernizr.min.js"></script>
	<!-- end theme style -->
	<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" href="../css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="../css/animate-css/animate.min.css" media="screen">
	<link rel="stylesheet" href="../css/lobipanel/lobipanel.min.css" media="screen">
	<link rel="stylesheet" href="../css/toastr/toastr.min.css" media="screen">
	<link rel="stylesheet" href="../css/icheck/skins/line/blue.css">
	<link rel="stylesheet" href="../css/icheck/skins/line/red.css">
	<link rel="stylesheet" href="../css/icheck/skins/line/green.css">
	<link rel="stylesheet" href="../css/main.css" media="screen">
	<script src="../js/modernizr/modernizr.min.js"></script>






	<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
  <link rel="stylesheet" href="../teacher/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="../teacher/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="../teacher/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="../teacher/css/main.css" media="screen" >
        <script src="../teacher/js/modernizr/modernizr.min.js"></script>


      <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../teacher/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../teacher/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../teacher/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../teacher/assets/css/typography.css">
    <link rel="stylesheet" href="../teacher/assets/css/default-css.css">
    <link rel="stylesheet" href="../teacher/assets/css/styles.css">
    <link rel="stylesheet" href="../teacher/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../teacher/assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <style type="text/css">
        .section
        {
            background-color: white;
            margin-top: 3%;
        }
    </style>
</head>

<body >
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
       <?php include('includes/leftbar.php'); ?>
    <div class="main-content">
         <?php include('includes/topbar.php'); ?>



      
        <!-- page title area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">ADD Event</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Add Event</span></li>
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>Fill The Event Info.</span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->


	<div id="educo_wrapper">


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
														<script src="profile_admin.js"></script>
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



    <!-- bootstrap 4 js -->
    <script src="../teacher/assets/js/popper.min.js"></script>
    <script src="../teacher/assets/js/bootstrap.min.js"></script>
    <script src="../teacher/assets/js/owl.carousel.min.js"></script>
    <script src="../teacher/assets/js/metisMenu.min.js"></script>
    <script src="../teacher/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../teacher/assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../teacher/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../teacher/assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../teacher/assets/js/plugins.js"></script>
    <script src="../teacher/assets/js/scripts.js"></script>




</body>

</html>