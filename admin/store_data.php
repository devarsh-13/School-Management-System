<?php

class Upload
{
    public function Store($gr,$uid,$name,$cast,$cate,$dob,$con,$ad_date,$cid,$adhar,$hos,$hom,$handi,$des,$pass,$remarks,$Conn)
    {
        $d=date("d-m-Y");

        $sql="INSERT INTO `Students` SET `S_grn`='$gr',`S_uidn`='$uid',`S_name`='$name',`S_caste`='$cast',`S_category`='$cate',`S_dob`='$dob',`S_contact`='$con',`S_ad_date`='$ad_date',`Class_id`='$cid',`S_adharn`='$adhar',`S_hostel`='$hos',`S_home`='$hom',`S_handicapped`='$handi',`S_describe`='$des',`S_password`='$pass',`S_remarks`='$remarks',`is_deleted`='0',`Created_on`='$d'";

        $q=mysqli_query($Conn,$sql)or die(mysqli_error($Conn));

    }
}

?>
