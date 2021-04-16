<?php
    
    require "connection.php";
    include('store_data.php');
        
    session_start();
    $uploadFolder = 'img/';
    
    $log=new Log();
    $action="Image Uploaded";
        
    foreach ($_FILES['file']['tmp_name'] as $key => $image) 
    {
        $imageTmpName = $_FILES['file']['tmp_name'][$key];
        $imageName = $_FILES['file']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        $a_id = $_SESSION['a_id'];
         $d = date("Y-m-d");


        $Sql="INSERT INTO `images` 
                            (
                                `Image`, 
                                `Uploaded_by`, 
                                `Uploaded_on`) 

                            VALUES 
                            (
                                '$imageName', 
                                '$a_id', 
                                '$d')";

        $q=mysqli_query($Conn,$Sql);

        if($q)
            {
                $log->success_entry($action,$Conn);
            }
            else
            {
                $log->success_entry($action,$Conn,"Unsuccessful");   
            }
    }



?>