<?php
    include 'Database/connection.php';
    include('admin/store_data.php');
    session_start();

    $action="Change Student Password";
    $log=new Log();

    if(isset($_SESSION['s_id']))
    {

    $S_srn = $_SESSION['s_id'];
    $sql = "SELECT * from `students` WHERE S_srn = '$S_srn'";

    $query = mysqli_query($Conn, $sql);
    $row = mysqli_num_rows($query);


    $result = mysqli_fetch_array($query);


    $Password = sha1($_POST['Password']);

    $Password2 = sha1($_POST['Password2']);

	$OldPassword =sha1($_POST['OldPassword']);

	$op = $result['S_password'];


	if ($OldPassword == $op) {


		if ($Password == $Password2) {

			if ($row == 1) 
            {

                $log->success->entry($action,$Conn);
				$update = mysqli_query($Conn, "UPDATE students SET S_password ='$Password' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());
                $return = array(
                    'status' => 200
                );
                http_response_code(200);
			}
		} else 
        {
            $log->success->entry($action,$Conn,"Unsuccessful");
		//	$_SESSION['d'] = 'Please Enter same passwords';
            $return = array(
                'status' => 400
            );
            http_response_code(400);
			
		}
	}
    else 
    {
        $log->success->entry($action,$Conn,"Unsuccessful");

	//	$_SESSION['c'] = ' Your old password is incorrect';
        $return = array(
            'status' => 500
        );
        http_response_code(500);
	
	}
}
else
{
    $log->success->entry($action,$Conn,"Unsuccessful");
    header("location:index.php");
}