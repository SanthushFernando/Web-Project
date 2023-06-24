<?php session_start();
include_once('includes/config.php');
//If the 'id' session variable is not set ,it's used to redirect the user to a 'logout.php'
if (strlen($_SESSION['executiveid']==0)) {
  header('location:logout.php');
  } else
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Executive Profile</title>
        <link href="" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        
      
    </head>
    <body>
             <main>
             <?php 
$executiveid=$_SESSION['executiveid'];
//displaying their name , email address and thei detais in a profile page.
//used to retrieve the value of the 'id' session variable
$query=mysqli_query($con,"select * from executive where id='$executiveid'");
while($result=mysqli_fetch_array($query)){
?>  

<h1 class="mt-4" align="center"><?php echo $result['username'];?>'s Profile</h1>
   <?php } ?>  

<div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Employees</h1>
                        
                            <a class="bt" href="logout.php">logout</a>
                        <br /><br />
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Employees Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
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
                                  <th>Option1</th>
                                  <th>Option2</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                              <!-- retrieves all records from the 'users' table -->
                                              <?php $ret=mysqli_query($con,"select * from users");
                              $cnt=1;
                              //the mysqli_fetch_array() function to fetch each row of data returned by the query and store it in the $row variable.
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
                                  <td><a href="assignwork.php?id=<?php echo $row['id']; ?>">Asign for Work</a></td>
                                  <td><a href="userview.php?uid=<?php echo $row['id'];?>">View</a></td>
                                  </td>
                                  
                              </tr>
                              <?php $cnt=$cnt+1; }?>

                                      </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php
if (isset($_GET['search_query'])) {
    $search_query = $_GET['search_query'];

    // Search for employees matching the search query
    $sql = "SELECT * FROM users WHERE idno LIKE '%$search_query%'";
    $result = $con->query($sql);

    // If at least one employee is found, display their details
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           
            echo "<b>Name</b>: " . $row["fname"] . "<br>";
            echo "<b>NIC</b>: " . $row["idno"] . "<br>";
            echo "<b>Email</b>: " . $row["email"] . "<br><br>";
        }
    } else {
        echo "No employees found who has this NIC number.";
    }
}
        ?>

<a class="bt" href="leaveapplications.php">View Leave Requests</a>
    </body>
</html>
