
<?php
session_start();
$_SESSION['page']='1';
error_reporting(0);
require('../connection.php');
require('store_data.php');
require('../ec_dc.php');

$obj = new ecdc();
$log = new Log();
if(strlen($_SESSION['a_id'])=="")
{
    $action="In manage-Events";
    $log->success_entry($action,$Conn,"Unsuccessful");
    header("Location: index.php"); 
}
else
{
    if(!(isset($_GET['E_id'])))
    {
        $action="In Manage Events";
        $log->success_entry($action,$Conn);
    }
    
if (isset($_GET['E_id']))
{
    $eid = $obj->decrypt($_GET['E_id']);
    

    $Sql="UPDATE `event` SET `disabled`='1' WHERE `Sr_n`='$eid'";
    $delete = $Conn->query($Sql);
    if ($delete)
    {   
        $action="Delete Event data";
        
        $log->success_entry($action,$Conn);
        $msg="Event Deleted Successfully";
        unset($_GET);
    }
    else 
    {

        $action="Delete Event data";
        
        $log->success_entry($action,$Conn,"Unsuccessful");
    $error="Something went wrong. Please try again";
    }
}






?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Events | IGHS</title>
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

    <!-- others css -->
    <link rel="stylesheet" href="../teacher/assets/css/typography.css">
    <link rel="stylesheet" href="../teacher/assets/css/default-css.css">
    <link rel="stylesheet" href="../teacher/assets/css/styles.css">
    <link rel="stylesheet" href="../teacher/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../teacher/assets/js/vendor/modernizr-2.8.3.min.js"></script>



<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/buttons.print.min.js"></script>
<link href="js/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="js/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />



<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
       
        });
});
</script>
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
        max-height: 100%;
        border: 1px solid #ddd;
        
        overflow-x: auto;
    }

  
    .scrollmenu table
    {
        min-width: 100%;
        background-color: #ddd;
        
    }
 td{
        word-break: break-all;
    }
       
        .section
        {
            background-color: white;
            margin-top: 3%;
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
                <div class="row align-items-center" >
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">Manage Event</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Manage Event</span></li>


                    </ul>
                     <style>.add{margin-left: 100%;width: 100%;}</style>
                     <ul>
                       <div class="add">
                            <a href="add-event.php" id="b"> <button type="submit" name="add" class="btn btn-success">Add Event</button></a>
                        </div> 
                    </ul>
                </div>
            </div>

              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span></span>
                                        </div>

                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->
                
                <div class="panel-body">

                                            <div class="scrollmenu">

                                            
                                                     <table id="example" >
                                                <thead>
                                                        <tr align="center">
                                                             <th>#</th>
                                                               <th style="width: 15%;">Action</th>
                                                            <th>Dis/Ena</th>
                                                            <th>Event Topic</th>
                                                            <th>Event Text</th>
                                                            <th style="width: 10%;">Event Date</th>
                                                            <th>Status</th>
                                                            <th>Created By</th>
                                                             <th style="width: 10%;">Created Date</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                    
                                                   
                                                    
<?php

 $sql = "SELECT * from `event` WHERE `disabled`='0' ORDER BY created_on DESC";
$query = mysqli_query($Conn,$sql);
$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
    

    while($result=mysqli_fetch_array($query))
    {      ?>
                    <tr align="center">

                        <td><?php echo htmlentities($cnt);?></td>
                             <th>
                            <a href="edit-event.php?E_id=<?php echo $obj->encrypt($result['Sr_n']);?>">
                              <img src="images/edit-icon.jpg" height="25px" width='25px'/> Edit</a>
                              &nbsp;
                            <a href="manage-events.php?E_id=<?php echo $obj->encrypt($result['Sr_n']);?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>
                            
                             
                            
                        </th>
                        <td>
                        <?php
                            if($result['is_deleted']==0)
                            {
                        ?>
                                <a href="disable_record.php?event_id=<?php echo $result['Sr_n'];?>"><img src="images/disable.jpg" width='30px'/></a>
                        <?php
                            }
                            else
                            {
                        ?>
                                <a href="enable_record.php?event_id=<?php echo $result['Sr_n'];?>"><img src="images/enable.jpg" width='30px'/></a>   
                        <?php
                            }
                        ?>

                        </td>
                        <td><?php echo $result['Event_topic'];?></td> 
                        <td><?php echo $result['Event_text'];?></td>
                        <td><?php echo $result['event_date'];?></td>
                         <td><?php if($result['is_deleted']==0)
                                    {
                                        echo "Visible";
                                    }
                                    else
                                    {
                                        echo"Disabled";
                                    }
                        ?>
                            
                        </td>
                         <td><?php
                                $id=$result['created_by'];
                                 $q=mysqli_query($Conn,"SELECT `A_name` FROM `admin` WHERE `A_id` = '$id' ");
                                 $name=mysqli_fetch_array($q);
                                echo $name[0];
                            ?>
                        </td>
                        
                        <td><?php echo $result['Created_on'];?></td>
                       
                       
                   
                    </tr>
<?php 
    $cnt=$cnt+1;}
} ?>
                                                       
                                                    
                                                    
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

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
       
    </body>
</html>
<?php } ?>

