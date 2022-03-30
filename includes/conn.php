<?php

//Connect to database

$servername = "127.0.0.1";
$root = "root";
$password = "";

$conn = new mysqli($servername, $root, $password, "Kaddoo");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>