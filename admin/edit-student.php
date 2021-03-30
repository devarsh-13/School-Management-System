<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        $stid=$_GET['S_id'];

if(isset($_POST['update']))
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
$s="SELECT `Class_id` FROM `class` WHERE `C_no` = '$class' AND `Stream`='$stream'";
$q=mysqli_query($Conn,$s);
$ci=mysqli_fetch_array($q);

$c=$ci[0];

$Sql="UPDATE `students` SET `S_grn`='$gr',`S_uidn`='$ui',`S_name`='$sn',`S_caste`='$cast', `S_category`= '$cat', `S_dob`= '$dob',`S_contact`='$con',`S_ad_date`='$adate',`Class_id`= '$c',`S_adharn`='$adhar',`S_hostel`='$hostel',`S_home`='$home',`S_handicapped`='$hand',`S_describe`='$des',`S_password`='$pass',`S_remarks`='$re',`is_deleted`='0',`Created_on`='$d' WHERE `S_srn`='$stid'";

                             

$q=mysqli_query($Conn,$Sql);

if($q)
{
$msg="Student Info Edit Successfully";
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
    <title>IGHS Admin| Edit Student </title>
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
                                <h2 class="title">Edit Student</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Students</li>
                                    <li class="active">Edit Student</li>
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
                                            
                                            <?php echo htmlentities($msg); ?>
                                        </div>
                                        <?php } 
else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="post">
<?php 
 $sql = "SELECT * from `students` join Class on students.Class_id=Class.Class_id WHERE `S_srn`='$stid'";
$query = mysqli_query($Conn,$sql);

$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
 while($result=mysqli_fetch_array($query))
    {   ?>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Gr Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="gr" value="<?php echo htmlentities($result['S_grn'])?>" class="form-control" maxlength="6" id="gr" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">UID Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="ui" value="<?php echo htmlentities($result['S_uidn']);?>" class="form-control" id="ui" maxlength="12" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Student Nmae</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="sn" value="<?php echo htmlentities($result['S_name']);?>" class="form-control" id="sn" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Cast</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="cast" value="<?php echo htmlentities($result['S_caste']);?>" class="form-control" id="cast" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Category</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="cat" value="<?php echo htmlentities($result['S_category'])?>" class="form-control" id="cat" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" value="<?php echo htmlentities($result['S_dob'])?>" class="form-control" id="dob" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="con" value="<?php echo htmlentities($result['S_contact'])?>" class="form-control" id="con" maxlength="10" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admission Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="adate" value="<?php echo htmlentities($result['S_ad_date'])?>" class="form-control" id="adate" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Class</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="class" value="<?php  $id=$result['Class_id'];
                                 $q=mysqli_query($Conn,"SELECT `C_no` FROM `class` WHERE `Class_id` = '$id' ");
                                 $name=mysqli_fetch_array($q);
                                echo $name[0];?>"  class="form-control" id="class" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Stream</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="stream" value="<?php echo htmlentities($result['Stream'])?>" class="form-control" id="stream" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Adhar Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="adhar" value="<?php echo htmlentities($result['S_adharn'])?>" class="form-control" id="adhar" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Home Address</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="home"  class="form-control" id="home" required="required" autocomplete="off"><?php echo htmlentities($result['S_home'])?>
                                                     </textarea>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Hostel Address</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="hostel"  class="form-control" id="hostel" required="required" autocomplete="off"><?php echo htmlentities($result['S_hostel'])?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Handicapped</label>
                                                <div class="col-sm-10">
                                                    <?php  $hd=$result['S_handicapped'];
                                                    if($hd=="Yes")
                                                    {
                                                    ?>
                                                    <input type="radio" name="hand" value="Yes" required="required" checked="">Yes 
                                                    <input type="radio" name="hand" value="No" required="required">No 
                                                    <?php }?>
                                                    <?php  
                                                    if($hd=="No")
                                                    {
                                                    ?>
                                                    <input type="radio" name="hand" value="Yes" required="required">Yes 
                                                    <input type="radio" name="hand" value="No" required="required"  checked="">No 
                                                    <?php }?>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">If Yes Describe</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="des"  class="form-control" id="des" required="required" autocomplete="off"><?php echo htmlentities($result['S_describe'])?></textarea>
                                                </div>
                                            </div>

                                               <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="pass" value="<?php echo htmlentities($result['S_password'])?>" class="form-control" id="pass" required="required" autocomplete="off">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Re marks</label>
                                                <div class="col-sm-10">
                                                     <textarea rows="5"  name="re"  class="form-control" id="re" required="required" autocomplete="off"><?php echo htmlentities($result['S_remarks'])?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
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
