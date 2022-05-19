<?php include_once 'includes/header.php'; ?>
    
    <title>Events</title>
</head>
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;

}
table{
    margin: 0 auto;
}
th{
background-color: #000;
color: white;
}
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
table { border-collapse: separate; }
td { border: solid 1px #000; }
tr:first-child td:first-child { border-top-left-radius: 10px; }
tr:first-child td:last-child { border-top-right-radius: 10px; }
tr:last-child td:first-child { border-bottom-left-radius: 10px; }
tr:last-child td:last-child { border-bottom-right-radius: 10px; }

</style>
<body>
<?php include_once 'includes/nav.php';?>
<div class="EventContent">
    <div class="EvenPageContainer">
        <br>
        <br>
            <table>
                <tr>
                    <th>To Webshop</th>
                    <th>Date</th>
                    <th>Reminder</th>
                    <th>Gift Bought</th>
                    <th>Name</th>
                </tr>
        <?php 


        $sql    = "SELECT * FROM `events` WHERE `EventsID` = " . $_GET['id'];

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo   "<td>"  . "<a href='webshopRedirect.php?id=" . $row["EventsID"] . "&me=" . $_SESSION["AccountsID"] . "'><h5>". $row['Name']."</h5></a>" . "</td>";
                echo   "<td>" .$row['Date'] . "</td>";
                echo   "<td>" .$row['GetReminder']. "</td>";
                echo   "<td>" .$row['GiftBought'] . "</td>";
                
                $sql1    = "SELECT * FROM `friends` WHERE `FriendsID` = " . $row['FriendsID'];

                $result1 = mysqli_query($conn, $sql1);

                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        echo   "<td>" .$row1['Firstname'] . " " .$row1['Lastname'] ."</td>";
                    }
                }
            }
        } 

        ?>
         </table>
    </div>
</div>
<?php include_once 'includes/footer.php';?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    
</body>
</html>