<?php

if (isset($_POST["submit"])) {
    //code...
$name = $_POST["Voornaam"];
$email = $_POST["Email"];
$phonenumber = $_POST["Telefoonnummer"];
$LastName = $_POST["Naam"];
$pwd = $_POST["Pwd"];
$pwdrepeat = $_POST["Pwdrepeat"];


   

require_once 'conn.php';
require_once 'functions.php';



if(emptyInputSignup($name, $email, $phonenumber, $pwd, $pwdrepeat, $LastName) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}
if(invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();
}
if(pwdMatch($pwd, $pwdrepeat) !== false){
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
}
if(uidExists($conn, $email) !== false){
    header("location: ../signup.php?error=usernametaken");
    exit();
}

 createUser($conn, $name, $phonenumber, $email, $pwd,$LastName);

}
else{
    header("location: ../signup.php?error=none");
    exit();
}