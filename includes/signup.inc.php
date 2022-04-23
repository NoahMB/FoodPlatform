<?php

if (isset($_POST["submit"])) {
    //code...
$name = $_POST["Firstname"];
$email = $_POST["email"];
$phonenumber = $_POST["PhoneNr"];
$LastName = $_POST["family_name"];
$pwd = $_POST["pwd"];
$pwdrepeat = $_POST["pwdrepeat"];
$birthday = $_POST["Bday"];
$gender = $_POST["gender"];

   

require_once 'conn.php';
require_once 'functions.php';



if(emptyInputSignup($name, $email, $phonenumber, $pwd, $pwdrepeat, $gender, $birthday, $LastName) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}
// if(invalidUid($username) !== false){
//     header("location: ../signup.php?error=invaliduid");
//     exit();
// }
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
if(uidExists($conn, $email) !== false){
    header("location: ../signup.php?error=usernametaken");
    exit();
 }

 createUser($conn, $name, $phonenumber, $email, $pwd, $gender, $birthday, $LastName);
/* todo: */
// na het maken van een bedrijf kom je uit op een pagina waar je een account aanmaakt
// create createBedrijf() function
// edit createUser(), add fldBedrijfID parameter (fldBedrijfID = $new_id = createBedrijf())
}
else{
    header("location: ../signup.php?error=none");
    exit();
}