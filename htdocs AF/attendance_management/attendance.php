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
    <script src="main.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
<br><br>
    <?php
    
    include_once("database/connection.php");

    $query = "SELECT * FROM `employee`";
    $result = mysqli_query($con,$query);
    
    ?>
    <p></p>
    <p></p>
        <div class="container">
            <div class="row">
                    <div class="card border-success" style="width: 30rem; background-color: #0000ff0d;">
                        <div class="card-header border-success"><li class="icon fa fa-calendar-alt">&nbsp;</li>Attendance</div>
                            <div class="card-body">
                            <form id="employee_attendance" action="includes/attendance_submition.php" method="post">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" required><br><br>
                                <label for="employee_name">Employee Name</label>
                                <select name="employee_name" id="employee_names" style="width:100%; height:30px;">
                                    <?php while($row = mysqli_fetch_array($result)):; ?>
                                    <option><?php echo $row['name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <br><br>
                                <label for="employee_status">Status</label>
                                <select name="employee_status" id="employee_status" style="width:100%; height:30px;" required>
                                    <option>Present</option>
                                  <option>Half-Day</option>
                                    <option>Application</option>
                                    <option>Absent</option>
                                </select>
                                <br><br>
                                <label for="employee_extra_hour">Extra Hours</label>
                                <input type="number" name="employee_extra_hour" id="employee_extra_hour" placeholder="Type hours if any extra"><br><br>
                                <label for="employee_bonus">Bonus</label>
                                <input type="number" name="employee_bonus" id="employee_bonus" placeholder="Any bonus amount"><br><br>

                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </form>
                            </div>
                        <!-- <div class="card-footer bg-transparent border-success"><input type="submit" value="Register" class="btn btn-primary"></div> -->
                </div>
            </div>
        </div>

        <script src="js/employee_attendance.js"></script>

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
