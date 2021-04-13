<?php 
require "Database/Create_db.php";
require "Database/connection.php";
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
		elseif(strlen($mo)>10)
		{
			$error_msg['C']='Please enter proper 10 Digit number!! ';
			$error=true;
		}
		$query = mysqli_query($Conn,"SELECT `S_srn` FROM `Students` WHERE
			`S_contact` = '$Contact' && `S_password` = '$Password'
			") or die(mysqli_connect_error());
		
		$row = mysqli_num_rows($query);
		$arr=mysqli_fetch_row($query);
		
		if($row == 1)
		{
			session_start();
			
			$_SESSION['s_id']=$arr[0];
			header("location:http://localhost/Sem6CollegeProject/main.php");
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
	  <meta charset="utf-8" />
    <title>Student Login Form</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Educo" />
	<meta name="keywords" content="Educo, html template, Education template" />
	<meta name="author" content="Kamleshyadav" />
	<meta name="MobileOptimized" content="320" />
   	<link rel="stylesheet" href="css/log_style.css">
  </head>
  <body>
    <div class="wrapper">
      
      <div class="title">Student Login Form</div>	
      
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
          
          <div class="pass-link" ><a href="get_otp_student.php" >Forgot password?</a></div>
		
        </div>
        
        <div class="field">
          <input type="submit" name="Submit" value="Login">
        </div>
      </form>
    </div>

  </body>
</html>
