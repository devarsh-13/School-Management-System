<?php
include '../ec_dc.php';


$obj = new ecdc();




while ($row = mysqli_fetch_assoc($query)) {

    $S_srn = $_SESSION['s_id'];
    $T_srn = $row['T_srn'];
    $sql2 = "SELECT * FROM `conversation` WHERE `S_srn`='$S_srn' && `T_srn`='$T_srn'  ORDER BY `chat_id` DESC LIMIT 1";
    $query2 = mysqli_query($Conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);

    (mysqli_num_rows($query2)) ? $result = $row2['chat_text'] : $result =$obj->encrypt("No message available");
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['sender_type'])) {
        ($row2['sender_type'] == "S") ? $you = "You :" : $teacher_msg = $row['T_name'] . ":";
    } else {
        $you = "";
    }

    if (isset($you)) {
        $final_msg = $you . "  " . $obj->decrypt($msg);
    } else if (isset($teacher_msg)) {
        $final_msg = '<b>' . $teacher_msg . "  " . $obj->decrypt($msg) . '</b>';
    }

    ($row['t_status'] == "offline") ? $offline = "offline" : $offline = "";
    $output .= '<a href="chat.php?teacher_id=' . $row['T_srn'] . '">
        <div class="content">
        <img src="../user_photos/teacher/' . $row['T_photo'] . '" alt="">
        <div class="details">
            <span>' . $row['T_name'] . '</span>
            <p>' . $final_msg . '</p>
        </div>
        </div>
        <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
    </a>';
}
