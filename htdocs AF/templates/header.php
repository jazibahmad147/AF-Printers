
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Inventory Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./dashboard.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- Clients -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Client
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_clients">Add New Client</a>
          <a class="dropdown-item" href="./manage_clients.php">Manage Clients</a>
        </div>
      </li> -->
      <!-- Services  -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_products">Add New Service / Product</a>
          <a class="dropdown-item" href="./manage_product.php">Manage Services / Products</a>
        </div>
      </li> -->
      
      <!-- Orders -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Order
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./new_order.php">New Order</a>
          <a class="dropdown-item" href="./new_quote.php">Add Quotation</a>
          <a class="dropdown-item" href="./manage_orders.php">Manage Order</a>
          <a class="dropdown-item" href="./record.php">View Order Report</a>
          <a class="dropdown-item" href="./generate_order_report.php">Generate Order Report</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_payment">Recieve Payment</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_discount">Extra Discount</a>
        </div>
      </li>
      <!-- Expenses  -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Expenses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#form_expenses">Add Expenses</a>
          <a class="dropdown-item" href="./manage_expenses.php">Manage Expenses</a>
        </div>
      </li>
      <!-- Stock  -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stock
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./enter_stock.php">Add Item</a>
          <a class="dropdown-item" href="./stock_invoice.php">Create Invoice</a>
          <a class="dropdown-item" href="./manage_stock.php">Manage Stock</a>
        </div>
      </li>
      <!-- Attendance Management  -->
      <li class="nav-item">
        <a class="nav-link" href="./attendance_management/dashboard.php"><i class="fa fa-calendar">&nbsp;</i>Attendance Management <span class="sr-only">(current)</span></a>
      </li>

        <?php
          if(isset($_SESSION["userid"])){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fa fa-user">&nbsp;</i>Logout</a>
            </li>
            <?php
          }
        ?>
      
    </ul>
  </div>
</nav>
<marquee behavior="scroll" direction="left" style="border:1px solid #fff; border-radius:10px;; padding:10px; width:95%; background-color:#fff; color:#808080; opaicity:0.8;">The Software Created and Designed By: <span style="color:black;">+92 336 4216108</span> for AF Printers</marquee>

