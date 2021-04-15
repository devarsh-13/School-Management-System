<?php


require "connection.php";

$sql2 = ("SELECT * FROM `notification` WHERE `is_deleted`='0' && n_status ='0'") or die(mysqli_connect_error());


$result = mysqli_query($Conn, $sql2);
$count = mysqli_num_rows($result);


 echo $count; 

?>