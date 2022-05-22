<?php 
session_start();
if (isset($_POST["submit"])) {
$name = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Email = $_POST["Email"];
$Birthday = $_POST["Birthday"];
$PhoneNr = $_POST["PhoneNr"];
$Gender = $_POST["gender"];
$AccountsID = $_SESSION["AccountsID"];
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$newname = $AccountsID.$filename;
$folder = "../Image/profilePictures/".$newname;
require_once 'conn.php';


$sql = "UPDATE accounts SET Firstname = '".$name."', LastName = '".$LastName."', Email = '".$Email."',Birthdate = '".$Birthday."', PhoneNr = '".$PhoneNr."', Gender = '".$Gender."', PfP = '".$newname."' WHERE AccountsID = ".$AccountsID."";
echo $sql;
$result = mysqli_query($conn, $sql);

move_uploaded_file($tempname, $folder);

header("location: ../UserProfile.php");
}

 ?>