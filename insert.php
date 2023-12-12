<?php
include 'connect.php';

extract($_POST);

if(isset($_POST['nameSend']) && isset($_POST['ageSend']) && isset($_POST['citySend']))
{
    $sql="INSERT INTO `students` (STD_NAME,STD_AGE,STD_CITY) VALUES ('$nameSend','$ageSend','$citySend')";
    $result=mysqli_query($con,$sql);
}

if(isset($_POST['ptNameSend']) && isset($_POST['ptGenderSend']) && isset($_POST['ptOcpSend']) && isset($_POST['ptNumSend']) && isset($_POST['PtDobSend']) && isset($_POST['ptAddressSend']))
{
    $sql="INSERT INTO `parents`(pt_name,pt_gender,pt_ocp,pt_num,pt_dob,pt_address) VALUES ('$ptNameSend','$ptGenderSend','$ptOcpSend','$ptNumSend','$PtDobSend','$ptAddressSend')";
    $result=mysqli_query($con,$sql);
}
?>