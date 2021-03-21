<?php 
require "connection.php";

$flag=0;

	if(isset($_POST['Submit']))
	{
		$Contact=	$_POST['Contact_no'];
		$Password=$_POST['Password'];
		$error = false;

		$mo=$_POST['Contact_no'];
		if(!preg_match("/^[0-9]*$/", $mo))
		{

			$error_msg['C']=' Enter Only number!!';
			$error=true;
		}
		elseif(strlen($mo)<10)
		{
			$error_msg['C']='Please enter proper 10 Digit number!! ';
			$error=true;
		}
		
		$query = mysqli_query($Conn,"SELECT * FROM `admin` WHERE
			`A_mobile` = '$Contact' && `A_password` = '$Password'
			") or die(mysqli_connect_error());
		
		$row = mysqli_num_rows($query);
		$arr=mysqli_fetch_row($query);
		
		if($row == 1)
		{
			session_start();
			$_SESSION['id']=$arr[0];
			
			header("location:http://localhost/Sem6Project/admin/admin_main.php");
		}
		else
		{
			$flag=1;
		}
		
	}
		
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Login Form Design | CodeLab</title>
   	<link rel="stylesheet" href="css/log_style.css">
  </head>
  <body>
    <div class="wrapper">
      
      <div class="title">Login Form</div>	
      
      <form action="#" method="Post">
        
        <div class="field">
        	<input title="Please do not enter Country Code " type="text" name="Contact_no" maxlength='10' required>
        	<label>Contact Number</label>
        	</div>
					
        	 		<?php 

        	 		if(isset($error_msg['C']))
						 	{
						  		echo "<div class='invalid'><p>". $error_msg['C']."</p></div>";
						  	}

						  
					?>


        <div class="field">
        	<input type="password" name="Password" required>
        	<label>Password</label>
        </div>
     
        			<?php
					if($flag)
					{
						echo"<div class='invalid'><p>Incorrect Contact Number OR Password</p></div>";
						$flag=0;
					}
					?>
        
        <div class="content">
          
          <div class="pass-link"><a href="#">Forgot password?</a></div>
        </div>
        
        <div class="field">
          <input type="submit" name="Submit" value="Login">
        </div>
      </form>
    </div>

  </body>
</html>
