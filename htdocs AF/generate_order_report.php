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
    <script type="text/javascript" src="./js/manage.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/searchCompanyName.js"></script>


</head>

<body>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <br><br>
    <div class="container">
        <p>
            <!-- <a href="" id="print" class="btn btn-primary"><i class="fa fa-print">&nbsp;&nbsp;</i>Print Order Table</a> -->
        </p>

            <!-- <form class="form-horizontal" action="includes/getOrderReport.php" method="post" id="getOrderReportForm">
                
                    <div class="form-group">
                        <label for="startDate" class="col-sm-2 control-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="endDate" class="col-sm-2 control-label">End Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                    </div><br>
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
                    </div>
                    </div>
            </form> -->

            <form class="form-horizontal" action="includes/getOrderReport.php" method="post" id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="endDate" class="col-sm-2 control-label">End Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="cust_name" class="col-sm-4 control-label">Search By Company Name</label>
                    <div class="col-sm-10">
                        <div class="autocomplete">
                        <input type="text" class="form-control" id="cust_name" name="cust_name" oninput="this.value = this.value.toUpperCase()" autocomplete="off" placeholder="Search By Company Name" />
                        <small class="form-text" style="color:green;">If you want to search a specific company report then use this feild.</small>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
                    </div>
                  </div>
            </form>


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