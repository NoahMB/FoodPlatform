<?php 
if (isset ($_POST["submit"])){
    include_once 'conn.php';
    include_once 'backendfunctions.php';
    $month = $_POST["month"];
    $year = $_POST["year"];
    GenerateMonthorders($month, $year);
    header("location: ../backend.php");
    exit();
}
    
?>
