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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
<br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto">
                    <img class="card-img-top mx-auto" style="width:60%;" src="./images/user.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Profile Info</h4>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i><?php echo $_SESSION["username"]; ?></p>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
                        <p class="card-text">Last Login : <?php echo $_SESSION["last_login"]; ?></p>
                        <a href="logout.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron" style="width:100%;height:100%;">
                    <h1>Welcome <?php echo $_SESSION["username"]; ?>,</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <iframe src="http://free.timeanddate.com/clock/i6ye22hs/n758/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">New Orders</h5>
                                    <p class="card-text">Here you can make invoice and create new orders. And also create quote.</p>
                                    <a href="new_order.php" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>New Order</a>
                                    <!-- <a href="new_quote.php" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>New Quote</a><br><br> -->
                                    <a href="manage_orders.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p></p>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Here you can manage your categories and you add new categories.</p>
                        <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Services</h5>
                        <p class="card-text">Here you can manage your services and you add new services.</p>
                        <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_product.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Clients</h5>
                        <p class="card-text">Here you can manage your clients and you add new clients.</p>
                        <a href="#" data-toggle="modal" data-target="#form_clients" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_clients.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a>
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
