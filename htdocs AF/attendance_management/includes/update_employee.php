<?php

    include_once("../database/connection.php");

    // To Update Client Balance
    if (isset($_POST["update"])) {
        
        $employeeId = $_POST['employee_id'];
        $name = $_POST['employee_name'];
        $email = $_POST['employee_email'];
        $number = $_POST['employee_number'];
        $salary = $_POST['employee_salary'];

        $query = "UPDATE `employee` SET `email`='$email',`number`='$number',`salary`='$salary' WHERE id = '$employeeId'";
        mysqli_query($con, $query);
        $update_salary_table = "UPDATE `salary` SET `basic_salary`='$salary' WHERE name='$name'";
        mysqli_query($con,$update_salary_table);
        header('location:../manage_employee.php');

}

?>