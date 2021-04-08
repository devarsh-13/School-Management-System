<!--  -->
<?php include_once "teacher_head.php"; ?>



<?php
session_start();
include_once "../teacher/connection.php";

$T_srn = $_SESSION['id'];


$sql = "SELECT * from `teachers` WHERE
 T_srn = '$T_srn'";

 
$query = mysqli_query($Conn, $sql);


$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);

$update = mysqli_query($Conn, "UPDATE teachers SET t_status ='online' WHERE T_srn ='$T_srn' ") or die(mysqli_connect_error());


?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                <a href="../teacher/dashboard.php" class="logout">Back</a>
                </div>
                 
            </header> 

           
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
          
            </div>
        </section>
    </div>

    <script src="show_students.js"></script>

</body>

</html>