<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/");
}
?>
<?php
    // Connction with server.
    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);
    $query="SELECT * FROM invoice ORDER BY invoice_no DESC LIMIT 1";
    $invNumber=mysqli_query($con, $query);

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
    <script type="text/javascript" src="./js/order.js"></script>
    <script src="./js/searchCompanyName.js"></script>
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
                        <h4>New Orders 
                        <a href="manage_invoices.php" class="btn btn-primary" style="float: right;"><i class="fa fa-edit">&nbsp;</i>Manage Invoices</a>
                        </h4>
                        
                    </div>
                    <div class="card-body">
                        <form id="get_order_data" action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" align="right">Invoice Date</label>
                                <div class="col-sm-6">
                                    <input type="date" id="order_date" name="order_date" class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" align="right">Company Name*</label>
                                <div class="col-sm-6">
                                <div class="autocomplete">
                                        <input id="cust_name" class="form-control" type="text" name="cust_name" oninput="this.value = this.value.toUpperCase()" autocomplete="off" placeholder="Search Company...">
                                        <!-- <input id="acId" class="form-control" type="hidden" name="acId[]"  autocomplete="off"> -->
                                    </div>
                                
                                <!-- <input type="hidden" id="cust_name" name="cust_name" class="form-control form-control-sm" placeholder="Enter Company Name" required/> -->
                                </div>
                            </div>

                            <div class="card" style="box-shadow:0 0 15px lightgrey;">
                                <div class="card-body">
                                    <h3>Make Order List</h3>
                                        <table align="center" style="width:800px;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="text-align:center;">Product</th>
                                                    <th style="text-align:center;">Description</th>
                                                    <th style="text-align:center;">Category</th>
                                                    <th style="text-align:center;">Quantity</th>
                                                    <th style="text-align:center;">Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice_item">
                                                <!-- <tr>
                                                    <td><b id="number">1</b></td>
                                                    <td>
                                                        <select name="pid[]" class="form-control form-control-sm" required>
                                                            <option>Logon Printing</option>
                                                        </select>
                                                    </td>
                                                    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
                                                    <td><input name="price[]" type="text" class="form-control form-control-sm" required></td>
                                                    <td>Rs.1540</td>
                                                </tr> -->
                                            </tbody>
                                        </table> <!--Tabel End-->
                                        <center style="padding:10px">
                                            <button id="add" style="width:180px" class="btn btn-success">Add</button>
                                            <button id="remove" style="width:180px" class="btn btn-danger">Remove</button>
                                        </center>
                                </div> <!--Card Body End-->
                            </div> <!--Order List Card End-->

                            <p></p>
                            <div class="form-group row">
                                <label for="sub_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                                <div class="col-sm-6">
                                    <input type="text" name="sub_total" class="form-control form-control-sm" id="sub_total" readonly/>
                                </div>
                            
                            <center>
                                <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Create">
                                <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
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
        // Expenses Form
        include_once("./templates/expenses.php");
    ?>
    <?php
        // Discount Form
        include_once("./templates/extra_discount.php");
    ?>

</body>
</html>
