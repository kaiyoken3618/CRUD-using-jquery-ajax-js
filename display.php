<?php 
include 'connect.php'; 
 
if(isset($_POST['displaySend'])) 
{ 
    $table = '<table class="table">
    <thead class="table-dark">
      <th scope = "col">id</th> 
      <th scope = "col">Name</th> 
      <th scope = "col">DOB</th> 
      <th scope = "col">Current CTC</th> 
      <th scope = "col">Tech</th> 
      <th scope = "col">Operations</th>
    </thead>'; 
    $sql = "SELECT * FROM `employee`"; 
    $result = mysqli_query($con,$sql); 
     
    while($row = mysqli_fetch_assoc($result)) 
    { 
        $id = $row['id']; 
        $name = $row['name'];  
        $dob = $row['dob'];  
        $ctc = $row['ctc'];  
        $tech = $row['tech']; 
         
        $table .= '<tr> 
        <td scope = "row">'.$id.'</td> 
        <td>'.$name.'</td> 
        <td>'.$dob.'</td>  
        <td>'.$ctc.'</td>   
        <td>'.$tech.'</td>  
        <td> 
        <button class = "btn btn-dark" onclick = GetDetails('.$id.')>Update</button> 
        <button class = "btn btn-danger" onclick = DeleteUser('.$id.') >Delete</button>
        </td> 
        </tr>';
     } 
      
     $table .='</table>'; 
     echo $table;

}

?> 
 
