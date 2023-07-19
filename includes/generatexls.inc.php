<?php 
if (isset ($_POST["submit"])){
    include_once 'conn.php';
    include_once 'functions.php';
    $date = ("Y/m");
    GenerateMonthorders($date);
    header("location: ../backend.php");
    exit();
}
    
?>
