<?php
    include 'connection.php';
    include 'store_data.php';
    $log=new Log();
    $action="Admin Password Changed";

    session_start();
    if(isset($_SESSION['a_id']))
    {


         $A_id = $_SESSION['a_id'];
        $sql = "SELECT * from `admin` WHERE
         A_id = '$A_id'";


  

         $query = mysqli_query($Conn, $sql);
         $row = mysqli_num_rows($query);


         $result = mysqli_fetch_array($query);


         $Password = ($_POST['Password']);

         $Password2 = ($_POST['Password2']);
     
         $OldPassword =($_POST['OldPassword']);

	    $op = $result['A_password'];


	    if ($OldPassword == $op) {


		    if ($Password == $Password2) {

			    if ($row == 1) {

				    $update = mysqli_query($Conn, "UPDATE `admin` SET `A_password` ='$Password' WHERE A_id ='$A_id' ") or die(mysqli_connect_error());

                    $log->success_entry($action,$Conn);
                     $return = array(
                    'status' => 200
                 );
                http_response_code(200);
			}
		} else {

	
            $return = array(
                'status' => 400
            );
            $log->success_entry($action,$Conn,"Unsuccessful");
            http_response_code(400);
			
		}
	} else {


        $return = array(
            'status' => 500
        );
        $log->success_entry($action,$Conn,"Unsuccessful");
        http_response_code(500);
	
	}
}
?>
