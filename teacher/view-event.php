

<?php
error_reporting(0);
session_start();

include('../connection.php');
include('../admin/store_data.php');

$log=new Log();
$action="In View-Events";

if(strlen($_SESSION['t_id'])=="")
{   
        $log->success_entry($action,$Conn,"Unsuccessful");
        header("Location: index.php"); 
    }
    else
    {
        $log->success_entry($action,$Conn);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Events | IGHS</title>
      <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>

<link rel="stylesheet" href="../event_style.css" />
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
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        

     .scrollmenu
    {
        max-height: 520px;

        border: 1px solid #ddd;
        overflow-y: scroll;
    }

        </style>
    </head>
    <body class="top-navbar-fixed">
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
                          <h4 class="page-title pull-left">Event</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Event</span></li>
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>View Event</span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">
                                       
                  <div id="owl-demo2"class="scrolling-wrapper">

                
      
      <?php

      
              $sql = ("SELECT * FROM `event` WHERE `is_deleted`='0' AND `disabled`='0'ORDER BY `Created_on` DESC") or die(mysqli_connect_error());

              $q = mysqli_query($Conn, $sql);
              $row = mysqli_num_rows($q);
              if ($row == 0) 
              {
                echo " <center><h3>No Events</h3></center>";
         
              }
              else
              {
                echo "<div class='scrollmenu'>

                             <div class='ec'>
                    ";

              while ($r = mysqli_fetch_array($q)) { ?>

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

<?php
        } 
    } 
?>




                        
            
                </div>
            </div>
</div>

                                 </div>
                                           
                            </div>

                                        <!-- /.panel -->
                    </div>
                                    <!-- /.col-md-6 -->

                </div>
                                <!-- /.row -->

            </div>
                            <!-- /.container-fluid -->
                       
                        <!-- /.section -->

        </div>
                    <!-- /.main-page -->

                    
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
<?php } ?>
