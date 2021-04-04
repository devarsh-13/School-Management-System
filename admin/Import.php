<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{



require "connection.php";
require "../vendor/autoload.php";
require "store_data.php";


function get_pass($p2)
{
    $p1=rand(100,999);

    $p3 = $p1."_".$p2;
    return $p3;
}

session_start();

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
                $q=mysqli_query($Conn,"SELECT Class_id FROM `Class` WHERE `C_no`='$t[3]' AND `Stream`='$t[4]'")or die(mysqli_error($Conn));
                $c_id=mysqli_fetch_array($q);
                $pass = get_pass($t[0]);
        
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
                        $ay     =$Conn->reat_escape_string($t[16]);

                        $s= new Upload ();
                        $ok=$s->Store($gr,$uid,$name,$cast,$cate,$dob,$cont,$ad_date,$cid,$adhar,$hos,$hom,$handi,$des,$pass,$remarks,$ay,$Conn);
            }
            $i++;

        }
        //unlink($targetPath);

            
if($ok)
{
$msg="Import Successfully";
}
else 
{
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
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
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
                                <h2 class="title">Import</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    
                                    <li class="active">Import</li>
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
                                            <h5>Fill The Info</h5>
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
