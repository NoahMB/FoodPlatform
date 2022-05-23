<?php

include_once 'includes/conn.php';

$sql = "DELETE FROM friendsinterests WHERE FriendsID='" . $_GET['id'] . "';";
mysqli_query($conn , $sql);

echo $sql;

$sql2 = "DELETE FROM events WHERE FriendsID='" . $_GET['id'] . "';";
mysqli_query($conn , $sql2);

echo $sql2;

$sql3 = "DELETE FROM friends WHERE FriendsID='" . $_GET['id'] . "';";
mysqli_query($conn , $sql3);

echo $sql3;

header("location: friendlist.php");