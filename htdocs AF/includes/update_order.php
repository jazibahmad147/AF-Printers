<?php

$servername="localhost";
$serveruser="root";
$dbname="project_af";
$con = mysqli_connect($servername, $serveruser, '');
// Selection of database.
mysqli_select_db($con, $dbname);

if(isset($_POST['update'])){
    
    $order_id = $_POST['order_id'];
    $old_order_date = $_POST['old_order_date'];
    $new_order_date = $_POST['new_order_date'];
    $cust_name = $_POST['cust_name'];
    $sub_total = $_POST['sub_total'];
    $gst = $_POST['gst'];
    $discount = $_POST['discount'];
    $old_balance = $_POST['old_balance'];
    $new_net_total = $_POST['net_total'];
    $old_net_total = $_POST['old_net_total'];
    $paid = $_POST['paid'];
    $due = $_POST['due'];
    $payment_type = $_POST['payment_type'];
    $order_status = $_POST['order_status'];

    // Now getting array from order_form
    $ar_qty = $_POST["qty"];
    $ar_price = $_POST["price"];
    $ar_amt = $_POST["amt"];
    $ar_pro_name = $_POST["pro_name"];
    $ar_cat_name = $_POST["cat_name"];
    $ar_servive_detail = $_POST["description"];

    // Formulas
    $compare_net_total = $new_net_total - $old_net_total;
    $new_client_balance = $compare_net_total + $old_balance;

    // update client balance 
    $update_client_balance_query = "UPDATE `clients` SET `balance`='$new_client_balance' WHERE company_name='$cust_name'";
    mysqli_query($con, $update_client_balance_query);

    // update invoice 
    $update_invoice_query = "UPDATE `invoice` SET `order_date`='$new_order_date',`sub_total`='$sub_total',`gst`='$gst',`discount`='$discount',`old_balance`='$old_balance',`net_total`='$new_net_total',`due`='$due',`payment_type`='$payment_type',`update_date`='$old_order_date',`order_status`='$order_status' WHERE invoice_no='$order_id'";
    mysqli_query($con, $update_invoice_query);
    
    // update invoice detail 
    $delete="DELETE FROM `invoice_details` WHERE invoice_no='$order_id'";
    mysqli_query($con, $delete);
    
    for ($i=0; $i < count($ar_qty); $i++){
        
        $update_invoice_detail_query = "INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `product_description`, `category_name`, `price`, `qty`) 
        VALUES ('$order_id','$ar_pro_name[$i]','$ar_servive_detail[$i]','$ar_cat_name[$i]','$ar_price[$i]','$ar_qty[$i]')";
        // $update_invoice_detail_query = "UPDATE `invoice_details` SET `product_name`='$ar_pro_name[$i]',`product_description`='$ar_servive_detail[$i]',`category_name`='$ar_cat_name[$i]',`price`='$ar_price[$i]',`qty`='$ar_qty[$i]' WHERE invoice_no='$order_id' AND product_name='$ar_pro_name[$i]'";
        mysqli_query($con, $update_invoice_detail_query);
    }

    header('location:../manage_orders.php');


}

?>