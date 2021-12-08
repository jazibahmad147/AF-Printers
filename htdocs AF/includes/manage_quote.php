<?php

class QuoteManage{

    private $con;
    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }
    
    public function storeCustomerQuoteInvoice($quotedate,$cust_name,$ar_qty,$ar_price,$ar_amt,$ar_pro_name,$ar_desc,$ar_cat_name,$sub_total,$gst,$discount,$net_total){
        $pre_stmt = $this->con->prepare("INSERT INTO `quote`(`company_name`, `quote_date`, `sub_total`, `gst`, `discount`, `net_total`) VALUES (?,?,?,?,?,?)");
        $pre_stmt->bind_param("ssdddd",$cust_name,$quotedate,$sub_total,$gst,$discount,$net_total);
        $pre_stmt->execute() or die($this->con->error);
        $quote_no = $pre_stmt->insert_id;
        if($quote_no != null){
            for ($i=0; $i < count($ar_price); $i++) { 
                $insert_product = $this->con->prepare ("INSERT INTO `quote_details`(`quote_no`, `product_name`, `product_description`, `category_name`, `price`, `qty`) VALUES (?,?,?,?,?,?)");
                $insert_product->bind_param("isssdd",$quote_no,$ar_pro_name[$i],$ar_desc[$i],$ar_cat_name[$i],$ar_price[$i],$ar_qty[$i]);
                $insert_product->execute() or die($this->con->error);
            }
            return $quote_no;
        }
    }


}


?>