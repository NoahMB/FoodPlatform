<?php include_once 'includes/header.php'; ?>
<title>Kaddoo For Birthdays</title>
</head>
<body>
  <?php include_once 'includes/nav.php';

  include 'includes/calendar.php';
 
  $calendar = new Calendar();
 
  echo $calendar->show();


  include_once 'includes/footer.php';?> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
    
</body>
</html>