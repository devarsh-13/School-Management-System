<?php 
  session_start();
  include_once "../Database/connection.php";
  if(!isset($_SESSION['s_id'])){
    header("location: ../login.php");
  }
?>
<?php include_once "chat_header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $teacher_id = mysqli_real_escape_string($Conn, $_GET['teacher_id']);


          $_SESSION['t_id']=$teacher_id;
          
          $sql = mysqli_query($Conn, "SELECT * FROM `Teachers` WHERE `T_srn` = {$teacher_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: select_users.php");
          }
        ?>
        <a href=" select_users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="../user_photos/<?php echo $row['T_photo']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['T_name'] ?></span>
          <p><?php echo $row['t_status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $teacher_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="chat.js"></script>

</body>
</html>
