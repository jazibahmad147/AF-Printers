<?php

class Manage
{
    private $con;
    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    public function manageRecordWithPagination($table,$pno){
        $a = $this->pagination($this->con,$table,$pno,5);
        $sql = "SELECT * FROM ".$table." ".$a["limit"];
        
        // if($table == "categories"){
        //     // $sql = "SELECT p.cid,p.category_name as category,c.category_name as parent,p.status FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid ".$a["limit"];
        //     $sql = "SELECT * FROM ".$table." ".$a["limit"];
        // }else if($table == "products"){
        //     $sql = "SELECT * FROM ".$table." ".$a["limit"];
        // }else if($table == "clients"){
        //     $sql = "SELECT * FROM ".$table." ".$a["limit"];
        // }else{
        //     $sql = "SELECT * FROM ".$table." ".$a["limit"];
        // }
        $result = $this->con->query($sql) or die($this->con->error);
        $rows = array();
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return ["rows"=>$rows,"pagination"=>$a["pagination"]];
    }

    private function pagination($con,$table,$pno,$n){
        $query = $con->query("SELECT COUNT(*) as rows FROM ".$table);
        $row = mysqli_fetch_assoc($query);
        // $totalRecord = 10000;
        $pageno = $pno;
        $numbersOfRecordPerPage = $n;
        $last = ceil($row["rows"]/$numbersOfRecordPerPage);
        $pagination = "<ul class='pagination'>";
        if($last != 1){
            if($pageno > 1){
                $previous = "";
                $previous = $pageno - 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='".$previous."' href='#' style='color:#333;'> Previous </a></li></li>";
            }
            for ($i=$pageno - 5;$i < $pageno ;$i++) { 
                if ($i > 0) {
                    $pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
                }
                
            }
            $pagination .= "<li class='page-item'><a class='page-link' pn='".$pageno."' href='#' style='color:#333;'> ".$pageno." </a></li>";
            for ($i=$pageno + 1; $i <= $last; $i++) { 
                $pagination .= "<li class='page-item'><a class='page-link' pn='".$i."' href='#'> ".$i." </a></li>";
                if ($i > $pageno + 4) {
                    break;
                }
            }
            if($last > $pageno){
                $next = $pageno + 1;
                $pagination .= "<li class='page-item'><a class='page-link' pn='".$next."' href='#' style='color:#333;'> Next </a></li></ul>";
            }
        }
        // LIMIT 0,10
        // LIMIT 20,10
        $limit = "LIMIT ".($pageno - 1) * $numbersOfRecordPerPage.",".$numbersOfRecordPerPage;
    
        return ["pagination"=>$pagination,"limit"=>$limit];
    }

    public function deleteRecord($table,$pk,$id){
        if ($table == "categories") {
            $pre_stmt = $this->con->prepare("SELECT ".$id." FROM categories WHERE parent_cat = ?");
            $pre_stmt->bind_param("i",$id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($this->con->error);
            if ($result->num_rows > 0) {
                return "DEPENDENT_CATEGORY";
            }else {
                $pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
                $pre_stmt->bind_param("i",$id);
                $result = $pre_stmt->execute() or die($this->con->error);
                if($result){
                    return "CATEGORY_DELETED";
                }
            }
        }else {
            $pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
            $pre_stmt->bind_param("i",$id);
            $result = $pre_stmt->execute() or die($this->con->error);
            if($result){
                return "DELETED";
            }
        }
    }

    public function getSingleRecord($table,$pk,$id){
        $pre_stmt = $this->con->prepare("SELECT * FROM ".$table." WHERE ".$pk."= ? LIMIT 1");
        $pre_stmt->bind_param("i",$id);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }

    public function storeClientDues(){
        $cust_name = $_POST["cust_name"];
        $due = $_POST["due"];
        $pre_stmt = $this->con->prepare("UPDATE `clients` SET `balance`=".$due." WHERE company_name='".$cust_name."'");
        // $pre_stmt->bind_param('d',$due);
        $pre_stmt->execute() or die($this->con->error);
    }

    public function storeCustomerOrderInvoice($orderdate,$cust_name,$ar_qty,$ar_price,$ar_amt,$ar_pro_name,$ar_desc,$ar_cat_name,$sub_total,$gst,$discount,$old_balance,$net_total,$paid,$due,$payment_type,$order_status){
        $pre_stmt = $this->con->prepare("INSERT INTO `invoice`(`company_name`, `order_date`, `sub_total`, `gst`, `discount`, `old_balance`, `net_total`, `paid`, `due`, `payment_type`, `order_status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $pre_stmt->bind_param("ssdddddddss",$cust_name,$orderdate,$sub_total,$gst,$discount,$old_balance,$net_total,$paid,$due,$payment_type,$order_status);
        $pre_stmt->execute() or die($this->con->error);
        $invoice_no = $pre_stmt->insert_id;
        if($invoice_no != null){
            for ($i=0; $i < count($ar_price); $i++) { 
                $insert_product = $this->con->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `product_description`, `category_name`, `price`, `qty`) VALUES (?,?,?,?,?,?)");
                $insert_product->bind_param("isssdd",$invoice_no,$ar_pro_name[$i],$ar_desc[$i],$ar_cat_name[$i],$ar_price[$i],$ar_qty[$i]);
                $insert_product->execute() or die($this->con->error);
            }
            return $invoice_no;
        }
    }

}

// $obj = new Manage();
// echo "<pre>";
// print_r($obj->manageRecordWithPagination("categories",1));
// echo $obj->deleteRecord("categories","cid",18);
// print_r($obj->getSingleRecord("products","pid",1));


?>