<?php
session_start();
if (!isset($_SESSION['s_id'])) {
   header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
<!-- body -->

<body class="main-layout">
   <!-- header -->
   <div id="educo_wrapper">
      <!--Header start-->
      <?php
      include "header.php";
      ?>

      <!--Breadcrumb start-->

      <!--Breadcrumb end-->

      <div class="images">


         <?php
         require 'Database/connection.php';


         $images = mysqli_query($Conn, "select * from images");

         $path = "admin/img/";

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
               <img src="${img.src}" width="700" height="600">
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






      <?php
      include "footer.php";
      ?>

</body>

</html>