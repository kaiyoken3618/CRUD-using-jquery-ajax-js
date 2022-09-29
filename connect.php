<?php 
  
  $con=new mysqli('localhost', 'root','','EmployeeCRUD'); 
   
  if(!$con) 
  { 
    die(mysqli_error($con));
  } 
  //to check
  //else 
  //{ 
  //  echo("success");    
  //}
?> 