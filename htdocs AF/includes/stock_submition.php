<?php

    $conn = mysqli_connect("localhost","root","","project_af") or die("Error in Connection");
    
    $valid['success'] = array('success' => false, 'messages' => array());

    // To Update Client Balance
    if ($_POST) {
        
        $date = $_POST['date'];
        $purchaser = $_POST['purchaser'];
        $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $unit = $_POST['unit'];
        $product_price = $_POST['product_price'];
        $product_qty = $_POST['product_qty'];

        // Checking users name recurring.
        $check = "SELECT * FROM stock_products_detail WHERE p_code = '$product_code'";
        $result = mysqli_query($conn, $check);
        $num = mysqli_num_rows($result);

        if($num == 1){
            
            $valid['success'] = false;
            $valid['messages'] = "Product Code Already Used";

        }else{
            $stock_products_detail = "INSERT INTO `stock_products_detail`(`date`, `p_code`, `purchaser`, `product_name`, `unit`, `quantity`, `price`) VALUES ('$date', '$product_code', '$purchaser', '$product_name', '$unit', '$product_qty', '$product_price')";
            mysqli_query($conn, $stock_products_detail);

            $stock_products = "INSERT INTO `stock_products`(`p_code`, `product_name`, `unit`, `quantity`) VALUES ('$product_code', '$product_name', '$unit', '$product_qty')";
            mysqli_query($conn, $stock_products);

            $valid['success'] = true;
            $valid['messages'] = "Successfully Stock Added!";

            
        }

        
    $conn->close();
    echo json_encode($valid);


}
