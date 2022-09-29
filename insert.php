<?php 
include 'connect.php'; 
 
extract($_POST); 

if(isset($_POST['nameSend']) && isset($_POST['dobSend']) && isset($_POST['ctcSend']) && isset($_POST['techSend']) )
 { 
    $sql = "INSERT INTO `employee` (name,dob,ctc,tech) 
           values('$nameSend','$dobSend','$ctcSend','$techSend' )"; 
    
    $result = mysqli_query($con,$sql);       
 } 

?>