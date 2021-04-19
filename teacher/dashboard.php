<?php

require "connection.php";
session_start();
$tid = $_SESSION['t_id'];

if (isset($_POST['subject'])) {
    
mysqli_query($Conn, "UPDATE `teachers` SET `login_count` = '1' WHERE `T_srn`='$tid'");
    $s = $_POST['sub'];
    if (isset($_POST['sub']) == null) {

        echo "<script>alert('Please select atleast one subject');window.location.href='teacher_info.php';</script>";
            header("location:teacher_info.php");
    } else {

        for ($i = 0; $i < sizeof($s); $i++) {
            $Sql = "INSERT INTO `teacherstd` (id_sub,id_teacher,is_deleted)VALUES('" . $s[$i] . "','$tid','0')";
            $q = mysqli_query($Conn, $Sql);
        }


        header("location:dashboard.php");
    }
}

if (isset($_SESSION['t_id'])) {
   



$T_srn = $_SESSION['t_id'];
$update = mysqli_query($Conn, "UPDATE teachers SET t_status ='offline' WHERE T_srn ='$T_srn' ") or die(mysqli_connect_error());


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
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
       <?php include('leftbar.php'); ?>
    <div class="main-content">
         <?php include('topbar.php'); ?>



        <!-- page title area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <ul class="breadcrumbs pull-left">
                         <h4 class="page-title pull-left">Teacher Dashboard</h4>
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
                                    <a class="dashboard-stat bg-primary" href="resource-class.php">

                                        <span class="name">Resources</span>
                                        <span class="bg-icon"><i id="a" class="fa fa-folder"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>
                                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-success" href="../teacher_chat/select_students.php">


                                        <span class="name">Chat</span>
                                        <span class="bg-icon"><i class="fa fa-comment"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>
                                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-warning" href="view-event.php">

                                        <span class="name">Events</span>
                                        <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>
                                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat bg-danger" href="view-gallery.php">

                                        <span class="name">Gallery</span>
                                        <span class="bg-icon"><i class="fa fa-picture-o"></i></span>
                                    </a>
                                    <!-- /.dashboard-stat -->
                                </div>



                            </div>
                            <!-- /.row -->
                        </div>

                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

</div>


    </div>
   
    <!-- /.main-wrapper -->

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
else{

    header("location:teacher_login.php");
    
}
?>

