<?php
    while($row = mysqli_fetch_assoc($query)){
      
       ($row['t_status'] == "offline") ? $offline = "offline" : $offline = "";
        $output .= '<a href="chat.php?teacher_id='. $row['T_srn'] .'">
        <div class="content">
        <img src="../user_photos/' . $row['T_photo'] . '" alt="">
        <div class="details">
            <span>'. $row['T_name'].'</span>
        </div>
        </div>
        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
    </a>';
    }
?>