<?php session_start();
require_once('includes/config.php');



//Code for User Registration 
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$idno=$_POST['idno'];
if(isset($_POST["gender"])) {
	$gender=$_POST["gender"];
}
$department=$_POST["department"];


$sql=mysqli_query($con,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);

$sql=mysqli_query($con,"select id from users where idno='$idno'");
$result=mysqli_num_rows($sql);

$sql=mysqli_query($con,"select id from users where username='$username'");
$result2=mysqli_num_rows($sql);

if($row>0)
{
    echo "<script>alert(' This Email address is already exist with another account. Please try with other email address');</script>";
} elseif($result>0){
    echo "<script>alert(' This NIC Number is already exist with another account. check out your NIC number again!');</script>";
}
elseif($result2>0){
    echo "<script>alert(' This Username is already exist with another account. Tryout another Username!');</script>";
}
else{
    $msg=mysqli_query($con,"insert into users(fname,lname,username,email,password,idno,gender,department) values('$fname','$lname','$username','$email','$password','$idno','$gender', '$department')");

if($msg)
{
    echo "<script>alert('Registered successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
}
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
        <title>User Signup | Registration and Login System</title>
        <link href="../css/styles.css" rel="stylesheet" />

        <style type="text/css">
	
	        body {
    		    background-image: url('../images/image7.jpg');
    		}
	    </style>


</head>
<body>
<main>

<h2 align="center"><font color="white" type="bold">User Registration Form</font></h2>
<hr/>
<h3><font color="white" type="bold">Add new User</font></h3>
<form method="post" name="signup" onsubmit="return checkpass();">




<label for="inputFirstName"><font color="white" type="bold">First Name</font></label>
<input class="put" id="fname" name="fname" type="text" placeholder="Enter your first name" required />

<br />
<label for="inputLastName"><font color="white" type="bold">Last Name</font></label>
 <input class="put" id="lname" name="lname" type="text" placeholder="Enter your last name" required />

 <br />
 <label for="inputUsername"><font color="white" type="bold">Username</font></label>
 <input class="put" id="username" name="username" type="text" placeholder="Enter a username" required />

 <br />
<label for="inputEmail"><font color="white" type="bold">Company Mail Address</font></label>
<input class="put" id="email" name="email" type="email" placeholder="example@gmail.com"  required />

 <br />
<label for="inputcontact"><font color="white" type="bold">NIC Number</font></label>
<input class="put" id="idno" name="idno" type="text" placeholder="Enter your NIC Number" maxlength="12" minlength="10" required />

<br />
<font color="white" type="bold">Gender:</font><br />
<font color="white" type="italic">Male</font>&nbsp<input type="radio" name="gender" value="Male">
<font color="white" type="italic">Female</font>&nbsp<input type="radio" name="gender" value="Female">
<font color="white" type="italic">Other</font>&nbsp<input type="radio" name="gender" value="Other">
<br /><br />
			


<font color="white" type="bold">Department:</font>
<select name="department">
<option SELECTED>Production Department</option>
<option>Sales and Distribution Department</option>
<option>Marketing Department</option>
</select>
<br /><br />


 <label for="inputPassword"></label><font color="white" type="bold">Password</font>
<input class="put" id="password" name="password" type="password" placeholder="Create a password" required/>

<br />
<label for="inputPasswordConfirm"><font color="white" type="bold">Confirm Password</font></label>
<input class="put" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password" required />

<br /><br />
<div><button type="submit" class="btn btn-primary btn-block" name="submit">Create Account</button></div>
</div>
</form>
</div>

<div class="card-footer text-center py-3">
<div class="small"><a href="../login.php"><font color="white" type="bold">Have an Account? Login</font></a></div>
<div class="small"><a href="manage-users.php"><font color="white" type="bold">Back to Dashbord</font></a></div>
</main>
</body>
</html>
