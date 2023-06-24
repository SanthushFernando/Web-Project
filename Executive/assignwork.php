<?php session_start(); 
include_once('includes/config.php');



$exe_id=$_SESSION['executiveid'];
$id=$_GET['id'];
if (isset($_POST['Assign'])) {
	
    $task_type = $_POST['task_type'];
	$task_priority = $_POST['task_priority'];
	$due_date = $_POST['due_date'];
    
    
	
	$query = "INSERT INTO tasks ( user_id,exe_id,task_type, task_priority, due_date) VALUES ( '$id','$exe_id','$task_type', '$task_priority', '$due_date')";
	$result = mysqli_query($con, $query);

	
	if ($result) {
		echo "<script>alert('Task Assigned successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'ExeDashboard.php'; </script>";
	} else {
        echo "<script>alert('cannot assign for a task');</script>" .mysqli_error($con);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign for Work</title>
</head>
<body>
    <center>
    <h1>Assign Tasks</h1>
	<form action="" method="post">
		<label for="task_type">Task type:</label>
        <select name="task_type" id="task_type">
                  <option value="Sell product">Sell product</option>
                  <option value="Manufaturing">Manufaturing</option>
                  <option value="Product marketing">Product marketing</option>
                  <option value="Distribution">Distribution</option>
                  </select><br><br>
		<label for="Task priority">Task Priority</label>
        <select name="task_priority" id="task_priority">
                  <option value="High priority">High priority</option>
                  <option value="Medium priority">Medium priority</option>
                  <option value="Low priority">Low proirity</option>
                </select><br><br>
		<label for="due_date">Due Date:</label>
		<input type="date" id="due_date" name="due_date"><br><br>
        <div >
		<button class="btn btn-primary btn-block" name="Assign" type="submit">Assign</button>
</div>
	</form> 
    </center>

</body>
</html>