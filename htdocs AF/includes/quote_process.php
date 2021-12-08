<?php

include_once("../database/constants.php");
include_once("user.php");
include_once("client.php");
include_once("DBOperation.php");
include_once("manage_quote.php");


// Quote Process
if(isset($_POST["getNewQuoteItem"])){
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("products");
    $obj2 = new DBOperation();
    $catRows = $obj2->getAllRecord("categories");
    ?>

    <tr>
        <td><b class="number">1</b></td>
        <td>
            <select name="pro_name[]" class="form-control form-control-sm pro_name" id="pro_name">
            <option value="">Choose Service</option>
                <?php foreach ($rows as $row) {
                    ?><option value="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></option><?php
                } 
                ?>
            </select>
        </td>
        <td><input name="detail[]" type="text" class="form-control form-control-sm detail" id="detail"></td>
        <td>
            <select name="cat_name[]" class="form-control form-control-sm cat_name" id="cat_name">
            <option value="">Choose Category</option>
                <?php foreach ($catRows as $row) {
                    ?><option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option><?php
                } 
                ?>
            </select>
        </td>
        <!-- <td><input name="cat_name[]" type="text" class="form-control form-control-sm cat_name" id="cat_name" required></td> -->
        <td><input name="qty[]" type="text" class="form-control form-control-sm qty" id="qty" ></td>
        <td><input name="price[]" type="text" class="form-control form-control-sm price" id="price" ></td>
        <td><input name="amt[]" type="text" class="form-control form-control-sm amt" id="amt" readonly></td>
        <!-- <td><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td> -->
        <!-- <td><input name="cat_name[]" type="hidden" class="form-control form-control-sm cat_name"></td> -->
        <!-- <td>Rs.<span class="amt">0</span></td> -->
    </tr>

    <?php
    exit();
}

// Calculating price and quantity of single item
if(isset($_POST["getPriceAndQty"])){
    $m = new Manage();
    $result = $m->getSingleRecord("products","pid",$_POST["id"]);
    echo json_encode($result);
    exit();
}

// Quote storing
if(isset($_POST["quote_date"]) AND isset($_POST["cust_name"])){

    $quotedate = $_POST["quote_date"];
    $cust_name = $_POST["cust_name"];

    // Now getting array from order_form
    $ar_qty = $_POST["qty"];
    $ar_price = $_POST["price"];
    $ar_amt = $_POST["amt"];
    $ar_pro_name = $_POST["pro_name"];
    $ar_cat_name = $_POST["cat_name"];
    $ar_servive_detail = $_POST["detail"];
    
    $sub_total = $_POST["sub_total"];
    $gst = $_POST["gst"];
    $discount = $_POST["discount"];
    // $old_balance = $_POST["old_balance"];
    $net_total = $_POST["net_total"];
    // $paid = $_POST["paid"];
    // $due = $_POST["due"];
    // $payment_type = $_POST["payment_type"];


    $q = new QuoteManage();
    echo $result = $q->storeCustomerQuoteInvoice($quotedate,$cust_name,$ar_qty,$ar_price,$ar_amt,$ar_pro_name,$ar_servive_detail,$ar_cat_name,$sub_total,$gst,$discount,$net_total);
    // echo $result = $m->storeCustomerQuoteInvoice($quotedate,$cust_name,$ar_qty,$ar_price,$ar_amt,$ar_pro_name,$ar_cat_name,$sub_total,$gst,$discount,$old_balance,$net_total,$paid,$due,$payment_type);
    
    
}

?>