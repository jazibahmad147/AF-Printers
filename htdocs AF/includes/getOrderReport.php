<?php 

// require_once './database/constants.php';
    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);

if($_POST) {

    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $cust_name = $_POST['cust_name'];

    // filter data only by date 
    if(strlen($cust_name)==0){
        $sql = "SELECT * FROM invoice WHERE order_date >= '$startDate' AND order_date <= '$endDate'";
        // $sql = "SELECT order_date AS date, invoice_no AS order_id, company_name AS name, net_total AS order_amount, paid AS advance, due AS balance, payment AS payment_recieved
        // FROM invoice WHERE order_date >= '$startDate' AND order_date <= '$endDate'
        // UNION
        // SELECT date AS date, id AS order_id, company_name AS name, order_net_total AS order_amount, advance AS advance, order_due AS balance, payment AS payment
        // FROM payment WHERE date >= '$startDate' AND date <= '$endDate'
        // ORDER BY date";

    // filter data only by name 
    }else if(strlen($startDate)==0){
        if(strlen($endDate)==0){
            $sql = "SELECT * FROM invoice WHERE company_name = '$cust_name' ORDER BY invoice_no DESC";
            // $sql = "SELECT order_date AS date, invoice_no AS order_id, company_name AS name, net_total AS order_amount, paid AS advance, due AS balance, payment AS payment_recieved
            // FROM invoice WHERE company_name = '$cust_name'
            // UNION
            // SELECT date AS date, id AS order_id, company_name AS name, order_net_total AS order_amount, advance AS advance, order_due AS balance, payment AS payment
            // FROM payment WHERE company_name = '$cust_name'
            // ORDER BY date";
        }

    // filter data by date and ame both
    }else{  
        $sql = "SELECT * FROM invoice WHERE order_date >= '$startDate' AND order_date <= '$endDate' And company_name = '$cust_name'";
        // $sql = "SELECT order_date AS date, invoice_no AS order_id, company_name AS name, net_total AS order_amount, paid AS advance, due AS balance, payment AS payment_recieved
        // FROM invoice WHERE order_date >= '$startDate' AND order_date <= '$endDate' AND company_name = '$cust_name'
        // UNION
        // SELECT date AS date, id AS order_id, company_name AS name, order_net_total AS order_amount, advance AS advance, order_due AS balance, payment AS payment
        // FROM payment WHERE date >= '$startDate' AND date <= '$endDate' AND company_name = '$cust_name'
        // ORDER BY date";
       
    }


    $query = $con->query($sql);
    
    $table = '
    <table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
        <tr>
            <th>Invoice</th>
            <th>Date</th>
            <th>Company Name</th>
            <th>GST</th>
            <th>Discount</th>
            <th>Total Bill</th>
            <th>Paid</th>
            <th>Due</th>
        </tr>

        <tr>';
    while ($result = $query->fetch_array()) {
        $table .= '<tr>
            <td><center>'.$result[0].'</center></td>
            <td><center>'.$result[2].'</center></td>
            <td><center>'.$result[1].'</center></td>
            <td><center>'.$result[4].'</center></td>
            <td><center>'.$result[5].'</center></td>
            <td><center>'.$result[7].'</center></td>
            <td><center>'.$result[8].'</center></td>
            <td><center>'.$result[9].'</center></td>
            
        </tr>';
    }
    $table .= '</table>';  

    echo $table;

    
}

?>
