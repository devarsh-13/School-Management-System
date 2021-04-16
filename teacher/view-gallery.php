

<?php
session_start();
error_reporting(0);
include('connection.php');
include('../admin/store_data.php');

$log=new Log();
$action="In View-Gallery";

if(strlen($_SESSION['t_id'])=="")
{   
    $log->success_entry($action,$Conn,"Unsuccessful");
    header("Location: index.php"); 
}
    else{
            $log->success_entry($action,$Conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
     <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>

          <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <!--<link rel="stylesheet" href="assets/css/default-css.css">-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
          <style>
            /* 
--------------------------
- 1.1 Default CSS
--------------------------
*/

/*google font*/

@import url('https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Poppins:100,300,400,500,600,700,800,900');
/* Your default CSS. */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

*, *:before, *:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

*:focus {
    outline: 0;
}

html {
    -webkit-font-smoothing: antialiased;
}

body {
    background: #fff;
    font-weight: normal;
    -webkit-font-smoothing: antialiased;
    /* Fix for webkit rendering */
    -webkit-text-size-adjust: 100%;
}

/*custome css*/

/*--------------------------
   Padding top
---------------------------*/

.pt--0 {
    padding-top: 0
}

.pt--10 {
    padding-top: 10px
}

.pt--15 {
    padding-top: 15px
}

.pt--20 {
    padding-top: 20px
}

.pt--30 {
    padding-top: 30px
}

.pt--40 {
    padding-top: 40px
}

.pt--50 {
    padding-top: 50px
}

.pt--60 {
    padding-top: 60px
}

.pt--70 {
    padding-top: 70px
}

.pt--80 {
    padding-top: 80px
}

.pt--90 {
    padding-top: 90px
}

.pt--100 {
    padding-top: 100px
}

.pt--110 {
    padding-top: 110px
}

.pt--120 {
    padding-top: 120px
}

.pt--130 {
    padding-top: 130px
}

.pt--140 {
    padding-top: 140px
}

.pt--150 {
    padding-top: 150px
}

.pt--160 {
    padding-top: 160px
}

.pt--170 {
    padding-top: 170px
}

.pt--180 {
    padding-top: 180px
}

.pt--190 {
    padding-top: 190px
}

/*------------------------
   Padding bottom
---------------------------*/

.pb--0 {
    padding-bottom: 0
}

.pb--10 {
    padding-bottom: 10px
}

.pb--15 {
    padding-bottom: 15px
}

.pb--20 {
    padding-bottom: 20px
}

.pb--30 {
    padding-bottom: 30px
}

.pb--40 {
    padding-bottom: 40px
}

.pb--50 {
    padding-bottom: 50px
}

.pb--60 {
    padding-bottom: 60px
}

.pb--70 {
    padding-bottom: 70px
}

.pb--80 {
    padding-bottom: 80px
}

.pb--90 {
    padding-bottom: 90px
}

.pb--100 {
    padding-bottom: 100px
}

.pb--110 {
    padding-bottom: 110px
}

.pb--120 {
    padding-bottom: 120px
}

.pb--130 {
    padding-bottom: 130px
}

.pb--140 {
    padding-bottom: 140px
}

.pb--150 {
    padding-bottom: 150px
}

.pb--160 {
    padding-bottom: 160px
}

.pb--170 {
    padding-bottom: 170px
}

.pb--180 {
    padding-bottom: 180px
}

.pb--190 {
    padding-bottom: 190px
}

/*------------------------------
   Page section padding 
-------------------------------*/

.ptb--0 {
    padding: 0
}

.ptb--10 {
    padding: 10px 0
}

.ptb--20 {
    padding: 20px 0
}

.ptb--30 {
    padding: 30px 0
}

.ptb--40 {
    padding: 40px 0
}

.ptb--50 {
    padding: 50px 0
}

.ptb--60 {
    padding: 60px 0
}

.ptb--70 {
    padding: 70px 0
}

.ptb--80 {
    padding: 80px 0
}

.ptb--90 {
    padding: 90px 0
}

.ptb--100 {
    padding: 100px 0
}

.ptb--110 {
    padding: 110px 0
}

.ptb--120 {
    padding: 120px 0
}

.ptb--130 {
    padding: 130px 0
}

.ptb--140 {
    padding: 140px 0
}

.ptb--150 {
    padding: 150px 0
}

.ptb--160 {
    padding: 160px 0
}

.ptb--170 {
    padding: 170px 0
}

.ptb--180 {
    padding: 180px 0
}

/*------------------------------
   Page section padding left
-------------------------------*/

.pl--0 {
    padding-left: 0px;
}

.pl--10 {
    padding-left: 10px;
}

.pl--20 {
    padding-left: 20px;
}

.pl--30 {
    padding-left: 30px;
}

.pl--40 {
    padding-left: 40px;
}

.pl--50 {
    padding-left: 50px;
}

.pl--60 {
    padding-left: 60px;
}

.pl--70 {
    padding-left: 70px;
}

.pl--80 {
    padding-left: 80px;
}

.pl--90 {
    padding-left: 90px;
}

.pl--100 {
    padding-left: 100px;
}

.pl--110 {
    padding-left: 110px;
}

/*------------------------------
   Page section padding right
-------------------------------*/

.pr--0 {
    padding-right: 0px;
}

.pr--10 {
    padding-right: 10px;
}

.pr--20 {
    padding-right: 20px;
}

.pr--30 {
    padding-right: 30px;
}

.pr--40 {
    padding-right: 40px;
}

.pr--50 {
    padding-right: 50px;
}

.pr--60 {
    padding-right: 60px;
}

.pr--70 {
    padding-right: 70px;
}

.pr--80 {
    padding-right: 80px;
}

.pr--90 {
    padding-right: 90px;
}

.pr--100 {
    padding-right: 100px;
}

.pr--110 {
    padding-right: 110px;
}

/* Colors */

:root {
    --primary-color: #4336FB;
}

#preloader {
    position: fixed;
    left: 0;
    top: 0;
    z-index: 99999;
    height: 100%;
    width: 100%;
    background: #fff;
    display: flex;
}
.loader{
    margin: auto;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    position: relative;
}
.loader:before{
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: #000;
    border-radius: 50%;
    opacity: 0;
    animation: popin 1.5s linear infinite 0s;
}
.loader:after{
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: #000;
    border-radius: 50%;
    opacity: 0;
    animation: popin 1.5s linear infinite 0.5s;
}

@keyframes popin{
    0%{
        opacity: 0;
        transform: scale(0);
    }
    1%{
        opacity: 0.1;
        transform: scale(0);
    }
    99%{
        opacity: 0;
        transform: scale(2);
    }
    100%{
        opacity: 0;
        transform: scale(0);
    }
}

.logo img {
    max-width: 100%;
    height: auto;
}
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

.image-popup {
    display: none;
    flex-flow: column;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 99999;
}
.con {
    display: flex;
    flex-flow: column;
    background-color: #ffffff;
    padding: 25px;
    border-radius: 5px;
}
.slide
{
    display: inline-flex;
     
}
.slide a
{   height:300px; width:300px;
     
    text-decoration: none;
    
    position: relative;
    overflow: hidden;
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
                          <h4 class="page-title pull-left">Gallery</h4>
                                <li><a href="dashboard.php">Home</a></li>
                              
                                <li><span>Gallery</span></li>
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>View Gallery</span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->

                     
                                       
      <div class="images">
         

         <?php
         require 'connection.php';


         $images = mysqli_query($Conn, "select * from images");

         $path = "../admin/img/";

         while ($res = mysqli_fetch_array($images)) {
            $full = $path . $res[1];
            echo "
               <div class='slide'>
               <a href='view-gallery.php'>
               <img src='$full' height=300px width=300px>
               </div>
               </a>";
         }

         ?>

      </div>
      <div class="image-popup"></div>



      <script>
         // Container we'll use to show an image
         let image_popup = document.querySelector('.image-popup');
         // Loop each image so we can add the on click event
         document.querySelectorAll('.images a').forEach(img_link => {
            img_link.onclick = e => {
               e.preventDefault();
               let img_meta = img_link.querySelector('img');
               let img = new Image();
               img.onload = () => {
                  // Create the pop out image
                  image_popup.innerHTML = `
            <div class="con">
               <img src="${img.src}">
            </div>
         `;
                  image_popup.style.display = 'flex';
               };
               img.src = img_meta.src;
            };
         });
         // Hide the image popup container if user clicks outside the image
         image_popup.onclick = e => {
            if (e.target.className == 'image-popup') {
               image_popup.style.display = "none";
            }
         };
      </script>





                                 </div>
                                           
                            </div>

                                        <!-- /.panel -->
                    </div>
                                    <!-- /.col-md-6 -->

                </div>
                                <!-- /.row -->

            </div>
                            <!-- /.container-fluid -->
                       
                        <!-- /.section -->

        </div>
                    <!-- /.main-page -->

                    

    </body>
</html>
<?php } ?>

   <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

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
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
