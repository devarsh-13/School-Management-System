<?php

session_start();
require('ec_dc.php');
require('connection.php');
require('admin/store_data.php');

$obj = new ecdc();
$log= new Log();

if(strlen($_SESSION['s_id'])=="") 
{
	$action="In Download Resources";
	$log->success_entry($action,$Conn,"Unsuccessful");
	header("Location: index.php");
} 
else 
{
	$action="In Download Resources";
	$log->success_entry($action,$Conn);
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
      <title>Resources | IGHS</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
       <meta name="MobileOptimized" content="320"/> 


		

    
    <link type="text/css" rel="stylesheet" href="teacher/assets/css/bootstrap.min.css"/> 
    <link type="text/css" rel="stylesheet" href="teacher/assets/css/font-awesome.min.css"/>
    <link type="text/css" rel="stylesheet" href="teacher/assets/css/themify-icons.css"/>
    <link type="text/css" rel="stylesheet" href="teacher/assets/css/metisMenu.css"/>
    <link type="text/css" rel="stylesheet" href="teacher/assets/css/default-css.css"/>
    <link type="text/css" rel="stylesheet" href="teacher/assets/css/styles.css"/>
   

	<link type="text/css" href="css/main.css" rel="stylesheet" type="text/css"/>

	<link rel="shortcut icon" type="image/png" href="images/header/IGHS(1).png" />
		

<style type="text/css">

	#s {
	padding-top: 10px;
	padding-bottom: 10px;
}

.ed_footer_wrapper {
	padding-top: 10%;
}

.dashboard-stat {
  display: block;
  padding: 30px 15px;
  text-align: right;
  position: relative;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  border-radius: 4px;
}

.dashboard-stat .number {
  font-size: 28px;
  display: block;
}

.dashboard-stat .bg-icon {
  position: absolute;
  font-size: 60px;
  opacity: 0.4;
  left: 0;
  bottom: 0;
}

.dashboard-stat:hover {
  background: #292929 !important;
}

.dashboard-stat-2 {
  display: block;
  box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
  border: 1px solid #e5e5e5;
  border-radius: 4px;
}

.dashboard-stat-2 .stat-content {
  padding: 20px 15px 15px;
  text-align: center;
  position: relative;
}

.dashboard-stat-2 .number {
  font-size: 28px;
  display: block;
}

.dashboard-stat-2 .stat-footer {
  background: #fff;
  color: #292929;
  text-align: center;
  display: block;
  padding: 8px;
  font-size: 90%;
}

.dashboard-stat-2:hover {
  background: #292929 !important;
}

@media (max-width: 768px) {
  .dashboard-stat {
    margin-bottom: 10px;
  }

  .dashboard-stat-2 {
    margin-bottom: 10px;
  }
}
</style>
</head> 
<?php //echo "string"; die();?>	

	<body>
		
		<div id="educo_wrapper">
			
			<?php
			 	require "header.php";
			?>
			
			<!-- <section class="section"> -->
			<div class="container-fluid">
				<div class="row">
					<?php
					
					$S_srn = $_SESSION['s_id'];


					$sql1 = "SELECT * from `subjects` join `students` on subjects.Class_id=students.Class_id WHERE `S_srn`='$S_srn' ";
					$query = $Conn->query($sql1);
					$row = mysqli_num_rows($query);


					while ($query1 = mysqli_fetch_array($query)) 
					{
					?>
						<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12" id="s">
				<?php
                    
                    $resource_count=mysqli_num_rows(mysqli_query($Conn,"SELECT `R_id` FROM `Resources` WHERE `Sub_id`='$query1[Sub_id]' AND `is_deleted`='0'"));
                ?>
							<a class="dashboard-stat bg-primary" href="download-res.php?sub_id=<?php echo $obj->encrypt($query1['Sub_id']);?>">
								<span class="number counter"><?php  echo $resource_count; ?></span>
								<span class="name"><?php echo $query1['Sub_name']; ?></span>
								<span class="bg-icon"><i class="fa fa-folder"></i></span>
							</a>
						</div>
						

					<?php } ?>


				</div>
				
			</div>

			<!-- </section> -->
			
			<?php
				require "footer.php";
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

<?php  
}
?>

	

		