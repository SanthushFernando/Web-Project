<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Profile | Registration and Login System</title>
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div>
            <div>
                <main>
                    <div>
                        
<?php 
$exeid=$_GET['exeid'];
$query=mysqli_query($con,"select * from executive where id='$exeid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1><?php echo $result['fname'];?>'s Profile</h1>
                       <br /><br />
                 
                            <br /><br />
                                <table class="table table-bordered">
                                   <tr>
                                    <th class="rc">First Name</th>
                                       <td><?php echo $result['fname'];?></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Last Name</th>
                                       <td><?php echo $result['lname'];?></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Email</th>
                                       <td colspan="3"><?php echo $result['email'];?></td>
                                   </tr>
                                     <tr>
                                       <th class="rc">NIC:</th>
                                       <td colspan="3"><?php echo $result['idno'];?></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Department</th>
                                       <td colspan="3"><?php echo $result['department'];?></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Gender</th>
                                       <td colspan="3"><?php echo $result['gender'];?></td>
                                   </tr>
                                    </tbody>
                                </table>
                            
<?php } ?>

                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
<?php } ?>
