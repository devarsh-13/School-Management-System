<?php

require "connection.php";
require "../vendor/autoload.php";
require "store_data.php";


function get_pass($p2)
{
    $p1=rand(100,999);

    $p3 = $p1."_".$p2;
    return $p3;
}

session_start();

use PhpOffice\PhpSpreadsheet\Spreadsheet;

if(isset($_SESSION['id']))
{

  if(isset($_POST['submit']))
  {
        $targetPath =$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load("$targetPath");
        $d=$spreadsheet->getSheet(0)->toArray();

        $i=0;
       // unset($sheetData[0]);

        foreach ($d as $t) 
        {
            // process element here;

            if($i>0)
            {
                $q=mysqli_query($Conn,"SELECT Class_id FROM `Class` WHERE `C_no`='$t[3]' AND `Stream`='$t[4]'")or die(mysqli_error($Conn));
                $c_id=mysqli_fetch_array($q);
                $pass = get_pass($t[0]);
                
             // echo" :<br>---------------------<br>
             //            't[0]  $t[0]'<br>, 
             //            't[1]  $t[1]'<br>, 
             //            't[2]  $t[2]'<br>, 
             //            't[5]  $t[5]'<br>,    
             //            't[6]  $t[6]'<br>, 
             //            't[7]  $t[7]'<br>, 
             //            't[9]  $t[9]'<br>, 
             //            't[8]  $t[8]'<br>, 
             //            'class_id  $c_id[0]'<br>, 
             //            't[10]  $t[10]'<br>, 
             //            't[12]  $t[12]'<br>, 
             //            't[11]  $t[11]'<br>, 
             //            't[13]  $t[13]'<br>, 
             //            't[14]  $t[14]'<br>, 
             //            'pass  $pass'<br>, 
             //            't[15]  $t[15]'<br>, 
                                               
             //           ) ";
             //    echo"<br>-------------------------<br><br>";    
                        $gr     =$Conn->real_escape_string($t[0]);
                        $uid    =$Conn->real_escape_string($t[1]);
                        $name   =$Conn->real_escape_string($t[2]);
                        $cast   =$Conn->real_escape_string($t[5]);
                        $cate   =$Conn->real_escape_string($t[6]);
                        $dob    =$Conn->real_escape_string($t[7]);
                        $cont   =$Conn->real_escape_string($t[9]);
                        $ad_date=$Conn->real_escape_string($t[8]);
                        $cid    =$Conn->real_escape_string($c_id[0]);
                        $adhar  =$Conn->real_escape_string($t[10]);
                        $hos    =$Conn->real_escape_string($t[12]);
                        $hom    =$Conn->real_escape_string($t[11]);
                        $handi  =$Conn->real_escape_string($t[13]);
                        $des    =$Conn->real_escape_string($t[14]);
                        $pass   =$Conn->real_escape_string($pass);
                        $remarks=$Conn->real_escape_string($t[15]);

                        $s= new Upload ();
                        $ok=$s->Store($gr,$uid,$name,$cast,$cate,$dob,$cont,$ad_date,$cid,$adhar,$hos,$hom,$handi,$des,$pass,$remarks,$Conn);

                        if($ok)
                        {
                            echo "Uploaded";
                        }
                        else
                        {
                            echo "ERROR";
                        }
               

            }
            $i++;
        }
        //unlink($targetPath);
    }

    ?>

    <html>
      <head>
        <title>File Upload</title>

      </head>
      <body>
      
      <form method='post' enctype='multipart/form-data'>

        <div class="form-group">
           <input type="file" name='file' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
        </div> 

        <div class="form-group"> 
         <input type='submit' name='submit' value='Upload' class="btn btn-primary">
         <button type="submit" name="back" value="back">Back</button>
        </div> 
      </form>
     
      </body>
    </html>
 
    <?php 

    if (isset($_POST["back"])) 
    {
     header("location:http://localhost/Sem6CollegeProject/admin/admin_main.php");
    }
}
else
{
    echo "PLEASE LOGIN TO CONTINUE <a href='http://localhost/sem6Collegeproject/admin/'> Login </a>";
}   

?>