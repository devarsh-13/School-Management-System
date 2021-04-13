<?php
require 'Database/connection.php';
session_start();


if (isset($_SESSION['s_id'])) {



   $images = mysqli_query($Conn, "select * from images");

   $path = "admin/img/";

   $row = mysqli_num_rows($images);

   ?>


   <!DOCTYPE html>

   <head>

    
    <link rel="stylesheet" href="teacher/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="teacher/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="teacher/assets/css/themify-icons.css">
    <link rel="stylesheet" href="teacher/assets/css/metisMenu.css">
    <link rel="stylesheet" href="teacher/assets/css/default-css.css">
    <link rel="stylesheet" href="teacher/assets/css/styles.css">

      <meta charset="utf-8" />
      <title>Educo Multipurpose Responsive HTML Template</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <meta name="description" content="Educo" />
      <meta name="keywords" content="Educo, html template, Education template" />
      <meta name="author" content="Kamleshyadav" />
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
      <link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />


   </head>

   <body>
      <!--Page main section start-->
      <div id="educo_wrapper">

         <?php
         include "header.php";
         ?>

         <div class="ed_courses ed_toppadder80 ed_bottompadder80">
            <div class="container">
               <?php if ($row == 0) {
                  echo "<center><h1> No images to show</h1></center>";
               } ?>
               <div class="row">


                  <div class="images">


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
                         <img src="${img.src}" >
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







                  <div class="col-lg-12">
                     <div class="ed_blog_bottom_pagination">
                        <nav>
                           <ul class="pagination">
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
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
}
else

{
 header("location:login.php");

}?>

