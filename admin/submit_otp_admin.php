

<?php 


$flag=0;

	if(isset($_POST['verify']))
	{

        header("location:change_password_admin.php");
  }
    ?>


<html>
    <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" />
   
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
              <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 >
              <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 >
              <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 >
              <input class="otp" type="text" oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 >
              <input class="otp" type="text" oninput='digitValidate(this)'onkeyup='tabChange(5)' maxlength=1 >
              <input class="otp" type="text" oninput='digitValidate(this)'onkeyup='tabChange(6)' maxlength=1 >
              <button class='btn btn-primary btn-block mt-4 mb-4 customBtn' name="verify">Verify</button>
          </form>
            <hr class="mt-4">
           
          </div>
        </div>
      </div>
  </div>
</div>
</html>