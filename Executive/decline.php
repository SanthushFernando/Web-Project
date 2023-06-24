<?php

include_once('includes/config.php');


$id = $_GET['leaveid']; 
$permission="declined";

$sql = mysqli_query($con,"update `leave` set permission='$permission' where leaveid= '$id'"); 

if($sql)
{
    
    echo"<script>alert('permission declined!');</script>";
    echo "<script type='text/javascript'> document.location = 'leaveapplications.php'; </script>";
   	
}
else
{
    echo "Error updating record"; 
}
?>