<?php


<<<<<<< HEAD
$servername = "ID362507_kaddoo.db.webhosting.be";
$root = "ID362507_kaddoo";
$password = "Ilovekaddoo123";
=======
    
$servername = "127.0.0.1";
$root = "root";
$password = "";
>>>>>>> 40fe834869143a38d4393ad691bdef01808ad125

$conn = new mysqli($servername, $root, $password, "ID362507_kaddoo", 3306);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>