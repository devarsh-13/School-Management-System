<?php

require "connection.php";
$studentpass=sha1("123");
$teacherpass=sha1("123");
$admin1pass=sha1("123");
$admin2pass=sha1("123");


$ay=date('Y').'-'.(date('Y')+1);
//$d=date('Y-m-d');


$table = "CREATE TABLE `Class`(
`Class_id` INT NOT NULL AUTO_INCREMENT ,
`C_no` INT NOT NULL ,
`Stream` VARCHAR(40) NOT NULL ,
PRIMARY KEY (`Class_id`)
)";
$q=mysqli_query($Conn,$table);



$table = "CREATE TABLE `teacherstd`(`ts_id` INT NOT NULL AUTO_INCREMENT,`id_sub` INT NOT NULL,`id_teacher` INT NOT NULL,`id_class` INT NOT NULL)";
$q=mysqli_query($Conn,$table);



$table = "CREATE TABLE `Subjects`(
`Sub_id` INT NOT NULL AUTO_INCREMENT ,
`Sub_name` VARCHAR(40) NOT NULL ,
`Class_id` INT  NOT NULL ,
UNIQUE(`Sub_name`,`Class_id`),
PRIMARY KEY (`Sub_id`)
)";
$q=mysqli_query($Conn,$table);


$table="CREATE TABLE `Resources`(
`R_id` INT NOT NULL AUTO_INCREMENT ,
`R_path` VARCHAR(250) NOT NULL,
`Created_on` DATE NOT NULL DEFAULT CURRENT_DATE ,
`Created_by` INT NOT NULL,	
`Sub_id` INT NOT NULL , 
PRIMARY KEY (`R_id`)
)";
$q=mysqli_query($Conn,$table); 


$table = "CREATE TABLE `Students`(
`S_srn` int(5) NOT NULL AUTO_INCREMENT,
`S_photo` VARCHAR(50),
`S_grn` int(5) NOT NULL,
`S_uidn` VARCHAR(18) NOT NULL,
`S_name` varchar(50) NOT NULL,
`S_caste` varchar(50) NOT NUll,
`S_category` varchar(50) NOT NUll,
`S_dob`  DATE NOT NUll,
`S_contact` VARCHAR(10) NOT NULL,
`S_ad_date` DATE NOT NUll,
`Class_id` INT NOT NUll,
`S_adharn` VARCHAR(12) NOT NUll,
`S_hostel` varchar(50) NOT NUll,
`S_home` varchar(50) NOT NUll,
`S_handicapped` varchar(5) NOT NUll,
`S_describe` varchar(80) NOT NUll,
`S_password` varchar(50) NOT NULL,
`S_remarks` varchar(50) NOT NUll,
`Academic_year` VARCHAR(15) NOT NUll,
`is_deleted` BOOLEAN NOT NUll,
`Created_on` DATE NOT NULL DEFAULT CURRENT_DATE ,
`s_status` VARCHAR(20) NOT NULL,
UNIQUE (`S_contact`),
UNIQUE (`S_grn`),
UNIQUE (`S_uidn`),
UNIQUE (`S_adharn`),
PRIMARY KEY (`S_srn`)
)";
$Conn->query($table);


$table = "CREATE TABLE `Teachers` ( 
	`T_srn` INT(3)  AUTO_INCREMENT NOT NULL ,
	`login_count` INT NOT NULL ,
	`T_photo` VARCHAR(50), 
	`T_name` VARCHAR(50) NOT NULL , 
	`DOB` DATE NOT NULL , 
	`Degree` VARCHAR(50) NOT NULL , 
	`A_date` DATE NOT NULL , 
	`Joining_date` DATE NOT NULL , 
	`Retire_date` DATE NOT NULL ,
	`Contact` VARCHAR(10) NOT NULL ,
	`Password` varchar(50)NOT NULL,
	`is_deleted` BOOLEAN NOT NUll,
	`Created_on` DATE NOT NULL DEFAULT CURRENT_DATE ,
	`t_status` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`T_srn`),
	UNIQUE (`Contact`)
	
)";
$Conn->query($table);


$table = "CREATE TABLE `Images` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` VARCHAR(255) NOT NULL,
  `Uploaded_by` INT NOT NULL,
  `Uploaded_on` DATE NOT NULL DEFAULT CURRENT_DATE,
  PRIMARY KEY (`id`)
)";
$Conn->query($table);


$table = "CREATE TABLE `Notification` ( 
	`Sr_n` INT NOT NULL AUTO_INCREMENT , 
	`Notification_topic` VARCHAR(120) NOT NULL ,
	`Notification_text` VARCHAR(120) NOT NULL , 
	`is_deleted` BOOLEAN NOT NULL,
	`N_count` INT NOT NULL , 
	`Created_on` DATE NOT NULL DEFAULT CURRENT_DATE ,
	`N_Time` TIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
	`created_by` INT NOT NULL,
	PRIMARY KEY (`Sr_n`),
	`n_status` BOOLEAN NOT NULL
	)";
$Conn->query($table); 


$table = "CREATE TABLE `Event` ( 
	`Sr_n` INT NOT NULL AUTO_INCREMENT , 
	`Event_topic` VARCHAR(120) NOT NULL , 
	`Event_text` VARCHAR(120) NOT NULL , 
	`is_deleted` BOOLEAN NOT NULL,
	`Created_on` DATE NOT NULL DEFAULT CURRENT_DATE ,
	`event_date` DATE NOT NULL,
	`created_by` INT NOT NULL,
	PRIMARY KEY (`Sr_n`)
)";
$Conn->query($table); 


$table="CREATE TABLE `Admin` ( 
`A_id` INT NOT NULL AUTO_INCREMENT ,
`A_Photo` VARCHAR(50),
`A_name` VARCHAR(60) NOT NULL ,
`A_mobile` VARCHAR(10) NOT NULL ,
`A_address` VARCHAR(255) NOT NULL ,
`A_password` varchar(50) NOT NULL,
`is_deleted` BOOLEAN NOT NUll,
`A_dob` date NOT NULL,
`Created_on` DATE NOT NULL DEFAULT CURRENT_DATE ,
`Created_by` INT NOT NULL,
PRIMARY KEY (`A_id`),
UNIQUE (A_mobile)
)"; 
$q=mysqli_query($Conn,$table);


$table="CREATE TABLE `conversation` ( 
`chat_id` INT NOT NULL,
`chat_text` VARCHAR(255) NOT NULL ,
`Created_on` DATE NOT NULL DEFAULT CURRENT_DATE ,
`S_srn` INT(5) NOT NULL,
`T_srn` INT(3) NOT NULL,
`is_c_deleted` BOOLEAN NOT NUll,
`sender_type` VARCHAR(10) NOT NULL
)"; 
$q=mysqli_query($Conn,$table);

$table="CREATE TABLE `log` (
`L_Date` DATE NOT NULL DEFAULT CURRENT_DATE,
`L_Time` TIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
`Name` VARCHAR(100) NOT NULL , 
`Authority` VARCHAR(10) NOT NULL,
`Contact` VARCHAR(10) NOT NULL , 
`Action` VARCHAR(255) NOT NULL , 
`Status` TEXT NOT NULL , 
`IP_address` VARCHAR(35) NOT NULL , 
`Device` VARCHAR(100) NOT NULL , 
`City` VARCHAR(50) NOT NULL , 
`Country` VARCHAR(100) NOT NULL ,
PRIMARY KEY(`L_Time`,`Contact`)
)";
$q=mysqli_query($Conn,$table);

//Alters

$Sql="ALTER TABLE `Subjects` ADD FOREIGN KEY (`Class_id`) REFERENCES `Class`(`Class_id`)  ON DELETE CASCADE ON UPDATE CASCADE";
$q=mysqli_query($Conn,$Sql);



$SQL="ALTER TABLE `Students` ADD FOREIGN KEY (`Class_id`) REFERENCES `Class`(`Class_id`)ON DELETE CASCADE ON UPDATE CASCADE "; 
$q=mysqli_query($Conn,$Sql);

$Sql="ALTER TABLE `students` ADD FOREIGN KEY (`Class_id`) REFERENCES `class`(`Class_id`)ON DELETE CASCADE ON UPDATE CASCADE "; 
$q=mysqli_query($Conn,$Sql);

$Sql="ALTER TABLE `images` ADD FOREIGN KEY (`Uploaded_by`) REFERENCES `admin`(`A_id`)ON DELETE CASCADE ON UPDATE CASCADE"; 
$q=mysqli_query($Conn,$Sql);


$Sql="ALTER TABLE `Event` ADD FOREIGN KEY (`created_by`) REFERENCES `admin`(`A_id`)ON DELETE CASCADE ON UPDATE CASCADE"; 
$q=mysqli_query($Conn,$Sql);


$Sql="ALTER TABLE `conversation` ADD FOREIGN KEY (`S_srn`) REFERENCES `students`(`S_srn`) ON DELETE CASCADE ON UPDATE CASCADE"; 
$q=mysqli_query($Conn,$Sql);

$Sql="ALTER TABLE `conversation` ADD FOREIGN KEY (`T_srn`) REFERENCES `Teachers`(`T_srn`) ON DELETE CASCADE ON UPDATE CASCADE"; 
$q=mysqli_query($Conn,$Sql);

$Sql="ALTER TABLE `Resources` ADD FOREIGN KEY (Created_by) REFERENCES `Teachers`(`T_srn`) ON DELETE CASCADE ON UPDATE CASCADE";
$q=mysqli_query($Conn,$Sql);

$Sql="ALTER TABLE `Resources` ADD FOREIGN KEY (`Sub_id`) REFERENCES `Subjects`(`Sub_id`)ON DELETE CASCADE ON UPDATE CASCADE";
$q=mysqli_query($Conn,$Sql);

$Sql="ALTER TABLE `Notification` ADD FOREIGN KEY (`Created_by`) REFERENCES `Admin`(`A_id`)ON DELETE CASCADE ON UPDATE CASCADE";
$q=mysqli_query($Conn,$Sql);

//Inserts
$Sql="INSERT INTO `class` (`Class_id`, `C_no`, `Stream`) VALUES (NULL, '9', NULL), 
																(NULL, '10', NULL),
																(NULL, '11', 'Arts'), 
																(NULL, '12', 'Arts'), 
																(NULL, '11', 'Commerce'), 
																(NULL, '12', 'Commerce'), 
																(NULL, '11', 'Science'), 
																(NULL, '12', 'Science')
	";
	 
$q=mysqli_query($Conn,$Sql);



$std9_10 = array("Gujarati","Hindi","Sanskrit","English","Maths","Science","P.T.","Music","Beauty","Health","Computer","Social Science","Drawing");

$std11_12_sci = array("Biology","Physics","Chemistry","Maths","Gujarati","English","P.T.","Computer");

$std11_12_com = array("Accountancy","Org. of Commerce","S.P. & C.C.","Economics","Statistics","Gujarati","English","Computer");

$std11_12_art = array("Psychology","Sociology","Geography","Economics","Gujarati","English","Philosophy","Logic","Computer","Beauty","Health","Music","History");

foreach ($std9_10 as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','1')";
	$q=mysqli_query($Conn,$Sql);
}

foreach ($std9_10 as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','2')";
	$q=mysqli_query($Conn,$Sql);
}


foreach ($std11_12_art as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','3')";
	$q=mysqli_query($Conn,$Sql);
}


foreach ($std11_12_art as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','4')";
	$q=mysqli_query($Conn,$Sql);
}



foreach ($std11_12_com as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','5')";
	$q=mysqli_query($Conn,$Sql);
}


foreach ($std11_12_com as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','6')";
	$q=mysqli_query($Conn,$Sql);
}



foreach ($std11_12_sci as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','7')";
	$q=mysqli_query($Conn,$Sql);
}


foreach ($std11_12_sci as $value) 
{
	$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('$value','8')";
	$q=mysqli_query($Conn,$Sql);
}




$Sql="INSERT INTO `students` (`S_photo`, `S_grn`, `S_uidn`, `S_name`, `S_caste`, `S_category`, `S_dob`, `S_contact`, `S_ad_date`, `Class_id`, `S_adharn`, `S_hostel`, `S_home`, `S_handicapped`, `S_describe`, `S_password`, `S_remarks`,`Academic_year`, `is_deleted`,`s_status`) VALUES ('student_default.jpg', '40', '123456789098765432', 'Kratos', 'asdsds', 'xaxax', '2021-03-01', '1234567890', '2021-01-12-', '1', '123456789012', 'aqaqaqaqaq', '', 'YES', 'qqqqqq', '$studentpass', '1aaaaaaaaaaaaa','$ay','0','offline')";
$q=mysqli_query($Conn,$Sql);



$Sql="INSERT INTO `Teachers` (`T_photo`, `T_name`, `DOB`, `Degree`, `A_date`, `Joining_date`, `Retire_date`,`Contact`,`Password`,`is_deleted`,`t_status`) VALUES ('teacher_default.jpg', 'abc', '2020-07-14', 'alpha beta gama', '2021-01-24', '2021-01-30', '2021-02-01','7359817926','$teacherpass','0','offline')";
$q=mysqli_query($Conn,$Sql);



$sql="INSERT INTO `admin`(`A_Photo`,`A_name`, `A_mobile`, `A_address`,`A_password`, `A_dob`,`Created_by`) VALUES ('admin_default.jpg','mayank','8980462257','anjar','$admin1pass','2000-02-20','0')";
$q=mysqli_query($Conn,$sql);




$sql="INSERT INTO `admin`(`A_Photo`,`A_name`, `A_mobile`, `A_address`,`A_password`, `A_dob`,`Created_by`) VALUES ('admin_default.jpg','jay','9638435147','bhuj','$admin2pass','2000-02-22','0')";
$q=mysqli_query($Conn,$sql);


$Sql="INSERT INTO `Notification` (`Sr_n`,`Notification_topic`, `Notification_text`,`Created_by`,`n_status`) VALUES (NULL,'For Fees','Fees Vadharvama ave che lol','1','0') ";
$q=mysqli_query($Conn,$Sql);

$Sql="INSERT INTO `event` (`Event_topic`,`Event_text`, `is_deleted`,`event_date`,`created_by`) VALUES ('Anual Function','Koi e avu nai corona che lol', '0', '2021-04-01','2')";
$q=mysqli_query($Conn,$Sql);

$Sql="INSERT INTO `log` (`Date`, `Time`, `Name`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '', '', '', '', '', '', '', '')";
$q=mysqli_query($Conn,$Sql);
?>