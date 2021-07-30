<?php
    session_start();
    include_once "../connection.php";
    $output = "";
    $T_srn = $_SESSION['t_id'];
    $searchTerm = mysqli_real_escape_string($Conn, $_POST['searchTerm']);

    //$sql = "SELECT * FROM `students` where 'is_deleted'= 0 AND (`S_name` LIKE '%{$searchTerm}%' ) ";
    $sql = "SELECT * FROM `conversation` inner join `students` ON conversation.S_srn=students.S_srn WHERE `T_srn`='$T_srn' and `is_c_deleted`='0' AND (`S_name` LIKE '%{$searchTerm}%' )  GROUP BY conversation.S_srn ";
    
    $query = mysqli_query($Conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data_teacher.php";
    }else{
        $output .= 'No student found related to your search term';
    }
    echo $output;
?>