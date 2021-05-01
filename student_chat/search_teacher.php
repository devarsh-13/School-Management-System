<?php
    session_start();
    include_once "../connection.php";
    $output = "";
   
    $searchTerm = mysqli_real_escape_string($Conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM `teachers` where 'is_deleted'= 0 AND (`T_name` LIKE '%{$searchTerm}%' ) ";
    
    $query = mysqli_query($Conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No teacher found related to your search term';
    }
    echo $output;
?>