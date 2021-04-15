<?php
session_start();
error_reporting(0);
include('connection.php');
if(isset($_SESSION['t_id']))
    {   
    
$sub_id=$_GET['sub_id'];





if(isset($_GET['r_id']))
{

    $rid=$_GET['r_id'];
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
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IGHS Admin| reasource </title>
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

      <link rel="stylesheet" href="ssi-uploader/styles/ssi-uploader.css"/>

      <script src="//code.jquery.com/jquery-1.6.2.min.js"></script>




</head>

<body class="top-navbar-fixed">
     <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
       <?php include('leftbar.php'); ?>
    <div class="main-content">
         <?php include('topbar.php'); ?>




        <!-- page title area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">Resources</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                <li><a><span>Resource</span></a></li>
                                <li><span>Class</span></li>
                            </ul>
                   
                </div>
            </div>
              <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span>Select Class</span>
                                        </div>
                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->
            
                 
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
                                                    <button id="upBtn" type="submit" class="btn btn-primary">Upload</button>
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
 $path = "resources/";
$cnt=1;


if($row > 0)
{
while ($query1=mysqli_fetch_array($query)) {
    $full = $path . $query1['R_path'];
   ?>
                    <tr align="center">
                        <td><?php echo htmlentities($cnt);?></td>
                        <td>
                           <a href="resource-add.php?sub_id=<?php echo $sub_id;?>&r_id=<?php echo  $query1['R_id'];?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>
                              <!-- <input type="hidden" name="rid" value="<?php //echo $query1['R_id']; ?>">
                              <input type="submit" name="dlt" value="Delete" class="btn btn-danger">-->
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
        
   <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>



}
</body>

</html>
<?PHP }
else{
header("Location: index.php"); 
    }
     ?>
