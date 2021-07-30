<?php 
include('../admin/store_data.php');
include'../ec_dc.php';  

    session_start();
    
    $obj = new ecdc();

    if(isset($_SESSION['s_id'])){


      
  
        include_once "../connection.php";
        
       $os= $_POST['message'];
        $message = mysqli_real_escape_string($Conn, $obj->encrypt($os));
     
        if(!empty($message)){
                $sender_type="S";
                $S_srn=$_SESSION['s_id'];
                
            

                $T_srn=$_SESSION['teacher_id'];

            $d = date("Y-m-d");
            $sql = mysqli_query($Conn, "INSERT INTO `conversation` (`chat_text`,`created_on`,`S_srn`,`T_srn`,`sender_type`) VALUES ('$message','$d','$S_srn','$T_srn','$sender_type')") or die();

            $action="Message sended";
            $log=new Log();
            $log->success_entry($action,$Conn);
        }
    }else{
        header("location: login.php");
    }


    
?>