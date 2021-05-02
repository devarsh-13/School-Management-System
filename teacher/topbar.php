
  
            <?php
if (isset($_SESSION['t_id'])) {
?>
            <div class="header-area">
                <div class="row align-items-center">
            
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                       
                    </div>
             
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

    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>

        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Notification</a></li>
            <li></li>
        </ul>
        
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">



                    
<script src="set_notification.js"></script>
                   
                   
                </div>
            
            
        </div>
    </div>

 
<?php

}?>

