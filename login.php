<?php
require_once "Database/Create_db.php";
require_once "Database/connection.php";

include('admin/store_data.php');
$action="Student Login";
$log=new Log();

$flag = 0;

if (isset($_POST['Submit'])) {
	$Contact =	$_POST['Contact_no'];
	
$simple_string = $_POST['Password'];
// Store the cipher method
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "GeeksforGeeks";

// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering,
			$encryption_key, $options, $encryption_iv);
 
$Password = $encryption;
	$error = false;

	$mo = $_POST['Contact_no'];
	if (!preg_match("/^[0-9]*$/", $mo)) {

		$error_msg['C'] = ' Enter Only number!!';
		$error = true;
	} elseif (strlen($mo) < 10) {
		$error_msg['C'] = 'Please enter proper 10 Digit number!! ';
		$error = true;
	} elseif (strlen($mo) > 10) {
		$error_msg['C'] = 'Please enter proper 10 Digit number!! ';
		$error = true;
	}
	$query = mysqli_query($Conn, "SELECT `S_srn` FROM `Students` WHERE
			`S_contact` = '$Contact' && `S_password` = '$Password' AND `updated`='0' AND `is_deleted`='0'
			") or die(mysqli_connect_error());

	$row = mysqli_num_rows($query);
	$arr = mysqli_fetch_row($query);

	if ($row >= 1) {
		session_start();
		$_SESSION['s_id'] = $arr[0];

		$log->success_entry($action,$Conn);

		if (isset($_POST["remember"])) {
			setcookie("contact_no", $Contact, time() + (10 * 365 * 24 * 60 * 60), "/");
			$decryption_iv = '1234567891011121';
$ciphering = "AES-128-CTR";
$options = 0;
$en=$Password;
// Store the decryption key
$decryption_key = "GeeksforGeeks";

// Use openssl_decrypt() function to decrypt the data
$decryption=openssl_decrypt ($en, $ciphering,
		$decryption_key, $options, $decryption_iv);
			$Pa= $decryption;
			setcookie("password", $Pa, time() + (10 * 365 * 24 * 60 * 60), "/");
			header("location:http://localhost/Sem6CollegeProject/main.php");
		} else {
			unset($_COOKIE['contact_no']);
			setcookie('contact_no', null, -1, '/');
			unset($_COOKIE['password']);
			setcookie('password', null, -1, '/');
			header("location:http://localhost/Sem6CollegeProject/main.php");
		}
	}
	else 
	{
		$log->wrong_login($_POST[$Contact_no],$action,$Conn);
		$flag = 1;
	}
}


?>


<!DOCTYPE html>
<html>

<head>
	<title>Student Login Form</title>
	<link rel="stylesheet" href="css/log_style.css">
</head>

<body>
	<div class="wrapper">

		<div class="title">Student Login Form</div>

		<form action="#" method="Post">

			<div class="field">
				<input title="Please do not enter Country Code " type="text" name="Contact_no" maxlength='10' value="<?php if (isset($_COOKIE["contact_no"])) {
																															echo $_COOKIE["contact_no"];
																														} ?>" required>
				<label>Contact Number</label>
			</div>

			<?php

			if (isset($error_msg['C'])) {
				echo "<div class='invalid'><p>" . $error_msg['C'] . "</p></div>";
			}


			?>


			<div class="field">
				<input type="password" name="Password" value="<?php if (isset($_COOKIE["password"])) {
																	echo $_COOKIE["password"];
																} ?>" required>
				<label>Password</label>
			</div>

			<?php
			if ($flag) {
				echo "<div class='invalid'><p>Incorrect Contact Number OR Password</p></div>";
				$flag = 0;
			}
			?>



			<div class="content">
				<div class="field-rem">

					<input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["contact_no"])) { ?> checked <?php } ?> /> <label for="remember-me">Remember me</label>

				</div>

				<div class="pass-link"><a href="get_otp_student.php">Forgot password?</a></div>

			</div>







			<div class="field">
				<input type="submit" name="Submit" value="Login">
			</div>
		</form>
	</div>

</body>

</html>