<?php
session_start();

require'connection.php';
require'Store_data.php';

if(isset($_SESSION['a_id']))
{

?>

<!DOCTYPE html>
<html>
<head>
	<title>SYSTEM LOGS</title>
</head>
<body>
	<table border="1"> 
		
		<tr align="center">
			<td>DATE</td>
			<td>Time</td>
			<td>Name</td>
			<td>Authority</td>
			<td>Contact</td>
			<td>Action</td>
			<td>Status</td>
			<td>IP Address</td>
			<td>Device</td>
			<td>State</td>
			<td>Country</td>
		</tr>
	<?php
		
		$q=mysqli_query($Conn,"SELECT * FROM `Log`");
		while($data = mysqli_fetch_assoc($q))
		{
			echo "<tr align='center'>";
			foreach ($data as $key => $value) 
			{	
				echo "<td>$value</td>";
			}
			echo "</tr>";
			
		}
	?>
	</table>

</body>
</html>




<?php
}	
else
{
	echo "PLEASE LOGIN TO CONTINUE <a href='http://localhost/Sem6CollegeProject/admin/'> Login </a>";
}
?>