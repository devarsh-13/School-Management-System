<?php 
  

    session_start();
    if(isset($_SESSION['id'])){


      
       // echo mysqli_real_escape_string($Conn, $_GET['teacher_id']);
        include_once "../Database/connection.php";
        
       
        $message = mysqli_real_escape_string($Conn, $_POST['message']);
     
        if(!empty($message)){
                $sender_type="T";
                $S_srn=$_SESSION['s_id'];

                $T_srn=$_SESSION['id'];

            $d = date("Y-m-d");
            $sql = mysqli_query($Conn, "INSERT INTO `conversation` (`chat_text`,`created_on`,`S_srn`,`T_srn`,`sender_type`) VALUES ('$message','$d','$S_srn','$T_srn','$sender_type')") or die();
        }
    }else{
        header("location: teacher_login.php");
    }


    
?>