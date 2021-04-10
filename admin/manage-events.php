
<?php
session_start();
$_SESSION['page']='1';
error_reporting(0);
include('connection.php');
include('store_data.php');
if(strlen($_SESSION['a_id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
            $action="In Manage Events";
        $log=new Log();
        $log->success_entry($action,$Conn);

 if(isset($_POST['delt']))
            {
                $action="Delete Event data";
                
                $eid=$_POST['recordsCheckBox'];

                   foreach ( $eid as $id ) 
                   { 
                          $query = "DELETE FROM `event` WHERE `Sr_n`='$id'";
                        $result = $Conn->query($query) or die("Error in query".$Conn->error);
                   }

if($result)
{
    $log=new Log();
    $log->success_entry($action,$Conn);

$msg="Event Deleted Successfully";
}
else 
{
    $log=new Log();
    $log->success_entry($action,$Conn,"Unsuccessful");

$error="Something went wrong. Please try again";
}
            }




if (isset($_GET['E_id']))
{
    $eid = $_GET['E_id'];

    $Sql="DELETE FROM `event` WHERE `Sr_n`='$eid'";
    
   
        $delete = $Conn->query($Sql) or die("Error in query2".$connection->error);
    if ($delete)
    {   
        $action="Delete Teacher data";
        $log=new Log();
        $log->success_entry($action,$Conn);
         $msg="Event Deleted Successfully";
    }
    else 
    {

        $action="Delete Teacher data";
        $log=new Log();
        $log->success_entry($action,$Conn,"Unsuccessful");
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
        <title>IGHS Admin | Manage Events</title>
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

.dl button
{

    float: right;
    margin-top: 10px;
    margin-right: 10px;
}

  
    .scrollmenu table
    {
        
        background-color: #ddd;
        
    }
    .scrollmenu th,td
    {
        border: 1px solid black;
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
                                    <h2 class="title">Manage Events</h2>
                                
                                </div>
                                  <div class="dl">
                                                    <form method="post" action="manage-events.php">
                                                          <button type="submit" name="delt" class="btn btn-danger">Delete</button>
                                                    
                                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                                        <li> Events</li>
            							<li class="active">Manage Events</li>
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
                                                    <h5>View Events</h5>
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
                                                            <th>Event Text</th>
                                                            <th>Event Date</th>
                                                            <th>Status</th>
                                                            <th>Created By</th>
                                                             <th>Created Date</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                    
                                                   
                                                    
<?php
include 'connection.php';
 $sql = "SELECT * from `event` ORDER BY created_on DESC";
$query = mysqli_query($Conn,$sql);
$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
    

    while($result=mysqli_fetch_array($query))
    {      ?>
                    <tr align="center">

                        <td><?php echo htmlentities($cnt);?></td>
                             <td>
                            <a href="edit-event.php?E_id=<?php echo $result['Sr_n'];?>">
                              <img src="images/edit-icon.jpg" height="25px" width='25px'/> Edit</a>
                              &nbsp;
                            <a href="manage-events.php?E_id=<?php echo $result['Sr_n'];?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>
                               &nbsp;
                              <input type="checkbox" name="recordsCheckBox[]" id="recordsCheckBox" class="chh" value="<?php echo $result['Sr_n'];?>">
                            
                        </td>
                        <td>
                        <?php
                            if($result['is_deleted']==0)
                            {
                        ?>
                                <a href="disable_record.php?event_id=<?php echo $result['Sr_n'];?>"><img src="images/disable.jpg" width='30px'/></a>
                        <?php
                            }
                            else
                            {
                        ?>
                                <a href="enable_record.php?event_id=<?php echo $result['Sr_n'];?>"><img src="images/enable.jpg" width='30px'/></a>   
                        <?php
                            }
                        ?>

                        </td>
                         
                        <td><?php echo $result['Event_text'];?></td>
                        <td><?php echo $result['event_date'];?></td>
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
                            ?>
                        </td>
                        
                        <td><?php echo $result['created_on'];?></td>
                       
                       
                   
                    </tr>
<?php 
    $cnt=$cnt+1;}
} ?>
                                                       
                                                    
                                                    
                                                </table>

                                         
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

