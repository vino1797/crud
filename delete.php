<?php
include "connect.php";

if(isset($_POST['deleteSend']))
{
    $del=$_POST['deleteSend'];

    $sql="DELETE FROM students WHERE ID=$del";
    $result=mysqli_query($con,$sql);
}