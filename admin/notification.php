<?php

if (isset($_POST["back"])) {
    header("location:http://localhost/Sem6Project/admin/admin_main.php");
} 

if (isset($_POST["submit"])) { 
    
    if($_POST["notification"] !== "")
    {

         session_start();
        require "connection.php";	
       
        
        $notification_text = $_POST["notification"];
          $a = $_SESSION['id'];  
          $d = date("Y-m-d");
        
        //Insert image content into database
      $insert = $Conn->query("INSERT INTO notification SET Notification_text='$notification_text',created_on='$d' ,created_by='$a'");
        if($insert)
        {
            echo "Notification added successfully. <a href='add_noti.php'>Add More</a>";
        }else
        {
            echo "Notification add failed, <a href='add_noti.php'>please try again</a>.";
        } 
    }
    else
    {
        echo "You have not added any notification. <a href='add_noti.php'>please try again</a>.";
    }
} 
// POST BODY
// notification=asasaaaa&submit=Submit
?>