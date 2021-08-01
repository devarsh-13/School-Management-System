<script type="text/javascript">
    
    function Stu_birthdate_check()
    {
        bday= new Date(document.getElementById('dob').value);
        bday_year=bday.getFullYear();
        
        cur_year=new Date(Date());

        
        if(bday_year>cur_year.getFullYear()-13)
        {
            document.getElementById('b_error').style.visibility='visible';
            document.getElementById("b_error").style.display= "block";
            document.getElementById('sub_f').disabled='disabled';
        }
        else
        {
            document.getElementById('b_error').style.visibility='hidden';
            document.getElementById("b_error").style.display= "none";
            document.getElementById('sub_f').disabled=false;
        }


    }

    function staff_birthdate_check()
    {
        bday= new Date(document.getElementById('dob').value);
        bday_year= bday.getFullYear();
        
        cur_year=new Date(Date());
        cur_year=cur_year.getFullYear();

        if((cur_year-bday_year)<18)
        {
            document.getElementById('b_error').style.visibility='visible';
            document.getElementById("b_error").style.display= "block";
            document.getElementById('sub_f').disabled='disabled';
                      
        }
        else
        {
            document.getElementById('b_error').style.visibility='hidden';
            document.getElementById("b_error").style.display= "none";
            document.getElementById('sub_f').disabled=false;
            
        }

    }
    function j_date()
    {
        adate= new Date(document.getElementById('adate').value);
        jdate= new Date(document.getElementById('jdate').value);

        if(adate > jdate)
        {
            document.getElementById('j_error').style.visibility='visible';
            document.getElementById("j_error").style.display= "block";
            document.getElementById('sub_f').disabled='disabled';          

            
        }
        else
        {
            document.getElementById('j_error').style.visibility='hidden';
            document.getElementById("j_error").style.display= "none";
            document.getElementById('sub_f').disabled=false;
        }
    }

    function retire_date()
    {
        rdate= new Date(document.getElementById('rdate').value);
        jdate= new Date(document.getElementById('jdate').value);

        if(rdate<=jdate)
        {
            document.getElementById('r_error').style.visibility='visible';
            document.getElementById("r_error").style.display= "block";
            document.getElementById('sub_f').disabled='disabled';
        }
        else
        {
            document.getElementById('r_error').style.visibility='hidden';
            document.getElementById("r_error").style.display= "none";
            document.getElementById('sub_f').disabled=false;
        }
    }
</script>


<?php
error_reporting(0);
class Upload
{
    public function Check_stream()
    {
        foreach ($d as $t) 
        {
            if($i>0)
            {
                if($t[3]=='11' || $t[3]=='12')
                {
                    if($t[4]=='-' || $t[4]==' ')
                    {
                        return 0;
                    }
                    else
                    {
                        return 1;
                    }
                }
            }
        }
    }
    

    public function Store_student($gr,$uid,$name,$cast,$cate,$dob,$con,$ad_date,$cid,$adhar,$hos,$hom,$handi,$des,$pass,$remarks,$ay,$Conn,$ph="student_default.jpg")
    {
        $d=date("Y-m-d");
        $status="offline";

        file_exists("../user_photos/student/$gr.jpg");

        $sql="INSERT INTO `students` SET `S_grn`='$gr',`S_uidn`='$uid',`S_name`='$name',`S_caste`='$cast',`S_category`='$cate',`S_dob`='$dob',`S_contact`='$con',`S_ad_date`='$ad_date',`Class_id`='$cid',`S_adharn`='$adhar',`S_hostel`='$hos',`S_home`='$hom',`S_handicapped`='$handi',`S_describe`='$des',`S_password`='$pass',`S_remarks`='$remarks',`Academic_year`='$ay',`S_photo`='$ph',`is_deleted`='0',`Created_on`='$d',`s_status`='$status',`updated`='0'";

        $q=mysqli_query($Conn,$sql);
        return $q;

    }

    public function Check_teacher($d,$Conn)
    {
        $i=0;
        $lines=array();
        array_push($lines, '1');

        foreach ($d as $t) 
        {
            if($i>0)
            {
                        $tn     =$Conn->real_escape_string($t[0]);
                        $con    =$Conn->real_escape_string($t[6]);
                                        
                        $repeat=mysqli_query($Conn,"SELECT `T_srn`FROM `teachers` WHERE `T_name`='$tn' OR `Contact`='$con' AND `is_deleted`='0' ");

                        $r=mysqli_num_rows($repeat);
                        if($r>=1)
                        {
                            array_push($lines, $i);
                        }
            }
            $i++;
        }
        return $lines;
    }

    public function Check_repeatation($d,$Conn)
    {        
        $i=0;
        $lines=array();
        array_push($lines, '1');

        foreach ($d as $t) 
        {
            if($i>0)
            {
                                $gr     =$Conn->real_escape_string($t[0]);
                                $uid    =$Conn->real_escape_string($t[1]);
                                $name   =$Conn->real_escape_string($t[2]);
                                $cont   =$Conn->real_escape_string($t[9]);
                                $adhar  =$Conn->real_escape_string($t[10]);
                                $ay     =$Conn->real_escape_string($t[16]);
                
                        $repeat=mysqli_query($Conn,"SELECT `S_srn`FROM `students` WHERE (`S_grn`='$gr' OR `S_uidn`='$uid' OR `S_adharn`='$adhar' OR `S_name`='$name' OR `S_contact`='$cont') AND `Academic_year`='$ay' AND `updated`='0' AND `is_deleted`='0'");

                            
                        $r=mysqli_num_rows($repeat);
                               
                        if($r>=1)
                        {
                            array_push($lines, $i);
 
                        }
            }
            $i++;
        }
        
        return $lines;
    }

    public function Check_empty($d,$Conn)
    {
     $i=0;
        $lines=array();
        array_push($lines, 0);
        
        foreach ($d as $t) 
        {
            if($i>0)
            {
                    $flag=0;
                
                        $gr     =$Conn->real_escape_string($t[0]);
                        $uid    =$Conn->real_escape_string($t[1]);
                        $name   =$Conn->real_escape_string($t[2]);
                        $cast   =$Conn->real_escape_string($t[5]);
                        $cate   =$Conn->real_escape_string($t[6]);
                        $dob    =$Conn->real_escape_string($t[7]);
                        $cont   =$Conn->real_escape_string($t[9]);
                        $ad_date=$Conn->real_escape_string($t[8]);
                        $adhar  =$Conn->real_escape_string($t[10]);
                        $hom    =$Conn->real_escape_string($t[11]);
                        $handi  =$Conn->real_escape_string($t[13]);
                        $ay     =$Conn->real_escape_string($t[16]);

                        if(($t[3]==11 || $t[3]==12)&&(empty($t[4])))
                        {
                            array_push($lines,$i);
                            continue;
                        }

                                                   
                        if(empty($gr)||empty($uid)||empty($name)||empty($cast)||empty($cate)||empty($dob)||empty($cont)||empty($ad_date)||empty($adhar)||empty($hom)||empty($handi)||empty($ay))
                        {
                            array_push($lines, $i);
                        }
                        else if(sizeof($d[$i])==0)
                        {
                            array_push($lines,$i);
                        }                  
            }
            $i++;
        }
      
        if($i==1)
        {
            array_push($lines,'x');
        }
        return $lines;   
    }
public function Check_empty_teacher($d,$Conn)
    {
        $i=0;
        $lines=array();
        array_push($lines, '0');

        foreach ($d as $t) 
        {
            if($i>0)
            {
                
                $tn     =$Conn->real_escape_string($t[0]);
                $dob    =$Conn->real_escape_string($t[1]);
                $deg    =$Conn->real_escape_string($t[2]);
                $adate  =$Conn->real_escape_string($t[3]);
                $jdate  =$Conn->real_escape_string($t[4]);
                $rdate  =$Conn->real_escape_string($t[5]);
                $con    =$Conn->real_escape_string($t[6]);

                                                   
                if(empty($tn)||empty($dob)||empty($deg)||empty($adate)||empty($jdate)||empty($rdate)||empty($con))
                {
                    array_push($lines, $i);
                }
                else if(sizeof($d[$i])==0)
                {
                    array_push($lines,$i);
                }   
            }
            $i++;
        }
        
        if($i==1)
        {
            array_push($lines,'x');
        }
        
        return $lines;   
    }



    public function Store_teacher($tn,$dob,$deg,$adate,$jdate,$rdate,$con,$pass,$Conn,$ph="teacher_default.jpg")
    {
        $d=date("Y-m-d");
        $status="offline";
        $sql = "INSERT INTO `teachers` 
                            (   
                                `T_photo`,
                                `T_name`, 
                                `DOB`, 
                                `Degree`, 
                                `A_date`,
                                `Joining_date`, 
                                `Retire_date`, 
                                `Contact`, 
                                `Password`, 
                                `is_deleted`, 
                                 `Created_on`,
                                `t_status`
                                    ) 

                            VALUES 
                            (
                                '$ph',
                                '$tn', 
                                '$dob', 
                                '$deg',
                                '$adate', 
                                '$jdate', 
                                '$rdate', 
                                '$con', 
                                '$pass', 
                                '0',
                                '$d',
                                '$status'
                            )";

        $q=mysqli_query($Conn,$sql);
        return $q;

    }
}
function getIPAddress() 
{  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) 
    {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
    {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
    else
    {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
return $ip;  
}
function getLocation($ip)
{
    $json = file_get_contents("http://ipinfo.io/$ip/geo");
    $json = json_decode($json, true);    
    return $json;
}

class Log
{
	public function success_entry($action,$Conn,$status ="Successful")
    {
    	if(isset($_SESSION['a_id']))
    	{
    		$id=$_SESSION['a_id'];
    		$q=mysqli_query($Conn,"SELECT `A_name`,`A_mobile` FROM `admin` WHERE `A_id`='$id'");
    		$auth="Admin";
    	}
    	elseif(isset($_SESSION['t_id'])) 
    	{
    		$id=$_SESSION['t_id'];
    		$q=mysqli_query($Conn,"SELECT `T_name`,`contact` FROM `teachers` WHERE `T_srn`='$id'");
    		$auth="Teacher";
    	}
    	elseif(isset($_SESSION['s_id']))
    	{	
    		$id=$_SESSION['s_id'];
    		$q=mysqli_query($Conn,"SELECT `S_name`,`S_contact` FROM `students` WHERE `S_srn`='$id' AND `is_deleted`='0' AND `updated`='0'");
	   		$auth="Student";
    	}
    	$data=mysqli_fetch_row($q);

    	$name 	= 	$data[0];
    	$contact=	$data[1];
    	
		$ip 	=getIPAddress();
		
		
        $Loc = getLocation($ip);
      
        $region=$Loc['region'];
        $city=$Loc['city'];
		$country=$Loc['country'];

    	$q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`,`City`,`Region`,`Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip','$city','$region','$country')");
    }

    public function wrong_login($contact,$action,$Conn)
    {
       
    	$status="Unsuccessful";
		$ip=getIPAddress();
		
     
		
        $Loc = getLocation($ip);
        $region=$Loc['region'];
        $city=$Loc['city'];
        $country=$Loc['country'];


		$q=mysqli_query($Conn,"SELECT `A_name` FROM `admin` WHERE `A_mobile`='$contact'");
		$data=mysqli_fetch_row($q);
		
		if($data)
		{
			$name=$data[0];
			$auth="Admin";
		}
		else
		{
			$q=mysqli_query($Conn,"SELECT `T_name` FROM `teachers` WHERE `contact`='$contact'");
			$data=mysqli_fetch_row($q);
			if($data)
			{
				$name=$data[0];
				$auth="Teacher";
			}
			else
			{
				$q=mysqli_query($Conn,"SELECT `S_name` FROM `students` WHERE `S_contact`='$contact'  AND `is_deleted`='0' AND `updated`='0' ");
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

		$q=mysqli_query($Conn,"INSERT INTO `log` (`L_Date`, `L_Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`,   `City`,`Region`,`Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$city','$region','$country')") or die (mysqli_error($Conn));
	}
}
?>
