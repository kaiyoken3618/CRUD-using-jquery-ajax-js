<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Employee CRUD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <!-- JQuery CDN only --> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
        <!--select 2 jquery --> 
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
        <!-- Bootstrap CDN CSS only -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">  
        <!--Select 2 CSS --> 
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!--Select 2 JS -->
        
    </head>
    <body>  
        
         <!-- JavaScript Bundle with Popper --> 
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>  
         
         <!-- Modal -->
        <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="completeName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="completeName" placeholder = "Enter name" required>
                </div> 
                <div class="mb-3">
                    <label for="completeDOB" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="completeDOB" placeholder = "Enter date of birth" required>
                </div> 
                <div class="mb-3">
                    <label for="completeCTC" clsas="form-label">Current Salary</label>
                    <input type="number" class="form-control" id="completeCTC" placeholder = "Enter current salary in USD" min = "0" required>
                </div> 
                <div class="mb-3">
                    <label for="completeTech" class="form-label">Experience Technologies</label>
                    <select class="js-example-basic-multiple" style="width: 75%" name="states[]" multiple="multiple" id="completeTech" required>
                        <option value="HT">HTML</option>
                        <option value="JS">Javascript</option> 
                        <option value="C">C++</option> 
                        <option value="RE">React</option>
                        <option value="CS">CSS</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
                <button type="button" class="btn btn-danger" onclick="closemod()">Close</button>
            </div>
            </div>
        </div>
        </div> 

    
         
         <!-- Update Modal -->
         <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="updateName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="updateName" placeholder = "Enter name" required>
                </div> 
                <div class="mb-3">
                    <label for="updateDOB" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="updateDOB" placeholder = "Enter date of birth" required>
                </div> 
                <div class="mb-3">
                    <label for="updateCTC" class="form-label">Current Salary</label>
                    <input type="number" class="form-control" id="updateCTC" placeholder = "Enter current salary in USD" min = "0" required>
                </div> 
                <div class="mb-3">
                    <label for="updateTech" class="form-label">Experience Technologies</label>
                    <select class="js-example-basic-multiple" style="width: 75%" name="states[]" multiple="multiple" id="updateTech" required>
                        <option value="HT">HTML</option>
                        <option value="JS">Javascript</option> 
                        <option value="C">C++</option> 
                        <option value="RE">React</option>
                        <option value="CS">CSS</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
                <button type="button" class="btn btn-danger"onclick="closemod()">Close</button> 
                <input type="hidden" id="hiddenData">
            </div>
            </div>
        </div>
        </div>
         
        <div class = "container my-3"> 
            <h1 class = "text-center">Employee CRUD</h1>
        </div> 
        <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#completeModal">
        Add New User
        </button> 
         
        <div id="displayDataTable"></div>
        
        
       
        <script type="text/javascript"> 
            
            $(document).ready(function() {
            $('.js-example-basic-multiple').select2(); 
            displayData(); 
            });
        </script>   
         
        <script>  
            
            //Display function  
            function displayData() 
            {   
            
                var displayData = true; 
                 
                $.ajax({ 
                    url:"display.php",
                    type:'post', 
                    data:{ 
                        displaySend:displayData
                    },  
                    success:function(data,status) 
                    { 
                        $('#displayDataTable').html(data);
                    }

                }); 
        
            }  
             
            //delete Employee 
            function DeleteUser(deleteid) 
            {  
                var result = confirm("Click ok to confirm"); 
                if(result) 
                {
                $.ajax({ 
                    url:'delete.php', 
                    type: 'post',
                    data:{ 
                        deletesend:deleteid
                    }, 
                    success:function(data,status)
                    { 
                        displayData();
                    }
                }); 
            };
            } 
            //Adding User
            function adduser() 
            { 
                var nameAdd = $('#completeName').val(); 
                var dobAdd = $('#completeDOB').val(); 
                var ctcAdd = $('#completeCTC').val(); 
                var techAdd = $('#completeTech:selected').text(); 
                 
                $.ajax({ 
                    url:"insert.php", 
                    type:'post',  
                    data:{ 
                         nameSend:nameAdd, 
                         dobSend:dobAdd, 
                         ctcSend:ctcAdd, 
                         techSend:techAdd
                    },
                    success:function(data,status) 
                    { 
                        //function to display success
                        //console.log(status) 
                        alert("SUCCESSFUL!");  
                        $('#completeModal').modal('hide');
                        displayData();
                    }

                });
            }  
            //Get field values with update modal
            function GetDetails(updateid) 
            {   
                $('#hiddenData').val(updateid);
                $.post("update.php",{updateid:updateid},function(data,status){ 
                     
                    var userid=JSON.parse(data); 
                    $('#updateName').val(userid.name);  
                    $('#updateDOB').val(userid.dob); 
                    $('#updateCTC').val(userid.ctc); 
                    $('#updateTech').val(userid.tech);

                });  
                $('#updateModal').modal("show"); 

            } 
             
            //Function to update
            function updateDetails() 
            { 
                var updateName = $('#updateName').val();  
                var updateDOB = $('#updateDOB').val(); 
                var updateCTC = $('#updateCTC').val(); 
                var updateTech = $('#updateTech').val();  
                var hiddenData = $('#hiddenData').val(); 
                 
                $.post("update.php",{ 
                    updateName:updateName,  
                    updateDOB:updateDOB, 
                    updateCTC:updateCTC, 
                    updateTech:updateTech, 
                    hiddenData:hiddenData

                },function(data,status){ 
                    $('#updateModal').modal('hide');
                    displayData();
                });
            } 
             
            function closemod() 
            {  
                $('#completeModal').modal('hide');
                $('#updateModal').modal('hide');
            }
        </script>  
        
    </body>
</html>