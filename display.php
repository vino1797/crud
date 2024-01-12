<?php
include 'connect.php';
if(isset($_POST['displaySend']))
{
    $table='<h4 class="mb-4">Student Details</h4>
        <table class="table border border-2 border-black text-center">
            <thead>
              <tr>
                <th scope="col">SNO</th>
                <th scope="col">NAME</th>
                <th scope="col">AGE</th>
                <th scope="col">CITY</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
              </tr>
            </thead>';
            $sql="SELECT ID,STD_NAME,STD_AGE,STD_CITY FROM students";
            $result=mysqli_query($con,$sql);
            $number=1;
            while($row=mysqli_fetch_assoc($result))
            {
                $id=$row['ID'];
                $name=$row['STD_NAME'];
                $age=$row['STD_AGE'];
                $city=$row['STD_CITY'];
                $table.='<tbody>
                            <tr>
                            <th scope="row">'.$number.'</th>
                            <td>'.$name.'</td>
                            <td>'.$age.'</td>
                            <td>'.$city.'</td>    
                            <td><button id="edit" onclick="editstd('.$id.')" class="btn btn-sm btn-success shadow"><i class="fa-solid fa-pen-to-square"></i></button></td>
                            <td><button id="delete" onclick="deletestd('.$id.')" class="btn btn-sm btn-danger shadow"><i class="fa-solid fa-trash-can"></i></button></td>                       
                            </tr>
                            </tbody>';
                $number++;
            }
    $table.='</table>';
    echo $table;
}
?>