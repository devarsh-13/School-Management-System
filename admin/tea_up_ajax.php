<?php
error_reporting(0);
    
    require "../connection.php";
    include('store_data.php');
    include('Image_compress.php');
        
    session_start();
    $uploadFolder = '../user_photos/teacher/';
    
    $log=new Log();
    $action="Teacher Images Uploaded";
        
    $flag=0;
    $size = 1;

    foreach ($_FILES['file']['tmp_name'] as $key => $image) 
    {
        $imageTmpName = $_FILES['file']['tmp_name'][$key];

         if ($_FILES["file"]["size"][$key] > 500000) 
        {
                echo "<script>alert('Sorry, your file is too large.');window.location.href='tea_img_up.php';</script>";  
                $size = 0;
        }

        if($size)
        {
        $imageName = $_FILES['file']['name'][$key];

        $name=pathinfo($_FILES["file"]["name"][$key],PATHINFO_FILENAME);
        $extension=pathinfo($_FILES["file"]["name"][$key],PATHINFO_EXTENSION);

        $q=mysqli_query($Conn,"SELECT * FROM `teachers` WHERE `T_name`='$name' AND `is_deleted`='0'");
        $row=mysqli_num_rows($q);

        if($row==1)
        {
            $q=mysqli_query($Conn,"UPDATE `teachers` SET `T_photo`='$imageName' WHERE `T_name`='$name' AND `is_deleted`='0'");
            $flag=1;
            $result = compress($imageTmpName,$uploadFolder.$imageName);    
        }
        }
    }  

    if($result)
    {
        $log->success_entry($action,$Conn);
    }
    else
    {
        $log->success_entry($action,$Conn,"Unsuccessful");   
    }

?>