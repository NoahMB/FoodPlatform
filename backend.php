
<?php include_once 'includes/header.php'; ?>
    
<title>Back-end</title>
<link rel="shortcut icon" type="icon" href ="Image/Home.ico">
</head>
<body>
<?php include_once 'includes/nav.php';?>
<div>
    <section>
        <p>Amount of accounts</p>
        <?php 
        $accounts = "SELECT * FROM accounts";
        $result = mysqli_query($conn, $accounts);
        $counter = 0;
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $counter++;
        }
        }
        echo $counter;
        ?>
    </section>
</div>
<div>
    <section>
        <p>average friends per account</p>
        <?php 
        $accounts = "SELECT * FROM friends";
        $result = mysqli_query($conn, $accounts);
        $counterfriends = 0;
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $counterfriends++;
        }
        }
        $average = round($counterfriends/$counter,2);
        echo $average;
        ?>
    </section>
</div>
<div>
    <section>
        <p>average event per account</p>
        <?php 
        $accounts = "SELECT * FROM events";
        $result = mysqli_query($conn, $accounts);
        $counterevents = 0;
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $counterfriends++;
        }
        }
        $average = round($counterfriends/$counter,2);
        echo $average;
        ?>
    </section>
</div>
<div>
    <section>
        <p>most popular friend birthday</p>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
             <?php 
        $accounts = "SELECT MONTH(Birthdate) as birthmonth, count(*) as amount FROM friends GROUP BY MONTH(Birthdate)";
        $result = mysqli_query($conn, $accounts);
        $counterfriends = 0;
        $row_cnt = $result->num_rows;
        $i = 0;
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $i++;
            $monthName = date("F", mktime(0, 0, 0, $row['birthmonth'], 10));
            
            
            if ($i == $row_cnt){
                echo "['".$monthName."',".$row['amount']."]";
            }
            else{
                echo "['".$monthName."',".$row['amount']."],";
            }
            ?>
              
            <?php
        }
        }
        
        ?>

        ]);

        var options = {
          title: 'most popular friend birthday',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    
    <div id="piechart" style="width: 900px; height: 500px;"></div>
      
    </section>
</div>
    
</body>