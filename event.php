<?php include_once 'includes/header.php'; ?>
    
    <title>Kaddoo For Birthdays</title>
</head>
<body>
<?php include_once 'includes/nav.php';?>
<div class="EventContent">
    <div class="EvenPageContainer">
<?php 


$sql    = "SELECT * FROM `events` WHERE `EventsID` = " . $_GET['id'];

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='Event'>";
        echo    "<a href='webshopRedirect.php?id=" . $row["EventsID"] . "&me=" . $_SESSION["AccountsID"] . "'><h5>". $row['Name']."</h5></a>";
        echo    "<p> ".$row['Date'] ."</p> ";
        echo    "<p> ".$row['GetReminder'] ."</p> ";
        echo    "<p> ".$row['GiftBought'] ."</p> ";
        
        $sql1    = "SELECT * FROM `friends` WHERE `FriendsID` = " . $row['FriendsID'];

        $result1 = mysqli_query($conn, $sql1);

        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                echo    "<p> ".$row1['Firstname'] . " " .$row1['Lastname'] . "</p> ";
            }
        }
        echo "</div>";
    }
} 

?>
</div>
</div>
<?php include_once 'includes/footer.php';?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    
</body>
</html>