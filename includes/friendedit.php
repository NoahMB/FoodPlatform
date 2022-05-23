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

        $sql3 = "SELECT * FROM `friends` WHERE FriendsID = " . $_GET['id'];
        $result2 = mysqli_query($conn , $sql3);
        $row2 = $result2->fetch_assoc();

        echo $sql3;

        $sql2 = "SELECT EventsID FROM `events` WHERE Name = '" . $row2["Firstname"] . " " . $row2["Lastname"] . " Birthday' AND FriendsID = " . $_GET['id'] . ";";
        $result = mysqli_query($conn , $sql2);

        echo $sql2;

        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $sqlupdate = "UPDATE `events` SET Name = '". $Firstname . " " . $Lastname . " Birthday' WHERE EventsID = " . $row['EventsID'];
                        mysqli_query($conn, $sqlupdate);
                }
        }

        $sqlupdate = "UPDATE friends SET Firstname = '".$Firstname."', Lastname = '".$Lastname."', Birthdate = '".$Birthdate."' WHERE FriendsID = " . $_GET['id'];
        mysqli_query($conn, $sqlupdate);
}

header("location: ../friendlistedit.php?id=" . $_GET['id']);