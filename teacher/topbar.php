
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
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="settings-btn">
                                <i class="ti-bell">
                                <span>
                                    2

                                </span></i>
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
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">



                    <?php
                                    require "connection.php";

                                    $sql = ("SELECT * FROM `notification` WHERE `is_deleted`='0'") or die(mysqli_error());

                                    $q = mysqli_query($Conn, $sql);

                                    while ($r = mysqli_fetch_array($q)) {

                                        echo " 
                                            <div class='timeline-task'>
                                                 <div class='icon bg1'>
                                                <h4>" . $r['Sr_n'] . "</h4>
                                                </div>
                                                <div class='tm-title'>

                                                
                                                <h4>" . $r['Notification_topic'] . "</h4>
                                                
                                                <span class='time'><i class='ti-time'></i>". $r['N_Time'] ."</span>
                                                </div>
                                                <p> " . $r['Notification_text'] . "</p>
                                            </div>
                                                
                                            
                                        ";
                                    }
                                    ?>

                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                   
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
 
</body>

</html>
