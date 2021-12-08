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
    <p>
            <a href="" id="print" class="btn btn-primary"><i class="fa fa-print">&nbsp;&nbsp;</i>Print Expense Table</a>
        </p>
        <table class="table" id="expenses_data">
            <thead style='text-align:left;'>
                <!-- <tr> -->
                <th>#</th>
                <th>Date</th>
                <th>Expense</th>
                <th>Description</th>
                <th>Amount</th>
                <!-- </tr> -->
            </thead>
            <tbody>

                <?php 
            $x = 1;
                $conn = mysqli_connect("localhost","root","","project_af") or die("Error in Connection");
                $query = mysqli_query($conn,"SELECT * FROM expenses ORDER BY id DESC");
                while($result = mysqli_fetch_array($query)){
                    
                    echo "<tr>
                        <td>".$x."</td>
                        <td>".$result['date']."</td>
                        <td>".$result['expense']."</td>
                        <td>".$result['description']."</td>
                        <td>".$result['amount']."</td> 
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
        $('#expenses_data').DataTable();
    });
    </script>

    <!-- Print DataTable -->
    <script type="text/javascript">
    // Print DataTable
    $("#print").click(function() {
        var printme = document.getElementById('expenses_data');
        var wme = window.open("", "", "width=2480,height=3508");
        wme.document.write(printme.outerHTML);
        wme.document.close();
        wme.focus();
        wme.print();
        wme.close();
    })
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