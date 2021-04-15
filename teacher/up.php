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


      if($result)
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
        $action= 'Upload Resource';
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
        $action= 'Upload Resource Fail ';
        $status="Unsuccessful";
        $q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$device', '$state', '$country')");
      }        





}




?>