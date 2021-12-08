<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/");
}
?>

<?php

    include_once("database/connection.php");

    $employeeId = $_GET['employeeId'];

    $query = "SELECT `date`, `name`, `status`, `extra_hours`, `bonus` FROM `attendance` WHERE id = '$employeeId'";
    $Result = $con->query($query);
    $result_row = $Result->fetch_array();

    $date = $result_row[0];
    $name = $result_row[1];
    $status = $result_row[2];
    $extra_hours = $result_row[3];
    $bonus = $result_row[4];

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
                            <form action="includes/update_attendance.php" method="post">
                            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employeeId ?>" required><br><br>
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" value="<?php echo $date; ?>" readonly>
                                <small style="color:red;">You are not able to change Date.</small><br><br>
                                <label for="employee_name">Employee Name</label>
                                <input type="text" name="employee_name" id="employee_name" value="<?php echo $name; ?>" readonly>
                                <small style="color:red;">You are not able to change Employee Name.</small><br><br>
                                <label for="employee_status">Status</label>
                                <select name="employee_status" id="employee_status" style="width:100%; height:30px;" required>
                                    <option>Present</option>
                                    <option>Half-Day</option>
                                    <option>Application</option>
                                    <option>Absent</option>
                                </select>
                                <small style="color:green;">You are able to change Status.</small>
                                <br><br>
                                <label for="employee_extra_hour">Extra Hours</label>
                                <input type="number" name="employee_extra_hour" id="employee_extra_hour" value="<?php echo $extra_hours; ?>">
                                <small style="color:green;">You are able to change Extra Hours.</small><br><br>
                                <label for="employee_bonus">Bonus</label>
                                <input type="number" name="employee_bonus" id="employee_bonus" value="<?php echo $bonus; ?>">
                                <small style="color:green;">You are able to change Bonus.</small><br><br>

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
