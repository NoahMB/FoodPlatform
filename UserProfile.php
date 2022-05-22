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
                            <div class="profile-pic">
                                <?php
                                    $sql = "SELECT PfP FROM accounts WHERE AccountsID = ". $_SESSION["AccountsID"];
                                    $result = mysqli_query($conn , $sql);
                                    $row = mysqli_fetch_array($result);
                                    if (empty($row["PfP"])) {
                                        echo "<img src='Image/male.png' width='200' />";
                                    } else {
                                        echo "<img src='Image/profilePictures/" . $row["PfP"] . "' width='200' />";
                                    }
                                ?>
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
        echo "<form action='includes/update_profile.php' method ='POST' enctype='multipart/form-data'>
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
            <select name='gender' id='gender' >";
            if($row["Gender"] == "male"){
              echo"  <option value='male'selected>
                Male
            </option>
            <option value='female'>
                Female
            </option>";
            }
            else{
            
                echo"  <option value='male'>
                Male
            </option>
            <option value='female'selected>
                Female
            </option>";
            
            
            }

            echo "
            <label for='PFpicture'>
            </label>
            <br>
            <input class='formpos' type='file' name='uploadfile' accept='image/png, image/jpeg' value='". $row["PfP"] ."'>
            
              
            <br>";
                    
               echo" </select>
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