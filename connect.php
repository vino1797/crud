<?php
$con=new mysqli('localhost','root','','crud-students');

if(!$con){
    die(mysqli_error($con));
}
?>