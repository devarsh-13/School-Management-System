<?php

require "Database/connection.php";

session_start();

if (isset($_SESSION['id'])) {
	
	$S_srn = $_SESSION['id'];
	$update = mysqli_query($Conn, "UPDATE students SET s_status ='offline' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());

?>


	<!DOCTYPE html>
	<!-- 
Template Name: Educo
Version: 3.0.0
Author: Kamleshyadav
Website: http://himanshusofttech.com/
Purchase: http://themeforest.net/user/kamleshyadav
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
		<!-- end theme style -->
		<!-- favicon links -->
		<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
		<style type="text/css">
		
.scrolling-wrapper {
	height: 300px;
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;


}
  .card {
  	border: 2px solid black;
    display: inline-block;
    height: 100%;
    text-align: center;
    width: 50%;
    padding: 9px;

  }
  .card h4
  {
  	margin-top: 20%;
  }


	</style>
	</head>

	<body>
		<!--Page main section start-->
		<div id="educo_wrapper">
			<!--Header start-->
			<header id="ed_header_wrapper">
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
										<li><a href="resource-download.php">Resources</a></li>
										<li><a href="student_profile.php">Profile</a></li>
										<li><a href="student_chat/select_users.php">Chat</a></li>
										<li><a href="about.html">about us</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="educo_call"><a href="#"><i class="fa fa-bell"></i>Notification</a></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!--header end -->
			<div class="ed_slider_form_section">
				<!--Slider start-->
				<section class="ed_mainslider">
					<article class="content">
						<div class="rev_slider_wrapper">
							<!-- START REVOLUTION SLIDER 5.0 auto mode -->
							<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
								<div id="rev_slider" class="rev_slider " data-version="5.0">
									<ul>
										<!-- SLIDE  -->
										<li data-transition="slotslide-horizontal">

											<!-- MAIN IMAGE -->
											<img src="banner2.jpg" alt="">


										</li>
										<li data-transition="slotslide-vertical">

											<!-- MAIN IMAGE -->
											<img src="g2.jpg" alt="">

										</li>
										<li data-transition="slotslide-vertical">

											<!-- MAIN IMAGE -->
											<img src="g3.jpg" alt="">

										</li>

										<!-- SLIDE  -->

									</ul>
								</div><!-- END REVOLUTION SLIDER -->
							</div><!-- END  -->
						</div><!-- END REVOLUTION SLIDER WRAPPER -->
					</article>
				</section>
				<!--Slider end-->
				<!--Slider form start--
<div class="ed_form_box">
<div class="container">
	<div class="ed_search_form">
		<form class="form-inline">
		  <div class="form-group">
			<input type="text" placeholder="Course Name" class="form-control" id="course">
		  </div>
		  <div class="form-group">
			<input type="text" placeholder="Location" class="form-control" id="location">
		  </div>
		  <div class="form-group">
			<input type="text" placeholder="Language" class="form-control" id="language">
		  </div>
		  <div class="form-group">
			<input type="text" placeholder="Type" class="form-control" id="type">
		  </div>
		  <div class="form-group">
		  <button type="button" class="btn ed_btn pull-right ed_orange">search</button>
		  </div>
		</form>
	</div>
</div>
</div>
<--Slider form end-->
			</div>
			<!--Latest news start -->
			<div class="ed_graysection ed_toppadder80 ed_bottompadder80" id="event">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ed_bottompadder80">
							<div class="ed_heading_top">
								<h3>Events</h3>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
								<div id="owl-demo2"class="scrolling-wrapper">



									<?php
									

									$sql = ("SELECT * FROM `Event` WHERE `is_deleted`='0'") or die (mysqli_connect_error());

									$q = mysqli_query($Conn, $sql);

									while ($r = mysqli_fetch_array($q)) {
										echo " 
            								<div class='card'>
												<h4>" . $r['event_date'] . "</h4>
												<p> " . $r['Event_text'] . "</p>
																									
												</div>	";
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.container -->
			</div>
			<!--Latest news end -->




			<!--skill section start --

<div class="ed_graysection ed_toppadder90 ed_bottompadder90">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="skill_section">
					<h4><a href="#">See our best skills</a></h4>
					<p>We excell in multiple areas, but there are some in which we are absolutely rocking.</p>
					<span><i class="fa fa-tachometer"></i></span>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="skill_section">
					<h4><a href="#">Recieve a sign-in sheet <i class="fa fa-long-arrow-right"></i></a></h4>
					<p>Not a member yet? You need to download this sign-in sheet and make sure you become one.</p>
					<span><i class="fa fa-file-text-o"></i></span>
				</div>
			</div>
        </div>
	</div>
</div>
<!-skill section end --
<--video_section Section three start --
<div class="ed_parallax_section">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="ed_video_section">
					<div class="embed-responsive embed-responsive-16by9">
						<div class="ed_video">
							<img src="http://placehold.it/544X334" style="cursor:pointer"  alt="1" />
							<div class="ed_img_overlay">
								<a href="#"><i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
						<iframe id="educo_video" class="embed-responsive-item" src="https://www.youtube.com/embed/8mb-0qbq984" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="ed_video_section_discription">
					<h4>Daily life of studying at Educo</h4>
					<p>Nam cursus imperdiet elit. Fusce sollicitudin eget nulla in condimentum. Nullam dignissim id magna non tempus. Vivamus molestie nulla nec pharetra dignissim. Suspendisse auctor nisi et neque vehicula pulvinar. Quisque quis tempus magna. Quisque sed luctus nunc sapien.</p>
					<span><a href="#" class="btn ed_btn ed_orange">see more</a></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-video_section Section three end -->
			<!-- Most recomended Courses Section four start -->
			<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="ed_heading_top ed_bottompadder80">
								<h3> TIME TABLE</h3>
							</div>
						</div>


						<CENTER>
							<br><br><br>
							<table border="2" cellspacing="3" align="center" bordercolor="brown">
								<tr>
									<td align="center">
									<td>8:30-9:30</td>
									<td>9:30-10:30</td>
									<td>10:30-11:30</td>
									<td>11:30-12:30</td>
									<td>12:30-2:00</td>
									<td>2:00-3:00</td>
									<td>3:00-4:00</td>
									<td>4:00-5:00</td>
								</tr>
								<tr>
									<td align="center">MONDAY</td>
									<td align="center">---
									<td align="center">
										<font color="blue">SUB1<br>
									</td>
									<td align="center">
										<font color="pink">SUB2<br>
									</td>
									<td align="center">
										<font color="red">SUB3<br>
									</td>
									<td rowspan="6" align="center">L<br>U<br>N<br>C<br>H</td>
									<td align="center">
										<font color="maroon">SUB4<br>
									</td>
									<td align="center">
										<font color="brown">SUB5<br>
									</td>
									<td align="center">counselling class</td>
								</tr>
								<tr>
									<td align="center">TUESDAY</td>
									<td align="center">
										<font color="blue">SUB1<br>
									</td>
									<td align="center">
										<font color="red">SUB2<br>
									</td>
									<td align="center">
										<font color="pink">SUB3<br>
									</td>
									<td align="center">---</td>
									<td align="center">
										<font color="orange">SUB4<BR>
									</td>
									<td align="center">
										<font color="maroon">SUB5<br>
									</td>
									<td align="center">library</td>
								</tr>
								<tr>
									<td align="center">WEDNESDAY</td>
									<td align="center">
										<font color="pink">SUB1<br>
									</td>
									<td align="center">
										<font color="orange">SUB2<BR>
									</td>
									<td align="center">
										<font color="brown">SUB3<br>
									</td>
									<td align="center">---</td>
									<td colspan="3" align="center">
										<font color="green"> lab
									</td>
								</tr>
								<tr>
									<td align="center">THURSDAY</td>
									<td align="center">SUB1<br></td>
									<td align="center">
										<font color="brown">SUB2<br>
									</td>
									<td align="center">
										<font color="orange">SUB3<BR>
									</td>
									<td align="center">---</td>
									<td align="center">
										<font color="blue">SUB4<br>
									</td>
									<td align="center">
										<font color="red">SUB5<br>
									</td>
									<td align="center">library</td>
								</tr>
								<tr>
									<td align="center">FRIDAY</td>
									<td align="center">
										<font color="orange">SUB1<BR>
									</td>
									<td align="center">
										<font color="maroon">SUB2<br>
									</td>
									<td align="center">
										<font color="blue">SUB3<br>
									</td>
									<td align="center">---</td>
									<td align="center">
										<font color="pink">SUB4<br>
									</td>
									<td align="center">
										<font color="brown">SUB5<br>
									</td>
									<td align="center">library</td>
								</tr>
								<tr>
									<td align="center">SATURDAY</td>
									<td align="center">
										<font color="red">SUB1<br>
									</td>
									<td colspan="3" align="center">seminar</td>
									<td align="center">
										<font color="pink">SUB4<br>
									</td>
									<td align="center">
										<font color="brown">SUB5<br>
									</td>
									<td align="center">library</td>
								</tr>
							</table>
					</div>
				</div><!-- /.container -->
			</div>
			<!--Most recomended Courses Section four end -->
			<!--Latest news start -->
			<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ed_bottompadder80">
							<div class="ed_heading_top">
								<h3>Notification</h3>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="ed_latest_news_slider">
								<div id="owl-demo2"class="scrolling-wrapper">



									<?php
									

									$sql = ("SELECT * FROM `notification` WHERE `is_deleted`='0'") or die(mysqli_connect_error());

									$q = mysqli_query($Conn, $sql);

									while ($r = mysqli_fetch_array($q)) {

										echo " 
            								<div class='card'>
												<h4>" . $r['Sr_n'] . "</h4>
												<p> " . $r['Notification_text'] . "</p>
													
												</div>
											
            							";
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.container -->
			</div>
			<!--Latest news end -->
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
<--Newsletter Section six end-->
			
<?php
include "footer.php";
?>
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

<?php
} else {
	echo "PLEASE LOGIN TO CONTINUE <a href='http://localhost/project6/'> Login </a>";
}

?>