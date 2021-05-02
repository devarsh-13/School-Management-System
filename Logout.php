<?php
error_reporting(0);
session_start();
require "admin/store_data.php";
require "Database/connection.php";

$action = "Logout";
$log = new Log();
$log->success_entry($action, $Conn);
unset($_SESSION['s_id']);

header("location:index.php");
