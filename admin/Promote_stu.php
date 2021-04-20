<?php

	include('../Database/connection.php');
	include('store_data.php');
	session_start();

	$log=new Log();
	$action="In Promote Student";
	if(isset($_SESSION['a_id']))
	{
		if(!(isset($_POST['Select'])))
		{
			$log->success_entry($action,$Conn);	
		}
		
		if(isset($_POST['Select']))
		{
				$class_array=array();
				$class_array=$_POST['class'];
			

			$i=0;
			while($i<= sizeof($class_array)-1)
			{
				$query=mysqli_query($Conn,"UPDATE `students` SET `updated`= '2' WHERE `Class_id`='$class_array[$i]' AND `updated`='1'")or die(mysqli_error($Conn));
				$query=mysqli_query($Conn,"UPDATE `students` SET `updated`= '1' WHERE `Class_id`='$class_array[$i]' AND `updated`='0'");
				$i++;
			}

			header("location:Export.php");
		}
		if(isset($_POST['import']))
		{
			header("location:Import.php");
		}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promote </title>

    <link rel="stylesheet" href="../teacher/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../teacher/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../teacher/assets/css/metisMenu.css">

    <link rel="stylesheet" href="../teacher/assets/css/typography.css">
    <link rel="stylesheet" href="../teacher/assets/css/default-css.css">

    <link rel="stylesheet" href="../teacher/assets/css/responsive.css">
    <style type="text/css">
        /*-------------------- 2.1 Sidebar Menu -------------------*/

        .sidebar-menu {
            margin-left: 5%;
            left: 0;
            top: 0;
            z-index: 99;
            height: 100vh;
            width: 90%;
            overflow: hidden;
            background: #303641;
            box-shadow: 2px 0 32px rgba(0, 0, 0, 0.05);
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .sbar_collapsed .sidebar-menu {
            left: -280px;
        }

        .main-menu {
            margin-left: 15%;
            margin-right: 15%;
            height: calc(100% - 100px);
            overflow: hidden;
            padding: 20px 10px 0 0;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            overflow-y: scroll;
        }
          ::-webkit-scrollbar
        {
            width: 5px;
        }

        .menu-inner {
            
            height: 100%;
        }

        .slimScrollBar {
            background: #fff !important;
            opacity: 0.1 !important;
        }

        .sidebar-header {
            padding: 19px 32px 20px;
            background: #303641;
            text-align: center;
            border-bottom: 1px solid #343e50;
        }

        .sidebar-menu .logo {
            text-align: center;
        }

        .logo a {
            display: inline-block;
            max-width: 120px;
        }

        .metismenu>li>a {
            padding-left: 32px !important;
        }

        .metismenu li a {
            position: relative;
            display: block;
            color: #8d97ad;
            font-size: 15px;
            text-transform: capitalize;
            padding: 15px 15px;
            letter-spacing: 0;
            font-weight: 400;
        }

        .metismenu li a i {
            color: #6a56a5;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .metismenu li a:after {
            position: absolute;
            content: '\f107';
            font-family: fontawesome;
            right: 15px;
            top: 12px;
            color: #8d97ad;
            font-size: 20px;
        }

        .metismenu li.active>a:after {
            content: '\f106';
        }

        .metismenu li a:only-child:after {
            content: '';
        }

        .metismenu li a span {
            margin-left: 10px;
        }

        .metismenu li.active>a,
        .metismenu li:hover>a {
            color: #fff;
        }

        .metismenu li li a {
            padding: 8px 20px;
        }

        .metismenu li ul {
            padding-left: 37px;
        }

        .metismenu>li:hover>a,
        .metismenu>li.active>a {
            color: #fff;
            background: #343942;
        }

        .metismenu li:hover>a,
        .metismenu li.active>a {
            color: #fff;
        }

        .metismenu li:hover>a i,
        .metismenu li.active>a i {
            color: #fff;
        }

        .metismenu li li a:after {
            top: 6px;
        }

        /*-------------------- END Sidebar Menu -------------------*/
    </style>
</head>

<body>
    <form method="POST" name="select_class">
        <div class="page-container">
            <div class="sidebar-menu">
                <div class="sidebar-header">

                    <a href="#"><span>Select Class You want To Promote</span></a>

                </div>
                <div class="main-menu">
                    <div class="menu-inner">
                        <nav>		

                            <ul class="metismenu" id="menu">



	<?php
		
		$query=mysqli_query($Conn,"SELECT * FROM `Class` ");
		$i=0;
		while ($i<8)
		{
			$class=mysqli_fetch_array($query);
			echo "
			<li>
					<a><i><input type='checkbox' name='class[]' value= '$class[0]'/>
			
					<span>$class[1] $class[2]</span></i></a>
			</li>
			";
			$i++;
		}
	?>

	<li  align="center">
			<a>	<input type="Submit" class="btn btn-primary" name="Select" value="Select" /></a>
	</li>

	<li  align="center">
			<a>	<input type="Submit" class="btn btn-primary" name="import" value="import" /></a>
	</li>

	</ul>
</nav>
</div>
</div>
</div>
</div>

</form>
</body>
</html>

    <!-- jquery latest version -->
    <script src="../teacher/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../teacher/assets/js/popper.min.js"></script>
    <script src="../teacher/assets/js/bootstrap.min.js"></script>
    <script src="../teacher/assets/js/owl.carousel.min.js"></script>
    <script src="../teacher/assets/js/metisMenu.min.js"></script>
    <script src="../teacher/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../teacher/assets/js/jquery.slicknav.min.js"></script>
    <script src="../teacher/assets/js/scripts.js"></script>
<?php

	}
	else
	{
		$log->success_entry($action,$Conn,"Unsuccessful");
	}
?>