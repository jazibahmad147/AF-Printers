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
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <?php include_once("./includes/record_process.php"); ?>
<br><br>
    <h3 style="text-align:center;">Orders Report</h3><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Day</h5>
                        <p class="card-text">Here you can see numbers of orders you have book Yesterday.</p>
                        <div class="circle">
                            <p class="counter-count"><?php echo mysqli_num_rows($last_day); ?></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Week</h5>
                        <p class="card-text">Here you can see numbers of orders you have book last week.</p>
                        <div class="circle">
                            <p class="counter-count"><?php echo mysqli_num_rows($last_week); ?></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_product.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Month</h5>
                        <p class="card-text">Here you can see numbers of orders you have book last month.</p>
                        <div class="circle">
                            <p class="counter-count"><?php echo mysqli_num_rows($last_month); ?></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_clients" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_clients.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!-- Balances  -->
    <h3 style="text-align:center;">Orders Balance</h3><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Day net total</h5>
                        <p class="card-text">Here you can see total amount of yesterday orders.</p>
                        <div class="circle">
                            <p class="counter-count-balance"><?php echo $last_day_amount; ?><small> Pkr</small></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Week net total</h5>
                        <p class="card-text">Here you can see total amount of last month orders.</p>
                        <div class="circle">
                            <p class="counter-count-balance"><?php echo $last_week_amount; ?><small> Pkr</small></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_product.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Month net total</h5>
                        <p class="card-text">Here you can see total amount of last month orders.</p>
                        <div class="circle">
                            <p class="counter-count-balance"><?php echo $last_month_amount; ?><small> Pkr</small></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_clients" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_clients.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- paid amounts of order  -->
    <br>
    <h3 style="text-align:center;">Paid Amount of Orders</h3><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Day paid amount</h5>
                        <p class="card-text">Here you can see total paid amount of yesterday orders.</p>
                        <div class="circle">
                            <p class="counter-count-balance"><?php echo $last_day_paid_amount; ?><small> Pkr</small></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Week paid amount</h5>
                        <p class="card-text">Here you can see total paid amount of last month orders.</p>
                        <div class="circle">
                            <p class="counter-count-balance"><?php echo $last_week_paid_amount; ?><small> Pkr</small></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_product.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Last Month paid amount</h5>
                        <p class="card-text">Here you can see total paid amount of last month orders.</p>
                        <div class="circle">
                            <p class="counter-count-balance"><?php echo $last_month_paid_amount; ?><small> Pkr</small></p>
                        </div>
                        <!-- <a href="#" data-toggle="modal" data-target="#form_clients" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
                        <a href="manage_clients.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a> -->
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
