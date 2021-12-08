<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/");
}
?>

<?php


    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');
    // Selection of database.
    mysqli_select_db($con, $dbname);


    $orderId = $_GET['orderId'];
    // echo $orderId;

    $select_invoice = "SELECT `invoice_no`, `company_name`, `order_date`, `sub_total`, `gst`, `discount`, `old_balance`, `net_total`, `paid`, `due`, `payment_type`, `update_date` FROM `invoice` WHERE invoice_no = '$orderId'";
    $Result = $con->query($select_invoice);
    $result_row = $Result->fetch_array();

    // invoice variables...
    $company = $result_row[1];
    $order_date = $result_row[2];
    $sub_total = $result_row[3];
    $gst = $result_row[4];
    $discount = $result_row[5];
    $old_balance = $result_row[6];
    $net_total = $result_row[7];
    $paid = $result_row[8];
    $due = $result_row[9];
    $payment_type = $result_row[10];
    $update_date = $result_row[11];

    // picking balance from cient table
    $picking_balance = "SELECT `cid`, `company_name`, `client_name`, `contact_number`, `status`, `balance` FROM `clients` WHERE company_name = '$company'";
    $row = $con->query($picking_balance);
    $result_row2 = $row->fetch_array();

    // old balance variable... 
    // $old_balance = $result_row2[5];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AF Printers</title>
    <!-- <script type="text/javascript" src="jquery/jquery-3.3.1.min"></script> -->
    <!-- <script type="text/javascript" src="jquery/jquery-3.2.1"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="./js/edit_order.js"></script> -->
    <!-- <script src="./js/searchCompanyName.js"></script> -->
</head>
<style>


.autocomplete {
        position: absolute;
        display: inline-block;
        width: 100%;
        transform: translateX(-10px);
        z-index: 99;
    }

    .autocomplete#productItems {
        position: absolute;
        display: inline-block;
        /* width: 90%; */
        /* transform: translateX(-10px); */
        /* z-index: 99; */
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 80%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }


    .autocomplete-items div:hover {
        background-color: #e9e9e9;
        /* z-index: 99; */
    }


    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }



</style>
<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
<br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card" style="box-shadow:0 0 25px lightgrey;">
                    <div class="card-header">
                        <h4>Edit Orders 
                        <a href="manage_orders.php" class="btn btn-primary" style="float: right;"><i class="fa fa-edit">&nbsp;</i>Manage Order</a>
                        </h4>
                        
                    </div>
                    <div class="card-body">
                        <form id="get_order_data" action="includes/update_order.php" method="POST">
                            <div class="form-group row">
                                <!-- <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" align="right">Invoice Number</label>
                                    <div class="col-sm-6">
                                    <?php
                                    // while ($row = mysqli_fetch_assoc($invNumber)) {
                                    //     $invoice = $row["invoice_no"]+1;
                                    // }
                                    ?>
                                        <input type="text" id="inv_number" name="inv_number" readonly class="form-control form-control-sm" value="<?php // echo $invoice; ?>">
                                    </div>
                                </div> -->

                                        <!-- order id  -->
                                        <input type="hidden" id="order_id" name="order_id" readonly class="form-control form-control-sm" value="<?php echo $orderId ?>">

                                <label class="col-sm-3 col-form-label" align="right">Order Date</label>
                                <div class="col-sm-6">
                                    <!-- old date  -->
                                    <input type="hidden" id="old_order_date" name="old_order_date" readonly class="form-control form-control-sm" value="<?php echo $order_date; ?>">
                                    <!-- new date  -->
                                    <input type="text" id="new_order_date" name="new_order_date" class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" align="right">Company Name*</label>
                                <div class="col-sm-6">
                              <div class="autocomplete">
                                        <input id="cust_name" class="form-control" type="text" name="cust_name" oninput="this.value = this.value.toUpperCase()" autocomplete="off" value="<?php echo $company; ?>" readonly>
                                        <!-- <input id="acId" class="form-control" type="hidden" name="acId[]"  autocomplete="off"> -->
                                    </div>
                                
                                <!-- <input type="hidden" id="cust_name" name="cust_name" class="form-control form-control-sm" placeholder="Enter Company Name" required/> -->
                                </div>
                            </div>

                            <div class="card" style="box-shadow:0 0 15px lightgrey;">
                                <div class="card-body">
                                    <h3>Make Order List</h3>
                                        <table align="center" style="width:800px;" id="productTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="text-align:center;">Service</th>
                                                    <th style="text-align:center;">Description</th>
                                                    <th style="text-align:center;">Category</th>
                                                    <th style="text-align:center;">Quantity</th>
                                                    <th style="text-align:center;">Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <?php

                                            $orderItemSql = "SELECT `id`, `invoice_no`, `product_name`, `product_description`, `category_name`, `price`, `qty` FROM `invoice_details` WHERE invoice_no ='$orderId'";
                                            $orderItemResult = $con->query($orderItemSql);
                                                // $orderItemData = $orderItemResult->fetch_all();						
                                                
                                                // print_r($orderItemData);
                                            $arrayNumber = 0;
                                            // for($x = 1; $x <= count($orderItemData); $x++) {
                                            $x = 1;
                                            $calSubTotlal =  0;
                                            $subTotal = 0;
                                            while($orderItemData = $orderItemResult->fetch_assoc()) { 


                                            // array_push($_SESSION['PSdata'] , array($orderItemData['product_id'] , $orderItemData['quantity'] ) );

                                                // print_r($orderItemData); ?>
                                            <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
                                                <td><?php echo $x; ?></td>
                                                <td>
                                                        <input type="text" name="pro_name[]" class="form-control form-control-sm" id="pro_name<?php echo $x; ?>" value="<?php echo $orderItemData['product_name']; ?>"/>
                                                </td>
                                                <td>
                                                        <input type="text" name="description[]" class="form-control form-control-sm" id="description<?php echo $x; ?>" value="<?php echo $orderItemData['product_description']; ?>" />
                                                </td>
                                                <td>
                                                        <input type="text" name="cat_name[]" class="form-control form-control-sm" id="cat_name<?php echo $x; ?>" value="<?php echo $orderItemData['category_name']; ?>"/>
                                                </td>
                                                <td>
                                                        <input type="text" name="qty[]" class="form-control form-control-sm" onkeyup="getQty(<?php echo $x; ?>)" id="qty<?php echo $x; ?>" value="<?php echo $orderItemData['qty']; ?>"/>
                                                </td>
                                                <td>
                                                        <input type="text" name="price[]" class="form-control form-control-sm" onkeyup="getPrice(<?php echo $x; ?>)" id="price<?php echo $x; ?>"  value="<?php echo $orderItemData['price']; ?>"/>
                                                </td>
                                                <td>
                                                        <?php  $calTotal = $orderItemData['price'] * $orderItemData['qty']; ?> 
                                                            <input type="text" name="amt[]" class="form-control form-control-sm" id="total<?php echo $x; ?>" value="<?php echo $calTotal ?>" readonly/>
                                                </td>

                                                        
                                            </tr>

                                               <?php 
                                                $subTotal += $calTotal;
                                               ?>

                                            <?php
                                            $arrayNumber++;
                                            $x++;
                                            } // /for
                                            ?>
                                        </tbody>
                                        </table> <!--Tabel End-->
                                        <center style="padding:10px">
                                            <!-- <button id="add" style="width:180px" class="btn btn-success">Add</button>
                                            <button id="remove" style="width:180px" class="btn btn-danger">Remove</button> -->
                                        </center>
                                </div> <!--Card Body End-->
                            </div> <!--Order List Card End-->

                            <p></p>
                            <div class="form-group row">
                                <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sub_total" class="form-control form-control-sm" id="sub_total" value="<?php echo $subTotal; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gst" class="col-sm-3 col-form-label" align="right">GST (17%)</label>
                                <div class="col-sm-6">
                                    <input type="text" name="gst" class="form-control form-control-sm" id="gst" value="<?php echo $gst; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="discount" class="col-sm-3 col-form-label" align="right">Discount %</label>
                                <div class="col-sm-6">
                                    <input type="text" name="discount" class="form-control form-control-sm" id="discount" value="<?php echo $discount; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="old_balance" class="col-sm-3 col-form-label" align="right">Old Balance</label>
                                <div class="col-sm-6">
                                <!-- <select class="form-control form-control-sm"> -->
                                    
                                    
                                <!-- </select> -->
                                    <input type="text" name="old_balance" class="form-control form-control-sm" id="old-balance" style="color:red;" value="<?php echo $old_balance; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="old_net_total" class="form-control form-control-sm" id="old_net_total" value="<?php echo $net_total; ?>" readonly/>
                                    <input type="text" name="net_total" class="form-control form-control-sm" id="net_total" value="<?php echo $net_total; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                                <div class="col-sm-6">
                                    <input type="text" name="paid" class="form-control form-control-sm" id="paid" value="<?php echo $paid; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
                                <div class="col-sm-6">
                                    <input type="text" name="due" class="form-control form-control-sm" id="due" value="<?php echo $due; ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="order_status" class="col-sm-3 col-form-label" align="right">Status</label>
                                <div class="col-sm-6">
                                    <select name="order_status" class="form-control form-control-sm" id="order_status"  required/>
                                        <option>Pending</option>
                                        <option>Completed</option>
                                        <option>Deliverd</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Method</label>
                                <div class="col-sm-6">
                                    <select name="payment_type" class="form-control form-control-sm" id="payment_type"  value="<?php echo $payment_type; ?>"required/>
                                        <option>Cash</option>
                                        <option>Card</option>
                                        <option>Draft</option>
                                        <option>Cheque</option>
                                        <option>Online</option>
                                    </select>
                                </div>
                            </div>
                            <center>
                                <input type="button" id="order_form" style="width:150px;" class="btn btn-primary" onclick="calDiscount()" value="Calculate">
                                <input type="submit" id="order_form" name="update" style="width:150px;" class="btn btn-success" value="Update">
                                <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                                <br>
                                <span style="color:red;"><b>Note:*</b> Please make sure you have click one time <b>Calculate</b> button.</span>
                            </center>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

       
    <?php
        // Category Form
        include_once("./templates/category.php");
    ?>
    <?php
        // Products Form
        include_once("./templates/productRgister.php");
    ?>
    <?php
        // Clients Form
        include_once("./templates/clientRegister.php");
    ?>
    <?php
        // Payement Form
        include_once("./templates/receivingPayment.php");
    ?>
    <?php
        // Payement Form
        include_once("./templates/expenses.php");
    ?>

<script>

function getQty(row = null) {
    if(row){
        var total = Number($("#qty" + row).val()) * Number($("#price" + row).val());
            $("#total" + row).val(total);
    
            var productTableLength = $("#productTable tbody tr").length;
            // console.log(productTableLength);
            var totalSubAmount = 0;
            for (var x = 0; x < productTableLength; x++){
                var tr = $("#productTable tbody tr")[x];
                var count = $(tr).attr('id');
                count = count.substring(3);
                // console.log(count);
                totalSubAmount = Number(totalSubAmount) + Number($("#total" + count).val());
            }
            $("#sub_total").val(totalSubAmount);

            // calculate gst 
            var gst = 0.17 * totalSubAmount;
            $("#gst").val(gst);

            // Net Total
            $("#net_total").val(totalSubAmount + gst);

        }
}

function getPrice(row = null) {
        if(row){
            var total = Number($("#qty" + row).val()) * Number($("#price" + row).val());
            $("#total" + row).val(total);
    
            var productTableLength = $("#productTable tbody tr").length;
            // console.log(productTableLength);
            var totalSubAmount = 0;
            for (var x = 0; x < productTableLength; x++){
                var tr = $("#productTable tbody tr")[x];
                var count = $(tr).attr('id');
                count = count.substring(3);
                // console.log(count);
                totalSubAmount = Number(totalSubAmount) + Number($("#total" + count).val());
            }
            $("#sub_total").val(totalSubAmount);

            // calculate gst 
            var gst = 0.17 * totalSubAmount;
            $("#gst").val(gst);

            // Net Total
            $("#net_total").val(totalSubAmount + gst);

        }
    }

    function calDiscount(){
        var sub = $("#sub_total").val();
        var disc = $("#discount").val();
        var net = $("#net_total").val();
        var old = $("#old-balance").val();
        var disc_amount = Number(net) - (Number(sub / 100) * Number(disc));
        var net_amount = Number(old) + Number(disc_amount);

        $("#net_total").val(Number(net_amount));

        var paid = $("#paid").val();
        console.log(paid);
        var due = Number(net_amount) - Number(paid);
        $("#due").val(due);
    }


</script>


</body>
</html>



