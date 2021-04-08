<?php

class 
{
    public function Store($Name,$auth,$contact,$action,$status,$ip,$device,$state,$country,$Conn)
    {
    	$q=mysqli_query($Conn,"INSERT INTO `log` (`Date`, `Time`, `Name`, `Authority`, `Contact`, `Action`, `Status`, `IP_address`, `Device`, `State`, `Country`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$name', '$auth', '$contact', '$action', '$status', '$ip', '$device', '$State', '$country')")or die(mysqli_error($Conn));
    }
}
?>