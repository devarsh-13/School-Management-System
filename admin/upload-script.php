<?php

session_start();

include "connection.php";


if (isset($_POST['uploadImageBtn'])) {
    $uploadFolder = 'img/';
    
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        $a_id = $_SESSION['id'];
         $d = date("Y-m-d");
        // save to database
        $query = "INSERT INTO images SET image='$imageName',Uploaded_by=$a_id,Uploaded_on='$d' ";
        $run = $Conn->query($query) or die("Error in saving image".$Conn->error);
    
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
        echo '<script>window.location.href="img_h.php";</script>';
    }
}

