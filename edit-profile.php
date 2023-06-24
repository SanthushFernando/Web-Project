<?php session_start();
include_once('includes/config.php');
//If the 'id' session variable is not set ,it's used to redirect the user to a 'logout.php'
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation a User Profile
if(isset($_POST['update']))//check whether the number is null or not, isset is a fuction to do that. if that  statement is true it will execute the programme
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $idno=$_POST['idno'];
    $department=$_POST["department"];
    $email=$_POST['email'];
    $userid=$_SESSION['id'];
    $msg=mysqli_query($con,"update users set fname='$fname',lname='$lname',idno='$idno',department='$department',email='$email' where id='$userid'");


if($msg)
{
    echo "<script>alert('Your Profile,updated successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'welcome.php'; </script>";
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
        <title>Edit Profile</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<body>
                
<?php 

$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))

{?>
                    
                    <h1 class="mt-4"><?php echo $result['fname'];?>'s Profile</h1>
                    <div class="card mb-4">
                     <form method="post">
                     
                            <div class="card-body">
                                <table class="table table-bordered">
                              
                                   <tr>
                               <th class="rc">First Name</th>
                                <td><input  id="fname" name="fname" type="text" value="<?php echo $result['fname'];?>" required /></td>
                                   </tr>
                               
                                   <tr>
                                       <th class="rc">Last Name</th>
                                       <td><input  id="lname" name="lname" type="text" value="<?php echo $result['lname'];?>"  required /></td>
                                   </tr>
                                  <tr>
                                       <th class="rc">NIC</th>
                                       <td colspan="3"><input  id="idno" name="idno" type="text" value="<?php echo $result['idno'];?>"  required /></td>
                                   </tr>
                                
                                   <tr>
                                       <th class="rc">Email</th>
                                       <td colspan="3"><input  id="email" name="email" type="text" value="<?php echo $result['email'];?>"  required /></td>
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

                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
<?php } ?>
