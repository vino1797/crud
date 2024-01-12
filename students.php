<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid my-3">
<h1 class="text-center">CRUD in PHP MYSQL</h1>
<div class="row">
    <div class="col-md-3 m-3">
        <h4>Student Form</h4>
        <form id="frm1">
        <div class="form-group my-2">
        <label for="std_name">Name :</label>
        <input type="text" name="name" id="std_name"  placeholder="Enter Name" class="form-control shadow">
        </div>
        <div class="form-group my-2">
        <label for="std_age">Age :</label>
        <input type="text" name="age" id="std_age"  placeholder="Enter Age" class="form-control shadow">
        </div>
        <div class="form-group my-2">
        <label for="std_city">City :</label>
        <input type="text" name="city" id="std_city"  placeholder="Enter City" class="form-control shadow">
        </div>
        <input type="hidden" id="hidden" value="0">
        <button type="button" id="save" class="btn btn-primary shadow my-3" onclick="addstd()">Save Details</button>
        </form>
    </div>
    <div class="col-md-8 m-3" id="ddt"></div>
</div>
</div>

<!-- script for student -->
<script>
$(document).ready(function()
{
    displayData();
});
//display function
function displayData(){
    var displayData="true";
    $.ajax({
        url:"display.php",
        type:"post",
        data:{
            displaySend:displayData
        },
        success:function(data,status){
            $('#ddt').html(data);
        }
    });
}

//add function
function addstd()
{
    var hidden=$('#hidden').val();
    if(hidden==0)
    {
    var nameAdd=$('#std_name').val();
    var ageAdd=$('#std_age').val();
    var cityAdd=$('#std_city').val();
    $.ajax({
        url:"insert.php",
        type:"post",
        data:{
            nameSend:nameAdd,
            ageSend:ageAdd,
            citySend:cityAdd
        },
        success:function(data,status)
        {
            displayData();
            $("#frm1")[0].reset();
            $('#hidden').val("0");
        }
    });
    }
    else
    {
       var nameEdit=$('#std_name').val();
       var ageEdit=$('#std_age').val();
       var cityEdit=$('#std_city').val();
       var hiddendata=$('#hidden').val();

       $.post("update.php",{nameEdit:nameEdit,
                            ageEdit:ageEdit,
                            cityEdit:cityEdit,
                            hiddendata:hiddendata},
                            function(data,status)
                            {
                                displayData();
                                $("#frm1")[0].reset();
                            }
            );
    }
}

//Delete function
function deletestd(deleteid)
{
    $.ajax({
        url:"delete.php",
        type:"post",
        data:{
            deleteSend:deleteid
        },
        success:function(data,status){
            displayData();
        }
    });
}

//Update function
function editstd(updateid)
{   
    $('#hidden').val(updateid);

    $.post("update.php",{updateSend:updateid},function(data,status){
        var stdid=JSON.parse(data);
        $('#std_name').val(stdid.STD_NAME);
        $('#std_age').val(stdid.STD_AGE);
        $('#std_city').val(stdid.STD_CITY);
    });
}

</script>

</body>
</html>