<?php session_start(); 
include_once('../includes/config.php');
if(isset($_POST['login']))
{
    $adminusername=$_POST['username'];
    
    $pass=$_POST['password'];
    $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
    $num=mysqli_fetch_array($ret);
   
        if($num>0)
            {
                
                $_SESSION['login']=$_POST['username'];
                $_SESSION['adminid']=$num['id'];
                
                echo "<script>document.location='dashboard.php'</script>";
                exit();
        }
        else
            {
            
                echo "<script>alert('Invalid username or password');</script>";
                echo "<script>document.location='index.php'</script>";
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
        <title>Admin Login </title>
        <link href="../css/styles.css" rel="stylesheet" />
        <style type="text/css">
	
	        body {
    		    background-image: url('../images/image9.jpg');
    		}
	    </style>
    </head>
<body>

<h3 align="center"><font color="white" type="bold">Admin Login</font></h3></div>
<div class="card-body">             
<form method="post">     
 


<label for="inputEmail"><font color="white" type="bold">Username</font></label><br />
<input class="put" name="username" type="text" placeholder="Username"  required/>
<br />

                                            
<label for="inputPassword"><font color="white" type="bold">Password</font></label><br />
<input class="put" name="password" type="password" placeholder="Password" required />
<br />

<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<button class="btn btn-primary" name="login" type="submit">Login</button>
</div>
</form>
<br />
<div class="small"><a href="../index.php"><font color="white" type="bold">Back to Home Page</font></a></div>
</div>
                
                  
    </body>
</html>
