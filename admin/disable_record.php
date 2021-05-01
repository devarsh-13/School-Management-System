<?php
require '../connection.php';
session_start();	
if($_SESSION['page']==1)
{
	@$sr=$_GET['event_id'];
	$q=mysqli_query($Conn,"UPDATE `event` SET `is_deleted`='1' WHERE `Sr_n` = '$sr'");
	header("location:http://localhost/Sem6CollegeProject/admin/manage-events.php");
	unset($_SESSION['page']);
}
else
{	
	@$sr=$_GET['notif_id'];
	$q=mysqli_query($Conn,"UPDATE `Notification` SET `is_deleted`='1' WHERE Sr_n=$sr");	
	header("location:http://localhost/Sem6CollegeProject/admin/manage-notif.php");
	unset($_SESSION['page']);
}

?>