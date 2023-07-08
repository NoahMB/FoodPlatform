<?php

if (isset ($_POST["submit"])){
    $email = $_POST["uid"];
    $pwd = $_POST["pwd"];
    include_once 'conn.php';
    include_once 'functions.php';
    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $email, $pwd);
}
else {
    header("location: ../../frontend/login.php");
    exit();
    
}