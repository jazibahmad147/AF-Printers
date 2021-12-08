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
<br><br>
    
    <p></p>
    <p></p>
        <div class="container">
            <div class="row">
                    <div class="card border-success" style="width: 30rem; background-color: #0000ff0d;">
                        <div class="card-header border-success"><li class="icon fa fa-users">&nbsp;</li>Registere Employee</div>
                            <div class="card-body">
                            <!-- <form action="includes/registration_process.php" id="employee_register" method="post"> -->
                            <form id="employee_register" action="includes/registration_process.php"  method="POST">
                                <label for="employee_name">Employee Name</label>
                                <input type="text" name="employee_name" id="employee_name" placeholder="Enter Employee Name" required><br><br>
                                <label for="employee_email">Employee Email</label>
                                <input type="text" name="employee_email" id="employee_email" placeholder="Enter Employee Contact Email" required><br><br>
                                <label for="employee_number">Contact Number</label>
                                <input type="text" name="employee_number" id="employee_number" placeholder="Enter Employee Contact Number"><br><br>
                                <label for="employee_salary">Employee Salary</label>
                                <input type="text" name="employee_salary" id="employee_salary" placeholder="Enter Employee salary Per Month" required><br><br>
                                <label for="working_hours">Working Hours</label>
                                <input type="text" name="working_hours" id="working_hours" placeholder="Enter Employee Working Hours Per Day" required><br><br>
                                
                                <input type="submit" name="register" id="employee_registerBtn" value="Register" class="btn btn-primary">
                            </form>
                            </div>
                        <!-- <div class="card-footer bg-transparent border-success"><input type="submit" value="Register" class="btn btn-primary"></div> -->
                </div>
            </div>
        </div>

        <script src="js/employee_register.js"></script>

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
