<?php include_once 'includes/header.php'; ?>
    
    <title>Events</title>
      <link rel="shortcut icon" type="icon" href ="Image/Event.ico">
    <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-shopping-cart-16.png">
</head>
<body>
<?php include_once 'includes/nav.php';?>
<div class="EventContent">
    <div class="EvenPageContainer">
        <br>
        <?php 


        $sql    = "SELECT * FROM `events` WHERE `EventsID` = " . $_GET['id'];

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo   "<h2>"  . "<a href='webshop.php?id=" . $row["EventsID"] . "'><h5>". $row['Name']."</h5></a>" . "</h2>"; echo '<br>';

                ?>
                <div class="EventsContent">
                        <?php
                        echo   "<p> Date of Birth  :   " .$row['Date'] . "</p>"; echo "<br>";
                        echo   "<p> Reminder : " .$row['GetReminder']. "</p>";echo "<br>";
                        echo   "<p> Number of Gift Bought: " .$row['GiftBought'] . "</p>";echo "<br>";
                        
                        $sql1    = "SELECT * FROM `friends` WHERE `FriendsID` = " . $row['FriendsID'];
        
                        $result1 = mysqli_query($conn, $sql1);
        
                        if ($result1->num_rows > 0) {
                            while ($row1 = $result1->fetch_assoc()) {
                                echo   "<p> Name of Friend :  " .$row1['Firstname'] . " " .$row1['Lastname'] ."</p>";
                            }
                                }
                            }
                        } 
                
                        ?>
                </div>
               
    </div>
</div>
<?php include_once 'includes/footer.php';?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    
</body>
</html>