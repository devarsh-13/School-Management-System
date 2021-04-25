<!--  -->




<?php
session_start();
include_once "../teacher/connection.php";
if (isset($_SESSION['t_id'])) {



    $T_srn = $_SESSION['t_id'];


    $sql = "SELECT * from `teachers` WHERE
 T_srn = '$T_srn'";


    $query = mysqli_query($Conn, $sql);


    $row = mysqli_num_rows($query);


    $result = mysqli_fetch_array($query);

    $update = mysqli_query($Conn, "UPDATE teachers SET t_status ='online' WHERE T_srn ='$T_srn' ") or die(mysqli_connect_error());


?>

<?php include_once "teacher_head.php"; ?>



    <body>



        <!-- page title area start -->

        <div class="wrapper">
            <section class="users">
                <header>
                    <div class="content">
                        <a href="../teacher/Dashboard.php" class="logout">Back</a>


                    </div>

                </header>

                <div class="search">
                    <span class="text">Select an user to start chat</span>
                    <input type="text" placeholder="Enter name to search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">

                </div>
            </section>
        </div>
        <script src="show_students.js"></script>

    </body>

    </html>

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


<?php

} else {

    header("location:../teacher/teacher_login.php");
}

?>