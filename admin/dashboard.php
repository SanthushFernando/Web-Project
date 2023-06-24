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
        <title>Admin Dashboard</title>
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
            <main>
                    <h1>Dashboard</h1>
                        
<?php


$query=mysqli_query($con,"select id from users");                  
$totalusers=mysqli_num_rows($query);
//result is stored in the $totalusers variable
?>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="bt">Total Registered Users 
                                        <span style="font-size:22px;"> <?php echo $totalusers;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="bt" href="manage-users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </main>
    </body>
</html>
<?php } ?>
