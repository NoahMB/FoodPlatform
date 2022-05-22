<?php 
session_start();
if (isset($_POST["submit"])) {
$name = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Email = $_POST["Email"];
$Birthday = $_POST["Birthday"];
$PhoneNr = $_POST["PhoneNr"];
$Gender = $_POST["Gender"];
$AccountsID = $_SESSION["AccountsID"];
require_once 'conn.php';


$sql = "UPDATE accounts SET Firstname = '".$name."', LastName = '".$LastName."', Email = '".$Email."',Birthdate = '".$Birthday."', PhoneNr = '".$PhoneNr."', Gender = '".$Gender."' WHERE AccountsID = ".$AccountsID."";
echo $sql;
$result = mysqli_query($conn, $sql);
header("location: ../UserProfile.php");
}

 ?>