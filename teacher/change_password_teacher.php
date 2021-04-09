<?php 
session_start();

require "connection.php";

$flag=0;

	if(isset($_POST['Submit']))
	{
	
		
		$Password=$_POST['Password'];

        $Password2=$_POST['Password2'];
        $T_id= $_SESSION['t_id'];
	

		$error = false;


        if($Password==$Password2)
        {
				
           
            $query = mysqli_query($Conn,"SELECT `Password` FROM  `teacher` WHERE
			 `T_srn` = '$T_id'") or die(mysqli_connect_error());

			 if(mysqli_num_rows($query)==1)
			 {

				$result= mysqli_query($Conn, "UPDATE `teacher` SET `Password` ='$Password' WHERE `T_srn` ='$T_id' ") or die(mysqli_connect_error());
				  header("location:admin_login.php");
			 }
             

            
        
             

               

        }

        else{


            $flag=1;



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