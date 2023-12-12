<?php
include "connect.php";

if(isset($_POST['deleteSend']))
{
    $del=$_POST['deleteSend'];

    $sql="DELETE FROM students WHERE ID=$del";
    $result=mysqli_query($con,$sql);
}

if(isset($_POST['delSend']))
{
    $deleted=$_POST['delSend'];

    $sql="DELETE FROM `parents` WHERE id=$deleted";
    $result=mysqli_query($con,$sql);
}
?>