<?php

class Upload
{
    public function Store($gr,$uid,$name,$cast,$cate,$dob,$con,$ad_date,$cid,$adhar,$hos,$hom,$handi,$des,$pass,$remarks,$ay,$ph,$Conn)
    {
        $d=date("Y-m-d");
        $status="offline";

        $sql="INSERT INTO `Students` SET `S_grn`='$gr',`S_uidn`='$uid',`S_name`='$name',`S_caste`='$cast',`S_category`='$cate',`S_dob`='$dob',`S_contact`='$con',`S_ad_date`='$ad_date',`Class_id`='$cid',`S_adharn`='$adhar',`S_hostel`='$hos',`S_home`='$hom',`S_handicapped`='$handi',`S_describe`='$des',`S_password`='$pass',`S_remarks`='$remarks',`Academic_year`='$ay',`S_photo`='$ph',`is_deleted`='0',`Created_on`='$d',`s_status`='$status'";

        $q=mysqli_query($Conn,$sql)or die(mysqli_error($Conn));
        return $q;

    }
}
  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}

class Log
{
	public function success_entry($action,$Conn,$status ="Successful")
    {
    	if(isset($_SESSION['a_id']))
    	{
    		$id=$_SESSION['a_id'];
    		$q=mysqli_query($Conn,"SELECT `A_name`,`A_mobile` FROM `Admin` WHERE `A_id`='$id'");
    		$auth="Admin";
    	}
    	elseif(isset($_SESSION['t_id'])) 
    	{
    		$id=$_SESSION['t_id'];
    		$q=mysqli_query($Conn,"SELECT `T_name`,`contact` FROM `Teachers` WHERE `T_srn`='$id'")or die(mysqli_error($Conn));
    		$auth="Teacher";
    	}
    	elseif(isset($_SESSION['s_id']))
    	{	
    		$id=$_SESSION['s_id'];
    		$data=mysqli_query($Conn,"SELECT `S_name`,`S_contact` FROM `Students` WHERE `S_srn`='$id'")or die(mysqli_error($Conn));
	   		$auth="Student";
    	}
    	$data=mysqli_fetch_row($q);

    	$name 	= 	$data[0];
    	$contact=	$data[1];
    	
		$ip 	=	getIPAddress();
		$device = '';//get_browser()
		$state  =   '';
		$country= 	'';

    	$q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$device', '$state', '$country')");
    }

    public function wrong_login($contact,$action,$Conn)
    {

    	$status="Unsuccessful";
		$ip='';
		$device='';
		$state='';
		$country='';


		$q=mysqli_query($Conn,"SELECT `A_name` FROM `Admin` WHERE `A_mobile`='$contact'");
		$data=mysqli_fetch_row($q);
		
		if($data)
		{
			$name=$data[0];
			$auth="Admin";
		}
		else
		{
			$q=mysqli_query($Conn,"SELECT `T_name` FROM `Teachers` WHERE `contact`='$contact'");
			$data=mysqli_fetch_row($q);
			if($data)
			{
				$name=$data[0];
				$auth="Teacher";
			}
			else
			{
				$q=mysqli_query($Conn,"SELECT `S_name` FROM `Students` WHERE `S_contact`='$contact'");
				$data=mysqli_fetch_row($q);
				if($data)
				{
					$name=$data[0];
					$auth="Student";		
				}
				else
				{
					$name="Unknown";
					$auth="None";
				}
			}
		}

		$q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$device', '$state', '$country')");
	}
}
?>
