<?php

require "connection.php";


$table = "CREATE TABLE `Class`(
`Class_id` INT NOT NULL AUTO_INCREMENT ,
`C_no` INT NOT NULL ,
`Stream` VARCHAR(40) NOT NULL ,
PRIMARY KEY (`Class_id`)
)";
$q=mysqli_query($Conn,$table);

 
$table = "CREATE TABLE `Subjects`(
`Sub_id` INT NOT NULL AUTO_INCREMENT ,
`Sub_name` VARCHAR(40) NOT NULL ,
`Class_id` INT  NOT NULL ,
PRIMARY KEY (`Sub_id`)
)";
$q=mysqli_query($Conn,$table);


$table="CREATE TABLE `Resources`(
`R_id` INT NOT NULL AUTO_INCREMENT ,
`R_Name` VARCHAR(60) NOT NULL , 
`R_path` VARCHAR(250) NOT NULL,
`Created_on` DATE NOT NULL,
`Created_by` INT NOT NULL,	
`Sub_id` INT NOT NULL , 
PRIMARY KEY (`R_id`)
)";
$q=mysqli_query($Conn,$table); 


$table = "CREATE TABLE `Students`(
`S_srn` int(5) NOT NULL AUTO_INCREMENT,
`S_grn` int(10) NOT NULL,
`S_uidn` VARCHAR(20) NOT NULL,
`S_name` varchar(50) NOT NULL,
`S_caste` varchar(20) NOT NUll,
`S_category` varchar(10) NOT NUll,
`S_dob`  DATE NOT NUll,
`S_contact` VARCHAR(15) NOT NULL,
`S_ad_date` DATE NOT NUll,
`Class_id` INT NOT NUll,
`S_adharn` VARCHAR(12) NOT NUll,
`S_hostel` varchar(10) NOT NUll,
`S_home` varchar(50) NOT NUll,
`S_handicapped` varchar(5) NOT NUll,
`S_describe` varchar(80) NOT NUll,
`S_password` varchar(20) NOT NULL,
`S_remarks` varchar(50) NOT NUll,
`is_deleted` BOOLEAN NOT NUll,
`Created_on` DATE NOT NULL ,
UNIQUE (`S_contact`),
UNIQUE (`S_grn`),
UNIQUE (`S_uidn`),
UNIQUE (`S_adharn`),
PRIMARY KEY (`S_srn`)
)";
$Conn->query($table);


$table = "CREATE TABLE `Teachers` ( 
	`T_srn` INT(3)  AUTO_INCREMENT NOT NULL , 
	`T_name` VARCHAR(50) NOT NULL , 
	`DOB` DATE NOT NULL , 
	`Degree` VARCHAR(50) NOT NULL , 
	`A_date` DATE NOT NULL , 
	`Joining_date` DATE NOT NULL , 
	`Retire_date` DATE NOT NULL ,
	`Contact` int(15) NOT NULL ,
	`Password` varchar(20)NOT NULL,
	`is_deleted` BOOLEAN NOT NUll,
	`Created_on` DATE NOT NULL,
	PRIMARY KEY (`T_srn`),
	UNIQUE (`Contact`)
	
)";
$Conn->query($table);


$table = "CREATE TABLE `Images` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` VARCHAR(255) NOT NULL,
  `Uploaded_by` INT NOT NULL,
  `Uploaded_on` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)";
$Conn->query($table);


$table = "CREATE TABLE `Notification` ( 
	`Sr_n` INT NOT NULL AUTO_INCREMENT , 
	`Notification_text` VARCHAR(120) NOT NULL , 
	`is_deleted` BOOLEAN NOT NULL,
	`created_on` DATE NOT NULL,
	`created_by` INT NOT NULL,
	PRIMARY KEY (`Sr_n`)
	)";
$Conn->query($table); 


$table = "CREATE TABLE `Event` ( 
	`Sr_n` INT NOT NULL AUTO_INCREMENT , 
	`Event_text` VARCHAR(120) NOT NULL , 
	`is_deleted` BOOLEAN NOT NULL,
	`created_on` DATE NOT NULL,
	`event_date` DATE NOT NULL,
	`created_by` INT NOT NULL,
	PRIMARY KEY (`Sr_n`)
)";
$Conn->query($table); 


$table="CREATE TABLE `Admin` ( 
`A_id` INT NOT NULL AUTO_INCREMENT ,
`A_name` VARCHAR(60) NOT NULL ,
`A_mobile` VARCHAR(10) NOT NULL ,
`A_address` VARCHAR(255) NOT NULL ,
`A_password` varchar(20) NOT NULL,
`A_dob` date NOT NULL,
PRIMARY KEY (`A_id`)
)"; 
$q=mysqli_query($Conn,$table);


$table="CREATE TABLE `conversation` ( 
`chat_id` INT NOT NULL,
`chat_text` VARCHAR(255) NOT NULL ,
`created_on` date NOT NULL,
`S_srn` INT(5) NOT NULL,
`T_srn` INT(3) NOT NULL
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
$Sql="INSERT INTO `Class` (C_no,Stream)VALUES('11','Science')";
$q=mysqli_query($Conn,$Sql);

$Sql="INSERT INTO `Subjects` (Sub_name,Class_id)VALUES('Physics','1')";
$q=mysqli_query($Conn,$Sql);

$Sql="INSERT INTO `students` (`S_srn`, `S_grn`, `S_uidn`, `S_name`, `S_caste`, `S_category`, `S_dob`, `S_contact`, `S_ad_date`, `Class_id`, `S_adharn`, `S_hostel`, `S_home`, `S_handicapped`, `S_describe`, `S_password`, `S_remarks`, `is_deleted`, `Created_on`) VALUES (NULL, '123', '123456789098765432', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'asdsds', 'xaxax', '2021-03-01', '1234567890', '2021-03-04', '1', '1111111111', 'aqaqaqaqaq', '', 'q', 'qqqqqq', '123_123', '1aaaaaaaaaaaaa', '0', '2021-03-19')";
$q=mysqli_query($Conn,$Sql);

$Sql="INSERT INTO `Teachers` (`T_name`, `DOB`, `Degree`, `A_date`, `Joining_date`, `Retire_date`,`Contact`,`Password`) VALUES ('abc', '2020-07-14', 'alpha beta gama', '2021-01-24', '2021-01-30', '2021-02-01','1212121212','123')";
$q=mysqli_query($Conn,$Sql);

$sql="INSERT INTO `admin`(`A_id`, `A_name`, `A_mobile`, `A_address`,`A_password`, `A_dob`) VALUES ('2','mayank','8980462257','anjar','123','20/2/2000')";
$q=mysqli_query($Conn,$sql);


$sql="INSERT INTO `admin`(`A_id`, `A_name`, `A_mobile`, `A_address`,`A_password`, `A_dob`) VALUES ('3','jay','9638435147','bhuj','890','22/22/2000')";
$q=mysqli_query($Conn,$sql);

$Sql="INSERT INTO `Notification` (`Sr_n`, `Notification_text`) VALUES (NULL, 'DUMMY NOTIFICATION') ";
$q=mysqli_query($Conn,$Sql);

$Sql="INSERT INTO `Event` (`Sr_n`, `Event_text`, `0`, `1-11-2000`) VALUES (NULL,'the  proper dummy data')  ";
$q=mysqli_query($Conn,$Sql);


?>