<?php
    while($row = mysqli_fetch_assoc($query)){
      
       ($row['s_status'] == "offline") ? $offline = "offline" : $offline = "";
        $output .= '<a href="teacher_chat.php?student_id='. $row['S_srn'] .'">
        <div class="content">
    
        <img src="../user_photos/' . $row['S_photo'] . '" alt="">
        <div class="details">
            <span>'. $row['S_name'].'</span>
        </div>
        </div>
        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
    </a>';
    }
