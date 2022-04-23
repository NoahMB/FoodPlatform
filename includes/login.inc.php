<?php

if (isset ($_POST["submit"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    require_once'conn.php';
    require_once'functions.php';
    if(emptyInputLogin($username, $pwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../../frontend/login.php");
    exit();
    
}