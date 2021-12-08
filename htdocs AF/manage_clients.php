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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./js/manage.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
<br><br>
    <div class="container">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Company Name</th>
            <th>Client Name</th>
            <th>Contact</th>
            <th>Balance (Rs)</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="get_client">
        <!-- <tr>
            <td>1</td>
            <td>Sublimation</td>
            <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
            <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
        </tr> -->
        </tbody>
  </table>
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
