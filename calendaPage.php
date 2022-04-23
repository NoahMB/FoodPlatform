<?php include_once 'includes/header.php'; ?>
<title>Kaddoo For Birthdays</title>
</head>
<body>
  <?php include_once 'includes/nav.php';

  include 'includes/calendar.php';
 
  $calendar = new Calendar();
 
  echo $calendar->show();?>
<button class="open-button" onclick="openForm()">add friends</button>

<div class="form-popup" id="myForm">
  <form action="includes/friends.php"  method="POST" class="form-container">
    <h1>Add Friend</h1>

    <label for="Firstname" >
     First Name
    </label>
    <br>
    <input type="text" name="Firstname" id="Firstname" placeholder="Insert Your First Name" >
<br>
    <label for="Bday">
    Your Birthdate
    </label>
    <br>
    <input type="date" id="Bday" name="Bday"value="">
    <br>
    <label for="gender">
                    interest
                </label>
                <br>
                <select name="interest" id="interest">
                    <option value="tennis">
                        Tennis
                    </option>
                    <option value="Tech">
                        Tech
                    </option>
                </select>
<br>
    <button type="submit" class="btn">ADD</button>
    <br>
    <br>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<!-- 
add event
-->
<button class="open-button" onclick="openForm1()">Add event</button>

<div class="form-popup" id="eventform">
  <form action="includes/friends.php"  method="POST" class="form-container">
    <h1>Add event</h1>

    <label for="friends">
                    select friends
                </label>
                <br>
                <select name="friends" id="friends">
                    <option value="x">
                        x
                    </option>
                    <option value="y">
                        y
                    </option>
                </select>
                <br>
    <label for="Firstname" >
     event name
    </label>
    <br>
    <input type="text" name="Firstname" id="Firstname" placeholder="event name" >
<br>
    <label for="eventdate">
    event date
    </label>
    <br>
    <input type="date" id="eventdate" name="eventdate"value="">
    <br>
    <label for="gender">
                    interest
                </label>
                <br>
                <select name="interest" id="interest">
                    <option value="tennis">
                        Tennis
                    </option>
                    <option value="Tech">
                        Tech
                    </option>
                </select>
<br>
    <button type="submit" class="btn">ADD</button>
    <br>
    <br>
    <button type="button" class="btn cancel" onclick="closeForm1()">Close</button>
  </form>
</div>

<script>
  window.onload = function () {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("eventform").style.display = "none";
};

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function openForm1() {
  document.getElementById("eventform").style.display = "block";
}
function closeForm1() {
  document.getElementById("eventform").style.display = "none";
}
</script>

<?include_once 'includes/footer.php';?> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    
</body>
</html>