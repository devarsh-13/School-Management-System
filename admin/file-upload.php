<?php

require "connection.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <script type="text/javascript" >
        function reload(form)
        {
            var val=form.Class.options[form.Class.options.selectedIndex].value;

            self.location='file-upload.php?Class=' + val;
        }
    </script>
</head>
<body>
    <?php
@$cat=$_GET['Class'];
    ?>
    <!--
 
<form method="post" name="locfrm" enctype="multipart/form-data">
    

    <select name="Class" id="Class" onchange="return DatafillSub(this.value);"><option> -Select Class- </option></select>

    <select name="Sub" id="Sub"><option>-Select subject-</option></select>


    <label>File Upload</label>
    <input type="File" name="file">
    <input type="submit" name="submit">
      <button type="submit" name="back" value="back">Back</button>
 

</form>-->

<form method='post' action='#' enctype='multipart/form-data'>
<div class="form-group">

     <select name="Class" id="Class" onchange="reload(this.form)">
        <option value="">-Select Class-</option>
        <?php
        
            $sql="SELECT * FROM class";
            $q=mysqli_query($Conn,$sql);
            while($r=mysqli_fetch_array($q))
            {

                if($r['C_no'] == '9' OR $r['C_no'] == '10')
                {
                     echo "
                            <option>".$r['C_no']."</option>
                        ";
                }
                else
                {
                    echo "
                            <option>".$r['C_no']." ".$r['Stream']."</option>
                        ";
                }
            }
        ?>
    </select>
    <select name="Sub" id="Sub"><option>-Select subject-</option>

              <?php
        
            $sql="SELECT * FROM Subjects";
            $q=mysqli_query($Conn,$sql);
            while($r=mysqli_fetch_array($q))
            {

                if($r['C_no'] == $cat)
                {
                    echo"
                            <option>".$r['Sub_name']."</option>
                        ";
                }
            }
        ?>
    </select>

</div> 
<div class="form-group">
 <input type="file" name="file[]" accept="audio/*,video/*,image/*,.doc,.pdf" multiple>
</div> 
<div class="form-group"> 
 <input type='submit' name='submit' value='Upload' class="btn btn-primary">
 <button type="submit" name="back" value="back">Back</button>
</div> 
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
 session_start();
if (isset($_POST["back"])) {
    header("location:http://localhost/Sem6CollegeProject/admin/admin_main.php");
}



if(isset($_POST['submit'])){
 // Count total uploaded files
 $totalfiles = count($_FILES['file']['name']);

 // Looping over all files
 for($i=0;$i<$totalfiles;$i++)
 {
    $filename = $_FILES['file']['name'][$i];
  $d = date("Y-m-d");
    $a = $_SESSION['id'];  
    // Upload files and store in database
    if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],'files/'.$filename))
    {

        // Image db insert sql
          $insert = "INSERT INTO Resources SET R_path='$filename',Created_on='$d' ,Created_by='$a'";
        
        if(mysqli_query($conn, $insert))
        {
          echo 'Data inserted successfully';
        }
        else
        {
          echo 'Error: '.mysqli_error($conn);
        }
    }
    else
    {
        echo 'Error in uploading file - '.$_FILES['file']['name'][$i].'<br/>';
    }
 
 }
} 


/*


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
 */
?>

