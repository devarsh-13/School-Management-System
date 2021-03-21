<?php

require "connection.php";
$Sql="SELECT * FROM `Class`";
$q=mysqli_query($Conn,$Sql);




?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <script type="text/javascript" src="Location_based_dropdown.js">
       
    </script>
</head>
<body onload="return DatafillClass();">
 
<form method="post" name="locfrm" enctype="multipart/form-data">
    

    <select name="Class" id="Class" onchange="return DatafillSub(this.value);"><option> -Select Class- </option></select>

    <select name="Sub" id="Sub"><option>-Select subject-</option></select>


    <label>File Upload</label>
    <input type="File" name="file">
    <input type="submit" name="submit">
      <button type="submit" name="back" value="back">Back</button>
 

</form>
 
</body>
</html>
 
<?php 

$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "ighs";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);

if (isset($_POST["back"])) {
    header("location:http://localhost/Sem6Project/admin/admin_main.php");
} 
if (isset($_POST["submit"]))
 {   


    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'files';

    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    $c=$_POST['Class'];
    $s=$_POST['Sub'];
    echo $c;
    echo "<br>";
    echo $s;

    #sql query to insert into database
    $sql = "INSERT into $c($s) VALUES('$pname')";
    if(mysqli_query($conn,$sql)){
    
    echo "<br>File Sucessfully uploaded<br>";
   
    }
    else{
        echo "Error";
    }

    
     $sql1 = "Select * From $c";
    $r = mysqli_query($conn,$sql1);
    $f =mysqli_fetch_all($r,MYSQLI_ASSOC);
    foreach ($f as $fi) {

        echo $fi[$s];            
        ?>
        <a href="files/<?php echo $fi['$s'];?>" download="<?php echo $fi['$s'];?>">download</a>
        <?php 
        echo "<br>"; 
        }    





}
 //CREATE TABLE `ighs`.`class9` ( `sub1` VARCHAR(255) NOT NULL , `sub2` VARCHAR(222) NOT NULL , `sub3` VARCHAR(222) NOT NULL , `sub4` VARCHAR(222) NOT NULL ) ENGINE = InnoDB;
 
?>

