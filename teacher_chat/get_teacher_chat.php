<?php
session_start();
if (isset($_SESSION['id'])) {

    include_once "../Database/connection.php";

    $S_srn = $_SESSION['s_id'];

    $T_srn = $_SESSION['id'];
    
    $output = "";
   


    $chat_query = mysqli_query($Conn, "SELECT * FROM `conversation` WHERE `S_srn`='$S_srn' && `T_srn`='$T_srn'");

    if (mysqli_num_rows($chat_query) > 0) {
        while ($row = mysqli_fetch_assoc($chat_query)) {
            if ($row['sender_type'] === "T") {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['chat_text'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                              
                                <div class="details">
                                    <p>' . $row['chat_text'] . '</p>
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
