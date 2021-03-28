
<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
            if(isset($_POST['delt']))
            {

                $tid=$_POST['recordsCheckBox'];

                   foreach ( $tid as $id ) 
                   { 
                          $query = "UPDATE `teachers` SET `is_deleted`='1' WHERE `T_srn`='$id'";
                        $result = $Conn->query($query) or die("Error in query".$Conn->error);
                   }

if($result)
{
$msg="Student info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
            }






if (isset($_GET['T_id']))
{
    $tid = $_GET['T_id'];

    $Sql="UPDATE `teachers` SET `is_deleted`='1' WHERE `T_srn`='$tid'";
    
   
        $delete = $Conn->query($Sql) or die("Error in query2".$connection->error);
    if ($delete){
        
$msg="Student info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Teacher</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

input.chh
{
    width: 20px;
    height: 20px;

}

div.scrollmenu {
  overflow: auto;
}

div.scrollmenu table {
  display: inline-block;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
.dl button
{

    float: right;
    margin-top: 10px;
    margin-right: 10px;
}


        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Teachers</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Teachers</li>
            							<li class="active">Manage Teachers</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="panel">

                                            <div class="panel-heading">
                                                  <div class="dl">
                                                    <form method="post" action="manage-teachers.php">
                                                          <button type="submit" name="delt" class="dl">Delete</button>
                                                    
                                                </div>
                                                <div class="panel-title">
                                                    <h5>View Teachers Info</h5>
                                                </div>
                                              
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="scrollmenu">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                
                                                                                                             <tr>
                                                            <th>#</th>
                                                            <th>action</th>
                                                            <th>Teacher Nmae</th>
                                                            <th>Date of Birth</th>
                                                            <th>Degree</th>
                                                            <th>Appointment Date</th>
                                                            <th>Joning Date</th>
                                                            <th>Retire Date</th>
                                                            <th>Contact</th>
                                                            <th>Created Date</th>
                                                            
                                                        </tr>
                                                                                                          
                                                
<?php 
include 'connection.php';
 $sql = "SELECT * from `teachers` WHERE `is_deleted`='0' ORDER BY T_srn";
$query = mysqli_query($Conn,$sql);
$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
    while($result=mysqli_fetch_array($query))
    {       ?>
                    <tr align="center">
                        <td><?php echo htmlentities($cnt);?></td>

                        <td>
                            <a href="edit-teacher.php?T_id=<?php echo $result['T_srn'];?>">
                                    <img src="images/edit-icon.jpg" height="25px" width='25px'/> Edit
                            </a> 
                              &nbsp;
                            <a href="manage-teachers.php?T_id=<?php echo $result['T_srn'];?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>&nbsp;
                              <input type="checkbox" name="recordsCheckBox[]" id="recordsCheckBox" class="chh" value="<?php echo $result['T_srn'];?>">

                        </td>
                        <td><?php echo $result['T_name'];?></td>
                        <td><?php echo $result['DOB'];?></td>
                        <td><?php echo $result['Degree'];?></td>
                        <td><?php echo $result['A_date'];?></td>
                        <td><?php echo $result['Joining_date'];?></td>
                        <td><?php echo $result['Retire_date'];?></td>
                        <td><?php echo $result['Contact'];?></td>
                        <td><?php echo $result['Created_on'];?></td>
                       
                    
                       
                    </tr>
<?php 
 $cnt=$cnt+1;}
}
else
{
     echo "no data";
} ?>
                                                       
                                                    
                                                    
                                                </table>

                                         </form>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>
<?php } ?>
