
             <?php

                session_start();

                $S_srn = $_SESSION['s_id'];
                if (isset($S_srn)) {

                    require "database/connection.php";

                    $sql = ("SELECT * FROM `notification` WHERE `is_deleted`='0'") or die(mysqli_connect_error());

                    $q = mysqli_query($Conn, $sql);

    
                   // $result = mysqli_query($Conn, "UPDATE `notification` SET n_status ='1' WHERE n_status ='0' ") or die(mysqli_connect_error());

                    $output = "";

                    $notification_count = 0;
                     ?>
   <style type="text/css">
       .scrollmenu
    {

        word-break: break-all;
        
    }
   </style>
<div class="scrollmenu">
    <?php
                    while ($r = mysqli_fetch_array($q)) {
                        $notification_count = $notification_count+1;
                        $output =  " 
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

                        echo $output;
                    }
                    $result_students = mysqli_query($Conn, "UPDATE `students` SET notification_count = '$notification_count' WHERE `S_srn`='$S_srn' ") or die(mysqli_connect_error());
                     ?>
</div>
    <?php
                }

                ?>
