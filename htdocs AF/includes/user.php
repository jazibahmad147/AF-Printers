<?php

class user
{
    private $con;
    function __construct(){
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }
// User already register or not
    private function emailExists($email){
        $pre_stmt = $this->con->prepare("SELECT id FROM user WHERE email = ? ");
        $pre_stmt->bind_param("s",$email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function createUserAccount($username,$email,$password){
        // To protect application from sql attack
        // Prepare statment
        if($this->emailExists($email)){
            return "EMAIL_ALREADY_EXISTS";
        }else{

            date_default_timezone_set("Asia/Karachi");
            $latest_time = date("Y-m-d h:i:sa");
            

            $pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
            $date = date("Y-m-d");
            $notes = "";
            $pre_stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?)");
            $pre_stmt->bind_param("ssssss",$username,$email,$pass_hash,$date,$latest_time,$notes);
            $result = $pre_stmt->execute() or die($this->con->error);
            if($result){
                return $this->con->insert_id;
            }else{
                return "SOME_ERROR";
            }
        }
    }
    public function userLogin($email,$password){
        $pre_stmt = $this->con->prepare("SELECT id,username,password,last_login FROM user WHERE email = ?");
        $pre_stmt->bind_param("s",$email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if($result->num_rows < 1){
            return "NOT_REGISTERD";
        }else{
            $row = $result->fetch_assoc();
            if(password_verify($password,$row["password"])){
                $_SESSION["userid"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["last_login"] = $row["last_login"];

                // Here we update last login time of user
                date_default_timezone_set("Asia/Karachi");
                $last_login = date("Y-m-d h:m:s");
                $pre_stmt = $this->con->prepare("UPDATE user SET last_login = ? WHERE email = ?");
                $pre_stmt->bind_param("ss",$last_login,$email);
                $result = $pre_stmt->execute() or die($this->con->error);
                if($result){
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return "PASSWORD_NOT_MATCHED";
            }
        }
    }

}

// $user = new User();
// echo $user->createUserAccount("jazib","jazib@gmail.com","pass123");
// echo $user->userLogin("jazib@gmail.com","pass123");
// echo $_SESSION["username"];

?>