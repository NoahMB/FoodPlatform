<?php include_once 'includes/header.php'; ?>
<title>Kaddoo For Birthdays</title>
<link rel="shortcut icon" type="icon" href ="Image/Calenda.ico">
</head>
<body>
 
  <?php include_once 'includes/nav.php';
  ?>

<?php
  $sql = "SELECT * FROM `events` WHERE `FriendsID` IN 
  (SELECT `FriendsID` FROM `friends` WHERE `AccountsID` = " . $_SESSION["AccountsID"] . ") AND Date <= NOW()";

  $result = mysqli_query($conn, $sql);
      
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $sql2 = "SELECT Firstname, Lastname from friends where FriendsID = " . $row["FriendsID"];
      $result2 = mysqli_query($conn, $sql2);
      $row2 = $result2->fetch_assoc();
      if ($row["Name"] == $row2["Firstname"] . " " . $row2["Lastname"] . " Birthday") {
        $sql4 = "SELECT * FROM `events` WHERE `Name` = '" . $row2["Firstname"] . " " . $row2["Lastname"] . " Birthday' AND Date >= NOW()";
        $result4 = mysqli_query($conn, $sql4);
        if ($result4->num_rows == 0) {
          $eventname = $row2["Firstname"] ." ". $row2["Lastname"] . " Birthday";
          $year = date("Y", strtotime(date('Y-m-d'). ' + 1 year')) ;
          $month = date("m",strtotime($row['Date']));
          $day = date("d", strtotime($row['Date']));
          $date = $year ."-". $month."-". $day;

          $sql3 = "INSERT INTO events (Name, Date, FriendsID) Values ('".$eventname."','".$date."',".$row['FriendsID'].")";
          mysqli_query($conn , $sql3);
        }
      }
    }
  }
?>
<div class="CalendarContainer">
    <div class="calendarContent">

<?php
include 'includes/calendar.php';

$calendar = new Calendar();

echo $calendar->show();?>

<div class="Upcoming" id="Upcoming">
  <div class="Title">
    <h2>Upcoming Events</h2>
    <button id='myBtn' class="plusButton"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /> </svg></button>
  </div>
  <div class="List">
    <?php 
      $sql    = "SELECT * FROM `events` WHERE `FriendsID` IN 
      (SELECT `FriendsID` FROM `friends` WHERE `AccountsID` = " . $_SESSION["AccountsID"] . ") AND Date BETWEEN NOW() AND DATE(NOW() + INTERVAL 6 MONTH) ORDER BY `Date` ASC";

      $result = mysqli_query($conn, $sql);
      
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<div class='Event'>";
              echo    "<p class='eventDate'> ".$row['Date'] ."</p> ";
              echo    "<a class='eventInfoButton' href='event.php?id=" . $row["EventsID"] . "'><h5><svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
              <path stroke-linecap='round' stroke-linejoin='round' d='M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg></h5></a>";
              echo    "<a href='webshop.php?id=" . $row["EventsID"] . "'><h5>". $row['Name']."</h5></a>";
              echo "</div>";
          }
      } 
    ?>
  </div>

</div>
</div>
<br>

<div id="myModal" class="modal">

<!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="addButtons">
<button class="friendEventButton" onclick="openForm()"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">   <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" /> </svg></button>
<button class="friendEventButton" onclick="openForm1()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg></button>
</div>
<div class="addForms">
<div class="form-popup" id="myForm">
<form action="includes/friends.php"  method="POST" class="form-container">
  <h1>Add Friend</h1>

  <label for="Firstname" >
   First Name
  </label>
  <br>
  <input type="text" name="Firstname" id="Firstname" placeholder="Insert Your First Name" >
<br>
<label for="LastName" >
   Last Name
  </label>
  <br>
  <input type="text" name="LastName" id="LastName" placeholder="Insert Your Last Name" >
<br>
  <label for="Bday">
    Birthdate
  </label>
  <br>
  <input type="date" id="Bday" name="Bday"value="">
  <br>
  <div>
  <label for="interest">
                  Interest
              </label>
              <br>

              <div class="InterestSelectBox">
              <?php
$sql    = "SELECT * FROM interests";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      echo  "<input type='checkbox' name='interest[]' value='".$row['InterestsID']."' id=". $row['Interests'] . " />".
      "<label for=" . $row['Interests'] . ">" . $row['Interests'] . "</label><br>";
  }
}

?>
</div>
  </div>
<br>
<br>
  <button type="submit" name="submit" id="submit" class="btn">ADD</button>
  <br>
  <br>
</form>
</div>

<div class="form-popup" id="eventform">
<form action="includes/events.php"  method="POST" class="form-container">
  <h1>Add event</h1>

  <label for="friends">
                  Select friends
              </label>
              <br>
              <select name="friends" id="friends">
<?php
$sql    = "SELECT * FROM friends WHERE AccountsID = " .$_SESSION["AccountsID"];

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      echo  "<option value='".$row['FriendsID']."'>".$row['Firstname']." ".$row['Lastname']."
      
  </option>";
  }
}

?>
</select>
<br>
  <label for="eventname">
   Event name
  </label>
  <br>
  <input type="text" name="eventname" id="eventname" placeholder="event name" >
<br>
  <label for="eventdate">
  Event date
  </label>
  <br>
  <input type="date" id="eventdate" name="eventdate"value="">
 
<br>
<br>
  <button type="submit" name="submit" id="submit" class="btn">ADD</button>
  <br>
  <br>
</form>
</div>
</div>
</div>
</div>
</div>

<?php include_once 'includes/footer.php';?> 

<script>
window.onload = function () {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("eventform").style.display = "none";
  var offsetHeight = document.getElementById("calendar").offsetHeight;
  document.getElementById("Upcoming").style.height = offsetHeight + 'px';
};

function openForm() {
document.getElementById("myForm").style.display = "block";
document.getElementById("eventform").style.display = "none";
}

function closeForm() {
document.getElementById("myForm").style.display = "none";
}

function openForm1() {
document.getElementById("eventform").style.display = "block";
document.getElementById("myForm").style.display = "none";
}
function closeForm1() {
document.getElementById("eventform").style.display = "none";
}

</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
  modal.style.display = "none";
}
}


</script>

<script>
  var today = new Date().toISOString().split('T')[0];
  document.getElementsByName("Bday")[0].setAttribute('max', today);
  document.getElementsByName("eventdate")[0].setAttribute('min', today);
</script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>