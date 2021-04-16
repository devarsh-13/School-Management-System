<?php

require "connection.php";
session_start();
        
        include('../admin/store_data.php');
        $log=new Log();
        $action="File Uploaded";
        

    $uploadFolder = 'resources/';
    $sub_id=$_GET['sub_id'];
    
    foreach ($_FILES['file']['tmp_name'] as $key => $image) 
    {
        $imageTmpName = $_FILES['file']['tmp_name'][$key];
        $imageName = $_FILES['file']['name'][$key];
        $full= $uploadFolder.$imageName;

        if(file_exists($full))
        {
            continue;
        }
        else
        {
            $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

            $t_id = $_SESSION['t_id'];
             $d = date("Y-m-d");


            $Sql="INSERT INTO `resources`(`R_path`, `Created_on`, `Created_by`, `Sub_id`) VALUES ('$imageName','$d','$t_id','$sub_id')";
            $q=mysqli_query($Conn,$Sql);
            
            $log->success_entry($action,$Conn);
        } 
    }       

?>