<?php

$Host = "localhost";
$User = "root";
$Pass = "";

$Conn = mysqli_connect("$Host","$User","$Pass")or die("Connection Failed".mysqli_connect_error());

$Sql = "CREATE DATABASE IGHS";
$Conn->query($Sql);

require "query.php";
?>