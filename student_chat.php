<?php

require 'Database/connection.php';
session_start();


$S_srn = $_SESSION['id'];



// $sql = "SELECT * from `students` join Class on students.Class_id=Class.Class_id WHERE
//  S_srn = '$S_srn' ORDER BY Created_on DESC";
$sql = "SELECT * FROM `teachers` where 'is_deleted'= 0";


$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);

//$result = mysqli_fetch_array($query);
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

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script src="js/chat.js"></script>
	<!-- end theme style -->
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />


	<style type="text/css">
		#n a {
			font-size: 15px;
		}
	</style>
</head>

<body>
	<!--Page main section start-->
	<div id="educo_wrapper">
		<?php
		include "header.php";
		?>
		<!--Breadcrumb start-->

		<!--Breadcrumb end-->
		<!--Section fourteen Contact form start-->
		<div class="ed_transprentbg ed_bottompadder0 ed_toppadder0 ">
			<div id="root">
				<header>
					<b style="padding:10px ; font-size:20px; color:aliceblue">Teachers</b>
					<nav>
						<ul>

						</ul>
					</nav>


				</header>


				<section class="main-view">

					<aside class="chat-rooms">


						<ul>


							<?php


							// // foreach ($result as  $key => $value) {


							// while ($result = mysqli_fetch_array($query)) {
							// 	echo '<form method="post" action="#" ><li class=><button name="teacher" value=' . $result['T_srn'] . '>' . $result['T_name'] . '</button> </li></form>';
							// }
							// // 
							// echo $row;
							// echo sizeof($result);

							// echo '<pre>'; print_r($result); echo '</pre>';



							?>


						</ul>
					</aside>
					<main class="chat">
						<ul class="messages-container">
							<!-- <li class=" system">
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
							</li> -->
							<!-- <li class="own">
								<div class="sender">Student</div>
								<div class="content"> -->

							<?php
							if (isset($_POST['teacher'])) {
								$_SESSION['t_id'] = $_POST['teacher'];

								$s = $_SESSION['t_id'];

								$chat_query = mysqli_query($Conn, "SELECT * FROM `conversation` WHERE `S_srn`='$S_srn' && `T_srn`='$s'");


								//$chat_result = mysqli_fetch_array($chat_query);


								while ($chat_result = mysqli_fetch_array($chat_query)) {
									if ($chat_result["sender_type"] == "s") {
										echo  	'<li class="own">
														<div class="sender">Student</div>
														<div class="content">' . $chat_result["chat_text"] . '
														</div></li>';
									} else {
										echo  	'<li class="">
														<div class="sender">Teacher</div>
														<div class="content">' . $chat_result["chat_text"] . '
														</div></li>';
									}
								}
							}


							?>

							<!-- </div>
								<div class="time-stamp">6 days ago</div>
							</li> -->
						</ul>
						<?php
						


						?>





							<form method="POST" class="new-message"><textarea class="textarea" style="width: 100%;  height: 50px; "  placeholder="message..." value="" name="chat"></textarea></form>



						<?php
						
						?>
					</main>
				</section>
			</div>
		</div>


		<script>
			$('.textarea').keyup(function(e){

				if( e.which==13)
				{
						$('.form').submit();
				}
			});


			$('form').submit(function(){
					alert("form is submitted through j query");

					return false;

			});

			
			
		
		</script>





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