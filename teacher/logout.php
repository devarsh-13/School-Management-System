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
require"../admin/store_data.php";
require"../Database/connection.php";

$action="Logout";
$log= new Log();
$log->success_entry($action,$Conn);

session_unset();
session_destroy();
header("location:index.php");?>

