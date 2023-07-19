<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function createOrder($conn, $studentID, $meal, $date)
{
    $sql = "INSERT INTO tblOrders (MenuName, OrderDate, StudentID) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $meal, $date, $studentID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Calendar.php?error=none");
    exit();
}