<?php
error_reporting(0);
session_start();

error_reporting(0);
include '../connection.php';
include('../admin/store_data.php');


$action="In Manage Student Chat";
$log=new Log();

if (strlen($_SESSION['t_id']) == "") 
{
    $log->success_entry($action,$Conn,"Unsuccessful");
    header("Location: index.php");
} 
else 
{
    $log->success_entry($action,$Conn);
    if (isset($_GET['s_id'])) 
    {
           
        $sid = $_GET['s_id'];

        $Sql="UPDATE `conversation` SET `is_c_deleted`='1' WHERE `S_srn`='$sid'";
        $delete = $Conn->query($Sql) or die("Error in query2" . $connection->error);

        if ($delete) 
        {
            $msg = "student Deleted Successfully";
            $action=" one Student deleted";
            $log->success_entry($action,$Conn);
        } 
        else 
        {
                $error = "Something went wrong. Please try again";
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
            <title>IGHS | Manage chat</title>
            <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="css/main.css" media="screen">
            <script src="../teacher/js/modernizr/modernizr.min.js"></script>


            <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/font-awesome.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/metisMenu.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.min.css">
           
            <!-- others css -->
            <link rel="stylesheet" href="assets/css/typography.css">
            <link rel="stylesheet" href="assets/css/default-css.css">
            <link rel="stylesheet" href="assets/css/styles.css">
            <link rel="stylesheet" href="assets/css/responsive.css">
            <!-- modernizr css -->
            <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>




<script type="text/javascript" src="../admin/js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../admin/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../admin/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../admin/js/jszip.min.js"></script>
<script type="text/javascript" src="../admin/js/pdfmake.min.js"></script>
<script type="text/javascript" src="../admin/js/vfs_fonts.js"></script>
<script type="text/javascript" src="../admin/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../admin/js/buttons.print.min.js"></script>
<link href="../admin/js/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="../admin/js/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />


            <script type="text/javascript">
                $(document).ready(function() {
                    $('#example').DataTable({

                    });
                });
            </script>
            <style>
                .errorWrap {
                    padding: 10px;
                    margin: 0 0 20px 0;
                    background: #fff;
                    border-left: 4px solid #dd3d36;
                    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                }

                .succWrap {
                    padding: 10px;
                    margin: 0 0 20px 0;
                    background: #fff;
                    border-left: 4px solid #5cb85c;
                    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                }


.dlt button
{
    
    margin-left: 100%;
}

                .scrollmenu table {

                    background-color: #ddd;
                    width: 100%;

                }

                .scrollmenu th,
                td {
                    border: 1px solid black;
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
                        <div class="row align-items-center">
                            <ul class="breadcrumbs pull-left">
                                <h4 class="page-title pull-left">Manage Student Chat</h4>
                                <li><a href="dashboard.php">Home</a></li>

                                <li><span>Manage Student chat</span></li>


                            </ul>
   <form  method="post" enctype="multipart/form-data" >
                       <div class="dlt">
                
                  <button type="submit" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete</button>
                  </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
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
                                        <?php if ($msg) { ?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <?php echo htmlentities($msg); ?>
                                            </div><?php } else if ($error) { ?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                                <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="scrollmenu">


                                            <table id="example" class="display nowrap">

                                                <thead>

                                                    <tr align="center">

                                                        <th>#</th>
                                                        <th>Action</th>

                                                        <th>STUDENT ID</th>
                                                        <th>Student name</th>
                                                        <th>Created Date</th>


                                                    </tr>

                                                </thead>



                                                <?php

                                                $T_srn = $_SESSION['t_id'];

                                                $sql = "SELECT * FROM `conversation` inner join `students` ON conversation.S_srn=students.S_srn WHERE `T_srn`='$T_srn' and `is_c_deleted`='0'  GROUP BY conversation.S_srn";
                                                $query = mysqli_query($Conn, $sql);
                                                $row = mysqli_num_rows($query);

                                                $cnt = 1;
                                                if ($row > 0) {
                                                    while ($result = mysqli_fetch_array($query)) {       ?>
                                                        <tr align="center">
                                                            <td><?php echo htmlentities($cnt); ?></td>

                                                            <td>
                                                                &nbsp;
                                                                <a href="manage_student_chat.php?s_id=<?php echo $result['S_srn']; ?>">
                                                                    <img src="images/delete-icon.jpg" height="25px" width='25px' />&nbsp;Delete</a>
                                                                &nbsp;
                                                                <input type="checkbox" name="customer_id[]" class="delete_customer" value="<?php echo $result['S_srn']; ?>">
                                                                

                                                            </td>

                                                            <td><?php echo $result['S_srn']; ?></td>
                                                            <td><?php echo $result['S_name']; ?></td>
                                                            <td><?php echo $result['Created_on']; ?></td>


                                                            </td>


                                                        </tr>
                                                <?php
                                                        $cnt = $cnt + 1;
                                                    }
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
        <?php

        } ?>



<script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   { 
    $.ajax({
     url:'delete-student-chat.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>