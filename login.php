<?php session_start(); 
include_once('includes/config.php');
// Code for User login
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$username=$_POST['username'];
//'email' column matches the value of '$useremail' and the 'password' column matches the value of '$dec_password'.
$ret= mysqli_query($con,"SELECT id,fname FROM users WHERE username='$username' and password='$dec_password'");
$num=mysqli_fetch_array($ret);

if($num>0)
{
    $_SESSION['id']=$num['id'];
    $_SESSION['name']=$num['fname'];
    header("location:welcome.php");
}
else
{
    echo "<script>alert('Invalid username or password');</script>";
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
        <title>User Login | Registration and Login System</title>
        <link href="css/styles.css" rel="stylesheet" />
        
      
        <style type="text/css">
	        body {
    		    background-image: url('./images/image5.jpg');
    		}
	    </style>
    </head>
    <body>
  
    <center>
    <div class="pen-title">
    <font size="6" face="Garamond"color="#000000"><strong>User Login</strong></font></div>
    </center>

<div class="card-header">
<hr/>
<div class="card-body">
<form method="post">
  
<label for="inputusername"><font color="white" type="bold">Username</font></label><br />
<input class="put" name="username" type="text" placeholder="Enter Your Username" required/>
<br />

<label for="inputPassword"></label><font color="white" type="bold">Password</font><br />
<input class="put" name="password" type="password" placeholder="Password" required />
<br />

<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<button class="btn btn-primary" name="login" type="submit">Login</button>
</div>
</form>
</div>
                                    <div class="card-footer text-center py-3">
                                      
                                        <div class="small"><a href="signup.php"><font color="white" type="bold">Need an Account? Sign UP</font></a></div>
                                        <div class="small"><a href="index.php"><font color="white" type="bold">Back to Home</font></a></div>
                                    </div>
                </main>         
    </body>
</html>
