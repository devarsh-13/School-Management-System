<?php
session_start();
error_reporting(1);
require('../connection.php');
require "../vendor/autoload.php";
require "store_data.php";
require "../ec_dc.php";

$log=new Log();

if(strlen($_SESSION['a_id'])=="")
{   
    $action="In Teacher Import";
    $log->success_entry($action,$Conn,"Unsuccessful");
    header("Location: index.php"); 
}
else
{
    if(!(isset($_POST['submit'])))
    {
        $action="In Teacher Import";
        $log->success_entry($action,$Conn);
    }

    function get_pass($p2)
    {
        $p1=rand(100,999);

        $p3 = $p1."_".$p2;
        return $p3;
    }

//USE PhpOffice\PhpSpreadsheet\Spreadsheet;


  if(isset($_POST['submit']))
  {
           
     $ex=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
       
    if($ex=="xlsx" || $ex=="Xlsx")
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $ec = new ecdc();
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

        $d=$spreadsheet->getSheet(0)->toArray();

        $obj=new Upload();
        $empt=array();
        $empt=$obj->Check_empty_teacher($d,$Conn);
        
        if(sizeof($empt)==1)
        {
            $rep=array();
            $rep=$obj->Check_teacher($d,$Conn);
            
            if(sizeof($rep)>1)
            {
                $error="Data already exist in System from row :";

                for ($lines=1; $lines<sizeof($rep); $lines++) 
                { 
                    $error=$error." $rep[$lines],";
                }  
                $error=$error." in Uploaded file";
            }
            else
            {

                $i=0;
                foreach ($d as $t) 
                {

                    if($i==0)
                    {
                        $tn     =$Conn->real_escape_string($t[0]);
                        $dob    =$Conn->real_escape_string($t[1]);
                        $deg    =$Conn->real_escape_string($t[2]);
                        $adate  =$Conn->real_escape_string($t[3]);
                        $jdate  =$Conn->real_escape_string($t[4]);
                        $rdate  =$Conn->real_escape_string($t[5]);
                        $con    =$Conn->real_escape_string($t[6]);

                        if($tn=="Name" && $dob=="DOB" && $deg=="Degree" && $adate=="Appoinment Date" && $jdate=="Joining Date" && $rdate=="Retire Date" && $con=="Contact No.")
                        {
                            $flag1=1;
                        }
                        else
                        {
                           $flag1=0;
                        }
                    }
                    if($flag1==1)
                    {
                        if($i>0)
                        {
                            $pass = $ec->encrypt(get_pass($t[0]));
                            
                                    $tn     =$Conn->real_escape_string($t[0]);
                                    $dob    =$Conn->real_escape_string($t[1]);
                                    $deg    =$Conn->real_escape_string($t[2]);
                                    $adate  =$Conn->real_escape_string($t[3]);
                                    $jdate  =$Conn->real_escape_string($t[4]);
                                    $rdate  =$Conn->real_escape_string($t[5]);
                                    $con    =$Conn->real_escape_string($t[6]);
                                    
                                    
                                    $s= new Upload ();
                                    $ok=$s->Store_teacher($tn,$dob,$deg,$adate,$jdate,$rdate,$con,$pass,$Conn);
                        }
                        $i++;
                    }
                    else
                    {
                        echo "<script>alert('Invalid File Please upload a valid file.');window.location.href='teacher_import.php';</script>"; 
                    }

                }
                
                $action="Teacher data Imported";

                if($ok)
                {

                    $log->success_entry($action,$Conn);
                    echo "<script>alert('Teacher Data Stored Successfully');window.location.href='manage-teachers.php';</script>";
                    
                }
                else 
                {
                   
                    $log->success_entry($action,$Conn,"Unsuccessful");
                    
                }
            }
        }
        else if(sizeof($empt)==2 && strcmp(x, $empt[1])==0)
        {
            $error="Uploaded file is empty : Please fill Data in sheet";
        }
        else
        {
            $error="Empty Cell found at row :";

                for ($lines=1; $lines<sizeof($empt); $lines++) 
                { 
                    $error=$error." $empt[$lines],";
                }  
                $error=$error." in Uploaded file (hint : if Uploaded sheet is perfect but still get this error than delete the last empty row.)";
        }

    }
    else
    {
        echo "<script>alert('Only excel files are accepted (xlsx)');window.location.href='teacher_import.php';</script>";  
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Teacher details | IGHS</title>
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
          .add {
                width: 100%;
                margin-left: 100%;
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
                          <h4 class="page-title pull-left">Teacher Import</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Teacher Import</span></li>
                            </ul>
                            <ul>
                    <div class="add">
                            <a href="Share_teacher_demo.php" id="b"> <button type="submit" name="add" class="btn btn-primary">Demo Sheet</button></a>
                    </div>
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
                                        <?php if(isset($error)){ ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <?php
                                            echo htmlentities($error); 
                                        }?>
                                        </div>
                                        
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
<?php 
   } 
?>
