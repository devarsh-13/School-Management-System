<?php 
 session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['t_id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{


?> 
<!DOCTYPE html>
<html lang="en">
    <head>
       <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>


          <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <meta name="MobileOptimized" content="320" />
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
          <style type="text/css">
            #s
            {
                padding-bottom: 10px;
            }
        </style>
    </head>
    <body class="top-navbar-fixed">
     
    <div class="page-container">
       <?php include('leftbar.php'); ?>
    <div class="main-content">
         <?php include('topbar.php'); ?>




        <!-- page title area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">Resources</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                <li><a><span>Resource</span></a></li>
                                
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>Select Subject</span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
<?php 
require "connection.php";
$t=$_SESSION['t_id'];
$cid = $_GET['C_id'];
$sql1 ="SELECT * from `subjects` join teacherstd WHERE subjects.Class_id='$cid' AND subjects.Sub_id=teacherstd.id_sub AND teacherstd.id_teacher= $t AND teacherstd.is_deleted = '0' ";
$query= $Conn -> query($sql1); 
$row = mysqli_num_rows($query);
   

while ($query1=mysqli_fetch_array($query)) {
    

   ?>
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12" id="s">
                                        <a class="dashboard-stat bg-primary" href="resource-add.php?sub_id=<?php echo $query1['Sub_id'];?>">
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

                      

                    

                    </div>
                    <!-- /.main-page -->

                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

     <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

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
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    </body>
</html>




<?php
  }
  
?>
