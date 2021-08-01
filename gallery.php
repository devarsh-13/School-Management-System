<?php

error_reporting(0);
require 'connection.php';
include('admin/store_data.php');
session_start();

$action = "In View Gallery";
$log = new Log();


if (isset($_SESSION['s_id'])) {
   $log->success_entry($action, $Conn);

   $images = mysqli_query($Conn, "select * from images");
   $path = "admin/img/";
   $row = mysqli_num_rows($images);

?>


   <!DOCTYPE html>

   <head>
  <link rel="stylesheet" href="teacher/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="teacher/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="teacher/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="teacher/css/main.css" media="screen" >
        <script src="teacher/js/modernizr/modernizr.min.js"></script>

          <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <!-- <link rel="stylesheet" href="teacher/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="teacher/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="teacher/assets/css/themify-icons.css">
    <link rel="stylesheet" href="teacher/assets/css/metisMenu.css">
    <link rel="stylesheet" href="teacher/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="teacher/assets/css/slicknav.min.css">
    

    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="teacher/assets/css/styles.css">
    <link rel="stylesheet" href="teacher/assets/css/responsive.css">
    <meta name="MobileOptimized" content="320" />
    <!-- modernizr css -->
    <script src="teacher/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
   

     

      <meta charset="utf-8" />

      <title>Gallery | IGHS</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />

      <meta name="MobileOptimized" content="320" />


      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style1.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="css/gallery_style.css">

      <!--srart theme style -->
      <link href="css/main.css" rel="stylesheet" type="text/css" />
      <!-- end theme style -->
      <!-- favicon links -->
      <link rel="shortcut icon" type="image/png" href="images/header/IGHS(1).png" />
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

.educo_logo img {
    max-width: 100%;
    height: 15%;
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

   <body>
      <!--Page main section start-->
      <div id="educo_wrapper ">

         <?php
         include "header.php";
         ?>

            <div class="main-content-inner" style="border:1px solid #ddd;">
                <!-- MAIN CONTENT GOES HERE -->

                     
                                       
      
               <?php if ($row == 0) {
                  echo "<div style='margin-top:15%;'><center><h2> No images to show<br>   </br></h2></center></div>";
               } ?>
               <div class="row">


                  <div class="images ed_toppadder10 ed_bottompadder60">


                     <?php



                     while ($res = mysqli_fetch_array($images)) {

                        $full = $path . $res[1];
                        echo "
                      <div class='slide'>
                       <a href='Gallery.php'>
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
                         <img src="${img.src}" height"300px" width="300px;">
                         </div> `;
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
            </div><!-- /.container -->
         </div>
         <!-- Section eleven end -->
         <!--Newsletter Section six start-->

         <!--Newsletter Section six end-->
         <!--Footer Top section start-->
         <div class="ed_footer_wrapper">
            <?php include "footer.php"; ?>
         </div>
         <!--Footer Top section end-->
         <!--Footer Bottom section start-->

         <!--Footer Bottom section end-->
      </div>
      <!--Page main section end-->

      <!--main js file start-->
      <script type="text/javascript" src="js/jquery-1.12.2.js"></script>
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/owl.carousel.js"></script>
      <script type="text/javascript" src="js/smooth-scroll.js"></script>
      <script type="text/javascript" src="js/plugins/revel/jquery.themepunch.tools.min.js"></script>
      <script type="text/javascript" src="js/plugins/revel/jquery.themepunch.revolution.min.js"></script>
      <script type="text/javascript" src="js/plugins/revel/revolution.extension.layeranimation.min.js"></script>
      <script type="text/javascript" src="js/plugins/revel/revolution.extension.navigation.min.js"></script>
      <script type="text/javascript" src="js/plugins/revel/revolution.extension.slideanims.min.js"></script>
      <script type="text/javascript" src="js/plugins/countto/jquery.countTo.js"></script>
      <script type="text/javascript" src="js/plugins/countto/jquery.appear.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
      <!--main js file end-->


      <script src="teacher/assets/js/metisMenu.min.js"></script>
      <script src="teacher/assets/js/jquery.slimscroll.min.js"></script>
      <script src="teacher/assets/js/jquery.slicknav.min.js"></script>
      <script src="teacher/assets/js/plugins.js"></script>
      <script src="teacher/assets/js/scripts.js"></script>

   </body>

   </html>

<?php
} else {
   $log->success_entry($action, $Conn, "Unsuccessful");
   header("location:login.php");
} ?>