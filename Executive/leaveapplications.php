<?php
session_start();
include_once('includes/config.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leave Applications</title>
    <link href="../css/styles.css" rel="stylesheet" />

</head>
<body>
    <h1 align="center">Leave Applications</h1><hr><br>
<a class="bt" href="ExeDashboard.php">Back to Dashboard</a><br><br><br>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM `leave`");
    while($result=mysqli_fetch_array($sql)){
    
    $empid=$result['emp_id'];
    $query=mysqli_query($con,"select * from users where id=$empid");
    while($result2=mysqli_fetch_array($query)){
    
    ?>
    

   
<table>
                                    <thead>
                                        <tr>
                                             <th>Name</th>
                                  <th>Department</th>
                                  <th>Email Address</th>
                                  <th>Leave ID</th>
                                  <th>Leave type</th>
                                  <th>Reason</th>
                                  <th>Start-date</th>
                                  <th>End-date</th>
                                  <th>Option 1</th>
                                  <th>Option2</th>
                                        </tr>
                                    </thead>
                                   
                                        <tbody>
                                            
                                              
                              <tr>
                              <td><?php echo $result2['fname'];?></td>
                                  <td><?php echo $result2['department'];?></td>
                                  <td><?php echo $result2['email'];?></td>
                                  <td><?php echo $result['leaveid'];?></td>
                                  <td><?php echo $result['leavetype'];?></td>
                                  <td><?php echo $result['reason'];?></td>
                                  <td><?php echo $result['startdate'];?></td>
                                  <td><?php echo $result['enddate'];?></td>
                                  <td><a  id="accept" href="accept.php?leaveid=<?php echo $result['leaveid'];?>">Accept</a></td>
                                  <td><a  id ="decline" href="decline.php?leaveid=<?php echo $result['leaveid'];?>">Decline</td>
                                </tr>
                   

                                      </tbody>
                                </table>
                                <br><br>
                       </body>
                      <?php
                      }
                    ?>
               </html>
<?php
}
?>