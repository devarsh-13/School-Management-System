<?php
//delete.php
include('connection.php');
include('../admin/store_data.php');
session_start();
 if(isset($_POST["id"]))
{
	
       
 		foreach($_POST["id"] as $id)
		{
              
            $Sql="UPDATE `conversation` SET `is_c_deleted`='1' WHERE `S_srn`='$id'";
            $delete = $Conn->query($Sql) or die("Error in query2" . $connection->error);

     if($delete)
      {
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
        $action= 'Delete Multiple Student Chat';
        $status="Successful";
        $q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$device', '$state', '$country')");
      }
      else
      {
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
        $action= 'Fail Delete Multiple Student Chat ';
        $status="Unsuccessful";
        $q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$device', '$state', '$country')");
      }        






    }
  		
}
?>