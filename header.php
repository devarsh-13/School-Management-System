<?php
require "database/connection.php";

if (isset($_SESSION['s_id'])) {


    ?>



<div>
<!--Header start-->
<header id="ed_header_wrapper">
    <div class="ed_header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2">
                      <div class="educo_logo"> 
                   <a href="main.php"><img src="images/header/IGHS.png"  height= "60%" width="60%" alt="logo"  /></a> </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
                    </div>
                    <div class="edoco_menu">
                        <ul class="collapse navbar-collapse" id="ed_menu">
                            <li><a href="main.php">Home</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="resource-download.php">Resources</a></li>
                            <li><a href="student_profile.php">Profile</a></li>
                            <li><a href="student_chat/select_users.php">Chat</a></li>
                            <li><a href="about.php">about us</a></li>

                        </ul>
                    </div>
                </div>






                <div class="educo_call">
                    <ul class="notification-area pull-right">
                      
                        <li class="settings-btn">
                            <i class="ti-bell">
                            <span class="bellgg"></span>
                            
                            </i>
                        </li>
                        <li><a href="logout.php" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>

                    </ul>

                </div>

            
            </div>
        </div>
    </div>
</header>
<!--header end -->
<div class="offset-area">
    <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Notification</a></li>
        <li></li>
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
            <div class="recent-activity">

                
            </div>
        </div>
    </div>
</div>
<script src="set_notification.js"></script>
</div>

<?php
}
?>