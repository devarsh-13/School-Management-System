<?php
session_start();
error_reporting(0);
include('connection.php');
include('store_data.php');

$log = new Log();

if (strlen($_SESSION['a_id']) == "") {
    header("Location: index.php");
} 
else 
{   if(!(isset($_POST['an'])))
    {
        $action = " In ADD Admin";
        $log->success_entry($action,$Conn);
    }
    
    if (isset($_POST['submit'])) 
    {
        
        $a = $_SESSION['a_id'];  

        $an = $_POST['an'];
        $dob = $_POST['dob'];
        $con = $_POST['con'];
        $ad=$_POST['ad']; 
        $pass = sha1($_POST['pass']);
        $d = date("Y-m-d");

        if(isset($_FILES['file']))
        {
            $uploadFolder = '../user_photos/admin/';

            $imageTmpName = $_FILES['file']['tmp_name'];
            $extension=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
            $imageName = $cont.$extension;
        }
        else
        {
            $imageName="default.jpg";
        }
                   
        $Sql = "INSERT INTO `admin`
        (   
            `A_Photo`,
            `A_name`, 
            `A_mobile`, 
            `A_address`, 
            `A_password`,
            `A_dob`, 
            `Created_on`, 
            `is_deleted`,
            `Created_by`
        ) 
        VALUES 
        (
            '$imageName',
            '$an', 
            '$con', 
            '$ad',
            '$pass',
            '$dob',
            '$d', 
            '0',
            '$a'
        )";

        $q = mysqli_query($Conn, $Sql);
        $action = "Admin data Added";
        if ($q)
        {
            $result = compress($imageTmpName, $uploadFolder.$imageName);
            $log->success_entry($action, $Conn);
            $msg = "Admin Info Added Successfully";
            unset($_POST['an']);

        } else 
        {
        
            $log->success_entry($action, $Conn, "Unsuccessful");
            $error = "Something went wrong. Please try again";
             unset($_POST['an']);
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IGHS Admin| ADD Admin </title>
        <style type="text/css">
            .add button {

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
        <!-- modernizr css -->
        <script src="../teacher/assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="../js/validate.js"></script>
        <style type="text/css">
            .section {
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
                            <h4 class="page-title pull-left">ADD Admin</h4>
                            <li><a href="dashboard.php">Home</a></li>

                            <li><span>Add Admin</span></li>


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
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">

                                                <?php echo htmlentities($msg); ?>
                                            </div>
                                        <?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">

                                                <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admin Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="an" class="form-control" id="an"  oninput='stringValidate(this)'  maxlength="50" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control" id="dob" min="1900-01-01" max='<?php echo date('Y-m-d');?>' required="required" autocomplete="off">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Contact Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="con" class="form-control" id="con" oninput='digitValidate(this)' pattern=".{10}" required title=" 10 numbers" maxlength="10" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="ad" class="form-control" required="required" id="ad"  maxlength="40" autocomplete="off"></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admin Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="file" class="form-control" id="img">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="pass" class="form-control" id="pass" maxlength="15" minlength="4" required="required" autocomplete="off">
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