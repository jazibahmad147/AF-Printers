<?php

    include_once("../database/connection.php");

    $employeeId = $_GET['employeeId'];

    $query = "DELETE FROM `employee` WHERE id = '$employeeId'";
    mysqli_query($con, $query);
    header('location:../manage_employee.php');

?>