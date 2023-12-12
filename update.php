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

if(isset($_POST['editSend']))
{
    $edited=$_POST['editSend'];

    $sql="SELECT id,pt_name,pt_gender,pt_ocp,pt_num,pt_dob,pt_address FROM `parents` WHERE id=$edited";
    $result=mysqli_query($con,$sql);
    $responsed=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $responsed=$row;
    }
    echo json_encode($responsed);
}
else
{
    $responsed['message']="invalid or data not found";
}


//update query
if(isset($_POST['pthiddendata']))
{
    $uniqueiD=$_POST['pthiddendata'];
    $ptname=$_POST['ptNameEdit'];
    $ptgender=$_POST['ptGenderEdit'];
    $ptocp=implode(", ", $_POST['ptOcpEdit']);
    $ptnum=$_POST['ptNumEdit'];
    $ptdob=$_POST['PtDobEdit'];
    $ptaddress=$_POST['ptAddressEdit'];

    $sql="UPDATE `parents` SET pt_name='$ptname',pt_gender='$ptgender',pt_ocp='$ptocp',pt_num='$ptnum',pt_dob='$ptdob',pt_address='$ptaddress' WHERE id=' $uniqueiD'";
    $result=mysqli_query($con,$sql);
}
?>