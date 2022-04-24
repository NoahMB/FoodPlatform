<?php
 session_start();
if (isset($_POST["submit"])) {
    
$name = $_POST["Firstname"];
$LastName = $_POST["LastName"];
$eventdate = $_POST["eventdate"];


  

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

