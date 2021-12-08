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
<h2>Attendance Management</h2>
<p style="text-align:center;"><b><?php echo $_POST['month']; ?></b></p>
    
    <div class="table_container" style="">
    <table class="table" id="order_data">
            <thead>
                <!-- <tr> -->
                <th>#</th>
                <th>Date</th>
                <th>Employee Name</th>
                <th>Employee Status</th>
                <th>Extra Hours</th>
                <th>Bonus (Pkr)</th>
                <th>Action</th>
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

            $x = 1;
                include_once("database/connection.php");
                $query = mysqli_query($con,"SELECT * FROM attendance WHERE MONTH(date)= '$month' AND YEAR(date)= '$year'");
                while($row = mysqli_fetch_array($query)){
                    $employeeId = $row['id'];
                    $button = '
                    <a href="edit_employee_attendance.php?&employeeId='.$employeeId.'" type="button" name="orderId" class="dropdown-item"> <i class="fa fa-print"></i> Edit </a>  
                    ';
                    echo "<tr>
                        <td>".$x."</td>
                        <td>".$row['date']."</td>  
                        <td>".$row['name']."</td>
                        <td>".$row['status']."</td>
                        <td>".$row['extra_hours']."</td>
                        <td>".$row['bonus']."</td>
                        <td style='text-align:center; width:100px'>".$button."</td>  
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
