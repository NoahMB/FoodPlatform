<?php

if (isset($_POST["submit"])) {
    //code...
$name = $_POST["Firstname"];
$LastName = $_POST["LastName"];
$birthday = $_POST["Bday"];
$interest = $_POST["interest"];

   

require_once 'conn.php';
require_once 'functions.php';
$id = $_SESSION["AccountsID"];

if(emptyInputFriends($name, $LastName, $birthday, $interest) !== false){
    header("location: ../calendaPage.php?error=emptyinput");
    exit();
}

AddFriend($conn, $name, $LastName, $birthday, $interest, $id); 

}
else {
    header("location: ../index.php");
    exit();
    
}

