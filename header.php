<!--Header start-->
			<header id="ed_header_wrapper">
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
										<li><a href="gallery.php">Gallery</a></li>
										<li><a href="resource-download.php">Resources</a></li>
										<li><a href="student_profile.php">Profile</a></li>
										<li><a href="student_chat/select_users.php">Chat</a></li>
										<li><a href="about.html">about us</a></li>
										 
									</ul>
								</div>
							</div>
							
								<div class="educo_call">
									<ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="settings-btn">
                                <i class="ti-bell">
                                <span>2</span></i>
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



                    <?php
                                    require "database/connection.php";

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
                                                	<span class='time'><i class='ti-time'></i>09:35</span>
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
        </div>
    </div>


