<?php 

    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);

// require_once '../databse/constants.php';
// include_once("../databse/constants.php");

// $level1Id = $_POST['level1Id'];

$sql =  "SELECT * FROM clients";

$result = mysqli_query($con, $sql);
// $result = $con->query($sql);

$res = array();

while($row = mysqli_fetch_array($result)) {

    array_push($res , array('company_name'=>$row['company_name'],'balance'=>$row['balance']));


    
} // while


echo json_encode(array('result'=>$res));

// $con-close();
// $connect->close();
?>
