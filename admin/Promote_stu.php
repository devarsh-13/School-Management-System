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
				$query=mysqli_query($Conn,"UPDATE `students` SET `updated`= '2' WHERE `Class_id`='$class_array[$i]' AND `updated`='1' ");
				$query=mysqli_query($Conn,"UPDATE `students` SET `updated`= '1' WHERE `Class_id`='$class_array[$i]' AND `updated`='0'");
				$i++;
			}

			header("location:Export.php");
		}
?>



<!DOCTYPE html>
<html>
<head>
	<title>IGHS |Promote Stududent</title>
</head>


<form method="POST" name="select_class">

	<table border="1">
		<tr align="center">
			<td colspan="2">
				Select Class :
			</td>
					
		</tr>
	<?php
		
		$query=mysqli_query($Conn,"SELECT * FROM `Class` ");
		$i=0;
		while ($i<8)
		{
			$class=mysqli_fetch_array($query);
			echo "
			<tr>
				<td>
					<input type='checkbox' name='class[]' value= '$class[0]'/>
				</td>
				<td>
					$class[1] $class[2]
				</td>
			</tr>
			";
			$i++;
		}
	?>

		<tr align="center">
			<td colspan="2">
				<input type="Submit" name="Select" value="Select" />
			</td>

		</tr>

	</table>
</form>
</html>

<?php

	}
	else
	{
		$log->success_entry($action,$Conn,"Unsuccessful");
	}
?>