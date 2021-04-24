<?php
// session_start(); 
// $_SESSION = array();
// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 60*60,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
//     );
// }
// unset($_SESSION['login']);
// session_destroy(); // destroy session
// header("location:index.php"); 
session_start();
require "store_data.php";
require "../Database/connection.php";

$action="Logout";
$log= new Log();
$log->success_entry($action,$Conn);

unset($_SESSION['a_id']);

header("location:index.php");
?>

