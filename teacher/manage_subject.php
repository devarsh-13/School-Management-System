<?php
session_start();
error_reporting(0);
include('connection.php');
include('../admin/store_data.php');
$tid = $_SESSION['t_id'];


 
   $Sql = "UPDATE `teacherstd` SET `is_deleted` = '1' WHERE `id_teacher`='$tid'";
     $q = mysqli_query($Conn, $Sql);


if (isset($_POST['Update'])) {
    $s = $_POST['sub'];
    if (isset($_POST['sub']) == null) {

        echo "<script>alert('Please select atleast one subject');window.location.href='teacher_info.php';</script>";
    } else {


        for ($i = 0; $i < sizeof($s); $i++) {
               $Sql = "INSERT INTO `teacherstd` (id_sub,id_teacher,is_deleted)VALUES('" . $s[$i] . "','$tid','0')";
            $q = mysqli_query($Conn, $Sql);
          
        }


        header("location:dashboard.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage subject </title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">

    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">

    <link rel="stylesheet" href="assets/css/responsive.css">
    <style type="text/css">
        /*-------------------- 2.1 Sidebar Menu -------------------*/

        .sidebar-menu {
            margin-left: 5%;
            left: 0;
            top: 0;
            z-index: 99;
            height: 100vh;
            width: 90%;
            overflow: hidden;
            background: #303641;
            box-shadow: 2px 0 32px rgba(0, 0, 0, 0.05);
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .sbar_collapsed .sidebar-menu {
            left: -280px;
        }

        .main-menu {
            margin-left: 15%;
            margin-right: 15%;
            height: calc(100% - 100px);
            overflow: hidden;
            padding: 20px 10px 0 0;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .menu-inner {
            overflow-y: scroll;
            height: 100%;
        }

        .slimScrollBar {
            background: #fff !important;
            opacity: 0.1 !important;
        }

        .sidebar-header {
            padding: 19px 32px 20px;
            background: #303641;
            text-align: center;
            border-bottom: 1px solid #343e50;
        }

        .sidebar-menu .logo {
            text-align: center;
        }

        .logo a {
            display: inline-block;
            max-width: 120px;
        }

        .metismenu>li>a {
            padding-left: 32px !important;
        }

        .metismenu li a {
            position: relative;
            display: block;
            color: #8d97ad;
            font-size: 15px;
            text-transform: capitalize;
            padding: 15px 15px;
            letter-spacing: 0;
            font-weight: 400;
        }

        .metismenu li a i {
            color: #6a56a5;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .metismenu li a:after {
            position: absolute;
            content: '\f107';
            font-family: fontawesome;
            right: 15px;
            top: 12px;
            color: #8d97ad;
            font-size: 20px;
        }

        .metismenu li.active>a:after {
            content: '\f106';
        }

        .metismenu li a:only-child:after {
            content: '';
        }

        .metismenu li a span {
            margin-left: 10px;
        }

        .metismenu li.active>a,
        .metismenu li:hover>a {
            color: #fff;
        }

        .metismenu li li a {
            padding: 8px 20px;
        }

        .metismenu li ul {
            padding-left: 37px;
        }

        .metismenu>li:hover>a,
        .metismenu>li.active>a {
            color: #fff;
            background: #343942;
        }

        .metismenu li:hover>a,
        .metismenu li.active>a {
            color: #fff;
        }

        .metismenu li:hover>a i,
        .metismenu li.active>a i {
            color: #fff;
        }

        .metismenu li li a:after {
            top: 6px;
        }

        /*-------------------- END Sidebar Menu -------------------*/
    </style>
</head>

<body>
    <form method="post">
        <div class="page-container">
            <div class="sidebar-menu">
                <div class="sidebar-header">

                    <a href="#"><span>Select Your Subjects</span></a>

                </div>
                <div class="main-menu">
                    <div class="menu-inner">
                        <nav>
                            <ul class="metismenu" id="menu">


                                <?php
                                require "connection.php";
                                $sql = "SELECT * from `Class`";
                                $query = mysqli_query($Conn, $sql);
                                while ($result = mysqli_fetch_array($query)) { ?>

                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bars"></i> <span><?php echo $result['C_no'] . " " . $result['Stream']; ?></span> </i></a>
                                        <ul class="child-nav">

                                            <?php
                                            require "connection.php";

                                            $prn = "SELECT * from `Subjects` WHERE  Class_id=$result[Class_id]";
                                            $xyz = mysqli_query($Conn, $prn);
                                            while ($sub = mysqli_fetch_array($xyz)) { ?>
                                                <li>
                                                    <a href="#">

                                                        <span><input type="checkbox" name="sub[]" value="<?php echo $sub['Sub_id']; ?>">&nbsp;&nbsp;<?php echo $sub['Sub_name']; ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                    </li>
                                <?php } ?>
                                <li align="center"><button type="submit" name="Update" class="btn btn-primary">Update</button></li>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>