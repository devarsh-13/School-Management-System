<?php
session_start();
error_reporting(0);
include('connection.php');
if(isset($_SESSION['t_id']))
    {   
    
$sub_id=$_GET['sub_id'];





if(isset($_POST['dlt']))
{

    $rid=$_POST['rid'];
 $sql = "SELECT * from `resources`  WHERE `R_id`='$rid' ";
$query = mysqli_query($Conn,$sql);
$row = mysqli_num_rows($query);

if($row > 0)
{
     $path="resources/";
    while($result=mysqli_fetch_array($query))
    {       $full = $path.$result['R_path']; 
          $d=  unlink($full);
    }
}
        $query = "DELETE FROM `resources` WHERE `R_id`='$rid'";
        $delet = mysqli_query($Conn,$query) or die("Error in query2".$Conn->error);

if($d)
{
    
$msg="Resource Deleted Successfully";
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
    <title>IGHS Admin| reasource </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>

      <link rel="stylesheet" href="ssi-uploader/styles/ssi-uploader.css"/>

      <script src="//code.jquery.com/jquery-1.6.2.min.js"></script>




</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">

                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Resource</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="active">Resource</li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Fill The Subject Info</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                        
                                            <?php echo htmlentities($msg); ?>
                                        </div>
                                        <?php } 
else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="post" id="myForm" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Upload File</label>
                                                <div class="col-sm-10">
                                                     
<table class="ie table">
    <tr>
        <td>
           
                <input type="file" name="file[]" multiple id="ssi-upload"/>

                
          
        </td>
    </tr>
   

</table>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"
        integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<script src="ssi-uploader/js/ssi-uploader.js"></script>
<script src="bower_components\ssi-modal\dist\ssi-modal\js\ssi-modal.js"></script>
<script>
    var notifyOptions = {
        iconButtons: {
            className: 'fa fa-question about',
            method: function (e, modal) {
                ssi_modal.closeAll('notify');
                var btn = $(this).addClass('disabled');
                ssi_modal.dialog({
                    onClose: function () 
                    {
                        btn.removeClass('disabled');
                    },
                    onShow: function () 
                    {
                    },
                    okBtn: {className: 'btn btn-primary btn-sm'},
                    title: 'ssi-modal',
                    content: 'ssi-modal is an open source modal window plugin that only depends on jquery. It has many options and it\'s super flexible, maybe the most flexible modal out there... For more details click <a class="sss" href="http://ssbeefeater.github.io/#ssi-modal" target="_blank">here</a>',
                    sizeClass: 'small',
                    animation: true,
                });
            }
        }
    };

    // option 1


    $('#ssi-upload').ssi_uploader({
        url: 'up.php?sub_id=<?php echo $sub_id;?>',
        inForm:true,

    });

// option 2
    var uploader = $('#ssi-upload').ssi_uploader({
        url: 'up.php?sub_id=<?php echo $sub_id;?>',

    });

       

    $( "#myForm" ).on( "submit", function( event ) 
    { 
        event.preventDefault();
        uploader.data('ssi_upload').uploadFiles();
        
        uploader.on('onUpload.ssi-uploader',function(){
            console.log('complete');
            $( "#myForm" ).submit();
        });
    });
 
</script>
                                                </div>
                                            </div>

                                         


                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="hidden" name="sub_id" value="<?php echo '$sub_id'; ?>">
                                                    <button id="upBtn"  class="btn btn-primary">Upload</button>
                                                </div>
                                            </div>
                                        

                                    </div>

                                 

                                     <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Action</th>
                                                            <th>Resource Name</th>
                                                            <th>Created by</th>
                                                            <th>Created On</th>
                                                        </tr>
                                                    
                                                   
<?php 
require "connection.php";
session_start();

$sub_id=$_GET['sub_id'];

$sql1 ="SELECT * from `resources` WHERE `Sub_id`='$sub_id' ";

$query= $Conn -> query($sql1); 
$row = mysqli_num_rows($query);
 $path = "resource/";
$cnt=1;


if($row > 0)
{
while ($query1=mysqli_fetch_array($query)) {
    $full = $path . $query1['R_path'];
   ?>
                    <tr align="center">
                        <td><?php echo htmlentities($cnt);?></td>
                        <td>
                           <!-- <a href="resource-add.php?r_id=<?php //echo  $query1['R_id'];?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>-->
                              <input type="hidden" name="rid" value="<?php echo $query1['R_id']-1; ?>">
                              <input type="submit" name="dlt" value="Delete" class="btn btn-danger">
                              &nbsp;
                               <a href="<?php echo $full; ?>" download="<?php echo $full; ?>"><img src="images/download.png" height="25px" width='25px'/>&nbsp;Download</a>
                        </td>
                        
                        <td><?php echo $query1['R_path'].$query1['R_id'];?></td>

                         <td><?php
                                $id=$query1['Created_by'];
                                 $q=mysqli_query($Conn,"SELECT `T_name` FROM `teachers` WHERE `T_srn` = '$id' ");
                                 $name=mysqli_fetch_array($q);
                                echo $name[0];
                            ?>
                        </td>
                        
                        <td><?php echo $query1['Created_on'];?></td>
                       
                       
                   
                    </tr>
<?php 
    $cnt=$cnt+1;}
}
 ?>
                                                       
                                                    
                                                    
                                                </table>
                                  




<script type="text/javascript">

     $(document).ready(function(){
         $("#upBtn").click(function(){
           
           setInterval('reloadpage()',500);

        });
         });

         function reloadpage()
         {
            location.reload(true);
         }
</script>




</form>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });

        </script>
}
</body>

</html>
<?PHP }
else{
header("Location: index.php"); 
    }
     ?>
