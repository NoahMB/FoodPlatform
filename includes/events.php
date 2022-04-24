<?php
 session_start();
if (isset($_POST["submit"])) {
    
$friends = $_POST["friends"];
$Eventname = $_POST["eventname"];
$Eventdate = $_POST["eventdate"];


  

require_once 'conn.php';
require_once 'functions.php';
$id = $_SESSION["AccountsID"];

if(emptyInputevent($friends, $Eventname, $Eventdate) !== false){
    header("location: ../calendaPage.php?error=emptyinput");
    exit();
}

Addevent($conn, $friends, $Eventname, $Eventdate); 

}
else {
    header("location: ../index.php");
    exit();
    
}

