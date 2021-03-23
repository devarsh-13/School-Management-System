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
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<!-- end theme style -->
<!-- favicon links -->
<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- header -->
<div id="educo_wrapper">
<!--Header start-->
<header id="ed_header_wrapper">
   <!--<div class="ed_header_top">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
               <p>welcome to our new session of education</p>
               <div class="ed_info_wrapper">
                  <a href="#" id="login_button">Login</a>
                     <div id="login_one" class="ed_login_form">
                        <h3>log in</h3>
                        <form class="form">
                           <div class="form-group">
                              <label class="control-label">Email :</label>
                              <input type="text" class="form-control" >
                           </div>
                           <div class="form-group">
                              <label  class="control-label">Password :</label>
                              <input type="password" class="form-control">
                           </div>
                           <div class="form-group">
                              <button type="submit">login</button>
                              <a href="signup.html">registration</a> 
                           </div>
                        </form>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>-->
   <div class="ed_header_bottom">
      <div class="container">
         <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2">
               <div class="educo_logo"> <a href="index.html"><img src="images/header/Logo.png" alt="logo" /></a> </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
               <div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
               </div>
               <div class="edoco_menu">
                  <ul class="collapse navbar-collapse" id="ed_menu">
                     <li><a href="main.php">Home</a></li>
                     <li><a href="#event">events</a></li>
                     <li><a href="gallery.php">Gallery</a></li>
                     <li><a href="courses.html">Resources</a></li>
                     <li><a href="dashboard.html">Profile</a></li>
                     <li><a href="contact.html">Chat</a></li>
                     <li><a href="about.html">about us</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
               <div class="educo_call"><i class="fa fa-phone"></i><a href="#">1-220-090</a></div>
            </div>
         </div>
      </div>
    </div>
</header>
<!--header end -->

<!--Breadcrumb start-->
<div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-4 col-sm-6">
            <div class="page_title">
               <h2>About Educo</h2>
            </div>
         </div>
         <div class="col-lg-6 col-md-8 col-sm-6">
            <ul class="breadcrumb">
               <li><a href="main.php">home</a></li>
               <li><i class="fa fa-chevron-left"></i></li>
               <li><a href="about.html">Gallery</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!--Breadcrumb end-->

   <div class="images">
        
      <?php
            require 'Database/connection.php';


            $images = mysqli_query($Conn,"select * from images");
           
            $path="admin/img/";

            while ( $res = mysqli_fetch_array($images)) 
            {
               $full = $path.$res[1];
               echo"
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
document.querySelectorAll('.images a').forEach(img_link => 
{
   img_link.onclick = e => 
   {
      e.preventDefault();
      let img_meta = img_link.querySelector('img');
      let img = new Image();
      img.onload = () => 
      {
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
image_popup.onclick = e => 
{
   if (e.target.className == 'image-popup') {
      image_popup.style.display = "none";
   }
};
</script>






<!--Footer Top section start-->
<div class="ed_footer_wrapper">
   <div class="ed_footer_top">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="widget text-widget">
                  <p><a href="index.html"><img src="images/footer/F_Logo.png" alt="Footer Logo" /></a></p>
                  <p>Edution is an outstanding PSD template targeting educational institutions, helping them establish strong identity on the internet without any real developing knowledge.
                  </p>
                  <div class="ed_sociallink">
                  
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="widget text-widget">
                  <h4 class="widget-title">find us</h4>
                  <p><i class="fa fa-safari"></i>Wimbledon Street 42a, 45290 Wimbledon, <br/>United Kingdom</p>
                  <p><i class="fa fa-envelope-o"></i><a href="#">info@edutioncollege.gov.co.uk</a> <a href="#">public@edutioncollege.gov.co.uk</a></p>
                  <p><i class="fa fa-phone"></i> 1-220-090-080</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="widget text-widget">
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Footer Top section end-->
<!--Footer Bottom section start-->
<div class="ed_footer_bottom">
   <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="ed_footer_menu">
                  <ul>
                     <li><a href="index.html">home</a></li>
                     <li><a href="private_policy.html">private policy</a></li>
                     <li><a href="about.html">about</a></li>
                     <li><a href="contact.html">contact us</a></li>
                  </ul>
            </div>
         </div>
      </div>
      </div>
   </div>
</div>
<!--Footer Bottom section end-->



      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>