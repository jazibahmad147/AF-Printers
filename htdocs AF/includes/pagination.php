<?php

$con = mysqli_connect("localhost","root","","project_af");

function pagination($con,$table,$pno,$n){
    $query = $con->query("SELECT COUNT(*) as rows FROM ".$table);
    $row = mysqli_fetch_assoc($query);
    // $totalRecord = 10000;
    $pageno = $pno;
    $numbersOfRecordPerPage = $n;
    $last = ceil($row["rows"]/$numbersOfRecordPerPage);
    echo "Total Pages ".$last."</br>";
    $pagination = "";
    if($last != 1){
        if($pageno > 1){
            $previous = "";
            $previous = $pageno - 1;
            $pagination .= "<a href='pagination.php?pageno=".$previous."' style='color:#333;'> Previous </a>";
        }
        for ($i=$pageno - 5;$i < $pageno ;$i++) { 
            if ($i > 0) {
                $pagination .= "<a href='pagination.php?pageno=".$i."'> ".$i." </a>";
            }
            
        }
        $pagination .= "<a href='pagination.php?pageno=".$pageno."' style='color:#333;'> ".$pageno." </a>";
        for ($i=$pageno + 1; $i <= $last; $i++) { 
            $pagination .= "<a href='pagination.php?pageno=".$i."'> ".$i." </a>";
            if ($i > $pageno + 4) {
                break;
            }
        }
        if($last > $pageno){
            $next = $pageno + 1;
            $pagination .= "<a href='pagination.php?pageno=".$next."' style='color:#333;'> Next </a>";
        }
    }
    // LIMIT 0,10
    // LIMIT 20,10
    $limit = "LIMIT ".($pageno - 1) * $numbersOfRecordPerPage.",".$numbersOfRecordPerPage;

    return ["pagination"=>$pagination,"limit"=>$limit];
}

if (isset($_GET["pageno"])) {
    $pageno = $_GET["pageno"];
    $table = "products";

    $array = pagination($con,$table,$pageno,10);

    $sql = "SELECT * FROM ".$table." ".$array["limit"];
    $query = $con->query($sql);
    while ($row = mysqli_fetch_assoc($query)) {
        
        echo "<div style='margin:0 auto;font-size:20px;'><b>".$row["product_name"]."</b></div>";
    }
    echo "<div style='font-size:22px;'>".$array["pagination"]."</div>";
}
?>