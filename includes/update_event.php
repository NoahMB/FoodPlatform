<?php

session_start();
if (isset($_POST["submit"])) {
$Name = $_POST["Name"];
$Date = $_POST["Date"];
$FriendsID = $_POST["Friend"];
require_once 'conn.php';


$sql = "UPDATE events SET Name = '".$Name."', Date = '".$Date."', FriendsID = '".$FriendsID."' WHERE EventsID = ".$_GET['id']."";
echo $sql;
$result = mysqli_query($conn, $sql);

header("location: ../event.php?id=".$_GET['id']);
}