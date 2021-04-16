<?php
session_start();

include('connection.php');
include('../admin/store_data.php');

$log=new Log();
$action="Images Deleted";

if(isset($_POST["id"]))
{
    $flag=0;
    foreach($_POST["id"] as $id)
    {
        $query = mysqli_query($Conn,"SELECT * from `images`  WHERE `Id`='$id' ");
            $path="img/";
            
        while($result=mysqli_fetch_array($query))
        {
                    mysqli_query($Conn,"DELETE FROM `images` WHERE `Id`='$id'") or die("Error in query".$Conn->error);
                    $full = $path.$result['Image']; 
                    $d=unlink($full);
                    $flag=1;
        }
        if($flag==1)
        {
            $log->success_entry($action,$Conn);
        }
        else
        {
            $log->success_entry($action,$Conn,"Unsuccessful");
        }
    }

}


?>