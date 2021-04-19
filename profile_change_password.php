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


    $Password = ($_POST['Password']);

    $Password2 = ($_POST['Password2']);

	$OldPassword =($_POST['OldPassword']);

	$op = $result['S_password'];


    if ($OldPassword == $op) {


        if ($Password == $Password2) {

            if ($row == 1) {

                $update = mysqli_query($Conn, "UPDATE `students` SET `S_password` ='$Password' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());

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
