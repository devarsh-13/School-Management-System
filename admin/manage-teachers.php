
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
        if(!(isset($_GET['T_id'])))
        {
            $action="In manage-Teachers";
            $log=new Log();
            $log->success_entry($action,$Conn);
        }
           

if (isset($_GET['T_id']))
{
    $tid = $_GET['T_id'];

    $Sql="UPDATE `teachers` SET `is_deleted`='1' WHERE `T_srn`='$tid'";
    $action="Delete Teacher data";
    $log=new Log();
   
    $delete = $Conn->query($Sql) or die("Error in query2".$connection->error);
    
    if ($delete)
    {
        $log->success_entry($action,$Conn);       
        $msg="Teacher Deleted successfully";

        unset($_GET['T_id']);
        header("Location:manage-teachers.php");
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
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9 ]
                    }
            },
            { extend:    'csv',
              text:      '<i class="fa fa-file-text-o"></i>CSV',
                    className: 'btn btn-app export csv',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9 ]
                    }
            },

             { extend:    'excel',
               text:      '<i class="fa fa-file-excel-o"></i>Excel',
               className: 'btn btn-app export excel',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9 ]
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
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9 ]
                    }
            },


             { extend:    'print',
                text:      '<i class="fa fa-print"></i>Print',
                 className: 'btn btn-app export imprimir',
                 exportOptions: {
                        columns: [ 0, 2, 3, 4, 5,6,7,8,9 ]
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
                                  <div class="dl">
                                                    
                                                    
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

                        
                            <div class="container-fluid">

                             

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="panel">

                                            <div class="panel-heading">
                                                
                                                <div class="panel-title">
                                                    <h5>View Teachers Info</h5>
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

                                             <!--   <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">-->
                                                 <table id="example" class="display nowrap"  style="width:100%">
                                                      <thead>
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
                                                        </thead>                                     
                                                
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

