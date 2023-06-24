<?php session_start();
include_once('../includes/config.php');

$ret = mysqli_query($con, "SELECT * FROM users");
$sql=mysqli_query($con,"select * from executive");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage Users | Registration and Login System</title>
        <link href="" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        
      
    </head>
    <body>
             <main>
                    <div class="container-fluid px-4">
                        <h2 align="center"class="mt-4">Manage users</h2><hr><br/>
                       
                           <a class="bt"href="dashboard.php">Dashboard</a>
                          <a  class="bt" href="logout.php">Logout</a><br /><br /><br />
                       
            
                        

                        <br /><br />
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registered User Details
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                             <th>Sno.</th>
                                             <th>Employee ID</th>
                                  <th>First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>NIC</th>
                                  <th>Gender</th>
                                  <th>Department</th>
                                  <th>Delete</th>
                                  <th>Edit</th>
                                  <th>View</th>
                                        </tr>
                                    </thead>
                                  
                                        
                                    <tbody>
                                              <!-- retrieves all records from the 'users' table -->
                                              <?php 
                              $cnt=1;
                              
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['id'];?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['idno'];?></td>
                                  <td><?php echo $row['gender'];?></td>
                                  <td><?php echo $row['department'];?></td>
                                  <td><a href="delete.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></td>
                                  <td><a href="edit-profile.php?uid=<?php echo $row['id'];?>">Edit</a></td>
                                  <td><a href="user-profile.php?uid=<?php echo $row['id'];?>">View</a></td>
                                  </td>
                                  </tr>
                                  
                              <?php $cnt=$cnt+1; }?>

                                      </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>
                <a class="bt"href="adduser.php">Add new user</a><br><br><hr>
<br>
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registered Executives Details
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                             <th>Sno.</th>
                                             <th>Executive ID</th>
                                  <th>First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>NIC</th>
                                  <th>Gender</th>
                                  <th>Department</th>
                                  <th>Delete</th>
                                  <th>Edit</th>
                                  <th>View</th>
                                        </tr>
                                    </thead>
                                  
                                        
                                    <tbody>
                                             
                                              <?php 
                              $cnt=1;
                              
                              while($res=mysqli_fetch_array($sql))
                              {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                    <td><?php echo $res['id'];?></td>
                                  <td><?php echo $res['fname'];?></td>
                                  <td><?php echo $res['lname'];?></td>
                                  <td><?php echo $res['email'];?></td>
                                  <td><?php echo $res['idno'];?></td>
                                  <td><?php echo $res['gender'];?></td>
                                  <td><?php echo $res['department'];?></td>
                                  <td><a href="exedelete.php?id=<?php echo $res['id']; ?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></td>
                                  <td><a href="exeedit.php?exeid=<?php echo $res['id'];?>">Edit</a></td>
                                  <td><a href="exeview.php?exeid=<?php echo $res['id'];?>">View</a></td>
                                  </td>
                                  </tr>
                                  
                              <?php $cnt=$cnt+1; }?>

                                      </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <a class="bt"href="adduser.php">Add new Executive</a><br><br>

        <br /><br /><br />
      

    </body>
</html>
