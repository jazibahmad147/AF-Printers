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
    <script type="text/javascript" src="./js/order.js"></script>


</head>

<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <br><br>
    <div class="container">
       
        <table class="table" id="order_data">
            <thead>
                <!-- <tr> -->
                <th>#</th>
                <th>Code</th>
                <th>Date</th>
                <th>Purchaser</th>
                <th>Product</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
                <!-- </tr> -->
            </thead>
            <tbody>

                <?php 
            $x = 1;
                $conn = mysqli_connect("localhost","root","","project_af") or die("Error in Connection");
                $query = mysqli_query($conn,"SELECT * FROM stock_products_detail ORDER BY id DESC");
                while($result = mysqli_fetch_array($query)){
                    $stockID = $result['p_code'];
                    $button = '<button><a href="edit_stock.php?&stockID='.$stockID.'" name="stockID"> <i class="fa fa-edit"></i> Edit </a></button>';
                    echo "<tr>
                        <td>".$x."</td>
                        <td>".$result['p_code']."</td>  
                        <td>".$result['date']."</td>  
                        <td>".$result['purchaser']."</td>
                        <td>".$result['product_name']."</td>
                        <td>".$result['unit']."</td>
                        <td>".$result['quantity']."</td>
                        <td>".$result['price']."</td>
                        <td>".$result['price'] * $result['quantity']."</td>
                        <td>".$button."</td>  
                    </tr>";
                    $x++;
                }

            ?>

            </tbody>
        </table>
    </div>
    <br><br>

    <script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- show datatable from database -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#order_data').DataTable();
    });
    </script>

    <!-- Print DataTable -->
    <script type="text/javascript">
    // Print DataTable
    $("#print").click(function() {
        var printme = document.getElementById('order_data');
        var wme = window.open("", "", "width=2480,height=3508");
        wme.document.write(printme.outerHTML);
        wme.document.close();
        wme.focus();
        wme.print();
        wme.close();
    })
    </script>

    <!-- Date Range (Date-Filter) -->
    <script type="text/javascript">

// Edit stock Function 
function editOrder(orderId = null) {
    if (orderId) {

        $.ajax({
            url: 'edit_order.php',
            type: 'post',
            data: { orderId: orderId },
            dataType: 'text',
            success: function(response) {
                console.log(response);

                }, // /success function
                error: function(e){
                    console.log(e);
                }
        }); // /ajax function to fetch the order
    } // /if orderId
} // edit order function

    </script>
<script src="./js/dateFilter.js"></script>

   
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