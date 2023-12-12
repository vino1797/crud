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
<h1 class="text-center">CRUD in PHP MYSQL JQuery</h1>
<div class="row mb-5">
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
<div class="row mb-5">
    <div class="col-md-3 m-3">
        <h4>Parents Form</h4>
        <form id="frm2">
        <div class="form-group my-3">
        <label for="pt_name">Fullname :</label>
            <input type="text" name="pt_name" id="pt_name"  placeholder="Enter Fullname" class="form-control shadow">
        </div>
        <div class="form-group row my-3">
            <div class="col-4"><label for="pt_gender">Gender :</label></div>
            <div class="col-8"><input class="shadow mx-1" id="pt_gender"  type="radio" name="pt_gender" value="Male"> Male 
                                <input class="shadow mx-1"  id="pt_gender" type="radio" name="pt_gender" value="Female"> Female </div>
        </div>
        <div class="form-group row my-3">
           <div class="col-4"><label for="pt_ocp">Education :</label></div>
           <div class="col-8"><input class="edu shadow mx-1"  type="checkbox" id="pt_ocp" name="pt_ocp[]" value="Degree"> Degree
           <input class="edu shadow mx-1"  type="checkbox" id="pt_ocp" name="pt_ocp[]" value="HSC"> HSC
           <input class="edu shadow mx-1"  type="checkbox" id="pt_ocp" name="pt_ocp[]" value="SSLC"> SSLC </div>
        </div>
        <div class="form-group my-3">
        <label for="pt_num">Phone Number :</label>
            <input  type="text" id="pt_num" name="pt_num" minlength="10" maxlength="10" placeholder="Enter Number" class="form-control shadow">
        </div>
        <div class="form-group my-3">
        <div><label for="pt_dob">Date of Birth :</label></div>
            <input  type="date" id="pt_dob" name="pt_dob" class=" form-control shadow border border-none">
        </div>
        <div class="form-group my-3">
        <label for="pt_address">Address :</label>
            <textarea id="pt_address" name="pt_address" cols="50" rows="5" class="form-control shadow"></textarea>
        </div>
        <input type="hidden" id="pthidden" value="0">
        <button type="button" id="submit" class="btn btn-primary shadow my-3" onclick="addpt()">Submit</button>
        </form>
    </div>
    <div class="col-md-8 m-3" id="ptddt"></div>
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

<!-- script for Parents -->
<script>
$(document).ready(function()
{
    displayDataParents();
});
//display function
function displayDataParents(){
    var displayDataParents="true";
    $.ajax({
        url:"display.php",
        type:"post",
        data:{
            ptDisplaySend : displayDataParents
        },
        success:function(data,status){
            $('#ptddt').html(data);
        }
    });
}

//add function
function addpt()
{
    var pthidden=$('#pthidden').val();
    if(pthidden==0)
    {
    var ptNameAdd=$('#pt_name').val();
    var ptGenderAdd = $("[name=pt_gender]:checked").val(); 
    var ptOcpAdd = [];  
           $('.edu').each(function(){  
                if($(this).is(":checked"))  
                {  
                     ptOcpAdd.push($(this).val());  
                }  
           });  
           ptOcpAdd = ptOcpAdd.toString();  
    var ptNumAdd=$('#pt_num').val();
    var PtDobAdd=$('#pt_dob').val();
    var ptAddressAdd=$('#pt_address').val();
    $.ajax({
        url:"insert.php",
        type:"post",
        data:{
            ptNameSend : ptNameAdd,
            ptGenderSend : ptGenderAdd,
            ptOcpSend : ptOcpAdd,
            ptNumSend : ptNumAdd,
            PtDobSend : PtDobAdd,
            ptAddressSend : ptAddressAdd
        },
        success:function(data,status){
            displayDataParents();
            $("#frm2")[0].reset();
            $('#pthidden').val("0");
        }
    });
    }
    else
    {
    var ptNameEdit=$('#pt_name').val();
    var ptGenderEdit=$("[name=pt_gender]:checked").val();
    var ptOcpEdit=$('#pt_ocp').val();
    var ptNumEdit=$('#pt_num').val();
    var PtDobEdit=$('#pt_dob').val();
    var ptAddressEdit=$('#pt_address').val();
    var pthiddendata=$('#pthidden').val();

    $.post("update.php",{ptNameEdit:ptNameEdit,
                        ptGenderEdit:ptGenderEdit,
                        ptOcpEdit:ptOcpEdit,
                        ptNumEdit:ptNumEdit,
                        PtDobEdit:PtDobEdit,
                        ptAddressEdit:ptAddressEdit,
                        pthiddendata:pthiddendata},
                        function(data,status)
                        {
                            displayDataParents();
                            $("#frm2")[0].reset();
                        }
        );
    }
}

//Delete function
function deletept(deleteiD)
{
    $.ajax({
        url:"delete.php",
        type:"post",
        data:{
            delSend : deleteiD
        },
        success:function(data,status){
            displayDataParents();
        }
    });
}

//Update function
function editpt(updateiD)
{   
    $('#pthidden').val(updateiD);

    $.post("update.php",{editSend:updateiD},function(data,status){
        var ptid=JSON.parse(data);
        $('#pt_name').val(ptid.pt_name);
        $('[name="pt_gender"][value="' + ptid.pt_gender + '"]').prop('checked', true);
        $("[name='pt_ocp[]'][value='" +  ptid.pt_ocp + "']").prop("checked", true);
        $('#pt_num').val(ptid.pt_num);
        $('#pt_dob').val(ptid.pt_dob);
        $('#pt_address').val(ptid.pt_address);
    });
}
</script>
</body>
</html>