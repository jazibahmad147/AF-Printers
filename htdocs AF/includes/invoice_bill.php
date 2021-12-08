<?php

session_start();

include_once("../fpdf/fpdf.php");


if($_GET["order_date"] && $_GET["invoice_no"]){
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
    $pdf->Cell(190,10,"amirprinters305@gmail.com",0,1);

    // Date & Client Information
    $pdf->SetFont("Arial",null,12);
    $pdf->Cell(35,5,"",0,0);
    $pdf->Cell(35,5,"",0,1);

    $pdf->Cell(35,5,"Invoice Number",0,0);
    $pdf->Cell(35,5,": ".$_GET["invoice_no"],0,1);
    $pdf->Cell(35,10,"Date",0,0);
    $pdf->Cell(35,10,": ".$_GET["order_date"],0,1);
    $pdf->Cell(35,5,"Company Name",0,0);
    $pdf->Cell(35,5,": ".$_GET["cust_name"],0,1);
 
    $pdf->Cell(50,10,"",0,1);

    // $pdf->Cell(10,10,"#",1,0,"C");
    $pdf->Cell(55,10,"Service",1,0,"C");
    $pdf->Cell(60,10,"Description",1,0,"C");
    $pdf->Cell(40,10,"Category",1,0,"C");
    $pdf->Cell(10,10,"Qty.",1,0,"C");
    $pdf->Cell(10,10,"Rs.",1,0,"C");
    $pdf->Cell(15,10,"Total",1,1,"C");

    for ($i=0; $i < count($_GET["pid"]); $i++) { 
        // $pdf->Cell(10,10,($i+1),1,0,"C");
        $pdf->SetFont("Arial",null,9);
        $pdf->Cell(55,10,$_GET["pro_name"][$i],1,0,"C");
        $pdf->Cell(60,10,$_GET["detail"][$i],1,0,"C");
        $pdf->Cell(40,10,$_GET["cat_name"][$i],1,0,"C");
        $pdf->Cell(10,10,$_GET["qty"][$i],1,0,"C");
        $pdf->Cell(10,10,$_GET["price"][$i],1,0,"C");
        $pdf->Cell(15,10,$_GET["amt"][$i],1,1,"C");
    }

    $pdf->Cell(50,10,"",0,1);
    
    $pdf->SetFont("Arial",null,12);
    $pdf->Cell(50,10,"Sub Total",0,0);
    $pdf->Cell(50,10,": ".$_GET["sub_total"],0,1);
    $pdf->Cell(50,10,"Tax",0,0);
    $pdf->Cell(50,10,": ".$_GET["gst"],0,1);
    $pdf->Cell(50,10,"Discount",0,0);
    $pdf->Cell(50,10,": ".$_GET["discount"],0,1);
    $pdf->Cell(50,10,"Old Balance",0,0);
    $pdf->Cell(50,10,": ".$_GET["old_balance"],0,1);
    $pdf->Cell(50,10,"Net Total",0,0);
    $pdf->Cell(50,10,": ".$_GET["net_total"],0,1);
    $pdf->Cell(50,10,"Paid",0,0);
    $pdf->Cell(50,10,": ".$_GET["paid"],0,1);
    $pdf->Cell(50,10,"Due",0,0);
    $pdf->Cell(50,10,": ".$_GET["due"],0,1);
    $pdf->Cell(50,10,"Payment Type",0,0);
    $pdf->Cell(50,10,": ".$_GET["payment_type"],0,1);


    $pdf->Cell(180,10,"Signature",0,0,"R");
    

    // $pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET["invoice_no"].".pdf","F");

    $pdf->Output();
}

?>