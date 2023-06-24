<?php

include_once('includes/config.php');

$id = $_GET['id'];

$del = mysqli_query($con,"delete from users where id = '$id'"); 

if($del)
{
    mysqli_close($con); 
    header("location:manage-users.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>