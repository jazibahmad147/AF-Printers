<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AF Printers</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="./js/main.js"></script> -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <?php include_once("./includes/process.php"); ?>
<br><br>
    
    <p></p>
    <p></p>
    <!-- <div class="dashboard"> -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header border-success"><li class="icon fa fa-users">&nbsp;</li>Registered Employee</div>
                            <div class="card-body">
                                <h1 class="card-title"><?php echo $employees; ?></h1>
                            </div>
                        <div class="card-footer bg-transparent border-success"><a href="manage_employee.php">More Info</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header border-success"><li class="icon fa fa-users">&nbsp;</li>Presents Today</div>
                            <div class="card-body">
                                <h1 class="card-title"><?php echo $presents; ?></h1>
                            </div>
                        <div class="card-footer bg-transparent border-success"><a href="attendance.php">More Info</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header border-success"><li class="icon fa fa-users">&nbsp;</li>Absents Today</div>
                            <div class="card-body">
                                <h1 class="card-title"><?php echo $absents; ?></h1>
                            </div>
                        <div class="card-footer bg-transparent border-success"><a href="attendance.php">More Info</a></div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->


    <?php
        // Select Attendance Month and Year
        include_once("templates/attendance_month_selection.php");
    ?>
    <?php
        // Select Attendance Month and Year For Report
        include_once("templates/attendance_report_month_selection.php");
    ?>
    <?php
        // Select Salary Month and Year
        include_once("templates/salary_month_selection.php");
    ?>
    
</body>
</html>
