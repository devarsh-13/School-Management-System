<?php
session_start();

require "connection.php";
require "store_data.php";

$action="Admin Password Changed";
$log=new Log();

$flag = 0;


if (isset($_POST['Submit'])) {


  $Password = sha1($_POST['Password']);

  $Password2 = sha1($_POST['Password2']);
  $A_id = $_SESSION['a_id'];


  $error = false;


  if ($Password == $Password2) {


    $query = mysqli_query($Conn, "SELECT `A_password` FROM  `admin` WHERE
			 `A_id` = '$A_id'") or die(mysqli_connect_error());

    if (mysqli_num_rows($query) == 1) {

      $result = mysqli_query($Conn, "UPDATE `admin` SET `A_password` ='$Password' WHERE `A_id` ='$A_id' ") or die(mysqli_connect_error());
      $log->success_entry($action,$Conn);
      header("location:admin_login.php");
    }
  }
  else 
  {

    $log->success_entry($action,$Conn,"Unsuccessful");
    $flag = 1;
  }
}


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Change Admin Password </title>
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
					if($flag)
					{
						echo"<div class='invalid'><p>Password are not matching</p></div>";
						$flag=0;
					}
                 
  				?>
        <div class="field">
          <input type="submit" name="Submit" value="submit">
        </div>
      </form>
    </div>

  </body>
</html>