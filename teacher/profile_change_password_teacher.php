<?php
    include 'connection.php';
    session_start();


    $T_srn = $_SESSION['t_id'];
    $sql = "SELECT * from `teachers` WHERE
 T_srn = '$T_srn'";


  

    $query = mysqli_query($Conn, $sql);
    $row = mysqli_num_rows($query);


    $result = mysqli_fetch_array($query);


    $Password = sha1($_POST['Password']);

    $Password2 = sha1($_POST['Password2']);

	$OldPassword = sha1($_POST['OldPassword']);

	$op = $result['Password'];


	if ($OldPassword == $op) {


		if ($Password == $Password2) {

			if ($row == 1) {

				$update = mysqli_query($Conn, "UPDATE `teachers` SET `Password` ='$Password' WHERE T_srn ='$T_srn' ") or die(mysqli_connect_error());
                $return = array(
                    'status' => 200
                );
                http_response_code(200);
			}
		} else {

	
            $return = array(
                'status' => 400
            );
            http_response_code(400);
			
		}
	} else {


        $return = array(
            'status' => 500
        );
        http_response_code(500);
	
	}
?>