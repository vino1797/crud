<?php
include "connect.php";

if(isset($_POST['updateSend']))
{
    $edit=$_POST['updateSend'];

    $sql="SELECT ID,STD_NAME,STD_AGE,STD_CITY FROM students WHERE ID=$edit";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $response=$row;
    }
    echo json_encode($response);
}
else
{
    $response['message']="invalid or data not found";
}

//update query
if(isset($_POST['hiddendata']))
{
    $uniqueid=$_POST['hiddendata'];
    $name=$_POST['nameEdit'];
    $age=$_POST['ageEdit'];
    $city=$_POST['cityEdit'];

    $sql="UPDATE students SET STD_NAME='$name',STD_AGE='$age',STD_CITY='$city' WHERE ID=' $uniqueid'";
    $result=mysqli_query($con,$sql);
}