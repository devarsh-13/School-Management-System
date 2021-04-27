<?php
function compress($source, $destination, $quality=50) 
	{
		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}


if(isset($_FILES['file']['name']))
{ 
	$uploadFolder = '../user_photos/student/';
    $imageTmpName = $_FILES['file']['tmp_name'];
    $iname =pathinfo($_FILES['file']['name'],PATHINFO_FILENAME);
    $extension=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    $full="$uploadFolder$iname.$extension";

	compress($imageTmpName,$full);
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>TEST</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data" >
	<input type="file" name="file">
	<input type="submit" name="submit">
	</form>
</body>
</html>