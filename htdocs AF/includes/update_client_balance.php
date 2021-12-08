<?php

    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);



// To Update Client Balance
if (isset($_POST["add_balance"])) {
    
    $comp = $_POST['cust_name'];
    $invoice_no = $_POST['invoice_no'];
    $oldBalance = 0;
    // Checking users name recurring.
    $check = "select * from clients where company_name = '$comp'";
    $result = mysqli_query($con, $check);
    $num = mysqli_num_rows($result);

    // checking Invoice Number 
    $checkInvoice = "select * from invoice where invoice_no = '$invoice_no'";
    $resultInvoice = mysqli_query($con, $checkInvoice);
    $numInvoice = mysqli_num_rows($resultInvoice);

    // Serach Old Balance of Client 
    $sql =  "SELECT * FROM clients";
    $result2 = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $oldBalance  = $row['balance'];
    }

    // Serach paid Amount of order 
    $sql2 =  "SELECT * FROM invoice";
    $result3 = mysqli_query($con, $sql2);
    while($row2 = mysqli_fetch_assoc($result3)) {
        $oldPaid  = $row2['paid'];
        $oldDue = $row2['due'];
    }

    $balance =$oldBalance - $_POST['amount'];
    $paid = $oldPaid + $_POST['amount'];
    $due = $oldDue - $_POST['amount'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    if($num == 1 && $numInvoice == 1){

        $query = "UPDATE `clients` SET `balance`='$balance' WHERE company_name='$comp'";
        $query2 = "INSERT INTO `payment`(`company_name`, `payment`, `date`, `order_no`) VALUES ('$comp','$amount','$date', '$invoice_no')";
        $query3 = "UPDATE `invoice` SET `paid`='$paid', `due`='$due' Where invoice_no='$invoice_no'";
        mysqli_query($con, $query);
        mysqli_query($con, $query2);
        mysqli_query($con, $query3);
        echo "<script>alert('Update Successful');</script>";
        header('location:../dashboard.php');
        // exit();

    }else{
        echo "Invoice Number is Incorrect Or Company Not Found...";
        echo "<br>";
        echo "<a href='../dashboard.php' class='btn btn-primary'>Go Back</a>";
        // header('location:admin-home.php');
    }


}

?>