<?php
session_start();
error_reporting(0);
include('connection.php');
require "../vendor/autoload.php";
require "store_data.php";

if(strlen($_SESSION['a_id'])=="")
    {   
    header("Location: index.php"); 
    }
    else
    {

function get_pass($p2)
{
    $p1=rand(100,999);

    $p3 = $p1."_".$p2;
    return $p3;
}

//USE PhpOffice\PhpSpreadsheet\Spreadsheet;


  if(isset($_POST['submit']))
  {
        $targetPath =$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load("$targetPath");
        $d=$spreadsheet->getSheet(0)->toArray();

        $i=0;
       // unset($sheetData[0]);
     
        foreach ($d as $t) 
        {
            // process element here;

            if($i>0)
            {
                if($t[4]=='-')
                {
                    $t[4]=NULL;
                }
                
                $q=mysqli_query($Conn,"SELECT Class_id FROM `Class` WHERE `C_no`='$t[3]' AND `Stream`='$t[4]' ")or die(mysqli_error($Conn));
                $c_id=mysqli_fetch_array($q);
                $pass = sha1(get_pass($t[0]));

               
                        $gr     =$Conn->real_escape_string($t[0]);
                        $uid    =$Conn->real_escape_string($t[1]);
                        $name   =$Conn->real_escape_string($t[2]);
                        $cast   =$Conn->real_escape_string($t[5]);
                        $cate   =$Conn->real_escape_string($t[6]);
                        $dob    =$Conn->real_escape_string($t[7]);
                        $cont   =$Conn->real_escape_string($t[9]);
                        $ad_date=$Conn->real_escape_string($t[8]);
                        $cid    =$Conn->real_escape_string($c_id[0]);

                        $adhar  =$Conn->real_escape_string($t[10]);
                        $hos    =$Conn->real_escape_string($t[12]);
                        $hom    =$Conn->real_escape_string($t[11]);
                        $handi  =$Conn->real_escape_string($t[13]);
                        $des    =$Conn->real_escape_string($t[14]);
                        $pass   =$Conn->real_escape_string($pass);
                        $remarks=$Conn->real_escape_string($t[15]);

                        $ay     =$Conn->real_escape_string($t[16]);
                        $ph     =$Conn->real_escape_string($t[17]);
                        
                        $s= new Upload ();
                        $ok=$s->Store_student($gr,$uid,$name,$cast,$cate,$dob,$cont,$ad_date,$cid,$adhar,$hos,$hom,$handi,$des,$pass,$remarks,$ay,$ph,$Conn);
            }
            $i++;

        }
        //unlink($targetPath);

$action="Student data Imported";
$log=new Log();
if($ok)
{

   
    $log->success_entry($action,$Conn);
    echo "<script>alert('Student Data Stored Successfully');window.location.href='manage-students.php';</script>";
    
}
else 
{
   
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
    <title>IGHS Admin| Import </title>
     <link rel="stylesheet" href="ssi-uploader/styles/ssi-uploader.css"/>
     
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
                          <h4 class="page-title pull-left">Import</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Import</span></li>
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>Fill The Info.</span>
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
                                        <form class="form-horizontal" method="post"  enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Select Excel Sheet</label>
                                                <div class="col-sm-10">
                                                       <input type="file" required name='file' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                                                </div>
                                            </div>

                                         


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    
                                                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
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
