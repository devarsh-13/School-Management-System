<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!-- preloader area start -->

<!-- preloader area end -->
<!-- page container area start -->

<!-- sidebar menu area start -->

<!-- sidebar menu area end -->
<!-- main content area start -->

<!-- header area start -->

<?php
if (isset($_SESSION['a_id'])) {
?>

    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>


            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 ">
                <ul class="notification-area pull-right">

                    <li class="settings-btn">
                        <i class="ti-bell">
                            <span class="bellgg"></span></i>
                    </li>
                    <li><a href="logout.php" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- header area end -->

    <!-- main content area end -->

    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Notification</a></li>
            <li></li>
        </ul>
        
           
                <div class="recent-activity">


<script src="set_notification.js"></script>


                </div>
            

        
        
    </div>
    <!-- offset area end -->

    </body>

    </html>
<?php

} ?>