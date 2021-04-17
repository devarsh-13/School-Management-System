<?php
session_start();

require "Database/connection.php";
include('admin/store_data.php');
$action="Student password Changed";
$log=new Log();

$flag = 0;

if (isset($_POST['Submit'])) {


  $Password = sha1($_POST['Password']);

  $Password2 = sha1($_POST['Password2']);
  $S_srn = $_SESSION['s_id'];


  $error = false;


  if ($Password == $Password2) 
  {
    $query = mysqli_query($Conn, "SELECT S_password FROM  Students WHERE
			 S_srn = '$S_srn'") or die(mysqli_connect_error());

    if (mysqli_num_rows($query) == 1) {

      $result = mysqli_query($Conn, "UPDATE Students SET S_password ='$Password' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());
      $log->success_entry($action,$Conn);
      header("location:login.php");
    }
    else
    {
      $log->success_entry($action,$Conn,"Unsuccessfull");  
    }
  } 
  else 
  {
    $log->success_entry($action,$Conn,"Unsuccessfull");
    $flag = 1;
  }
}


?>



<!DOCTYPE html>
<html>

<head>
  <title>change password </title>
  <link rel="stylesheet" href="css/log_style.css">
</head>

<body>
  <div class="wrapper">

    <div class="title">Change your password</div>

    <form action="#" method="Post">



      <div class="field">
        <input type="password" name="Password" required>
        <label>Enter new password</label>
      </div>



      <div class="field">
        <input type="password" name="Password2" required>
        <label>Confirm password</label>
      </div>

      <?php
      if ($flag) {
        echo "<div class='invalid'><p>Password are not matching</p></div>";
        $flag = 0;
      }


      ?>




      <div class="field">
        <input type="submit" name="Submit" value="submit">
      </div>
    </form>
  </div>

</body>

</html>