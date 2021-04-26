<?php

include_once "../Database/connection.php";
include '../ec_dc.php';  
session_start();
$obj = new ecdc();
if (isset($_SESSION['s_id'])) {


    $S_srn = $_SESSION['s_id'];
    $T_srn=$_SESSION['teacher_id'];


 
    
    $output = "";
   


    $chat_query = mysqli_query($Conn, "SELECT * FROM `conversation` WHERE `S_srn`='$S_srn'&& `T_srn`='$T_srn' && `is_c_deleted`='0'  ");

    if (mysqli_num_rows($chat_query) > 0) {
        while ($row = mysqli_fetch_assoc($chat_query)) {
            if ($row['sender_type'] === "S") {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $obj->decrypt($row['chat_text']) . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                              
                                <div class="details">
                                    <p>' . $obj->decrypt($row['chat_text']) . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}
