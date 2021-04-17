    
<?php
session_start();
error_reporting(0);
include('connection.php');
include('store_data.php');
if(strlen($_SESSION['a_id'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        if(!(isset($_GET['a_id'])))
        {
            $action="In manage-Admin";
            $log=new Log();
            $log->success_entry($action,$Conn);
        }
           

if (isset($_GET['a_id']))
{
    $aid = $_GET['a_id'];

    $Sql="UPDATE `admin` SET `is_deleted`='1' WHERE `A_id`='$aid'";
    $action="Admin data Deleted";
    $log=new Log();
   
    $delete = $Conn->query($Sql) or die("Error in query2".$connection->error);
    
    if ($delete)
    {
        $log->success_entry($action,$Conn);       
        $msg="Admin Deleted successfully";

        // unset($_GET['T_id']);
        // header("Location:manage-teachers.php");
    }
    else 
    {
        $log->success_entry($action,$Conn,"Unsuccessful");
        $error="Something went wrong. Please try again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Manage Teacher</title>
   <link rel="stylesheet" href="../teacher/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="../teacher/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="../teacher/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="../teacher/css/main.css" media="screen" >
        <script src="../teacher/js/modernizr/modernizr.min.js"></script>


      <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../teacher/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../teacher/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../teacher/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../teacher/assets/css/typography.css">
    <link rel="stylesheet" href="../teacher/assets/css/default-css.css">
    <link rel="stylesheet" href="../teacher/assets/css/styles.css">
    <link rel="stylesheet" href="../teacher/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../teacher/assets/js/vendor/modernizr-2.8.3.min.js"></script>





<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

 <style>
        :after, :before {
            box-sizing: border-box;
        }
        a {
            color: #337ab7;
            text-decoration: none;
        }
        i{
        margin-bottom:4px;
        }
        .btn {
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-app {
            color: white;
            box-shadow: none;
            border-radius: 3px;
            position: relative;
            padding: 10px 15px;
            margin: 0;
            min-width: 60px;
            max-width: 80px;
            text-align: center;
            border: 1px solid #ddd;
            background-color: #f4f4f4;
            font-size: 12px;
            transition: all .2s;
            background-color: steelblue !important;
        }
        .btn-app > .fa, .btn-app > .glyphicon, .btn-app > .ion {
            font-size: 30px;
            display: block;
        }
        .btn-app:hover {
            border-color: #aaa;
            transform: scale(1.1);
        }
        .pdf {
        background-color: #dc2f2f !important;
        }
        .excel {
            background-color: #3ca23c !important;
        }
        .csv {
            background-color: #e86c3a !important;
        }
        .imprimir {
            background-color: #8766b1 !important;
        }
      
    

    </style>


<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            { extend:    'copy',
                text:      '<i class="fa fa-clipboard "></i>Copy',
                className: 'btn btn-app export barras',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7 ]
                    }
            },
            { extend:    'csv',
              text:      '<i class="fa fa-file-text-o"></i>CSV',
                    className: 'btn btn-app export csv',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7 ]
                    }
            },

             { extend:    'excel',
               text:      '<i class="fa fa-file-excel-o"></i>Excel',
               className: 'btn btn-app export excel',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7 ]
                    }
            },

            {     extend:    'pdf',
                  
                  pageSize: 'LEGAL',
                    text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                     className: 'btn btn-app export pdf',
                  


        
                     exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7 ]
                    }
            },


             { extend:    'print',
                text:      '<i class="fa fa-print"></i>Print',
                 className: 'btn btn-app export imprimir',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7 ]
                    }
            },
            
        ]
    } );
} );
</script>


<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
.scrollmenu
    {
        max-height: 520px;
        border: 1px solid #ddd;
        display: flex;
        overflow-x: auto;
    }

  
    .scrollmenu table
    {
        min-width: 100%;
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

        </style>
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
                <div class="row align-items-center" >
                    <ul class="breadcrumbs pull-left">
                          <h4 class="page-title pull-left">Manage Admin</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Manage Admin</span></li>


                    </ul>
                    <style>.add button {margin-left: 100%;}</style>
                       <div class="add">
                            <a href="add-admin.php" id="b"> <button type="submit" name="add" class="btn btn-success">Add Admin</button></a>
                        </div>
                </div>
          </div>


                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <span></span>
                                        </div>

                                    </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->
                <div class="panel-body">
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

                                             <!--   <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">-->
                                                 <table id="example" class="display nowrap"  style="width:100%">
                                                      <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>action</th>
                                                            <th>Admin Name</th>
                                                            <th>Contact</th>
                                                            <th>Date of Birth</th>
                                                            <th>Address</th>
                                                            <th>Created By</th>
                                                            <th>Created Date</th>
                                                            
                                                        </tr>
                                                        </thead>                                     
                                                
<?php 
include 'connection.php';
$sql = "SELECT * from `admin` WHERE `is_deleted`='0' ORDER BY A_id";
$query = mysqli_query($Conn,$sql);
$row = mysqli_num_rows($query);
$cnt=1;
if($row > 0)
{
    while($result=mysqli_fetch_array($query))
    {       
            if($result['A_mobile']=="8980462257")
            {
                continue;
            }
        ?>
                    <tr align="center">
                        <td><?php echo htmlentities($cnt);?></td>

                        <td>
                            <a href="edit-admin.php?a_id=<?php echo $result['A_id'];?>">
                                    <img src="images/edit-icon.jpg" height="25px" width='25px'/> Edit
                            </a> 
                              &nbsp;
                            <a href="manage-admin.php?a_id=<?php echo $result['A_id'];?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             
                        </td>
                        <td><?php echo $result['A_name'];?></td>
                        <td><?php echo $result['A_mobile'];?></td>
                        <td><?php echo $result['A_dob'];?></td>
                        <td><?php echo $result['A_address'];?></td>

                        <td><?php
                                 $id=$result['Created_by'];
                                 $q=mysqli_query($Conn,"SELECT `A_name` FROM `admin` WHERE `A_id` = '$id' ");
                                 $name=mysqli_fetch_array($q);
                                echo $name[0];
                           ?></td>

                        <td><?php echo $result['Created_on'];?></td>
                        
                    
                       
                    
                       
                    </tr>
<?php 
 $cnt=$cnt+1;}
}
 ?>
                                                       
                                                    
                                                    
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
                        
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

 
    <!-- bootstrap 4 js -->
    <script src="../teacher/assets/js/popper.min.js"></script>
    <script src="../teacher/assets/js/bootstrap.min.js"></script>
    <script src="../teacher/assets/js/owl.carousel.min.js"></script>
    <script src="../teacher/assets/js/metisMenu.min.js"></script>
    <script src="../teacher/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../teacher/assets/js/jquery.slicknav.min.js"></script>

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
    <script src="../teacher/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../teacher/assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../teacher/assets/js/plugins.js"></script>
    <script src="../teacher/assets/js/scripts.js"></script>
       

    </body>
</html>
<?php } ?>

