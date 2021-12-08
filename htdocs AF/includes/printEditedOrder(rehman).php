<?php

// require_once 'core.php';
    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);

$orderId = $_POST['orderId'];

$sql = "SELECT `invoice_no`, `company_name`, `order_date`, `sub_total`, `gst`, `discount`, `old_balance`, `net_total`, `paid`, `due`, `payment_type` FROM `invoice` WHERE invoice_no = $orderId";
// $sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due , order_no FROM orders WHERE order_id = $orderId";

$orderResult = $con->query($sql);
$orderData = $orderResult->fetch_array();

$order_no = $orderData[0];
$comp_name = $orderData[1];
$order_date = $orderData[2];
$subTotal = $orderData[3];
$gst = $orderData[4];
$discount = $orderData[5];
$oldBalance = $orderData[6];
$netTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];
$payment_type = $orderData[10];



// $orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
// stock_production.product_name , stock_production.categories  FROM order_item
// 	INNER JOIN stock_production ON order_item.product_id = stock_production.stock_production_id 
//  WHERE order_item.order_id = $orderId";
$orderItemSql = "SELECT `id`, `invoice_no`, `product_name`, `product_description`, `category_name`, `price`, `qty` FROM `invoice_details` WHERE invoice_no = $orderId";



$orderItemResult = $con->query($orderItemSql);

$table = '	<style>
		* {
			box-sizing: border-box;
		}
		table{
				border-collapse: collapse;
		}
		th {
			border-bottom: 3px solid black;
			border-top: 3px solid black;
			padding: 15px;
			text-align:center;
			border-left: 1px solid gray;
			border-right: 1px solid gray;
		}
		td {
			border-left: 1px solid gray;
			border-right: 1px solid gray;
			text-align:center;
			padding: 20px;
		}
		.column {
			float: left;
			width: 50%;
			padding: 10px;
			height: 100px; /* Should be removed. Only for demonstration */
		}
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
		</style>';


		$table .='
				
					<div class="row">
						<h2>AR WEB CREATIONS</h2>
						<div class="column">
							<P>Account Name: <b>'.$comp_name. '</b></P>
							<P>Invoice Number: <b>'.$order_no. '</b></P>
						</div>
						<div class="column" style="padding-left:150px;">
							<P>Date: <b>'.$order_date. '</b></P>
						</div>

					</div>';




		$table .= '
		<table border="0" width="100%;">
			<tbody>

				<tr>
					<th>S.no</th>
					<th>Product</th>
					<th>Description</th>
					<th>Category</th>
					<th>Qty</th>
					<th>Rs</th>
					<th>Total</th>
				</tr>';

		$x = 1;
		while ($row = $orderItemResult->fetch_array()) {

            $totalProductPrice = $row[5] * $row[6];

			$table .= '<tr>
						<th>' . $x . '</th>
						<th>' . $row[2] . '</th>
						<th>' . $row[3] . '</th>
						<th>' . $row[4] . '</th>
						<th>' . $row[5] . '</th>
						<th>' . $row[6] . '</th>
						<th>' . $totalProductPrice . '</th>
					</tr>
					';
			$x++;
		} // /while

		$table .= '
			<tbody>
		</table>
		';
		$table .='
					<div class="row">
						<div class="column">
							<P>Sub Ammount : <b>'.$subTotal. '</b></P>
							<P>GST : <b>'.$gst. '</b></P>
							<P>Discount : <b>'.$discount. '</b></P>
							<P>Old Balance : <b>'.$oldBalance. '</b></P>
							<P>Net Total : <b>'.$netTotal. '</b></P>
							<P>Paid : <b>'.$paid. '</b></P>
							<P>Due : <b>'.$due. '</b></P>
							<P>Payment Type : <b>'.$payment_type. '</b></P>
						</div>
					</div>';



$con->close();

echo $table;


?>

