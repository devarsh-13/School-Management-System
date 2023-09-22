<?php
error_reporting(1);
	function compress($source, $destination, $quality=50) 
	{
		move_uploaded_file($source, $destination);
	}
?>

