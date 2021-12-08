<?php

    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);



// To Update Client Balance
if (isset($_POST["add_discount"])) {
    
    $comp = $_POST['cust_name'];
    $oldBalance = 0;
    // Checking users name recurring.
    $check = "select * from clients where company_name = '$comp'";
    $result = mysqli_query($con, $check);
    $num = mysqli_num_rows($result);

    $sql =  "SELECT * FROM clients";
    $result2 = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $oldBalance  = $row['balance'];
    }

    $balance =$oldBalance - $_POST['amount'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    if($num == 1){

        $query= "UPDATE `clients` SET `balance`='$balance' WHERE company_name='$comp'";
        $query2= "INSERT INTO `extra_discount`(`company_name`, `amount`, `date`) VALUES ('$comp','$amount','$date')";
        mysqli_query($con, $query);
        mysqli_query($con, $query2);
        echo "<script>alert('Update Successful');</script>";
        header('location:../dashboard.php');
        // exit();

    }else{
        echo "Company Not Found...";
        echo "<br>";
        echo "<a href='../dashboard.php' class='btn btn-primary'>Go Back</a>";
        // header('location:admin-home.php');
    }


}

?>