<?php

session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <title>View Tasks</title>
</head>
<body>
    <h1 align="center">Task Your Assigned</h1><hr><br><br>
   

<?php 
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from tasks where user_id='$userid'");

while($result=mysqli_fetch_array($query)){
$exeid=$result['exe_id'];
$query1=mysqli_query($con,"select * from executive where id='$exeid'");
$res=mysqli_fetch_array($query1);
{?>


<table class="table table-bordered">
    <tbody>
   <tr>
   <th class="rc">Executive</th>
<td colspan="3"><?php echo $res['username'];?></td>
 </tr>
    <tr>
 <th class="rc">Task type</th>
 <td colspan="3"><?php echo $result['task_type'];?></td>
</tr>
<tr>
<th class="rc">Task Priority</th>
<td colspan="3"><?php echo $result['task_priority'];?></td>
 </tr>
                                     
 <tr>
<th class="rc">Due Date</th>
<td colspan="3"><?php echo $result['due_date'];?></td>
                                   </tr>
                                   
                                    </tbody>
                                </table>
</body>
<?php 
} 
?>
</html>
<?php 
} 
?>