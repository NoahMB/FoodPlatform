<?php

if (isset ($_POST["submit"])){
    $studentID = $_POST["student"];
    $meal = $_POST["meal"];
    $date = $_POST["date"];
    include_once 'conn.php';
    include_once 'frontendfunctions.php';
    createOrder($conn, $studentID, $meal, $date);
}
else {
    header("location: ../Calendar.php");
    exit();
    
}