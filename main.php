<?php
error_reporting(0);

require "connection.php";
require "admin/store_data.php";

session_start();



$action="In Student Home page";
$log=new Log();

if (isset($_SESSION['s_id'])) 
{
	$log->success_entry($action,$Conn);

	$S_srn = $_SESSION['s_id'];
	$update = mysqli_query($Conn, "UPDATE students SET s_status ='offline' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="teacher/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="teacher/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="teacher/assets/css/themify-icons.css">
    <link rel="stylesheet" href="teacher/assets/css/metisMenu.css">
    <link rel="stylesheet" href="teacher/assets/css/default-css.css">
    <link rel="stylesheet" href="teacher/assets/css/styles.css">

    <link rel="stylesheet" href="event_style.css" />
   
	<meta charset="utf-8" />

	<title>Home | IGHS</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta name="MobileOptimized" content="320" />

	<!--srart theme style -->
	<link href="css/main.css" rel="stylesheet" type="text/css" />
	<!-- end theme style -->
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="images/header/IGHS(1).png" />

	<!-- end theme style -->
	<!-- favicon links -->

	<style type="text/css">
		.scrolling-wrapper {
			height: 300px;
			overflow-x: scroll;
			overflow-y: hidden;
			white-space: nowrap;



		}
		 
	</style>
</head>

<body>
	<!--Page main section start-->
	<div id="educo_wrapper">
		<!--Header start-->
 
    
		<?php
		include "header.php";
		?>

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
			
		</div>
		
		<div class="ed_graysection ed_toppadder80 " id="event">
		
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ed_bottompadder30">
						<div class="ed_heading_top">
							<h3>Events</h3>
						</div>
					</div>
					<div class="col-lg-12 ed_toppadder80 ed_bottompadder80">

						

 					<div class="scrollmenu ">

							 <div class="ec">
      
      <?php

      
              $sql = ("SELECT * FROM `Event` WHERE `is_deleted`='0' AND `disabled`='0'ORDER BY `event_date`") or die(mysqli_connect_error());

              $q = mysqli_query($Conn, $sql);
              $row = mysqli_num_rows($q);
              if ($row == 0) 
              {
              	echo "<center><h3>No Events</h3></center>";	
              }
              else
              {

              while ($r = mysqli_fetch_array($q)) 
              { ?>

			      <div class="eve">
			        <div class="el">
			          <div class="ed">
			            <div class="d"><?php $d= $r['event_date'];
			                                    echo date("d",strtotime($d));?></div>
			            <div class="m"><?php $d= $r['event_date'];
			                                    echo date("F",strtotime($d));?></div>
			          </div>
			        </div>

			        <div class="er">
			          <h3 class="et"><?php echo $r['Event_topic'];?></h3>

			          <div class="edes">
			            <?php echo $r['Event_text'];?>
			          </div>

			          <div class="etiming">
			            
			          </div>
			        </div>
			      </div>

    <?php } } ?>


				</div>
			</div>
		</div><!-- /.container -->
</div></div>

	
	<div class="ed_footer_wrapper">
		<?php require "footer.php"; ?>
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
	<script type="text/javascript" src="js/plugins/revel/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="js/plugins/revel/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="js/plugins/revel/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="js/plugins/countto/jquery.countTo.js"></script>
	<script type="text/javascript" src="js/plugins/countto/jquery.appear.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>

	<!--main js file end-->

    <script src="teacher/assets/js/metisMenu.min.js"></script>
    <script src="teacher/assets/js/jquery.slimscroll.min.js"></script>
    <script src="teacher/assets/js/jquery.slicknav.min.js"></script>
    <script src="teacher/assets/js/plugins.js"></script>
    <script src="teacher/assets/js/scripts.js"></script>

</body>

</html>

<?php
}
else
{
	$log->success_entry($action,$Conn,"Unsuccessful");
	header("location:login.php");

}
?>