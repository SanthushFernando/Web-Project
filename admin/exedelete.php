<?php

include_once('includes/config.php');// Using database connection file here

$exeid = $_GET['exeid']; // get id through query string

$del = mysqli_query($con,"delete from executive where id = '$exeid'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:manage-users.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>