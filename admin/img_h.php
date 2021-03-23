
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<title>Upload Multiple Images with PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">-->
<link href="css/upcss.css" rel="stylesheet" type="text/css">

</head>
<body>

<center>
  
        <div class="content upload">
          <h2>Upload Image</h2>
            <form action="upload-script.php" method="post" enctype="multipart/form-data">

              <label for="image">Choose Image</label>
                       <input type="file" name="imageFile[]" required multiple class="form-control"\>


      <input type="submit" name="uploadImageBtn" value="Upload Images" id="uploadImageBtn" class="btn btn-success">
      <!--<input type="submit" name="back" value="Back" -->
      <a href="dashboard.php">back</a>

    </form>
</div>

</center>

</body>
</html>
