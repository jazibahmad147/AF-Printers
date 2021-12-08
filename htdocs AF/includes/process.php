<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("client.php");
include_once("DBOperation.php");
include_once("manage.php");

// For registration process
if(isset($_POST["username"]) AND isset($_POST["email"])){
    $user = new User();
    $result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"]);
    echo $result;
    exit();
}
// For Login Process
if(isset($_POST["log_email"]) AND isset($_POST["log_password"])){
    $user = new User();
    $result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
    echo $result;
    exit();
}
// To Get Category
if(isset($_POST["getCategory"])){
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("categories");
    foreach ($rows as $row) {
        echo "<option value='".$row["category_name"]."'>".$row["category_name"]."</option>";
    }
    exit();
}

// To Add Category
if (isset($_POST["category_name"])) {
    $obj = new DBOperation();
    $result = $obj->addCategory($_POST["category_name"]);
    echo $result;
    exit();
}

// To Add Product
if (isset($_POST["product_name"])) {
    $obj = new DBOperation();
    $result = $obj->addProduct($_POST["product_name"]);
    echo $result;
    exit();
}

// Add Clients
if(isset($_POST["company_name"]) AND isset($_POST["client_name"])){
    $client = new Client();
    $result = $client->addNewClient($_POST["company_name"],$_POST["client_name"],$_POST["contact_number"],$_POST["old_balance"]);
    echo $result;
    exit();
}



// Manage Category
if (isset($_POST["manageCategory"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("categories",$_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                    <td><a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a></td>
                </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"> <?php echo $pagination; ?> </td></tr>
        <?php
        exit();
    }
}

// Delete Category
if(isset($_POST["deleteCategory"])){
    $m = new Manage();
    $result = $m->deleteRecord("categories","cid",$_POST["id"]);
    echo $result;
}

// Manage Clients
if (isset($_POST["manageClient"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("clients",$_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $row["company_name"]; ?></td>
                    <td><?php echo $row["client_name"]; ?></td>
                    <td><?php echo $row["contact_number"]; ?></td>
                    <td><?php echo $row["balance"]; ?></td>
                    <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                    <td><a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_client">Delete</a></td>
                </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"> <?php echo $pagination; ?> </td></tr>
        <?php
        exit();
    }
}
// Delete Client
if(isset($_POST["deleteClient"])){
    $m = new Manage();
    $result = $m->deleteRecord("clients","cid",$_POST["id"]);
    echo $result;
}


// Manage Product
if (isset($_POST["manageProduct"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("products",$_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                    <td><a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a></td>
                </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"> <?php echo $pagination; ?> </td></tr>
        <?php
        exit();
    }
}

// Delete Product
if(isset($_POST["deleteProduct"])){
    $m = new Manage();
    $result = $m->deleteRecord("products","pid",$_POST["id"]);
    echo $result;
}

// Order Process
if(isset($_POST["getNewOrderItem"])){
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("products");
    $obj2 = new DBOperation();
    $catRows = $obj2->getAllRecord("categories");
    ?>

    <tr>
        <td><b class="number">1</b></td>
        <td>
            <select name="pid[]" class="form-control form-control-sm pid" required>
            <option value="">Choose Service</option>
                <?php foreach ($rows as $row) {
                    ?><option value="<?php echo $row['pid']; ?>"><?php echo $row['product_name']; ?></option><?php
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
        <td><input name="qty[]" type="text" class="form-control form-control-sm qty" id="qty"></td>
        <td><input name="price[]" type="text" class="form-control form-control-sm price" id="price"></td>
        <td><input name="amt[]" type="text" class="form-control form-control-sm amt" id="amt" readonly></td>
        <td><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
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

// Order storing
if(isset($_POST["order_date"]) AND isset($_POST["cust_name"])){

    $orderdate = $_POST["order_date"];
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
    $old_balance = $_POST["old_balance"];
    $net_total = $_POST["net_total"];
    $paid = $_POST["paid"];
    $due = $_POST["due"];
    $payment_type = $_POST["payment_type"];
    $order_status = $_POST["order_status"];


    $m = new Manage();
    echo $result =$m->storeClientDues();  
    echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$ar_qty,$ar_price,$ar_amt,$ar_pro_name,$ar_servive_detail,$ar_cat_name,$sub_total,$gst,$discount,$old_balance,$net_total,$paid,$due,$payment_type,$order_status);
    // echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$ar_qty,$ar_price,$ar_amt,$ar_pro_name,$sub_total,$gst,$discount,$old_balance,$net_total,$paid,$due,$payment_type);
    
    
}


// Manage Order
if (isset($_POST["manageOrder"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("invoice",$_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5)+1;
        foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $row["company_name"]; ?></td>
                    <td><?php echo $row["sub_total"]; ?></td>
                    <td><?php echo $row["gst"]; ?></td>
                    <td><?php echo $row["discount"]; ?></td>
                    <td><?php echo $row["old_balance"]; ?></td>
                    <td><?php echo $row["net_total"]; ?></td>
                    <td><?php echo $row["paid"]; ?></td>
                    <td><?php echo $row["due"]; ?></td>
                    <td><?php echo $row["order_date"]; ?></td>
                    <!-- <td><?php // echo date('d-m-Y',strtotime($row["order_date"])) ?></td> -->
                    <!-- <td><a href="#" did="<?php // echo $row['invoice_no']; ?>" class="btn btn-danger btn-sm del_order">Delete</a></td> -->
                </tr>
            <?php
            $n++;
        }
        ?>
        <tr><td colspan="5"> <?php echo $pagination; ?> </td></tr>
        <?php
        exit();
    }
}

// Delete Order
if(isset($_POST["deleteOrder"])){
    $m = new Manage();
    $result1 = $m->deleteRecord("invoice_details","invoice_no",$_POST["id"]);
    // echo $result1;
    $result2 = $m->deleteRecord("invoice","invoice_no",$_POST["id"]);
    echo $result2;
}


?>