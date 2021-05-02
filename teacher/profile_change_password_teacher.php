<?php
error_reporting(0);
    include '../connection.php';
    include ('../admin/store_data.php');
     require "../ec_dc.php";
    
    session_start();
    $obj = new ecdc();
    $log=new Log();
    $action="Teacher Password Changed";

    $T_srn = $_SESSION['t_id'];
    $sql = "SELECT * from `teachers` WHERE
 T_srn = '$T_srn'";


  

    $query = mysqli_query($Conn, $sql);
    $row = mysqli_num_rows($query);


    $result = mysqli_fetch_array($query);


    $Password = ($_POST['Password']);

    $Password2 = ($_POST['Password2']);

	$os=$_POST['OldPassword'];
    $OldPassword = $obj->encrypt($os);

	$op = $result['Password'];


	if ($OldPassword == $op) {


		if ($Password == $Password2) {

			if ($row == 1) 
            {

                $os=$Password;
                $Pass= $obj->encrypt($os);

                $log->success_entry($action,$Conn);

				$update = mysqli_query($Conn, "UPDATE `teachers` SET `Password` ='$Pass' WHERE T_srn ='$T_srn' ") or die(mysqli_connect_error());
                $return = array(
                    'status' => 200
                );
                http_response_code(200);
			}
		}
        else 
        {
            $log->success_entry($action,$Conn,"Unsuccessful");	
            $return = array(
                'status' => 400
            );
            http_response_code(400);
			
		}
	} 
    else 
    {
        $log->success_entry($action,$Conn,"Unsuccessful");  
        $return = array(
            'status' => 500
        );
        http_response_code(500);
	
	}
?>