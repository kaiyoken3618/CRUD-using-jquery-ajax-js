<?php 
include 'connect.php'; 
 
if(isset($_POST['updateid'])) 
{ 
    $user_id = $_POST['updateid']; 
     
    $sql = "SELECT * FROM `employee` WHERE id=$user_id"; 
    $result = mysqli_query($con,$sql); 
    $response = array(); 
    while ($row = mysqli_fetch_assoc($result)) 
    { 
        $response = $row; 

    } 
    echo json_encode($response); 

} 
 
else 
{ 
    $response['status'] = 200; 
    $response['message'] = "Invalid or Data not found"; 

}
 
//Update query 
 
if(isset($_POST['hiddenData'])) 
{ 
    $uniqueid = $_POST['hiddenData']; 
    $name = $_POST ['updateName'];  
    $dob = $_POST ['updateDOB'];  
    $ctc = $_POST ['updateCTC'];  
    $tech = $_POST ['updateTech'];  
     
    $sql = "UPDATE `employee` SET name ='$name',dob ='$dob',ctc='$ctc',tech='$tech' WHERE id=$uniqueid"; 
     
    $result = mysqli_query($con,$sql);
}

?>