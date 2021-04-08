
<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['s_id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
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
	
	<!-- end theme style -->
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
	
        <link rel="stylesheet" href="teacher/css/main.css" media="screen" >
       
	  <style type="text/css">
            #s
            {
            	padding-top: 10px;
                padding-bottom: 10px;
            }
            .ed_footer_wrapper
            {
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
<?php 
require "Database/connection.php";


$S_srn = $_SESSION['id'];


$sql1 ="SELECT * from `subjects` join `students` on subjects.Class_id=students.Class_id WHERE `S_srn`='$S_srn' ";
$query= $Conn -> query($sql1); 
$row = mysqli_num_rows($query);
   

while ($query1=mysqli_fetch_array($query)) {
    
   ?>
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12" id="s">
                                        <a class="dashboard-stat bg-primary" href="download-res.php?sub_id=<?php echo $query1['Sub_id'];?>">
                                            <span class="name"><?php echo $query1['Sub_name'];?></span>
                                            <span class="bg-icon"><i class="fa fa-folder"></i></span>
                                        </a>
                                    </div>
                                   
<?php } ?>
                                  

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
</body>
<?php  } ?>
</html>