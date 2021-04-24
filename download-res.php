<?php
session_start();
error_reporting(0);

include('Database/connection.php');
// include('admin/store_data.php');

// $action="In Download Resource";
// $log=new Log();

if (!isset($_SESSION['s_id'])) {
	//$log->success_entry($action,$Conn,"Unsuccessful");
	header("location:login.php");
} else {

?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<title>Download Resources | IGHS</title>

		<!--srart theme style -->


		<link rel="stylesheet" href="teacher/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="teacher/assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="teacher/assets/css/themify-icons.css">
		<link rel="stylesheet" href="teacher/assets/css/metisMenu.css">
		<link rel="stylesheet" href="teacher/assets/css/default-css.css">
		<link rel="stylesheet" href="teacher/assets/css/styles.css">

		<meta charset="utf-8" />

		<meta content="width=device-width, initial-scale=1.0" name="viewport" />

		<meta name="MobileOptimized" content="320" />

		<link href="css/main.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" type="image/png" href="images/header/IGHS(1).png" />


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
			<!--Breadcrumb start-->
		</div>
		<!--single student detail end-->



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
						$path = "teacher/resources/";

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
						?>



					</table>



				</div>
				<!-- /.row -->
			</div>

			<!-- /.container-fluid -->
		</section>
		<!-- /.section -->





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


		<script src="teacher/assets/js/metisMenu.min.js"></script>
		<script src="teacher/assets/js/jquery.slimscroll.min.js"></script>
		<script src="teacher/assets/js/jquery.slicknav.min.js"></script>
		<script src="teacher/assets/js/plugins.js"></script>
		<script src="teacher/assets/js/scripts.js"></script>
	</body>

	</html>

<?php  } ?>