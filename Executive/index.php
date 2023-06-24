<?php session_start(); 
include_once('../includes/config.php');
// Code for Admin login 
if(isset($_POST['login']))
{
    $executiveusername=$_POST['username'];
    //hashes the password using the MD5 algorithm
    $pass=($_POST['password']);
    $ret=mysqli_query($con,"SELECT * FROM executive WHERE username='$executiveusername' and password='$pass'");
    $num=mysqli_fetch_array($ret);
   
        if($num>0)
            {
                $extra="ExeDashboard.php";
                $_SESSION['login']=$_POST['username'];
                $_SESSION['executiveid']=$num['id'];
                //redirects the user to a new web page - dashboard.php
                echo "<script>window.location.href='".$extra."'</script>";
                exit();
        }
        else
            {
                //displays an alert message to the user to inform them, login attempt was unsuccessful.
                echo "<script>alert('Invalid username or password');</script>";
                $extra="index.php";
                echo "<script>window.location.href='".$extra."'</script>";
                exit();
        }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Executive Login </title>
        <link href="../css/styles.css" rel="stylesheet" />
        <style type="text/css">
	
	        body {
    		    background-image: url('../images/image8.jpg');
    		}
	    </style>
    </head>
<body>

<h3 class="text-center font-weight-light my-4">Executive Login</h3></div>
<div class="card-body">             
<form method="post">     
 

<label for="inputEmail">Username</label><br />
<input class="put" name="username" type="text" placeholder="Username"  required/>
<br />

<label for="inputPassword">Password</label><br />                                           
<input class="put" name="password" type="password" placeholder="Password" required />
<br />

<!-- Admin Login Form - Login Btn-->
<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<button class="btn btn-primary" name="login" type="submit">Login</button>
</div>
</form>
<br />
<div class="small"><a href="../index.php">Back to Home Page</a></div>
</div>
                
                    
            
    </body>
</html>
