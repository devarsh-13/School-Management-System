<?php
session_start();
error_reporting(0);
include('connection.php');
include('store_data.php');

if(strlen($_SESSION['a_id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
    require "connection.php";

$tn=$_POST['tn']; 
$dob=$_POST['dob']; 
$con=$_POST['con']; 
$adate=$_POST['adate'];
$jdate=$_POST['jdate'];
$rdate=$_POST['rdate'];
$deg=$_POST['deg'];
$pass=$_POST['pass'];  
$d = date("Y-m-d");


$Sql="INSERT INTO `teachers` 
                            (
                                `T_name`, 
                                `DOB`, 
                                `Degree`, 
                                `A_date`,
                                `Joining_date`, 
                                `Retire_date`, 
                                `Contact`, 
                                `Password`, 
                                `is_deleted`, 
                                `Created_on`) 

                            VALUES 
                            (
                                '$tn', 
                                '$dob', 
                                '$deg',
                                '$adate', 
                                '$jdate', 
                                '$rdate', 
                                '$con', 
                                '$pass', 
                                '0',
                                '$d')";


$q=mysqli_query($Conn,$Sql);
$action="Add teacher data";
if($q)
{
    $log=new Log();
    $log->success_entry($action,$Conn);

    $msg="Teacher Info Added Successfully";
}
else 
{
    $log=new Log();
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
    <title>IGHS Admin| ADD Teacher </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style type="text/css">
        
.add button
{

   float: right;
    margin-top: 10px;
    margin-right: 10px;

}
    </style>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">ADD Teacher</h2>

                            </div>
                             <div class="add">
                                
                                 <a href=""><button type="submit" name="add" class="btn btn-primary">Import</button></a>       
                                </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li>Teachers</li>
                                    <li class="active">ADD Teacher</li>
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
                                            <h5>Fill The Teacher Info</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                        
                                            <?php echo htmlentities($msg); ?>
                                        </div>
                                        <?php } 
else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="post">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Teacher Nmae</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tn" class="form-control" id="tn" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control" id="dob" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Degree</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="deg" class="form-control" id="deg" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Appointment Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="adate" class="form-control" id="adate" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Joining Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="jdate" class="form-control" id="jdate" required="required" autocomplete="off">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Retire Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="rdate" class="form-control" id="rdate" required="required" autocomplete="off">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="con" class="form-control" id="con" maxlength="10" required="required" autocomplete="off">
                                                </div>
                                            </div>
                                             

                                               <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="pass" class="form-control" id="pass" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });

        </script>
</body>

</html>
<?PHP } ?>
