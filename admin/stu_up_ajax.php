<?php
    
    require "connection.php";
    include('store_data.php');
        
    session_start();
    $uploadFolder = '../user_photo/student/';
    
    $log=new Log();
    $action="Student Images Uploaded";
        
    foreach ($_FILES['file']['tmp_name'] as $key => $image) 
    {
        $imageTmpName = $_FILES['file']['tmp_name'][$key];
        $imageName = $_FILES['file']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

     

        if($result)
            {
                $log->success_entry($action,$Conn);
            }
            else
            {
                $log->success_entry($action,$Conn,"Unsuccessful");   
            }
    }



?>