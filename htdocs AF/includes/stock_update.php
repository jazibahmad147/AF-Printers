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

            $stock_products_detail = "UPDATE `stock_products_detail` SET `purchaser`='$purchaser',`product_name`='$product_name',`unit`='$unit',`quantity`='$product_qty',`price`='$product_price' WHERE p_code = '$product_code'";
            mysqli_query($conn, $stock_products_detail);

            $stock_products = "UPDATE `stock_products` SET `product_name`='$product_name',`unit`='$unit',`quantity`='$product_qty' WHERE p_code = '$product_code'";
            mysqli_query($conn, $stock_products);

            $valid['success'] = true;
            $valid['messages'] = "Successfully Stock Updated!";
            
            

        }else{
            
            $valid['success'] = false;
            $valid['messages'] = "Something is Wrong!";
            
        }

        
    $conn->close();
    echo json_encode($valid);


}
