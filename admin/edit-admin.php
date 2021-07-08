<?php
session_start();
error_reporting(0);
require('../connection.php');
require('store_data.php');
require('../ec_dc.php');
require('Image_compress.php');

$obj = new ecdc();
$log=new Log();

if (strlen($_SESSION['a_id']) == "") 
{
    header("Location: index.php");
} 
else 
{
    if(!(isset($_POST['an'])))
    {
        $action = " In Edit Admin";
        $log->success_entry($action, $Conn);
    }
    
    $aid=$obj->decrypt($_GET['a_id']);
    
    if (isset($_POST['Update'])) 
    {
        $a = $_SESSION['a_id'];  
        $an = $_POST['an'];
        $dob = $_POST['dob'];
        $con = $_POST['con'];
        $ad=$_POST['ad']; 
        $pass = $obj->encrypt($_POST['pass']);
        $d = date("Y-m-d");
        $up=false;
         
        if(strlen($_FILES['file']['name'])=="")
        {            
            $imageName=$_POST['img_name'];            
        }
        else
        {
            $uploadFolder ='../user_photos/admin/';
            $imageTmpName = $_FILES['file']['tmp_name'];
            $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
            $imageName ="$con.$ext";
            $up=true;
            $old=$uploadFolder.$_POST['img_name'];
            unset($old);

        }


$Sql="UPDATE `admin` SET `A_Photo`='$imageName',`A_name`='$an',`A_mobile`='$con',`A_address`='$ad',`A_password`='$pass',`A_dob`='$dob',`Created_on`='$d',`is_deleted`='0',`Created_by`='a' WHERE `A_id`='$aid'";

        $q = mysqli_query($Conn, $Sql);
        $action = "Admin data Edited";
        if ($q) 
        {
            if($up)
            {
                compress($imageTmpName, $uploadFolder . $imageName);    
            }
            
            $log->success_entry($action, $Conn);
            echo "<script>alert('Admin Info. Edit Successfully.');window.location.href='manage-admin.php';</script>";   
            
        } 
        else 
        {
            
            $log->success_entry($action, $Conn, "Unsuccessful");
            echo "<script>alert('Failed To Edit Admin.');window.location.href='manage-admin.php';</script>";   
            
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Admin | IGHS</title>
        <style type="text/css">
            .add button 
            {
                margin-left: 100%;
            }
        </style>
        <link rel="stylesheet" href="../teacher/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="../teacher/css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="../teacher/css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="../teacher/css/main.css" media="screen">
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

        <script src="../js/validate.js"></script>
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

    <body>
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
                            <h4 class="page-title pull-left">Edit Admin</h4>
                            <li><a href="dashboard.php">Home</a></li>

                            <li><span>Edit Admin</span></li>


                        </ul>

                       

                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <span>Fill The Admin Info.</span>
                                    </div>

                                </div>
                                <!-- page title area end -->
                                <div class="main-content-inner">
                                    <!-- MAIN CONTENT GOES HERE -->
                                    <div class="panel-body">
                                        
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data" >
<?php 
 $sql = "SELECT * from `admin` WHERE `A_id`='$aid'";
$query = mysqli_query($Conn,$sql);

$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
 while($result=mysqli_fetch_array($query))
    {   ?>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admin Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="an" value="<?php echo htmlentities($result['A_name'])?>" class="form-control"  id="an" oninput='stringValidate(this)'  maxlength="50" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" value="<?php echo htmlentities($result['A_dob'])?>" class="form-control" id="dob" max='<?php echo date('Y-m-d');?>' required="required" autocomplete="off" oninput="staff_birthdate_check()">
                                                    
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
                                                <label for="default" class="col-sm-2 control-label">Contact Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="con" value="<?php echo htmlentities($result['A_mobile'])?>" class="form-control" id="con" oninput='digitValidate(this)' pattern=".{10}" required title=" 10 numbers" maxlength="10" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="ad"  maxlength="78" class="form-control" required="required" id="ad" autocomplete="off"><?php echo htmlentities($result['A_address'])?></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admin Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="file" class="form-control" id="img" accept="image/*" >
                                                    <input type="hidden" name="img_name" value="<?php echo htmlentities($result['A_Photo'])?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <?php $p=$obj->decrypt($result['A_password']); ?>
                                                    <input type="password" name="pass" value="<?php echo htmlentities($p)?>" class="form-control" id="pass"  maxlength="15" minlength="4" required="required" autocomplete="off"> 
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="Update" class="btn btn-primary" id='sub_f' >Update</button>
                                                </div>
                                            </div>
                                            <?PHP } ?>
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
<?php } ?>
<?php } ?>
