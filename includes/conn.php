<?php

    $servername = "ID362507_kaddoo.db.webhosting.be";
    $root = "ID362507_kaddoo";
    $password = "Ilovekaddoo123";

    $conn = new mysqli($servername, $root, $password, "ID362507_kaddoo", 3306);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


?>