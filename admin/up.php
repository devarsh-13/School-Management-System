<?php
    
    require "connection.php";
    include('store_data.php');
    include('Image_compress.php');
        
    session_start();
    $uploadFolder = 'img/';
    
    $log=new Log();
    $action="Images Uploaded";
    $flag=0;

    foreach ($_FILES['file']['tmp_name'] as $key => $image) 
    {
        $imageTmpName = $_FILES['file']['tmp_name'][$key];
        $imageName = $_FILES['file']['name'][$key];
        

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
            $flag=1;
            compress($imageTmpName,$uploadFolder.$imageName);
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