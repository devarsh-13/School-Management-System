
<?php
session_start();
$_SESSION['page']='2';  
error_reporting(0);
include('connection.php');
include('store_data.php');

if(strlen($_SESSION['a_id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
            if(!(isset($_GET['N_id'])))
            {
                if(!($_POST['delt']))
                {
                    $action="In Manage Notifications";
                    $log=new Log();
                    $log->success_entry($action,$Conn);
                }
            }
            
 if(isset($_POST['delt']))
 {
    $log=new Log();
    $action="Notifications deleted";

    $nid=$_POST['recordsCheckBox'];
    
    foreach ( $nid as $id ) 
    { 
        $query = "DELETE FROM `notification` WHERE `Sr_n`='$id'";
        $result = $Conn->query($query) or die("Error in query".$Conn->error);
    }

    if($result)
    {
        $msg="Notification Deleted Successfully";
        $log->success_entry($action,$Conn);
    }
    else 
    {
        $error="Something went wrong. Please try again";
        $log->success_entry($action,$Conn,"Unsuccessful");
    }
}
if (isset($_GET['N_id']))
{
    $log=new Log();
    $action="Notification deleted";

    $nid = $_GET['N_id'];
    $Sql="DELETE FROM `notification` WHERE `Sr_n`='$nid'";
   
    $delete = $Conn->query($Sql) or die("Error in query2".$connection->error);
   
    if($delete)
    {
        $msg="Notification Deleted Successfully";
        $log->success_entry($action,$Conn);
    }
    else 
    {
        $error="Something went wrong. Please try again";
        $log->success_entry($action,$Conn,"Unsuccessful");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Notifications</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>




<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>



<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
       
        });
});
</script>
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
  
    .scrollmenu table
    {
        
        background-color: #ddd;
        
    }
    .scrollmenu th,td
    {
        border: 1px solid black;
    }

.dl button
{

    float: right;
    margin-top: 10px;
    margin-right: 10px;
}
input.chh
{
    width: 20px;
    height: 20px;
    
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
                                    <h2 class="title">Manage Notification</h2>
                                
                                </div>
                                 <div class="dl">
                                                    <form method="post" action="manage-notif.php">
                                                          <button type="submit" name="delt" class="btn btn-danger">Delete</button>
                                                    
                                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                                        <li> Notifications</li>
            							<li class="active">Manage Notifications</li>
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
                                                
                                                <div class="panel-title">
                                                    <h5>View Notices</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                        <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="scrollmenu">

                                             
                                                     <table id="example" class="display nowrap" >
                                                <thead>
                                                        <tr>
                                                            <th>#</th>
                                                             <th>Action</th>
                                                            <th>Dis/Ena</th>
                                                            <th>Notification Text</th>
                                                            <th>Created Date</th>
                                                            <th>Status</th>
                                                            <th>Created By</th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    
                                                   
                                                    
<?php
include 'connection.php';
 $sql = "SELECT * from `notification` ORDER BY created_on DESC";
$query = mysqli_query($Conn,$sql);
$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
    while($result=mysqli_fetch_array($query))
    {       ?>
                    <tr align="center">
                         <td><?php echo htmlentities($cnt);?></td>

                          <td><a href="edit-notif.php?N_id=<?php echo $result['Sr_n'];?>">
                              <img src="images/edit-icon.jpg" height="25px" width='25px'/> Edit</a> 
                                 &nbsp;
                            <a href="manage-notif.php?N_id=<?php echo $result['Sr_n'];?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>
                              &nbsp;
                              <input type="checkbox" name="recordsCheckBox[]" id="recordsCheckBox" class="chh" value="<?php echo $result['Sr_n'];?>">

                          </td>
                        <td>  <?php
                            if($result['is_deleted']==0)
                            {
                        ?>
                                <a href="disable_record.php?notif_id=<?php echo $result['Sr_n'];?>"><img src="images/disable.jpg" width='30px'/></a>
                        <?php
                            }
                            else
                            {
                        ?>
                                <a href="enable_record.php?notif_id=<?php echo $result['Sr_n'];?>"><img src="images/enable.jpg" width='30px'/></a>   
                        <?php
                            }
                        ?>

                        </td>
                      
                        <td><?php echo $result['Notification_text'];?></td>
                        <td><?php echo $result['created_on'];?></td>
                        <td><?php if($result['is_deleted']==0)
                                    {
                                        echo "Visible";
                                    }
                                    else
                                    {
                                        echo"Disabled";
                                    }
                        ?>
                            
                        </td>
                        <td><?php
                                 $id=$result['created_by'];
                                 $q=mysqli_query($Conn,"SELECT `A_name` FROM `admin` WHERE `A_id` = '$id' ");
                                 $name=mysqli_fetch_array($q);
                                echo $name[0];
                           ?></td>
                       
                      
                    </tr>
<?php 
    $cnt=$cnt+1;}
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
       
    </body>
</html>
<?php } ?>

