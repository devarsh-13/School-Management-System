<?php
session_start();
include_once "../connection.php";
if (!isset($_SESSION['s_id'])) {
    header("location: ../login.php");
}

$S_srn = $_SESSION['s_id'];

$sql = "SELECT * from `students` WHERE
 S_srn = '$S_srn'";


$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);

$update = mysqli_query($Conn, "UPDATE students SET s_status ='online' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());

//   if(!isset($_SESSION['unique_id'])){
//     header("location: login.php");
//   }
?>
<?php include_once "chat_header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <a href="../main.php" class="logout">Back</a>


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

    <script src="show_users.js"></script>

</body>

</html>
<?php
