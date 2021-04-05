<?php
session_start();
include_once "../Database/connection.php";

$S_srn = $_SESSION['id'];

$sql = "SELECT * from `students` WHERE
 S_srn = '$S_srn'";

 
$query = mysqli_query($Conn, $sql);
$row = mysqli_num_rows($query);


$result = mysqli_fetch_array($query);

$update = mysqli_query($Conn, "UPDATE students SET s_status ='active' WHERE S_srn ='$S_srn' ") or die(mysqli_connect_error());

//   if(!isset($_SESSION['unique_id'])){
//     header("location: login.php");
//   }
?>
<?php include_once "chat_header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <!-- <header>
                <div class="content">
                  //  <?php

                    // $sql = "SELECT * FROM `teachers` where 'is_deleted'= 0";

                    // $query = mysqli_query($Conn, $sql);


                    // if (mysqli_num_rows($query) > 0) {
                    //     $row = mysqli_fetch_assoc($query);
                    // }
                    ?>
                    <img src="php/images/" alt="">
                    <div class="details">

                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php //echo $row['unique_id']; 
                                                    ?>" class="logout">Logout</a>
            </header> -->

            <!-- <span><?php 
            //  echo $row['T_name'];
                        ?></span>
                <p><?php //echo $row['status']; 
                    ?></p> -->
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
          
            </div>
        </section>
    </div>

    <script src="../js/show_users.js"></script>

</body>

</html>