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
<h2>Emplyee Management</h2>
    
    <div class="table_container" style="">
    <table class="table" id="order_data">
            <thead>
                <!-- <tr> -->
                <th>#</th>
                <th>Employee Name</th>
                <th>Employee Email</th>
                <th>Employee Contact Number</th>
                <th>Employee Salary</th>
                <th>Action</th>
            </thead>
            <tbody>

                <?php 
            $x = 1;
                include_once("database/connection.php");
                $query = mysqli_query($con,"SELECT * FROM employee ORDER BY id DESC");
                while($row = mysqli_fetch_array($query)){
                    $employeeId = $row['id'];
                    $button = '
                    <div>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
                        Action 
                      </button>
                      <ul class="dropdown-menu">
                        
                        <li><a href="edit_employee.php?&employeeId='.$employeeId.'" type="button" name="orderId" class="dropdown-item"> <i class="fa fa-print"></i> Edit </a></li> 

                        <li><a href="includes/delete_employee.php?&employeeId='.$employeeId.'" type="button" name="orderId" class="dropdown-item"> <i class="fa fa-trash"></i> Delete </a></li> 

                          
                      </ul>
                    </div>
                    ';
                    echo "<tr>
                        <td>".$x."</td>
                        <td>".$row['name']."</td>  
                        <td>".$row['email']."</td>
                        <td>".$row['number']."</td>
                        <td>".$row['salary']."</td>
                        <td>".$button."</td>  
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
<!-- 
    <script type="text/javascript">
        // Delete EmployeeId Function 
        function deleteEmployee(employeeId = null) {
            if (employeeId) {

                $.ajax({
                    url: 'includes/delete_order.php',
                    type: 'post',
                    data: { employeeId: employeeId },
                    dataType: 'text',
                    success: function(response) {
                        console.log(response);

                        }, // /success function
                        error: function(e){
                            console.log(e);
                        }
                }); // /ajax function to fetch the order
            } // /if employeeId
        } // Delete function
    </script> -->

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
