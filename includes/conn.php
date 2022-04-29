<?php
 $HostName = "localhost";
 $dbUSERname ="root";
 $dbpassword = "root";
 $dbName = "kaddoo";
 $dbPort = "8889";

 $conn = mysqli_connect($HostName, $dbUSERname, $dbpassword, $dbName,  $dbPort);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>