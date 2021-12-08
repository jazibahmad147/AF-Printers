<?php

    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);



// To Update Client Balance
if (isset($_POST["add_expense"])) {
    
    $date = $_POST['date'];
    $expense = $_POST['expense'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    $query= "INSERT INTO `expenses`(`date`, `expense`, `description`, `amount`) VALUES ('$date','$expense','$description','$amount')";
    mysqli_query($con, $query);
    echo "<script>alert('Insert Successful');</script>";
    header('location:../dashboard.php');
        
}

?>