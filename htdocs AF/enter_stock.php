<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"])){
    header("location:".DOMAIN."/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AF Printers</title>
    <!-- <script src="https://code.jquery.com/jqquery-1.12.4.js"></script> -->
    <!-- DataTable Links -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script type="text/javascript" src="./js/manage.js"></script> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


</head>

<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <br><br>
    <div class="container">
                <div class="card border-success" style="width: 100%; background-color: #0000ff0d;">
                        <div class="card-header border-success"><li class="icon fa fa-calendar-alt">&nbsp;</li>Enter Stock</div>
                            <div class="card-body">
                            <form id="stock_form" action="includes/stock_submition.php" method="post">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" style="width:100%;" required><br><br>
                                <label for="purchaser">Purchaser Name</label>
                                <input type="text" name="purchaser" id="purchaser" placeholder="Type Purchaser Name..." style="width:100%;" required><br><br>
                                <label for="product_code">Product Code</label>
                                <input type="text" name="product_code" id="product_code" placeholder="Type Product Code..." style="width:100%;" required><br><br>
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" id="product_name" placeholder="Type Product Name..." style="width:100%;" required><br><br>
                                <label for="unit">Select Unit</label>
                                <select name="unit" id="unit" style="width:100%; height:30px;" required>
                                    <option>Kilogram (KG)</option>
                                    <option>Meter (M)</option>
                                </select>
                                <br><br>
                                <label for="product_price">Product Price</label>
                                <input type="text" name="product_price" id="product_price" placeholder="Type Per KG Price or Per Meter Price" style="width:100%;" required><br><br>
                                <label for="product_qty">Product Quantity</label>
                                <input type="text" name="product_qty" id="product_qty" placeholder="Type Quantity" style="width:100%;" required><br><br>
                                
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </form>
                            </div>
                        <!-- <div class="card-footer bg-transparent border-success"><input type="submit" value="Register" class="btn btn-primary"></div> -->
                </div><br><br>
        
                <script src="js/stock.js"></script>
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