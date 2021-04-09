<?php //session_start();
    require "connection.php";
session_start();
    $uploadFolder = 'resources/';
    $sub_id=$_GET['sub_id'];
    
    foreach ($_FILES['file']['tmp_name'] as $key => $image) 
    {
        $imageTmpName = $_FILES['file']['tmp_name'][$key];
        $imageName = $_FILES['file']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        $t_id = $_SESSION['t_id'];
         $d = date("Y-m-d");


$Sql="INSERT INTO `resources`(`R_path`, `Created_on`, `Created_by`, `Sub_id`) VALUES ('$imageName','$d','$t_id','$sub_id')";
$q=mysqli_query($Conn,$Sql);
}


?>