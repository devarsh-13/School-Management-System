<?php
require "connection.php";
require "store_data.php";
require "../ec_dc.php";
error_reporting(0);

$flag = 0;
 $obj = new ecdc();

if (isset($_POST['Submit'])) 
{
	$action = "Admin Login";

	$Contact =	$_POST['Contact_no'];
//	$Password = sha1($_POST['Password']);

 $os=$_POST['Password'];
$Password= $obj->encrypt($os);

	$error = false;

	$mo = $_POST['Contact_no'];
	if (!preg_match("/^[0-9]*$/", $mo)) {

		$error_msg['C'] = ' Enter Only number!!';
		$error = true;
	} elseif (strlen($mo) < 10) {
		$error_msg['C'] = 'Please enter proper 10 Digit number!! ';
		$error = true;
	}

	$query = mysqli_query($Conn, "SELECT * FROM `admin` WHERE
			`A_mobile` = '$Contact' && `A_password` = '$Password' AND `is_deleted`='0'
			") or die(mysqli_connect_error());

	$row = mysqli_num_rows($query);
	$arr = mysqli_fetch_row($query);

	if ($row == 1) 
	{
		$flag = 0;
		session_start();
		$_SESSION['a_id'] = $arr[0];

		//log

		$log = new Log();
		$log->success_entry($action, $Conn);

		if (isset($_POST["remember"])) 
		{
			setcookie("admin_contact", $Contact, time() + (10 * 365 * 24 * 60 * 60), "/");
			$Pa= $obj->decrypt($Password);
			setcookie("admin_password", $Pa, time() + (10 * 365 * 24 * 60 * 60), "/");
			header("location:dashboard.php");
		}
		else
		{
			unset($_COOKIE['admin_contact']); 
   		 setcookie('admin_contact', null, -1, '/'); 
			unset($_COOKIE['admin_password']); 
   		 setcookie('admin_password', null, -1, '/'); 
		header("location:dashboard.php");
		}
	}
	else 
	{
		$contact = $_POST['Contact_no'];
		$log = new Log();
		$log->wrong_login($contact, $action, $Conn);
		$flag = 1;

		$query = mysqli_query($Conn, "SELECT * FROM `admin` WHERE
			`A_mobile` = '$Contact' && `A_password` = '$Password' AND `is_deleted`='1'
			") or die(mysqli_connect_error());
		$row = mysqli_num_rows($query);
		$arr = mysqli_fetch_row($query);
		if ($row == 1) 
		{
			$flag = 2;
		}
	}


}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Admin Login Form</title>
	<link rel="stylesheet" href="../css/log_style.css">
</head>

<body>
	<div class="wrapper">

		<div class="title">Admin Login Form</div>

		<form action="#" method="Post">

			<div class="field">
				<input title="Please do not enter Country Code " type="text" name="Contact_no" value="<?php if(isset($_COOKIE["admin_contact"])) { echo $_COOKIE["admin_contact"]; } ?>" maxlength='10' required>
				<label>Contact Number</label>
			</div>

			<?php

			if (isset($error_msg['C'])) {
				echo "<div class='invalid'><p>" . $error_msg['C'] . "</p></div>";
			}


			?>


			<div class="field">
				<input type="password" name="Password" value="<?php if(isset($_COOKIE["admin_password"])) { echo $_COOKIE["admin_password"]; } ?>" required>
				<label>Password</label>
			</div>

			<?php
			if ($flag==1) {
				echo "<div class='invalid'><p>Incorrect Contact Number OR Password</p></div>";
				$flag = 0;
			}
			elseif($flag==2)
			{
				echo "<div class='invalid'><p>This User is Blocked Please Contact Admin</p></div>";
				$flag=0;
			}
			?>

			<div class="content">
				<div class="field-rem">

					<input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["admin_contact"])) { ?> checked <?php } ?> /> <label for="remember-me">Remember me</label>

				</div>

				<div class="pass-link"><a href="get_otp_admin.php">Forgot password?</a></div>
			</div>

			<div class="field">
				<input type="submit" name="Submit" value="Login">
			</div>
		</form>
	</div>

</body>

</html>