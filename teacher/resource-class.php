<?php 
 session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{


?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teacher | Resources</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>

        <style type="text/css">
            #c
            {
                padding-bottom: 10px;
            }
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Resource</h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                             <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        
                                        <li class="active">Resources</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                      
                        </div>
                          <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Select Class</h5>
                                        </div>
                                    </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
<?php 
require "connection.php";
$sql1 ="SELECT * from `class`";
$query= $Conn -> query($sql1); 
$row = mysqli_num_rows($query);
   

while ($query1=mysqli_fetch_array($query)) 
{
                            if(!($query1['C_no']==0))
                                {
                                    if($query1['Stream']=="NULL")
                                    {
                                        $query1['Stream']="";
                                    }
    

   ?>
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12" id="c">
                                        <a class="dashboard-stat bg-primary" href="resource-sub.php?C_id=<?php echo $query1['Class_id'];?>">
                                            <span class="name"><?php echo $query1['C_no']." ".$query1['Stream'];?></span>
                                            <span class="bg-icon"><i class="fa fa-folder"></i></span>
                                        </a>
                                    </div>
<?php 
    
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




<?php
  }
  
?>
