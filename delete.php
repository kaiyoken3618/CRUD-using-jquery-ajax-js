<?php 
include 'connect.php'; 

if(isset($_POST['deletesend']))
 { 
      $unique=$_POST['deletesend']; 
      $sql = "DELETE FROM `employee` where id=$unique"; 
      $result = mysqli_query($con,$sql);   
 } 

?>