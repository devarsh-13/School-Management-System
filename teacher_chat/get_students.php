<?php
    session_start();

    $T_srn = $_SESSION['t_id'];
   // include_once "config.php";
   include_once "../Database/connection.php";
   $sql = "SELECT * FROM `conversation` inner join `students` ON conversation.S_srn=students.S_srn WHERE `T_srn`='$T_srn'  GROUP BY conversation.S_srn";

   
    $query = mysqli_query($Conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data_teacher.php";
    }
    echo $output;
?>