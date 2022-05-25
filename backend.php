
<?php include_once 'includes/header.php'; ?>
    
<title>Back-end</title>
<link rel="shortcut icon" type="icon" href ="Image/Home.ico">
</head>
<body>
<?php include_once 'includes/nav.php';?>
<div class="Parent1">
        <div class="child1">
            <p class = "HeaderTop">Amount of Accounts </p>
            <section>
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
        <div class="child1">
            <p class = "HeaderTop">Average friends per Account</p>
            <section>
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
        <div class="child1">
            <P class = "HeaderTop"> Average event per Account </P>
            <section>
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
                
</div>

<div class="Parent2">
    <div class = "child2">
        <section  class="Piechart">
            
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
            title: 'Most popular friend birthday',
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
        
        <div id="piechart" style="width: 500px; height: 500px; font-size : 12px;"></div>
        
        </section>
    </div>

    <div class = "child2">
        <section class="barchat">
            
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
            ['Move', 'amount'],
                <?php 
            $interests1 = "SELECT interests.Interests as interests , count(friendsinterests.InterestsID) as amount from friendsinterests JOIN interests ON friendsinterests.InterestsID=interests.InterestsID GROUP by friendsinterests.InterestsID";
            
            $result = mysqli_query($conn, $interests1);
            
            $counterfriends = 0;
            $row_cnt = $result->num_rows;
            $i = 0;
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $i++;
                
                
                

                        if ($i == $row_cnt){
                            echo "['".$row['interests']."',".$row['amount']."]";
                        }
                        else{
                            echo "['".$row['interests']."',".$row['amount']."],";
                        }
                    
                ?>
                
                <?php
            }
            }
            
            ?>

            ]);

            var options = {
            width: 540,
            legend: { position: 'none' },
            axes: {
                x: {
                0: { side: 'top', label: 'interests'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
            };
        </script>
        
        <div id="top_x_div" style="width: 100px; height: 500px; font-weight: bold;"></div>
        
        </section>
    </div>

</div>   
</body>