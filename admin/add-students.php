<?php
session_start();
error_reporting(0);
include('connection.php');
include('store_data.php');

include("../ec_dc.php");
include('image_compress.php');

require 'alertbox.php';



if (strlen($_SESSION['a_id']) == "") 
{
    header("Location: index.php");
} 
else 
{
    $obj = new ecdc();
    $log = new Log();
    if (!(isset($_POST['gr']))) {
        $action = "In Add Student";
        $log->success_entry($action, $Conn);
    }

    if (isset($_POST['submit'])) 
    {

        $gr = $_POST['gr'];
        $ui = $_POST['ui'];
        $sn = $_POST['sn'];
        $cast = $_POST['cast'];
        $cat = $_POST['cat'];
        $dob = $_POST['dob'];
        $con = $_POST['con'];
        $adate = $_POST['adate'];
        $adhar = $_POST['adhar'];
        $hostel = $_POST['hostel'];
        $home = $_POST['home'];
        $hand = $_POST['hand'];
        $des = $_POST['des'];

        $os=$_POST['pass'];
        $pass= $obj->encrypt($os);
       
        $re = $_POST['re'];
        $stat = "offline";
        // $ay=date('Y').'-'.(date('Y')+1);

        $ay = $_POST['AY'];
        $class = $_POST['class'];
        $stream = $_POST['stream'];
        $d = date("Y-m-d");

        if ($class == 11 || $class == 12) {
            $s = "SELECT `Class_id` FROM `class` WHERE `C_no` = '$class' AND `Stream` = '$stream' ";
            $q = mysqli_query($Conn, $s);
            $ci = mysqli_fetch_array($q);
        } else {
            $s = "SELECT `Class_id` FROM `class` WHERE `C_no` = '$class'";
            $q = mysqli_query($Conn, $s);

            $ci = mysqli_fetch_array($q);
        }





        $error5 = false;

        $mo = $_POST['con'];
        if (!preg_match("/^[0-9]*$/", $mo)) {

            echo '<script>alert(" Enter Only number!!")';
            $error5 = true;
        } elseif (strlen($mo) < 10) {
            echo '<script>alert(" Please enter proper 10 Digit number!!") ';
            $error5 = true;
        } elseif (strlen($mo) > 10) {
            echo '<script>alert(" Please enter proper 10 Digit number!!") ';
            $error5 = true;
        }

        if($error5==false)
        {
            $uploadFolder = '../user_photos/student/';

            $imageTmpName = $_FILES['file']['tmp_name'];
            $extension=pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);

            $imageName = $gr.".".$extension;

            $result = compress($imageTmpName,$uploadFolder.$imageName);
           
            if ($result==false) 
            {
                $imageName = "student_default.jpg";
            }

            $Sql = "INSERT INTO `students` 
                                        (
                                            `S_photo`,
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
                                            `Academic_year`, 
                                            `is_deleted`, 
                                            `Created_on`,
                                            `s_status`,
                                            `updated`
                                        )VALUES(
                                            '$imageName',
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
                                            '$ay', 
                                            '0', 
                                            '$d',
                                            '$stat',
                                            '0'
                                        )";

            $q = mysqli_query($Conn, $Sql) or die(mysqli_error($Conn));
            $action = "Student Added";
         
            if ($q) {

                $log->success_entry($action, $Conn);
                echo "
                <script>
                
                window.onload = function()
                {
                    suc('Student ADD Successfully.','add-students.php');
                }</script>";
                

            } else {

                $log->success_entry($action, $Conn, "Unsuccessful");

                $error = "Something went wrong. Please try again";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    
        <script type="text/javascript">
            function Check_class() {

                if (document.getElementById("clas").value == 11 || document.getElementById("clas").value == 12) {
                    document.getElementById("stream"). = true;
                    document.getElementById("stream").disabled = false;
                    if (document.getElementById("stream").value == "NULL") {
                        document.getElementById("stream").value = "";
                    }
                } else {
                    document.getElementById("stream"). = false;
                    document.getElementById("stream").disabled = true;
                    document.getElementById("stream").value = "NULL";
                }
            }

            function desc(i) {
                var c = document.getElementById("hand1").checked;
                var c2 = document.getElementById("hand2").checked;
                if (c == true) {
                    document.getElementById("des"). = true;
                    document.getElementById("des").disabled = false;
                    var s = document.getElementById("des").value;

                    if (s.localeCompare("NULL") == 0) {
                        document.getElementById("des").value = "";
                    }

                } else if (c2 == true) {
                    document.getElementById("des"). = false;
                    document.getElementById("des").value = "NULL";
                    document.getElementById("des").disabled = true;
                } else {

                }


            }
        </script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IGHS Admin| ADD Student </title>
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
        <script src="../js/validate.js"></script>


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
                            <h4 class="page-title pull-left">ADD Student</h4>
                            <li><a href="dashboard.php">Home</a></li>

                            <li><span>Add Student</span></li>


                        </ul>
                        <div class="add">
                            <a href="Import.php" id="b"> <button type="submit" name="add" class="btn btn-primary">Import</button></a>
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

                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Gr Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="gr" class="form-control"  oninput='digitValidate(this)' pattern=".{5}"  title=" 5 numbers" maxlength="5" id="gr" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">UID Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="ui" class="form-control"  id="ui" oninput='digitValidate(this)' pattern=".{18}"  title=" 18 numbers" maxlength="18" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Student Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="sn" class="form-control" oninput='stringValidate(this)' maxlength="50"  id="sn" required autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Caste</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="cast" class="form-control" oninput='stringValidate(this)'  maxlength="20"  id="cast" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Category</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="cat" class="form-control" oninput='stringValidate(this)'  maxlength="20"  id="cat" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control"  id="dob" min="1900-01-01" max='<?php echo date('Y-m-d');?>' autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="con" class="form-control"  id="con" oninput='digitValidate(this)' pattern=".{10}"  title=" 10 numbers" maxlength="10" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Admission Date</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="adate" class="form-control"  id="adate"  min="1990-01-01" max='<?php echo date('Y-m-d');?>' autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Class</label>
                                                <div class="col-sm-10">
                                                    <Select name="class" class="form-control" id="clas"  autocomplete="off" onkeyup="Check_class()" onclick="Check_class()" required>
                                                        <option value="NULL">---Select---</option>
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

                                                    <SELECT name="stream" class="form-control" id="stream">
                                                        <option value="NULL" onkeypress="Check_class()" onclick="Check_class()">
                                                            -- Select --</option>
                                                        <option value="Arts">Arts</option>
                                                        <option value="Commerce">Commerce</option>
                                                        <option value="Science">Science</option>
                                                    </SELECT>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Academic Year</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="AY" class="form-control"  pattern="[0-9]{4}-[0-9]{4}"  title="pattern should be yyyy-yyyy " required id="AY" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Student Image</label>
                                                <div class="col-sm-10">

                                                    <input type="file" name="file" class="form-control" id="img">

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Adhar Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="adhar" class="form-control" oninput='digitValidate(this)'  id="adhar" pattern=".{12}"  required title=" 12 numbers" maxlength='12' autocomplete="on">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Home Address</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" name="home" class="form-control"  id="home" autocomplete="off" maxlength="40" required ></textarea>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Hostel Address</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" name="hostel" class="form-control" id="hostel" autocomplete="off" maxlength="40" ></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Handicapped</label>
                                                <div class="col-sm-10">

                                                    <input type="radio" name="hand" value="Yes" required onclick="desc()" id="hand1">Yes</input>
                                                    <input type="radio" name="hand" value="No" required onclick="desc()" id="hand2">No</input>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">If Yes Describe</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" name="des" class="form-control" id="des" autocomplete="off"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="pass"  class="form-control" id="pass" maxlength="15" minlength="4" autocomplete="off" required>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Re marks</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="5" name="re" class="form-control" id="re" maxlength="20" autocomplete="off"></textarea>
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