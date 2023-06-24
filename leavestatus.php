<?php session_start();
include_once('includes/config.php');


$empid = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM `leave` WHERE emp_id='$empid'");
while($result=mysqli_fetch_array($query))
{?>
            
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/styles.css" rel="stylesheet" />
            <title>leave application</title>
        </head>
        <body>
        <h1 align="center">Leave Applications</h1><hr>
            
               
            <table>
             <tbody>
             <tr>
            <th class="rc">Leave ID</th>
            <td colspan="3"><?php echo $result['leaveid'];?></td>
           </tr>
            <tr>
            <th class="rc">Leave Type</th>
            <td colspan="3"><?php echo $result['leavetype'];?></td>
           </tr>
           <tr>
           <th class="rc">Reason</th>
          <td colspan="3"><?php echo $result['reason'];?></td>
         </tr>
         <tr>
          <th class="rc">Start date</th>
        <td colspan="3"><?php echo $result['startdate'];?></td>
        </tr>
         <tr>
         <th class="rc">End date</th>
         <td colspan="3"><?php echo $result['enddate'];?></td>
                                </tr>
                                <tr>
         <th class="rc">Permission</th>
         <td colspan="3"><?php echo $result['permission'];?></td>
                                </tr>
                                
                                 </tbody>
                             </table>
                            </body>
        </html>
        <?php
        }
        ?>
               
            
 