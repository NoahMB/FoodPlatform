<?php include_once 'includes/header.php';?> 
    <title>User's Profile</title>
</head>
<body>
<?php include_once 'includes/nav.php';?> 
    
    <div class ="ContainerUser">
    
        <?php

                if (isset($_SESSION["Firstname"]) ) {
                $id =  $_SESSION['Firstname'];

                }
                ?>
                <?php
                $sql_Gender = "SELECT Gender FROM `accounts` WHERE Firstname = '$id'";
                
                $result_Gender = mysqli_query($conn, $sql_Gender)->fetch_all(MYSQLI_ASSOC);
                ?>
                    <div class = "ContentUser">
                          <div class = "image">
                    
                      <div>
                            <div class="profile-pic">
                              <label class="-label" for="file">
                             <span class="glyphicon glyphicon-camera"></span>
                          <span>Change Image</span>
                         </label>
                             <input id="file" type="file" onchange="loadFile(event)"/>
                             <img src="Image/male.png" id="output" width="200" />
                     </div>
                      </div>
                          </div>
                  </div>   
             <?php
                ?>
    
            <h2 id = "AboutUser">
                USER PROFILE :
            </h2> 
            <br>
        <?php
                ?>
        <div class="outer">
            
                
                 <?php 
        $sql = "SELECT * FROM accounts WHERE AccountsID = " . $_SESSION["AccountsID"];
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
        echo "<form action='includes/update_profile.php ' method ='POST'>
            <label for='FirstName'>
            </label>
            <br>
            <input type='text' name='FirstName' id='FirstName' value=" . $row["Firstname"] ." >
            
             
            <br>";
        echo "
            <label for='LastName'>
            </label>
            <br>
            <input type='text' name='LastName' id='LastName' value=" . $row["LastName"] ." >
            
              
            <br>";
        echo "
            <label for='Email'>
            </label>
            <br>
            <input type='mail' name='Email' id='Email' value=" . $row["Email"] ." >
            
              
            <br>";
        echo "
            <label for='Birthday'>
            </label>
            <br>
            <input type='date' name='Birthday' id='Birthday' value=" . $row["Birthdate"] ." >
            
              
            <br>";
        echo "
            <label for='PhoneNr'>
            </label>
            <br>
            <input type='text' name='PhoneNr' id='PhoneNr' value=" . $row["PhoneNr"] ." >
            
              
            <br>";
        echo "
            <label for='Gender'>
            </label>
            <br>
            <input type='text' name='Gender' id='Gender' value=" . $row["Gender"] ." >
            <br>
            <br>
            <button type='submit' name='submit' id='submit'>edit</button>
            </form>   
            <br>";
        }
    }
        
        ?>
     
  </div>           
            <?php
        
        ?>
       

        
   <script src="index.js">

   </script>
        <?php include_once 'includes/footer.php';?> 

</body>
</html>