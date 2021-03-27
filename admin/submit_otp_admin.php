<?php
session_start();




$flag = 0;

if (isset($_POST['verify'])) {

  $otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'];






  if ($_SESSION['otp'] == $otp) {
    header("location:change_password_admin.php");
  } else {

    $error_msg['C'] = 'Please enter correct OTP';
  }
}
?>


<html>

<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/log_style.css">

  <link rel="stylesheet" href="../css/otp.css">
  <script src="../js/otp.js"></script>

</head>

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-4 text-center">
      <div class="row">
        <div class="col-sm-12 mt-5 bgWhite">
          <div class="title">
            Verify OTP
          </div>

          <form action="#" class="mt-5" method="Post">
            <input class="otp" name="otp1" type="number" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1>
            <input class="otp" name="otp2" type="number" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1>
            <input class="otp" name="otp3" type="number" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1>
            <input class="otp" name="otp4" type="number" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1>
           
            <button class='btn btn-primary btn-block mt-4 mb-4 customBtn' name="verify">Verify</button>
            <?php
            if (isset($error_msg['C'])) {
              echo "<div class='invalid'><p>" . $error_msg['C'] . "</p></div>";
            }


            ?>
          </form>
          <hr class="mt-4">

        </div>
      </div>
    </div>
  </div>
</div>

</html>