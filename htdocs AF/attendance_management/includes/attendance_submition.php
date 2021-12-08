<?php

    include_once("../database/connection.php");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    // To Update Client Balance
    if ($_POST) {
        
        $date = $_POST['date'];
        $name = $_POST['employee_name'];
        $status = $_POST['employee_status'];
        $hours = $_POST['employee_extra_hour'];
        $bonus = $_POST['employee_bonus'];

        // Checking users name recurring.
        $check = "select * from employee where name = '$name'";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        // Count Presents, overtime and bonus
        $count_presents = "SELECT `total_presents`, `total_half_days`, `total_applications`, `total_absents`, `total_bonus`, `total_over_time`, `status` FROM `salary` WHERE name='$name'";
        $countResult = $con->query($count_presents);
        $countData = $countResult->fetch_array();
        // Variables 
        $countedPresents = $countData[0];
        $countedHalfDays = $countData[1];
        $countedApplications = $countData[2];
        $countedAbsents = $countData[3];
        $countedBonus = $countData[4];
        $countedOverTime = $countData[5];

        if($num == 1){
            

            $query = "INSERT INTO `attendance`(`date`, `name`, `status`, `extra_hours`, `bonus`) VALUES ('$date', '$name', '$status', '$hours', '$bonus')";
            mysqli_query($con, $query);
            // Presents 
            if($status == "Present"){
                $newPresents = $countedPresents + 1;
                $update_presents_in_salary_table = "UPDATE `salary` SET `total_presents`='$newPresents' WHERE name='$name'";
                mysqli_query($con,$update_presents_in_salary_table);
            }
            // Half-Days 
            if($status == "Half-Day"){
                $newHalfDays = $countedHalfDays + 1;
                $update_half_days_in_salary_table = "UPDATE `salary` SET `total_half_days`='$newHalfDays' WHERE name='$name'";
                mysqli_query($con,$update_half_days_in_salary_table);
            }
            // Applications 
            if($status == "Application"){
                $newApplications = $countedApplications + 1;
                $update_application_in_salary_table = "UPDATE `salary` SET `total_applications`='$newApplications' WHERE name='$name'";
                mysqli_query($con,$update_application_in_salary_table);
            }
            // Absents 
            if($status == "Absent"){
                $newAbsents = $countedAbsents + 1;
                $update_absent_in_salary_table = "UPDATE `salary` SET `total_absents`='$newAbsents' WHERE name='$name'";
                mysqli_query($con,$update_absent_in_salary_table);
            }
            // Bonus 
            if($bonus != 0){
                $newBonus = $countedBonus + $bonus;
                $update_bonus_in_salary_table = "UPDATE `salary` SET `total_bonus`='$newBonus' WHERE name='$name'";
                mysqli_query($con,$update_bonus_in_salary_table);
            }
            // Hours 
            if($hours != 0){
                $newOverTime = $countedOverTime + $hours;
                $update_over_time_in_salary_table = "UPDATE `salary` SET `total_over_time`='$newOverTime' WHERE name='$name'";
                mysqli_query($con,$update_over_time_in_salary_table);
            }

            $valid['success'] = true;
            $valid['messages'] = "Successfully Attendance Submited!";
            // header('location:../attendance.php');

        }else{
            $valid['success'] = false;
            $valid['messages'] = "Employee Not Exist!";
            // echo "Employee Not Exist";
            // echo "<br><br><a href='../employee_register.php'>Register Employee</a>";

            
        }

        
    $con->close();
    echo json_encode($valid);


}
