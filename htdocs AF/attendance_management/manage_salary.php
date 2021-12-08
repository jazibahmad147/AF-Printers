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
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="./js/main.js"></script> -->
    <link rel="stylesheet" href="css/dataTable.css">
</head>
<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
<br>
<h2>Salary Management</h2>
<p style="text-align:center;"><b><?php echo $_POST['month']; ?></b></p>
    
    <div class="table_container" style="">
    <table class="table" id="order_data">
            <thead>
                <!-- <tr> -->
                <th>#</th>
                <th>Employee Name</th>
                <th>Basic Salary (Pkr)</th>
                <th>Presents</th>
                <th>Half Days</th>
                <th>Applications</th>
                <th>Absents</th>
                <th>Bonus (Pkr)</th>
                <th>Over Time (hrs)</th>
                <th>Net Salary</th>
                <!-- <th>Action</th> -->
            </thead>
            <tbody>

                <?php 
                if(isset($_POST["select"])){

                    $month = $_POST['month'];
                    $year = $_POST['year'];
                
                    if($month == "JANUARY"){
                        $month = 1;
                    }
                    if($month == "FEBURARY"){
                        $month = 2;
                    }
                    if($month == "MARCH"){
                        $month = 3;
                    }
                    if($month == "APRAIL"){
                        $month = 4;
                    }
                    if($month == "MAY"){
                        $month = 5;
                    }
                    if($month == "JUNE"){
                        $month = 6;
                    }
                    if($month == "JULY"){
                        $month = 7;
                    }
                    if($month == "AUGUST"){
                        $month = 8;
                    }
                    if($month == "SEPTEMBER"){
                        $month = 9;
                    }
                    if($month == "OCTOBER"){
                        $month = 10;
                    }
                    if($month == "NOVEMBER"){
                        $month = 11;
                    }
                    if($month == "DECEMBER"){
                        $month = 12;
                    }
                    
                
                }
                include_once("database/connection.php");
                $query = mysqli_query($con,"SELECT * FROM employee");
                $x = 1;
                while($row = mysqli_fetch_array($query)){
                    // $employeeId = $row['id'];
                    $name = $row['name'];

                    // Count Presents 
                    $PresentCount = mysqli_query($con,"SELECT COUNT(*) as present FROM attendance WHERE MONTH(date)= '$month' AND YEAR(date)= '$year' AND name='$name' AND status='Present'");
                    $Presents_data=mysqli_fetch_assoc($PresentCount);
                    // Count Half Days 
                    $halfDayCount = mysqli_query($con,"SELECT COUNT(*) as half_days FROM attendance WHERE MONTH(date)= '$month' AND YEAR(date)= '$year' AND name='$name' AND status='Half-Day'");
                    $half_days_data=mysqli_fetch_assoc($halfDayCount);
                    // Count Leaves
                    $applicationsCount = mysqli_query($con,"SELECT COUNT(*) as leaves FROM attendance WHERE MONTH(date)= '$month' AND YEAR(date)= '$year' AND name='$name' AND status='Application'");
                    $applications_data=mysqli_fetch_assoc($applicationsCount);
                    // Count Absents
                    $absentsCount = mysqli_query($con,"SELECT COUNT(*) as absents FROM attendance WHERE MONTH(date)= '$month' AND YEAR(date)= '$year' AND name='$name' AND status='Absent'");
                    $absents_data=mysqli_fetch_assoc($absentsCount);
                    // Count Bonus Amount
                    $bonusCount = mysqli_query($con,"SELECT SUM(bonus) AS bonus FROM attendance WHERE MONTH(date)= '$month' AND YEAR(date)= '$year' AND name='$name'");
                    $bonus_data=mysqli_fetch_assoc($bonusCount);
                    // Count Over Time
                    $overTimeCount = mysqli_query($con,"SELECT SUM(extra_hours) AS extra_time FROM attendance WHERE MONTH(date)= '$month' AND YEAR(date)= '$year' AND name='$name'");
                    $over_time_data=mysqli_fetch_assoc($overTimeCount);
                    
                    // Variables
                    $basic_salary = $row['salary'];
                    $working_hours = $row['working_hours'];
                    $presents = $Presents_data['present'];
                    $half_days = $half_days_data['half_days'];
                    $applications = $applications_data['leaves'];
                    $absents = $absents_data['absents'];
                    $bonus = $bonus_data['bonus'];
                    $over_time = $over_time_data['extra_time'];
                    $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                    // Formulas
                    $half_days_hours = ($working_hours / 2);
                    $count_half_days = ($half_days * $half_days_hours);
                    $salary_of_per_day = ($basic_salary / $days_in_month);
                    $salary_of_per_hour = ($salary_of_per_day / $working_hours);

                    // Net Salary Formula...
                    $net_total = ($salary_of_per_day * $presents) + ($salary_of_per_hour * $count_half_days) + ($salary_of_per_day * $applications) - ($salary_of_per_day * $absents) + ($salary_of_per_hour * $over_time) + $bonus;

                    echo "<tr>
                        <td>".$x."</td>
                        <td>".$row['name']."</td>  
                        <td>".$row['salary']."</td>  
                        <td>".$Presents_data['present']."</td>
                        <td>".$half_days_data['half_days']."</td>
                        <td>".$applications_data['leaves']."</td>
                        <td>".$absents_data['absents']."</td>
                        <td>".$bonus_data['bonus']."</td>
                        <td>".$over_time_data['extra_time']."</td>
                        <td>".$net_total."</td>
                    </tr>";

                    $x++;
                }

            ?>

            </tbody>
        </table>
        </div>

        <script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- show datatable from database -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#order_data').DataTable();
    });
    </script>

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
