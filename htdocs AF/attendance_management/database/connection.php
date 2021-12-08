<?php

$servername="localhost";
$serveruser="root";
$dbname="project_af_attendance";
$con = mysqli_connect($servername, $serveruser, '');

// Selection of database.
mysqli_select_db($con, $dbname);


?>