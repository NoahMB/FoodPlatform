<?php

include_once 'includes/conn.php';

$sql2 = "DELETE FROM events WHERE EventsID='" . $_GET['id'] . "';";
mysqli_query($conn , $sql2);

echo $sql2;

header("location: calendaPage.php");