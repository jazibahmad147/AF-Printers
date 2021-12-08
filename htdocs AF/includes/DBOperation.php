<?php

class DBOperation
{
    private $con;
    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }
    // Add Category
    public function addCategory($cat){
        $pre_stmt = $this->con->prepare("INSERT INTO `categories`(`category_name`, `status`) VALUES (?,?)");
        $status = 1;
        $pre_stmt->bind_param("si",$cat,$status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if($result){
            return "CATEGORY_ADDED";
        }else{
            return 0;
        }
    }
    // Add Product
    public function addProduct($cat){
        $pre_stmt = $this->con->prepare("INSERT INTO `products`(`product_name`, `status`) VALUES (?,?)");
        $status = 1;
        $pre_stmt->bind_param("si",$cat,$status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if($result){
            return "PRODUCT_ADDED";
        }else{
            return 0;
        }
    }
    
    public function getAllRecord($table){
        $pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }
}



// $opr = new DBOperation();
// echo $opr->addCategory(1,"BN-20");
// echo "<pre>";
// print_r($opr->getAllRecord("categories"));

?>