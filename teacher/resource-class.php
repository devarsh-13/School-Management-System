<?php 
 session_start();
error_reporting(0);
include('connection.php');
include('../admin/store_data.php');

$action="In Upload Resources";
$log=new Log();

if(strlen($_SESSION['t_id'])=="")
{   

    $log->success_entry($action,$Conn,"Unsuccessful");

    header("Location: index.php"); 
}
else{
        $log->success_entry($action,$Conn);


?> 
<!DOCTYPE html>
<html lang="en">
 
<head>
    
    <title>Teacher | Dashboard</title>
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
            #c
            {
                padding-bottom: 10px;
            }
        </style>
</head>

<body >
    <div id="preloader">
        <div class="loader"></div>
    </div>
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
                                <li><a ><span>Resource</span></a></li>
                                
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>Select Class</span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->
            
                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
<?php
$t=$_SESSION['t_id'];

$sub="SELECT * from `Subjects` join teacherstd WHERE Subjects.Sub_id = teacherstd.id_sub AND teacherstd.id_teacher= $t AND teacherstd.is_deleted = '0' ";
$re= $Conn -> query($sub); 


            $array=array()     ;
while ($query1=mysqli_fetch_array($re)) 
{

                                $c="SELECT * from `class` WHERE `Class_id` = $query1[Class_id] "; 
                                $result= $Conn -> query($c); 

                                            while ($query=mysqli_fetch_array($result)) 
                                            { 

                                                  
                                                 if(!in_array($query['C_no'].$query['Stream'], $array))
                                                {
                                                    array_push($array, $query['C_no'].$query['Stream']);
                                                
                                            
                                                
    

   ?>
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12" id="c">
                                        <a class="dashboard-stat bg-primary" href="resource-sub.php?C_id=<?php echo $query1['Class_id'];?>">

                                            <span class="name"><?php echo $query['C_no']." ".$query['Stream'];?></span>

                                            <span class="bg-icon"><i class="fa fa-folder"></i></span>
                                        </a>
                                    </div>
<?php 
    }
              
              }            
}
?>
                                  

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

        <!-- ========== COMMON JS FILES ========== -->
        
    </body>
</html>

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



<?php
  }
  
?>
