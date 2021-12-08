<?php

    include_once("../database/connection.php");

    // To Update Client Balance
    if (isset($_POST["update"])) {
        
        $employeeId = $_POST['employee_id'];
        $date = $_POST['date'];
        $name = $_POST['employee_name'];
        $status = $_POST['employee_status'];
        $hours = $_POST['employee_extra_hour'];
        $bonus = $_POST['employee_bonus'];

        $query = "UPDATE `attendance` SET `status`='$status',`extra_hours`='$hours',`bonus`='$bonus' WHERE id = '$employeeId'";
        mysqli_query($con, $query);
        header('location:../manage_attendance.php');

}

?>