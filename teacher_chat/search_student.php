<?php
    session_start();
    include_once "../Database/connection.php";
    $output = "";
   
    $searchTerm = mysqli_real_escape_string($Conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM `students` where 'is_deleted'= 0 AND (`S_name` LIKE '%{$searchTerm}%' ) ";
    
    $query = mysqli_query($Conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data_teacher.php";
    }else{
        $output .= 'No student found related to your search term';
    }
    echo $output;
?>