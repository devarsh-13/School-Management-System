<?php 
  session_start();
  
  if(isset($_SESSION['a_id']))
  {
    require "connection.php";
    
    require "store_data.php";
    $action="IN Dashboard";
    $log= new Log();
    $log->success_entry($action,$Conn);


?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IGHS | Dashboard</title>
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
                         <h4 class="page-title pull-left">Admin Dashboard</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                   
                </div>
                
            </div>
            
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-students.php">
<?php 

$sql1 ="SELECT S_srn from students WHERE `is_deleted`='0'";
$query1 = $Conn -> query($sql1); 
$row = mysqli_num_rows($query1);

?>

                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Students</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="manage-teachers.php">
<?php 
$sql1 ="SELECT T_srn from teachers WHERE `is_deleted`='0'";
$query1 = $Conn -> query($sql1);
$row = mysqli_num_rows($query1);
?>
                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Teachers</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="manage-events.php">
                                        <?php 
$sql1 ="SELECT Sr_n from event";
$query1 = $Conn -> query($sql1);
$row = mysqli_num_rows($query1);
?>
                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Events</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="manage-notif.php">
                                        <?php 
$sql1 ="SELECT Sr_n from notification";
$query1 = $Conn -> query($sql1);
$row = mysqli_num_rows($query1);
?>

                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Notification</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->


                                  

                                </div>
                                <!-- /.row -->
                            </div>

                            <!-- /.container-fluid -->
                        </section>
                            <!-- /.section -->

                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-info" href="manage-gallery.php">
                                        <?php 
$sql1 ="SELECT id from images";
$query1 = $Conn -> query($sql1);
$row = mysqli_num_rows($query1);
?>

                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Gallery</span>
                                            <span class="bg-icon"><i class="fa fa-picture-o"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>


                                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="bin-students.php">
                                        <?php 
$sql1 ="SELECT S_srn from students WHERE `is_deleted`='1'";
$query1 = $Conn -> query($sql1);
$row = mysqli_num_rows($query1);
?>

                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Deleted Students</span>
                                            <span class="bg-icon"><i class="fa fa-trash"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>



                                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="bin-teachers.php">
                                        <?php 
$sql1 ="SELECT T_srn from teachers WHERE `is_deleted`='1'";
$query1 = $Conn -> query($sql1);
$row = mysqli_num_rows($query1);
?>

                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Deleted Teachers</span>
                                            <span class="bg-icon"><i class="fa fa-trash"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>




                                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="bin-admin.php">
                                        <?php 
$sql1 ="SELECT A_id from admin WHERE `is_deleted`='1'";
$query1 = $Conn -> query($sql1);
$row = mysqli_num_rows($query1);
?>

                                            <span class="number counter"><?php echo $row;?></span>
                                            <span class="name">Deleted Admin</span>
                                            <span class="bg-icon"><i class="fa fa-trash"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                    

                    </div>
                    <!-- /.main-page -->

                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome to student Result Management System!");

            });
        </script>
    </body>
</html>



   <!-- jquery latest version -->
    <script src="../teacher/assets/js/vendor/jquery-2.2.4.min.js"></script>
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





<?php
  }
  else
  {
    echo "PLEASE LOGIN TO CONTINUE <a href='http://localhost/Sem6CollegeProject/admin/'> Login </a>";
  }
  
?>
