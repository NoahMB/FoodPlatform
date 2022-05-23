<?php

include_once 'conn.php';

if (isset($_POST["submit"])) {
        $interest = $_POST["interest"];
        $Birthdate = $_POST["Birthdate"];
        $Lastname = $_POST["Lastname"];
        $Firstname = $_POST["Firstname"];

        $sql = "DELETE FROM friendsinterests WHERE FriendsID='" . $_GET['id'] . "';";
        mysqli_query($conn , $sql);

        foreach ($interest as $int) {
                $sql2 = "INSERT INTO friendsinterests (FriendsID, InterestsID) VALUES (".$_GET['id']."," .$int. ")";
                mysqli_query($conn , $sql2);
        }

        $sqlupdate = "UPDATE friends SET Firstname = '".$Firstname."', Lastname = '".$Lastname."', Birthdate = '".$Birthdate."' WHERE FriendsID = " . $_GET['id'];
        mysqli_query($conn, $sqlupdate);
}

header("location: ../friendlistedit.php?id=" . $_GET['id']);