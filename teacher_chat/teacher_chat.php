<?php 
  session_start();
  include_once "../Database/connection.php";

  if(!isset($_SESSION['t_id'])){
    header("location: ../login.php");
  }
?>
<?php include_once "teacher_head.php"; ?>
<head>
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
</head>
<body>
 <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
       <?php include('../teacher/leftbar.php'); ?>
    <div class="main-content">
         <?php include('../teacher/topbar.php'); ?>



      
        <!-- page title area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">Chat</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                <li><a><span>Chat</span></a></li>
                                
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span></span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->
<?php
  if(isset($_SESSION['t_id']))
  {
    include_once "teacher_head.php";   
  ?>
  <body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $student_id = mysqli_real_escape_string($Conn, $_GET['student_id']);


          $_SESSION['s_id']=$student_id;
          
          $sql = mysqli_query($Conn, "SELECT * FROM `students` WHERE `S_srn` = {$student_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: select_students.php");
          }
        ?>
        <a href=" select_students.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="../user_photos/<?php echo $row['S_photo']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['S_name'] ?></span>
          <p><?php echo $row['s_status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $student_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="teacher_chat.js"></script>

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
  }
  else
  {
    header("location: ../teacher/");
  }  

?>