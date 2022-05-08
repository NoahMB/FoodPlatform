<?php
include_once 'includes/header.php';


// Interests
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
                
                $sql3 ="SELECT Interests FROM interests WHERE InterestsID = ".$row2['InterestsID'];
                $result3 = mysqli_query($conn , $sql3);

                while ($row3 = $result3->fetch_assoc()) {
                    $filename = "includes/Python/".$_SESSION["AccountsID"] ."_urls.txt";
                    $myfile = fopen($filename, "w");
                    $txt = "https://www.amazon.com/s?k=". $row3['Interests'];
                    fwrite($myfile, $txt);
                }   
        }
    }
}

//Run python file

$strID = strval($_SESSION["AccountsID"]);
$command = escapeshellcmd("python includes/Python/searchresults.py " . $strID);
$output = exec($command);

header('Location: webshop.php');
?>

