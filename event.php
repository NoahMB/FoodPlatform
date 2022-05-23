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
        <div class="EventsContent">

        <?php 
        $sql = "SELECT * FROM `events` WHERE `EventsID` = " . $_GET['id'];
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                    echo "
                    <h1>" . $row['Name'] . "</h1><br>
                    
                    <form action='includes/update_event.php?id=" . $_GET['id'] . "' method ='POST' enctype='multipart/form-data'>
                    <label for='Name'>
                    Name
                    </label>
                    <br>
                    <input type='text' name='Name' id='Name' class = 'InputProfileContent' value='" . $row['Name'] ."'> 
                    
                     
                    <br>";
                echo "
                    <label for='Date'>
                    Date
                    </label>
                    <br>
                    <input type='date' name='Date' id='Date' class = 'InputProfileContent' value=" . $row['Date'] ." ><br>";

                echo"
                <label for='Friend'>
                Friend
                </label>
                <br>
                <div class='InterestSelectBox'>";

                $sql2 = "SELECT * FROM friends WHERE AccountsID = ".$_SESSION["AccountsID"];
                $result2= mysqli_query($conn , $sql2);
                while ($row2 = $result2->fetch_assoc()) {                
                        $sql3    = "SELECT * FROM friends WHERE FriendsID in (SELECT FriendsID from events where EventsID=".$_GET['id'].") AND AccountsID = ".$_SESSION["AccountsID"]; 
                        $result3 = mysqli_query($conn, $sql3);
                        $row3 = $result3->fetch_assoc();
                                if($row3["FriendsID"] == $row2["FriendsID"]){
                                        echo "<input type='radio' name='Friend' value='".$row2['FriendsID']."' id=". $row2['FriendsID'] . " checked/>".
                                        "<label for=" . $row2['Firstname'] ." ". $row2['Lastname'] . ">" . $row2['Firstname'] ." ". $row2['Lastname'] . "</label><br>";
                                }
                                else{
                                        echo "<input type='radio' name='Friend' value='".$row2['FriendsID']."' id=". $row2['FriendsID'] . "/>".
                                        "<label for=" . $row2['Firstname'] ." ". $row2['Lastname'] . ">" . $row2['Firstname'] ." ". $row2['Lastname'] . "</label><br>";
                                }
                
                        }
                
                
                
                        
                echo"</div><br>
                
                

                    <button type='submit' name='submit' style=' width: 30%;' id='submit'>Edit</button>
                    </form><br>";
                    echo "<a href='webshop.php?id=" . $row["EventsID"] . "'>Go to webshop</a><br><br>";
                    echo "<a href='deleteEvent.php?id=" . $row["EventsID"] . "'>Delete</a> 
                    <br><br>";

                
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