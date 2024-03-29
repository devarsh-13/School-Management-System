<?php
error_reporting(0);
    require "../connection.php";
    include('store_data.php');
    include('image_compress.php');

    session_start();
    $uploadFolder = '../user_photos/student/';
    
    $log=new Log();
    $action="Student Images Uploaded";
    
    $flag=0;
    $failed_images=array();
    $size = 1;
    foreach ($_FILES['file']['tmp_name'] as $key => $image) 
    { 

        $imageTmpName = $_FILES['file']['tmp_name'][$key];
       

        if ($_FILES["file"]["size"][$key] > 500000) 
        {
                echo "<script>alert('Sorry, your file is too large.');window.location.href='stu_img_up.php';</script>";  
                $size = 0;
        }

        if($size)
        {
            $gr=pathinfo($_FILES["file"]["name"][$key],PATHINFO_FILENAME);
            $extension=pathinfo($_FILES["file"]["name"][$key],PATHINFO_EXTENSION);

            $imageName =$gr.$extension;

            $q=mysqli_query($Conn,"SELECT * FROM `students` WHERE `S_grn`='$gr' AND `is_deleted`='0' AND `updated`='0'");
            $row=mysqli_num_rows($q);
             if($row==1)
            {
            $q=mysqli_query($Conn,"UPDATE `students` SET `S_photo`='$imageName' WHERE `S_grn`='$gr' AND `is_deleted`='0' AND `updated`='0'");
            $result = compress($imageTmpName,$uploadFolder.$imageName, 50);
            $flag=1;
            }
            else
            {
                array_push($failed_images,$imageTmpName);
            }
        }

        
    
    }

    if($flag)
    {
        $log->success_entry($action,$Conn);      
        
    }
    else
    {
        $log->success_entry($action,$Conn,"Unsuccessful");   
        
    }

?>