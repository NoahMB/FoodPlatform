


<?php
 include_once 'includes/header.php';


if (isset($_GET["id"])) {
    $eventid = $_GET['id'];
    $sql = "SELECT FriendsID FROM events WHERE EventsID = ". $eventid;
    #echo $sql;
    require_once 'includes/conn.php';
    $result = mysqli_query($conn , $sql);
    while ($row = $result->fetch_assoc()) {
        $sql2 = "SELECT InterestsID FROM friendsinterests WHERE FriendsID =". $row['FriendsID'];
        $result2 = mysqli_query($conn , $sql2);

            while ($row2 = $result2->fetch_assoc()) {
                $filename = $_SESSION["AccountsID"] ."_urls.txt";
                $myfile = fopen($filename, "w");
                $txt = $row2['InterestsID'];
                fwrite($myfile, $txt);
            }
    }
}
echo "<p hidden class='hidden'>" . $_SESSION["AccountsID"] . "</p>";


?>

