<?php
session_start();
error_reporting(0);
require('../connection.php');
require('store_data.php');
require('../ec_dc.php');
require('Image_compress.php');

$obj = new ecdc();
$log=new Log();

if(strlen($_SESSION['a_id'])=="")
{   
    $action="In Edit Teacher";
    $log->success_entry($action,$Conn);
    
    header("Location: index.php"); 
}
else
{
    if(!(isset($_POST['tn'])))
    {
        $action="In Edit Teacher";
        $log->success_entry($action,$Conn);
    }

    $tid=$_GET['T_id'];


    if(isset($_POST['update']))
    {
        
        $tn=$_POST['tn']; 
        $dob=$_POST['dob']; 
        $con=$_POST['con']; 
        $adate=$_POST['adate'];
        $jdate=$_POST['jdate'];
        $rdate=$_POST['rdate'];
        $deg=$_POST['deg'];
        $pass=$obj->encrypt($_POST['pass']);  
        $d = date("Y-m-d");

        if(strlen($_FILES['file']['name'])=="")
        {            
            $imageName=$_POST['img_name'];           
        }
        else
        {

             if ($_FILES["file"]["size"] > 500000) 
            {
                echo "<script>alert('Sorry, your file is too large.');window.location.href='manage-teachers.php';</script>";   
            }
            else
            {
                $uploadFolder ='../user_photos/teacher/';
                $imageTmpName = $_FILES['file']['tmp_name'];
                $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
                $imageName ="$con.$ext";
                $up=true;
                $old=$uploadFolder.$_POST['img_name'];
                unset($old);
            }
        }


        $Sql="UPDATE `teachers` SET `T_name`='$tn',`DOB`='$dob',`Degree`='$deg',`A_date`='$adate',`Joining_date`='$jdate',`Retire_date`='$rdate',`Contact`='$con',`Password`='$pass',`is_deleted`='0',`Created_on`='$d' WHERE `T_srn`='$tid'";


        $q=mysqli_query($Conn,$Sql);
        $action="Teacher data Edited";
        if($q)
        {
            if ($up) 
            {
                compress($uploadFolder.$imageName);
            }
            $log->success_entry($action,$Conn);
            echo "<script>alert('Teacher Info. Edited Successfully.');window.location.href='manage-teachers.php';</script>";   
        }
        else 
        {
            $log->success_entry($action,$Conn,"Unsuccessful");
            echo "<script>alert('Failed To Edit Teacher.');window.location.href='manage-teachers.php';</script>";   
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Teacher | IGHS</title>
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
    <script src="../js/validate.js"></script>
    <style type="text/css">
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
                <div class="row align-items-center">
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">Edit Teacher</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Edit Teacher</span></li>
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>Fill The Teacher Info.</span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->

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
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
<?php 
 $sql = "SELECT * from `teachers` WHERE `T_srn`='$tid'";
$query = mysqli_query($Conn,$sql);

$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
 while($result=mysqli_fetch_array($query))
    {   ?>
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Teacher Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tn" value="<?php echo htmlentities($result['T_name'])?>" oninput='stringValidate(this)'  maxlength="50" class="form-control" id="tn" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" value="<?php echo htmlentities($result['DOB'])?>" class="form-control" id="dob" min="1900-01-01" max='<?php echo date('Y-m-d');?>'  required="required" autocomplete="off" oninput="staff_birthdate_check()">
                                                    
                                                    <div id="b_error">
                                                        <p id="b_error" class="alert alert-danger left-icon-alert" role="alert">Please enter valid date : Age of staff member must be over 18 years old.</p>
                                                    </div>
                                                    <script type="text/javascript">
                                                        document.getElementById('b_error').style.visibility='hidden';
                                                        document.getElementById("b_error").style.display= "none";
                                                    </script>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Degree</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="deg" value="<?php echo htmlentities($result['Degree'])?>"  oninput='stringValidate(this)' maxlength="10" class="form-control" id="deg" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Appointment Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="adate" value="<?php echo htmlentities($result['A_date'])?>" class="form-control" id="adate" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Joining Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="jdate" value="<?php echo htmlentities($result['Joining_date'])?>" class="form-control" id="jdate" required="required" autocomplete="off" oninput="j_date()">

                                                    <div id="j_error">
                                                        <p id="j_error" class="alert alert-danger left-icon-alert" role="alert">Please enter valid date : Joining date can not be less than appointment date</p>
                                                    </div>
                                                    <script type="text/javascript">
                                                        document.getElementById('j_error').style.visibility='hidden';
                                                        document.getElementById("j_error").style.display= "none";
                                                    </script>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Retire Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="rdate" value="<?php echo htmlentities($result['Retire_date'])?>" class="form-control" id="rdate" required="required" autocomplete="off" oninput="retire_date()">

                                                    <div id="r_error">
                                                        <p id="r_error" class="alert alert-danger left-icon-alert" role="alert">Please enter valid date : retire date can not be less than or equal to joining date</p>
                                                    </div>
                                                    <script type="text/javascript">
                                                        document.getElementById('r_error').style.visibility='hidden';
                                                        document.getElementById("r_error").style.display= "none";
                                                    </script>

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Teacher Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="file" class="form-control" id="img" accept="image/*" >
                                                    <input type="hidden" name="img_name" value="<?php echo htmlentities($result['A_Photo'])?>">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="con" value="<?php echo htmlentities($result['Contact'])?>" class="form-control" id="con" oninput='digitValidate(this)' pattern=".{10}" required title=" 10 numbers" maxlength="10" required="required" autocomplete="off">
                                                </div>
                                            </div>
                                             

                                               <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <?php $r_pass=$obj->decrypt($result['Password']); ?>
                                                    <input type="Password" name="pass" value="<?php echo htmlentities($r_pass)?>" class="form-control" id="pass"  maxlength="15" minlength="4" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="update" class="btn btn-primary" id='sub_f'>Update</button>
                                                </div>
                                            </div>
                                        <?php }}?>
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

</body>

</html>
<?PHP } ?>
