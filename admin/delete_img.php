<?php
session_start();

//delete.php
include('connection.php');

if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
    $query = mysqli_query($Conn,"SELECT * from `images`  WHERE `Id`='$id' ");
            $path="img/";
            
            while($result=mysqli_fetch_array($query))
            {
                mysqli_query($Conn,"DELETE FROM `images` WHERE `Id`='$id'") or die("Error in query".$Conn->error);
                $full = $path.$result['Image']; 
                $d=unlink($full);
if(isset($_SESSION['a_id']))
        {
            $id=$_SESSION['a_id'];
            $q=mysqli_query($Conn,"SELECT `A_name`,`A_mobile` FROM `Admin` WHERE `A_id`='$id'");
            $auth="Admin";
        }
        elseif(isset($_SESSION['t_id'])) 
        {
            $id=$_SESSION['t_id'];
            $q=mysqli_query($Conn,"SELECT `T_name`,`T_contact` FROM `Teachers` WHERE `T_srn`='$id'")or die(mysqli_error($Conn));
            $auth="Teacher";
        }
        elseif(isset($_SESSION['s_id']))
        {   
            $id=$_SESSION['s_id'];
            $data=mysqli_query($Conn,"SELECT `S_name`,`S_contact` FROM `Students` WHERE `S_srn`='$id'")or die(mysqli_error($Conn));
            $auth="Student";
        }
        $data=mysqli_fetch_row($q);

        $name   =   $data[0];
        $contact=   $data[1];
        
        $ip     =   '';
        $device =   '';
        $state  =   '';
        $country=   '';
        $action= 'delete image';
        $status="Successful";
        $q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$device', '$state', '$country')");
             
            }
 }

}


?>