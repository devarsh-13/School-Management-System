<?php
include '../ec_dc.php';


$obj = new ecdc();

$T_srn = $_SESSION['t_id'];

while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM `conversation` WHERE `T_srn`='$T_srn' ORDER BY `chat_id` DESC LIMIT 1" ;
    $query2 = mysqli_query($Conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);


    (mysqli_num_rows($query2)) ? $result = $row2['chat_text'] : $result = "No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['sender_type'])) {
        ($row2['sender_type'] == "T") ? $you = "You :" : $student_msg = $row['S_name'].":";
    } else {
        $you = "";
    }

    if(isset($you))
    {
       $final_msg= $you. "  ". $obj->decrypt($msg); 
    }
    else if(isset($student_msg))
    {
        $final_msg='<b>'.$student_msg. "  ". $obj->decrypt($msg).'</b>';
        
    }


    ($row['s_status'] == "offline") ? $offline = "offline" : $offline = "";
    $output .= '<a href="teacher_chat.php?student_id=' . $row['S_srn'] . '">
        <div class="content">
    
        <img src="../user_photos/' . $row['S_photo'] . '" alt="">
        <div class="details">
            <span>' . $row['S_name'] . '</span>
            <p>' .$final_msg. '</p>
        </div>
        </div>
        <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
    </a>';
}
