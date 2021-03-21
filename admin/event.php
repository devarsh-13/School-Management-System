<?php


if (isset($_POST["back"])) {
    header("location:http://localhost/Sem6Project/admin/admin_main.php");
} 
if (isset($_POST["submit"])) { 
    
    if($_POST["event"] !== "")
    {

        session_start();
        require "connection.php";	
       
        
        $event_text = $_POST["event"];

         $a = $_SESSION['id'];  

         
          $d = date("Y-m-d");
        
        //Insert image content into database
        $insert = $Conn->query("INSERT INTO Event SET Event_text='$event_text',created_on='$d' ,created_by='$a'");


       


        if($insert)
        {
            echo "Event added successfully. <a href='add_event.php'>Add More</a>";
        }else
        {
            echo "Event add failed, <a href='add_event.php'>please try again</a>.";
        } 
    }
    else
    {
        echo "You have not added any event. <a href='add_event.php'>please try again</a>.";
    }
} 
// POST BODY
// notification=asasaaaa&submit=Submit
?>