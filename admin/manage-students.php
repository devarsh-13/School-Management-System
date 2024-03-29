
<?php
session_start();
error_reporting(0);
include('../connection.php');
include('store_data.php');
include('../ec_dc.php');
$obj = new ecdc();
$log=new Log();

if(strlen($_SESSION['a_id'])=="")
    {   
        $action="In manage-students";
            
        $log->success_entry($action,$Conn,"Unsuccessful");
        header("Location: index.php"); 
    }
    else
    {   
        if(!(isset($_GET['S_id'])))
        {
            $action="In manage-students";
            
            $log->success_entry($action,$Conn);
        }

        if (isset($_GET['S_id']))
        {
            $stid = $obj->decrypt($_GET['S_id']);

            $Sql="UPDATE `students` SET `is_deleted`='1' WHERE `S_srn`='$stid'";
            
           
            $delete = $Conn->query($Sql) or die("Error in query2".$connection->error);
            
            if ($delete)
            {
                $action="Delete Student Row";
                $log1=new Log();
                $log1->success_entry($action,$Conn);
                
                unset($_GET['S_id']);
                   echo "<script>alert('Student Deleted Successfully.');window.location.href='manage-students.php';</script>";   
               
            }
            else 
            {
                $action="Delete Student Row";
                $log=new Log();
                $log->success_entry($action,$Conn,"Unsuccessful");
                
                 unset($_GET['S_id']);

                   echo "<script>alert('Failed To Delete Student.');window.location.href='manage-students.php';</script>";  
            }

        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
          <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Manage Student | IGHS</title>
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

    <!-- others css -->
    <link rel="stylesheet" href="../teacher/assets/css/typography.css">
    <link rel="stylesheet" href="../teacher/assets/css/default-css.css">
    <link rel="stylesheet" href="../teacher/assets/css/styles.css">
    <link rel="stylesheet" href="../teacher/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../teacher/assets/js/vendor/modernizr-2.8.3.min.js"></script>
 

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/buttons.print.min.js"></script>
<link href="js/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="js/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

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
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ]
                    }
            },
            { extend:    'csv',
              text:      '<i class="fa fa-file-text-o"></i>CSV',
                    className: 'btn btn-app export csv',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ]
                    }
            },

             { extend:    'excel',
               text:      '<i class="fa fa-file-excel-o"></i>Excel',
               className: 'btn btn-app export excel',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ]
                    }
            },

            {     extend:    'pdf',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',
                    text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                     className: 'btn btn-app export pdf',
                  


                  customize : function(doc)
                    {
                    var colCount = new Array();
                    $('#example').find('tbody tr:first-child td').each(function()
                    {
                        if($(this).attr('colspan'))
                        {
                            for(var i=1;i<=$(this).attr('colspan');$i++)
                            {
                                colCount.push('*');
                            }
                        }
                        else
                        {    
                            colCount.push('*'); 
                        }
                    });
                    doc.content[1].table.widths = colCount;
                    },
        
                     exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ]
                    }
            },


             { extend:    'print',
                text:      '<i class="fa fa-print"></i>Print',
                 className: 'btn btn-app export imprimir',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9,10,11,12,13,14,15,16,17,18,19 ]
                    }
            },
            
        ]
    } );
} );
</script>


          <style>
        .scrollmenu
    {
        max-height: 100%;
        border: 1px solid #ddd;
        
        overflow-x: auto;
    }

  
    .scrollmenu table
    {
        width: 100%;
        background-color: #ddd;
        
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
                          <h4 class="page-title pull-left">Manage Student</h4>
                                <li><a href="dashboard.php">Home</a></li>
                                
                                <li><span>Manage Student</span></li>
 

                    </ul>
                         <ul>
                     <style type="text/css">
                         .add
                         {
                            
                            width: 100%;
                            margin-left: 5%;
                         }
                       

                     </style>
                       <div class="add">
                            <a href="add-students.php" id="b"> <button type="submit" name="add" class="btn btn-success">Add Student</button></a>
                            <a href="Promote_stu.php"  id="a" ><button type="submit" name="btn_delete" id="btn_delete" class="btn btn-primary">Promote</button></a>
                       </div>
                   </ul>
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

                                        
                                            <div class="scrollmenu">

                                          <table id="example" class="display nowrap"  style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                            <th>#</th>
                                                            <th>action</th>
                    
                                                            <th>Gr. NO.</th>
                                                            <th>Uid. No.</th>
                                                            <th>Student Name</th>
                                                            <th>Cast</th>
                                                            <th>Category</th>
                                                            <th>Dob</th>
                                                            <th>Contact</th>
                                                            <th>Admission Date</th>
                                                            <th>Academic Year</th>
                                                            <th>Class</th>
                                                            <th>Stream</th>
                                                            <th>Adhar NO.</th>
                                                            <th>Hostel Address</th>
                                                            <th>Home Address</th>
                                                            <th>Handicapped</th>
                                                            <th>Describe</th>
                                                            
                                                            <th>Remarks</th>
                                                            <th>Created Date</th>
                                                        
                                                            
                                                    </tr>
                                                </thead>
                                                                                                
<?php 

 $sql = "SELECT * from `students` join class on students.Class_id=Class.Class_id WHERE `is_deleted`='0' AND `updated`='0' ORDER BY S_srn";
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
                            <a href="edit-student.php?S_id=<?php echo $result['S_srn'];?>">
                                    <img src="images/edit-icon.jpg" height="25px" width='25px'/> Edit
                            </a> 
                             &nbsp;
                            <a href="manage-students.php?S_id=<?php echo $obj->encrypt($result['S_srn']);?>">
                              <img src="images/delete-icon.jpg" height="25px" width='25px'/>&nbsp;Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    
                        <td><?php echo $result['S_grn'];?></td>
                        <td><?php echo $result['S_uidn'];?></td>
                        <td><?php echo $result['S_name'];?></td>
                        <td><?php echo $result['S_caste'];?></td>
                        <td><?php echo $result['S_category'];?></td>
                        <td><?php echo $result['S_dob'];?></td>
                        <td><?php echo $result['S_contact'];?></td>
                        <td><?php echo $result['S_ad_date'];?></td>
                        <td><?php echo $result['Academic_year'];?></td>
                        <td><?php
                                $id=$result['Class_id'];
                                 $q=mysqli_query($Conn,"SELECT `C_no` FROM `class` WHERE `Class_id` = '$id' ");
                                 $name=mysqli_fetch_array($q);
                                echo $name[0];
                            ?></td>
                        
                        <td><?php echo $result['Stream'];?></td>
                        <td><?php echo $result['S_adharn'];?></td>
                        <td><?php echo $result['S_hostel'];?></td>
                        <td><?php echo $result['S_home'];?></td>
                        <td><?php echo $result['S_handicapped'];?></td>
                        <td><?php echo $result['S_describe'];?></td>
                    
                        <td><?php echo $result['S_remarks'];?></td>
                        <td><?php echo $result['Created_on'];?></td>
                      
                       
                    </tr>
<?php 
 $cnt=$cnt+1;}
}
else
{
    
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

 
  