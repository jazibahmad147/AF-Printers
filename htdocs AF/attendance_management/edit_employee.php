<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/");
}
?>

<?php

    include_once("database/connection.php");

    $employeeId = $_GET['employeeId'];

    $query = "SELECT `name`, `email`, `number`, `salary` FROM `employee` WHERE id = '$employeeId'";
    $Result = $con->query($query);
    $result_row = $Result->fetch_array();

    $name = $result_row[0];
    $email = $result_row[1];
    $number = $result_row[2];
    $salary = $result_row[3];

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
                    <div class="card border-success" style="width: 35rem;">
                        <div class="card-header border-success"><li class="icon fa fa-users">&nbsp;</li>Registere Employee</div>
                            <div class="card-body">
                            <form action="includes/update_employee.php" method="post">
                            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employeeId ?>" required><br><br>
                                <label for="employee_name">Employee Name</label>
                                <input type="text" name="employee_name" id="employee_name" value="<?php echo $name ?>" readonly>
                                <small style="color:red;">You are not able to change Employee Name</small><br><br>
                                <label for="employee_email">Employee Email</label>
                                <input type="text" name="employee_email" id="employee_email" value="<?php echo $email ?>">
                                <small style="color:green;">You are able to change Employee Email</small><br><br>
                                <label for="employee_number">Employee Number</label>
                                <input type="text" name="employee_number" id="employee_number" value="<?php echo $number ?>">
                                <small style="color:green;">You are able to change Employee Number</small><br><br>
                                <label for="employee_salary">Employee Salary</label>
                                <input type="text" name="employee_salary" id="employee_salary" value="<?php echo $salary ?>" required>
                                <small style="color:green;">You are able to change Employee Salary</small><br><br>
                                
                                <input type="submit" name="update" value="Update" class="btn btn-success">
                            </form>
                            </div>
                        <!-- <div class="card-footer bg-transparent border-success"><input type="submit" value="Register" class="btn btn-primary"></div> -->
                </div>
            </div>
        </div>
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
