<?php

    // require_once 'core.php';
    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);

    // $orderId = $_POST['orderId'];
    $orderId = $_GET['orderId'];

    // Picking company name and net total from invoice
    $sql1 = "SELECT `invoice_no`, `company_name`, `order_date`, `sub_total`, `gst`, `discount`, `old_balance`, `net_total`, `paid`, `due`, `payment_type` FROM `invoice` WHERE invoice_no = '$orderId'";
    $Result = $con->query($sql1);
    $result_row = $Result->fetch_array();

    $comp_name = $result_row[1];
    $net_total = $result_row[7];

    // picking balance from cient table
    $sql2 = "SELECT `cid`, `company_name`, `client_name`, `contact_number`, `status`, `balance` FROM `clients` WHERE company_name = '$comp_name'";
    $row = $con->query($sql2);
    $result_row2 = $row->fetch_array();

    $old_balance = $result_row2[5];
    // new client balance 
    $new_client_balance = $net_total - $old_balance;

    // update client balance 
    $update_client_balance = "UPDATE `clients` SET `balance` = '$new_client_balance' WHERE company_name = '$comp_name'";
    $con->query($update_client_balance);

    // Delete invoice Detail
    $delete_invoice_detail_item = "DELETE FROM `invoice_details` WHERE invoice_no = '$orderId'";
    $con->query($delete_invoice_detail_item);

    // Delete invoice 
    $delete_invoice = "DELETE FROM `invoice` WHERE invoice_no = '$orderId'";
    $con->query($delete_invoice);



    header('location:../manage_orders.php');


?>