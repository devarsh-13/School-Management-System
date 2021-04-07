<?php
    while($row = mysqli_fetch_assoc($query)){
      
       ($row['s_status'] == "inactive") ? $offline = "offline" : $offline = "";
        $output .= '<a href="teacher_chat.php?student_id='. $row['S_srn'] .'">
        <div class="content">
        <div class="details">
            <span>'. $row['S_name'].'</span>
        </div>
        </div>
        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
    </a>';
    }
?>