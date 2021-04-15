
             <?php

                    require "connection.php";

                    $sql = ("SELECT * FROM `notification` WHERE `is_deleted`='0'") or die(mysqli_connect_error());

                    $q = mysqli_query($Conn, $sql);

                    $result = mysqli_query($Conn, "UPDATE `notification` SET n_status ='1' WHERE n_status ='0' ") or die(mysqli_connect_error());


                    $output = "";

                    while ($r = mysqli_fetch_array($q)) {

                        $output =  " 
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

                        echo $output;
                    }
                

                ?>
