<?php
session_start();
if (isset($_POST["submit"])) {
    
$search = $_POST["search"];

$txtName = "Python/" . $_SESSION["AccountsID"] . "_urls.txt";

require_once 'conn.php';
require_once 'functions.php';

$myfile = fopen($txtName, "w") or die("Unable to open file!");
$txt = "https://www.amazon.com/s?k=" . $search;
fwrite($myfile, $txt);
fclose($myfile);

header("location: ../webshopRedirect.php");

}
else {
    header("location: ../index.php");
    exit();
    
}
