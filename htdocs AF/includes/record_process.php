
<?php

$servername="localhost";
    $serveruser="root";
    $dbname="project_af";
    $con = mysqli_connect($servername, $serveruser, '');

    // Selection of database.
    mysqli_select_db($con, $dbname);

    $last_day = mysqli_query($con,"select * from invoice where  `order_date` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)");
    $last_week = mysqli_query($con,"select * from invoice where  `order_date` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
    $last_month = mysqli_query($con,"select * from invoice where  `order_date` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");
    // Net Total Count...
    $last_day_amount = 0;
    $last_week_amount = 0;
    $last_month_amount = 0;
    while($row = mysqli_fetch_array($last_day)){
        $last_day_amount += $row['net_total'];
    }
    while($row = mysqli_fetch_array($last_week)){
        $last_week_amount += $row['net_total'];
    }
    while($row = mysqli_fetch_array($last_month)){
        $last_month_amount += $row['net_total'];
    }
    // calculate paid amounts 
    $last_day_paid = mysqli_query($con,"SELECT paid AS payment
    FROM invoice WHERE `order_date` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    UNION
    SELECT payment AS payment
    FROM payment WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)");

    $last_week_paid = mysqli_query($con,"SELECT paid AS payment
    FROM invoice WHERE `order_date` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
    UNION
    SELECT payment AS payment
    FROM payment WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)");

    $last_month_paid = mysqli_query($con,"SELECT paid AS payment
    FROM invoice WHERE `order_date` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
    UNION
    SELECT payment AS payment
    FROM payment WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)");

        $last_day_paid_amount = 0;
        $last_week_paid_amount = 0;
        $last_month_paid_amount = 0;
    while ($row = mysqli_fetch_array($last_day_paid)) {
        $last_day_paid_amount += $row[0];
    } 
    while ($row = mysqli_fetch_array($last_week_paid)) {
        $last_week_paid_amount += $row[0];
    } 
    while ($row = mysqli_fetch_array($last_month_paid)) {
        $last_month_paid_amount += $row[0];
    } 

?>
