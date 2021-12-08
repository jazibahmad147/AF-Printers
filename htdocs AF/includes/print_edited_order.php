<?php
$servername="localhost";
$serveruser="root";
$dbname="project_af";
$con = mysqli_connect($servername, $serveruser, '');
// Selection of database.
mysqli_select_db($con, $dbname);


$orderId = $_GET['orderId'];
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


$orderItemSql = "SELECT `id`, `invoice_no`, `product_name`, `product_description`, `category_name`, `price`, `qty` FROM `invoice_details` WHERE invoice_no = $orderId";

$orderItemResult = $con->query($orderItemSql);




?>

<?php

session_start();

include_once("../fpdf/fpdf.php");


if($_GET["orderId"]){
    $pdf = new FPDF();
    $pdf->AddPage();

    // $pdf->SetXY(50,30);
    $pdf->Image('..\images\watermark.png',55,50,-300);

    // Page Border
    $pdf->Rect(5, 5, 200, 288 ,"D");
    // Company Detail
    $pdf->SetFont("Arial","B",28);
    $pdf->SetXY(20,30);
    $pdf->Image('..\images\logo.png',30,25,-300);
    $pdf->SetFont("Arial","B",18);
    $pdf->SetXY(140,20);
    $pdf->Cell(190,10,"AF Printers",0,1);
    $pdf->SetFont("Arial",null,14);
    $pdf->SetXY(140,26);
    $pdf->Cell(190,10,"Chaburji",0,1);
    $pdf->SetXY(140,32);
    $pdf->Cell(190,10,"Lahore",0,1);
    $pdf->SetXY(140,38);
    $pdf->Cell(190,10,"Pakistan",0,1);
    $pdf->SetXY(140,44);
    $pdf->Cell(190,10,"+92 333 4363161",0,1);
    $pdf->SetXY(140,50);
    $pdf->Cell(190,10,"amir.printers306@gmail.com",0,1);

    // Date & Client Information
    $pdf->SetFont("Arial",null,12);
    $pdf->Cell(35,5,"",0,0);
    $pdf->Cell(35,5,"",0,1);

    $pdf->Cell(35,5,"Invoice Number",0,0);
    $pdf->Cell(35,5,": ".$_GET["orderId"],0,1);
    $pdf->Cell(35,10,"Date",0,0);
    $pdf->Cell(35,10,": ".$order_date,0,1);
    $pdf->Cell(35,5,"Company Name",0,0);
    $pdf->Cell(35,5,": ".$comp_name,0,1);
 
    $pdf->Cell(50,10,"",0,1);

    // $pdf->Cell(10,10,"#",1,0,"C");
    $pdf->Cell(55,10,"Service",1,0,"C");
    $pdf->Cell(60,10,"Description",1,0,"C");
    $pdf->Cell(40,10,"Category",1,0,"C");
    $pdf->Cell(10,10,"Qty.",1,0,"C");
    $pdf->Cell(10,10,"Rs.",1,0,"C");
    $pdf->Cell(15,10,"Total",1,1,"C");

    $i = 1;
    while ($row = $orderItemResult->fetch_array()) {
        $totalProductPrice = $row[5] * $row[6];

        $pdf->SetFont("Arial",null,9);
        $pdf->Cell(55,10,$row[2],1,0,"C");
        $pdf->Cell(60,10,$row[3],1,0,"C");
        $pdf->Cell(40,10,$row[4],1,0,"C");
        $pdf->Cell(10,10,$row[5],1,0,"C");
        $pdf->Cell(10,10,$row[6],1,0,"C");
        $pdf->Cell(15,10,$totalProductPrice,1,1,"C");

        $i++;
    } // /while

    // for ($i=0; $i < count($_GET["pid"]); $i++) { 
    //     // $pdf->Cell(10,10,($i+1),1,0,"C");
    //     $pdf->SetFont("Arial",null,9);
    //     $pdf->Cell(55,10,$_GET["pro_name"][$i],1,0,"C");
    //     $pdf->Cell(60,10,$_GET["detail"][$i],1,0,"C");
    //     $pdf->Cell(40,10,$_GET["cat_name"][$i],1,0,"C");
    //     $pdf->Cell(10,10,$_GET["qty"][$i],1,0,"C");
    //     $pdf->Cell(10,10,$_GET["price"][$i],1,0,"C");
    //     $pdf->Cell(15,10,$_GET["amt"][$i],1,1,"C");
    // }

    $pdf->Cell(50,10,"",0,1);
    
    $pdf->SetFont("Arial",null,12);
    $pdf->Cell(50,10,"Sub Total",0,0);
    $pdf->Cell(50,10,": ".$subTotal,0,1);
    $pdf->Cell(50,10,"Tax",0,0);
    $pdf->Cell(50,10,": ".$gst,0,1);
    $pdf->Cell(50,10,"Discount",0,0);
    $pdf->Cell(50,10,": ".$discount,0,1);
    $pdf->Cell(50,10,"Old Balance",0,0);
    $pdf->Cell(50,10,": ".$oldBalance,0,1);
    $pdf->Cell(50,10,"Net Total",0,0);
    $pdf->Cell(50,10,": ".$netTotal,0,1);
    $pdf->Cell(50,10,"Paid",0,0);
    $pdf->Cell(50,10,": ".$paid,0,1);
    $pdf->Cell(50,10,"Due",0,0);
    $pdf->Cell(50,10,": ".$due,0,1);
    $pdf->Cell(50,10,"Payment Type",0,0);
    $pdf->Cell(50,10,": ".$payment_type,0,1);


    $pdf->Cell(180,10,"Signature",0,0,"R");
    

    // $pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET["invoice_no"].".pdf","F");

    $pdf->Output();
}

?>