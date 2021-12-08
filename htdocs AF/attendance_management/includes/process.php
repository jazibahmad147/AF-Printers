<?php

    include_once("./database/connection.php");

    // $check = "select * from employee";
    $countEmployee = mysqli_query($con, "select * from employee");
    $employees = mysqli_num_rows($countEmployee);

    // Count Presents Today
    $date = date("Y-m-d");
    $status1 = "Present";
    $countPresents = mysqli_query($con, "select status from attendance where status='$status1' and date='$date'");
    $presents = mysqli_num_rows($countPresents);

    // Count Absents Today
    $status2 = "Absent";
    $countAbsents = mysqli_query($con, "select status from attendance where status='$status2' and date='$date'");
    $absents = mysqli_num_rows($countAbsents);

?>