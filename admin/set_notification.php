<?php
session_start();


$A_id=$_SESSION['a_id'];
if(isset($A_id))
{
require "connection.php";

$sql2 = ("SELECT * FROM `notification` WHERE `is_deleted`='0' ") or die(mysqli_connect_error());


$result = mysqli_query($Conn, $sql2);
$count = mysqli_num_rows($result);


$sql_notification_count = ("SELECT `notification_count` FROM `admin` WHERE `A_id`='$A_id'");
$result_notification_count = mysqli_query($Conn, $sql_notification_count) or die(mysqli_connect_error());


$row = mysqli_num_rows($result_notification_count);
$arr = mysqli_fetch_row($result_notification_count);

if ($row == 1) {
    $count_notification = $arr[0];

    //   if($count>$count_notification)
    //   {
    //     echo $count;
    //   }
    //   else{
    //     echo $count_notification;
    //   }
    $remaining_not = $count - $count_notification;
    if($remaining_not<=-1)
    {
        
        echo $remaining_not+$count_notification;
    }
    else{
        echo $remaining_not;
    }


}

 //echo $count;
 //echo $count_notification;

}
 
?>