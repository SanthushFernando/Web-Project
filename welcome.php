<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
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
        <title>User Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <main>
                <h1 class="mt-4" align="center">Dashboard</h1><hr />
                        

<?php 
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>                        

                        <h1 class="mt-4"><?php echo $result['fname'];?>'s Profile</h1><br />
                        <a  class="bt" href="logout.php">logout</a><br/><br/>
                        <div class="card mb-4">
                        <!-- Display the User Profile table -->
                            <div class="card-body">
                               
                             <table>
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
                                       <th class="rc">NIC</th>
                                       <td colspan="3"><?php echo $result['idno'];?></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Gender</th>
                                       <td colspan="3"><?php echo $result['gender'];?></td>
                                   </tr>
                                   <tr>
                                       <th class="rc">Department</th>
                                       <td colspan="3"><?php echo $result['department'];?></td>
                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                      
                            </div>
                            <a  class="bt" href="edit-profile.php">Edit details</a>
                        <a  class="bt" href="applyleave.php">Apply for a Leave</a>
                            <a  class="bt" href="leavestatus.php">View your Leaving application</a>
                            <a  class="bt" href="viewtask.php">view your Tasks</a>
                            
                        <?php } ?>

                        
                </main>
        
    </body>
</html>
<?php 
} 
?>




