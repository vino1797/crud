<?php
include 'connect.php';

extract($_POST);

if(isset($_POST['nameSend']) && isset($_POST['ageSend']) && isset($_POST['citySend']))
{
    $sql="INSERT INTO `students` (STD_NAME,STD_AGE,STD_CITY) VALUES ('$nameSend','$ageSend','$citySend')";
    $result=mysqli_query($con,$sql);
}