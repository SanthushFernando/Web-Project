<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $idno=$_POST['idno'];
    $department=$_POST["department"];
    $email=$_POST['email'];
$userid=$_GET['uid'];
    $msg=mysqli_query($con,"update users set fname='$fname',lname='$lname',idno='$idno',department='$department',email='$email' where id='$userid'");

if($msg)
{
    echo "<script>alert('Profile updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
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
        <title>Edit Profile | Registration and Login System</title>
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
            <main>                            
<?php 
$userid=$_GET['uid'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['fname'];?>'s Profile</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                   <tr>
                                    <th class="rc">First Name</th>
                                       <td><input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result['fname'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Last Name</th>
                                       <td><input class="form-control" id="lname" name="lname" type="text" value="<?php echo $result['lname'];?>"  required /></td>
                                   </tr>
                                    <tr>
                                       <th class="rc">IDENTITY NO</th>
                                       <td colspan="3"><input class="form-control" id="idno" name="idno" type="text" value="<?php echo $result['idno'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Email</th>
                                       <td colspan="3"><input class="form-control" id="email" name="email" type="text" value="<?php echo $result['email'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Department</th>
                                       <td colspan="3"><input class="form-control" id="department" name="department" type="text" value="<?php echo $result['department'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>
                </main>
    </body>
</html>
<?php } ?>
