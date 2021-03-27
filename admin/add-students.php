<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
    require "connection.php";
        $gr=$_POST['gr'];
        $ui=$_POST['ui']; 
        $sn=$_POST['sn']; 
        $cast=$_POST['cast']; 
        $cat=$_POST['cat']; 
        $dob=$_POST['dob']; 
        $con=$_POST['con']; 
        $adate=$_POST['adate'];
        $adhar=$_POST['adhar'];
        $hostel=$_POST['hostel'];  
        $home=$_POST['home']; 
        $hand=$_POST['hand']; 
        $des=$_POST['des'];
        $pass=$_POST['pass'];  
        $re=$_POST['re']; 
        $class=$_POST['class'];
        $stream=$_POST['stream'];
        $d = date("Y-m-d");

        if($class==11 || $class==12 )
        {
            $s="SELECT `Class_id` FROM `class` WHERE `C_no` = '$class' AND `Stream` = '$stream' ";
            $q=mysqli_query($Conn,$s);
            $ci=mysqli_fetch_array($q);    
        }
        else
        {
            $s="SELECT `Class_id` FROM `class` WHERE `C_no` = '$class'";
            $q=mysqli_query($Conn,$s);
            $ci=mysqli_fetch_array($q);       
        }
        


        


        $Sql="INSERT INTO `students` 
                                    (
                                        `S_grn`, 
                                        `S_uidn`, 
                                        `S_name`, 
                                        `S_caste`, 
                                        `S_category`, 
                                        `S_dob`, 
                                        `S_contact`, 
                                        `S_ad_date`, 
                                        `Class_id`, 
                                        `S_adharn`, 
                                        `S_hostel`, 
                                        `S_home`, 
                                        `S_handicapped`, 
                                        `S_describe`, 
                                        `S_password`, 
                                        `S_remarks`, 
                                        `is_deleted`, 
                                        `Created_on`) 

                                    VALUES 
                                    (
                                        '$gr', 
                                        '$ui', 
                                        '$sn',
                                        '$cast', 
                                        '$cat', 
                                        '$dob', 
                                        '$con', 
                                        '$adate', 
                                        '$ci[0]', 
                                        '$adhar', 
                                        '$hostel', 
                                        '$home', 
                                        '$hand', 
                                        '$des', 
                                        '$pass', 
                                        '$re', 
                                        '0', 
                                        '$d')";

        $q=mysqli_query($Conn,$Sql)or die(mysqli_error($Conn));

        if($q)
        {
             $msg="Student info added successfully";
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
    <script type="text/javascript">

            function Check_class()
            {
                
                if(document.getElementById("clas").value==11 || document.getElementById("clas").value==12)
                {
                    document.getElementById("stream").required = true;
                    document.getElementById("stream").disabled = false;
                }
                else
                {
                    document.getElementById("stream").required = false;
                    document.getElementById("stream").disabled = true;
                    document.getElementById("stream").VALUES="NULL";
                }
            }
            function Des(i)
            {
                    if(i==1)
                    {
                        document.getElementById("des").required = true;
                        document.getElementById("des").disabled = false;
                    }
                    else
                    {
                        document.getElementById("des").required = false;   
                        document.getElementById("des").disabled = true;
                    } 

            }
           
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IGHS Admin| ADD Student </title>
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
                                <h2 class="title">ADD Student</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Students</li>
                                    <li class="active">ADD Student</li>
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
                                            <h5>Fill The Student Info</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong>
                                            <?php echo htmlentities($msg); ?>
                                        </div>
                                        <?php } 
else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong>
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="post">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Gr Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="gr" class="form-control" maxlength="5" id="gr"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">UID Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="ui" class="form-control" id="ui" maxlength="18"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Student Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="sn" class="form-control" id="sn"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Caste</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="cast" class="form-control" id="cast"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Category</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="cat" class="form-control" id="cat"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="Date" name="dob" class="form-control" id="dob"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="con" class="form-control" id="con" maxlength="10"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admission Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="adate" class="form-control" id="adate"   autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Class</label>
                                                <div class="col-sm-10">
                                                    <select type="text" name="class" class="form-control" id="clas" onclick="Check_class()">
                                                        <option value="NULL">-- SELECT --</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Stream</label>
                                                <div class="col-sm-10">

                                                    <SELECT name="stream" class="form-control" id="stream"  >
                                                        <option value="NULL">-- SELECT --</option>
                                                        <option value="Arts">Arts</option>
                                                        <option value="Commerce">Commerce</option>
                                                        <option value="Science">Science</option>
                                                    </SELECT> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Adhar Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="adhar" class="form-control" id="adhar" maxlength='12'   autocomplete="on">
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Home Address</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="home" class="form-control" id="home" autocomplete="off"></textarea>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Hostel Address</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="hostel" class="form-control" id="hostel"  autocomplete="off"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Handicapped</label>
                                                <div class="col-sm-10">

                                                    <input type="radio" name="hand" value="Yes" onclick="Des(1)" >Yes
                                                    <input type="radio" name="hand" value="No"  onclick="Des(0)">No 
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">If Yes Describe</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="des" class="form-control" id="des"  autocomplete="off"></textarea>
                                                </div>
                                            </div>

                                               <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="pass" class="form-control" id="pass"   autocomplete="off">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Re marks</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="re" class="form-control" id="re"   autocomplete="off"></textarea>
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
