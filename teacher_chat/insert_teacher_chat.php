<?php 
  
  include('../admin/store_data.php');
  include'../ec_dc.php';    
    session_start();
    $obj = new ecdc();
    if(isset($_SESSION['t_id'])){


        include_once "../connection.php";
        
       $os= $_POST['message'];
        $message = mysqli_real_escape_string($Conn, $obj->encrypt($os));
     
        if(!empty($message)){
                $sender_type="T";
                $S_srn=$_SESSION['student_id'];

                $T_srn=$_SESSION['t_id'];

            $d = date("Y-m-d");
            $sql = mysqli_query($Conn, "INSERT INTO `conversation` (`chat_text`,`created_on`,`S_srn`,`T_srn`,`sender_type`) VALUES ('$message','$d','$S_srn','$T_srn','$sender_type')") or die();
            $action="Message sended";
            $log=new Log();
            $log->success_entry($action,$Conn);
        }

    }else{
        header("location: teacher_login.php");
    }
