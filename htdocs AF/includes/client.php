<?php

class client
{
    private $con;
    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }
// User already register or not
    private function companyExists($company){
        $pre_stmt = $this->con->prepare("SELECT cid FROM clients WHERE company_name = ? ");
        $pre_stmt->bind_param("s",$company);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function addNewClient($company,$client,$contact,$balance){
        // To protect application from sql attack
        // Prepare statment
        if($this->companyExists($company)){
            return "COMPANY_ALREADY_REGISTERED";
        }else{
            $status = 1;
            $pre_stmt = $this->con->prepare("INSERT INTO `clients`(`company_name`, `client_name`, `contact_number`, `status`, `balance`) VALUES (?,?,?,?,?)");
            $pre_stmt->bind_param("sssss",$company,$client,$contact,$status,$balance);
            $result = $pre_stmt->execute() or die($this->con->error);
            if($result){
                return $this->con->insert_id;
            }else{
                return "SOME_ERROR";
            }
        }
    }
}

// $client = new Client();
// echo $client->addNewClient("company","client@gmail.com","+964564874658");

?>