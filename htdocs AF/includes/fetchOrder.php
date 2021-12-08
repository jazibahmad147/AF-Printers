<?php 	

    $servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');
    

    // Selection of database.
    mysqli_select_db($con, $dbname);

    $columns = array('invoice_no', 'company_name', 'order_date', 'sub_total', 'gst', 'discount', 'old_balance', 'net_total', 'paid', 'due')

    // $sql = "SELECT `invoice_no`, `company_name`, `order_date`, `sub_total`, `gst`, `discount`, `old_balance`, `net_total`, `paid`, `due`, `payment_type` FROM `invoice`";
// $result = $con->query($sql);

    $query = "SELECT * FROM invoice";
    if($_POST["is_date_search"] == "yes"){
        $query .= 'order_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
    }

    // if(isset($_POST["search"]["value"])){

    // }

    $number_filter_row = mysqli_num_rows(mysqli_query($con,$query));

    $data = array();
    while ($row = mysqli_fetch_array($number_filter_row)) {
        $sub_array = array();
        $sub_array = $row["company_name"];
        $sub_array = $row["sub_total"];
        $sub_array = $row["gst"];
        $sub_array = $row["discount"];
        $sub_array = $row["old_balance"];
        $sub_array = $row["net_total"];
        $sub_array = $row["paid"];
        $sub_array = $row["due"];
        $sub_array = $row["order_date"];

        $data[] = $sub_array;
    }

    function get_all_data($con){
        $query = "SELECT * FROM invoice";
        $result = mysqli_query($con, $query);
        return mysqli_num_rows($result);
    }
    $output = array(
        "draw" => intval($_POST["draw"]),
        "recordsTotal" => get_all_data($con),
        "recordsFiltered" => $number_filter_row,
        "data" => $data
    )
    echo json_encode($output);

?>