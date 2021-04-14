<?php
session_start();
error_reporting(0);
include('connection.php');
include('store_data.php');

if(strlen($_SESSION['a_id'])=="")
    {   
        header("Location: index.php"); 
    }
        else
    {
        $action="in Edit Student";
        $log=new Log();
        $log->success_entry($action,$Conn);

        $stid=$_GET['S_id'];

if(isset($_POST['update']))
{
   
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
$action="Edit Student data";
if($q)
{
$log=new Log();
$log->success_entry($action,$Conn);
$msg="Student Info Edit Successfully";
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
    <title>IGHS Admin| Edit Student </title>
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
                    document.getElementById("stream").value="NULL";
                }
            }
             function desc(i)
            {
                var c=document.getElementById("hand1").checked;
                if(c==true)
                {
                    document.getElementById("des").required = true;
                    document.getElementById("des").disabled = false;
                    var s=document.getElementById("des").value;

                    if(s.localeCompare("NULL")==0)
                    {
                       document.getElementById("des").value="";
                    }

                }
                else
                {
                    document.getElementById("des").required = false;   
                    document.getElementById("des").value="NULL";
                    document.getElementById("des").disabled = true;
                }


            }
           
    </script>
</head>

<body class="top-navbar-fixed">
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
       <?php include('includes/leftbar.php'); ?>
    <div class="main-content">
         <?php include('includes/topbar.php'); ?>



      
        <!-- page title area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">Edit Student</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Edit Student</span></li>
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>Fill The Student Info.</span>
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
                                        <form class="form-horizontal" method="post" onmouseenter="Check_class()" onkeyup="Check_class()" onkeyup="desc()" onmousemove="desc()" onscroll="desc()" >
<?php 
 $sql = "SELECT * from `students` join Class on students.Class_id=Class.Class_id WHERE `S_srn`='$stid'";
$query = mysqli_query($Conn,$sql);

$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
 $result=mysqli_fetch_array($query)
?>


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
                                                    <Select name="class" class="form-control" id="clas" required="required" autocomplete="off" onkeyup="Check_class()" >
                                                    <?php  $id=$result['Class_id'];
                                                    $q=mysqli_query($Conn,"SELECT `C_no`,`Stream` FROM `class` WHERE `Class_id` = '$id' ");
                                                    $da_ta=mysqli_fetch_array($q);

                                                    ?>

                                                    <option id=9 value="9" <?php if($da_ta[0]==9){echo "Selected";}?> >  9</option>
                                                    <option id=10 value="10"<?php if($da_ta[0]==10){echo "Selected";}?> > 10</option>
                                                    <option id=11 value="11" <?php if($da_ta[0]==10){echo "Selected";}?> >11</option>
                                                    <option id=12 value="12"<?php if($da_ta[0]==12){echo "Selected";}?> > 12</option>
                                                </Select>

                                            </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Stream</label>
                                                <div class="col-sm-10">
                                                    <select name="stream" class="form-control" id="stream" required="required" autocomplete="off">
                                                        <option value="">---Select---</option>
                                                        <option value="Arts" <?php if($da_ta[1]=="Arts"){echo "Selected"; }?> >Arts</option>
                                                        <option value="Commerce" <?php if($da_ta[1]=="Commerce"){echo "Selected"; }?>> Commerce</option>
                                                        <option value="Science" <?php if($da_ta[1]=="Science"){echo "Selected"; }?>> Science</option>

                                                    </select>
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
                                                    <?php  
                                                       $result['S_handicapped']
                                                    ?>
                                                    
                                                    <input type="radio" name="hand" value="Yes" required <?php if($result['S_handicapped']=="Yes"){echo "checked"; }?>  onclick="desc()"  id="hand1">Yes</input> 
                                                    
                                                    <input type="radio" name="hand" value="No" required <?php if($result['S_handicapped']=="No"){echo "checked"; } ?> onclick="desc()"  id="hand2">No</input>
                                                        
                                                                                                    
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

                                            <?php }?>
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
