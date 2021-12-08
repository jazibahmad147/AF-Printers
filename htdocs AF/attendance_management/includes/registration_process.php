<?php

    include_once("../database/connection.php");


    if ($_POST) {
        
        $name = $_POST['employee_name'];
        $email = $_POST['employee_email'];
        $number = $_POST['employee_number'];
        $salary = $_POST['employee_salary'];
        $working_hours = $_POST['working_hours'];

        // Checking users name recurring.
        
        $check = "select * from employee where email = '$email'";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        if($num == 1){

            $valid['success'] = false;
            $valid['messages'] = "Employee Already Registered!";

        }else{

            $query = "INSERT INTO `employee`(`name`, `email`, `number`, `salary`, `working_hours`) VALUES ('$name', '$email', '$number', '$salary', '$working_hours')";
            // mysqli_query($con, $query);
            if($con->query($query) === TRUE){
                $valid['success'] = true;
                $valid['messages'] = "Employee Registered Successfully!";
            }else {
                $valid['success'] = false;
                $valid['messages'] = "Not Registered";
            }
            
        }

    $con->close();
    echo json_encode($valid);

}

