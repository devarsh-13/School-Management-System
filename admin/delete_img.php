<?php
//delete.php
include('connection.php');
include('store_data.php');
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
             
            }
 }
  if($d)
        {
             $action="Photos Deleted";
              $log=new Log();
            $msg="Image Deleted Successfully";
            $log->success_entry($action,$Conn); 

        }
        else 
        {
            $log=new Log();
            $error="Something went wrong. Please try again";
            $log->success_entry($action,$Conn,"Unsuccessful"); 
        }
}


?>