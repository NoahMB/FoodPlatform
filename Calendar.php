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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>