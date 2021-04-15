<?php
//delete.php
include('connection.php');
include('../admin/store_data.php');
 if(isset($_POST["id"]))
{
	
       
 		foreach($_POST["id"] as $id)
		{
              
            $Sql="UPDATE `conversation` SET `is_c_deleted`='1' WHERE `S_srn`='$id'";
            $delete = $Conn->query($Sql) or die("Error in query2" . $connection->error);

        }
  		if ($delete) 
  		{
                $msg = "student Deleted Successfully";
                 $action="Student deleted";
                  $log=new Log();
                 $log->success_entry($action,$Conn);
        } 
        else 
        {
                $error = "Something went wrong. Please try again";
                $log->success_entry($action,$Conn,"Unsuccessful");
        }
}
?>