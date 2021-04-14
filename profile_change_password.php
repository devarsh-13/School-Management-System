<?php
    include 'Database/connection.php';
    session_start();


    $S_srn = $_SESSION['s_id'];
    $sql = "SELECT * from `students` WHERE
 S_srn = '$S_srn'";


   // unset($_SESSION['d']);
   // unset($_SESSION['c']);

    $query = mysqli_query($Conn, $sql);
    $row = mysqli_num_rows($query);


    $result = mysqli_fetch_array($query);


    $Password = sha1($_POST['Password']);

    $Password2 = sha1($_POST['Password2']);

	$OldPassword =sha1($_POST['OldPassword']);

	$op = $result['S_password'];


	if ($OldPassword == $op) {


		if ($Password == $Password2) {

			if ($row == 1) {

				$update = mysqli_query($Conn, "UPDATE students SET S_password ='$Password' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());
                $return = array(
                    'status' => 200
                );
                http_response_code(200);
			}
		} else {

		//	$_SESSION['d'] = 'Please Enter same passwords';
            $return = array(
                'status' => 400
            );
            http_response_code(400);
			
		}
	} else {

	//	$_SESSION['c'] = ' Your old password is incorrect';
        $return = array(
            'status' => 500
        );
        http_response_code(500);
	
	}
