<?php session_start();
include_once('includes/config.php');


  $emp_id = $_SESSION['id'];
  
  if(isset($_POST['Apply']))
  {
    $reason = $_POST['reason'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $leavetype=$_POST['leavetype'];
    $permission = "Pending";
  

    $result = mysqli_query($con, "INSERT INTO `leave` (emp_id, reason, startdate, enddate, leavetype, permission) VALUES ('$emp_id', '$reason', '$startdate', '$enddate', '$leavetype', '$permission')");

    

	if ($result) {
		echo "<script>alert('leave request submitted successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'welcome.php'; </script>";
	} else {
        echo "<script>alert('request failed');</script>" .mysqli_error($con);
	}
    
  }
?>
               
               <h1 align="center">Apply Leave</h1><hr>
               <center>
               <form action="" method="post">
					    <label>Leave type</label>
					    <select id="leavetype" name="leavetype" title="Select Leave" required="">
              <option value="Sick leave">Sick leave</option>
                  <option value="casual leave">casual leave</option>
                  <option value="Privilege leave">Privilege leave</option>
                  <option value="half-day leave">half-day leave</option>
					    </select><br><br>
					    <label for="reason">Reason</label>
					    <input type="text" id="reason" name="reason" placeholder="Reason" title="reason" required=""><br><br>
					    <label for="startdate">Start Date</label>
					    <input type="date" id="startDate" name="startdate"  placeholder="Start Date" title="startdate" required=""><br><br>
					    <label for="enddate">End Date</label>
					    <input type="date" id="endDate" name="enddate"  placeholder="End Date" title="enddate" required=""><br><br>
					    
					    <input type="submit" name="Apply" title="Submit" value="Submit">
				  	</form>
             
               </center>
             	

