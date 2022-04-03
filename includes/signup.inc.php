<?php

if (isset($_POST["submit"])) {
    //code...
$name = $_POST["name"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$pwdrepeat = $_POST["pwdrepeat"];

   

require_once 'dbh.inc.php';
require_once 'functions.inc.php';



if(emptyInputSignup($name, $email, $phonenumber, $username, $pwd, $pwdrepeat) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}
if(invalidUid($username) !== false){
    header("location: ../signup.php?error=invaliduid");
    exit();
}
if(invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();
}
//if(invalidPhonenumber($phonenumber) !== false){
    //header("location: ../signup.php?error=invalidphonenumber");
  //  exit();
//}
if(pwdMatch($pwd, $pwdrepeat) !== false){
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
}
if(uidExists($conn, $username,  $email) !== false){
    header("location: ../signup.php?error=usernametaken");
    exit();
 }

createUser($conn, $name, $phonenumber, $email, $username, $pwd);
/* todo: */
// na het maken van een bedrijf kom je uit op een pagina waar je een account aanmaakt
// create createBedrijf() function
// edit createUser(), add fldBedrijfID parameter (fldBedrijfID = $new_id = createBedrijf())
}
else{
    header("location: ../signup.php?error=none");
    exit();
}