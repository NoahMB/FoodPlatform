<?php include_once 'includes/header.php'; ?>
<title>FoodPlatform</title>
<link rel="shortcut icon" type="icon" href ="Image/Calenda.ico">
</head>
<body>
 
  <?php include_once 'includes/nav.php';?>

  
  <div class="CalendarContainer">
    <div class="calendarContent">

      <?php
      include 'includes/calendar.php';

      $calendar = new Calendar();

      echo $calendar->show();
      ?>

    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="includes/order.inc.php" method="post">

          <input type="hidden" id="date" name="date" value="3487">

          <?php

          $sql = "SELECT * FROM `tblStudent` INNER JOIN `tblFamilie` ON `tblStudent`.`StudentID`=`tblFamilie`.`StudentID` WHERE GuardianID = '" . $_SESSION["GuardianID"] . "'";

          $result = mysqli_query($conn, $sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '
                <div class="form-check">
                <input class="form-check-input" type="radio" name="student" value="'. $row["StudentID"] .'" id="'. $row["StudentID"] .'">
                <label class="form-check-label" for="defaultCheck1">
                  ' . $row["Voornaam"] . ' ' . $row["Naam"] . '
                </label>
              </div>
                ';
              }
            }

          ?>
          <br>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="meal" id="exampleRadios1" value="Soep" checked>
            <label class="form-check-label" for="exampleRadios1">
              Soep
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="meal" id="exampleRadios2" value="Soep + Maaltijd">
            <label class="form-check-label" for="exampleRadios2">
              Soep + Maaltijd
            </label>
          </div>
          <br>
          <input type="submit" value="OK" id="btn_submit" class="btn btn-primary" name="submit">
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

  <script>
      function clickFunction(date) {
        document.getElementById("date").value = date;
        console.log(date);
      }
  </script>
    
</body>
</html>