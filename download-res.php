<?php
session_start();
error_reporting(0);
include('connection.php');
if (strlen($_SESSION['s_id']) == "") {
	header("Location: index.php");
} else {



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
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta name="description" content="Educo" />
		<meta name="keywords" content="Educo, html template, Education template" />
		<meta name="author" content="Kamleshyadav" />
		<meta name="MobileOptimized" content="320" />
		<link href="css/main.css" rel="stylesheet" type="text/css" />

		<!-- end theme style -->
		<!-- favicon links -->
		<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />

		<link rel="stylesheet" href="teacher/css/main.css" media="screen">


		<style type="text/css">
			#s {
				padding-top: 10px;
				padding-bottom: 10px;
			}

			.ed_footer_wrapper {
				padding-top: 30%;
			}
		</style>
	</head>

	<body>
		<!--Page main section start-->
		<div id="educo_wrapper">
			<?php
			include "header.php";
			?>




			<section class="section">
				<div class="container-fluid">
					<div class="row">


						<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">

							<tr>
								<th>#</th>
								<th>Action</th>
								<th>Resource Name</th>
								<th>Created by</th>
								<th>Created On</th>
							</tr>



							<?php
							require "Database/connection.php";
							session_start();

							$S_srn = $_SESSION['id'];
							$sub_id = $_GET['sub_id'];

							$sql1 = "SELECT * from `resources` WHERE `Sub_id`='$sub_id' ";
							$query = $Conn->query($sql1);
							$row = mysqli_num_rows($query);
							$path = "teacher/resource/";

							$cnt = 1;
							if ($row > 0) {
								while ($query1 = mysqli_fetch_array($query)) {
									$full = $path . $query1['R_path'];
							?>
									<tr align="center">
										<td><?php echo htmlentities($cnt); ?></td>
										<td>
											<a href="<?php echo $full; ?>" download="<?php echo $full; ?>"><img src="teacher/images/download.png" height="25px" width='25px' />&nbsp;Download</a>
										</td>

										<td><?php echo $query1['R_path']; ?></td>

										<td><?php
											$id = $query1['Created_by'];
											$q = mysqli_query($Conn, "SELECT `T_name` FROM `teachers` WHERE `T_srn` = '$id' ");
											$name = mysqli_fetch_array($q);
											echo $name[0];
											?>
										</td>

										<td><?php echo $query1['Created_on']; ?></td>



									</tr>
							<?php
									$cnt = $cnt + 1;
								}
							}
							else
							{

								echo "<center><h1> No images to show</h1></center>";
							}
							?>



						</table>



					</div>
					<!-- /.row -->
				</div>

				<!-- /.container-fluid -->
			</section>
			<!-- /.section -->





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
<?php  } ?>

	</html>