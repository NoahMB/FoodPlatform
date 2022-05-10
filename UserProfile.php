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


                foreach( $result_Gender as $persons_Gender){
                    $UserGender =  $persons_Gender["Gender"];

                    if ($UserGender == "male") {

                        ?>
                           <div class = "ContentUser">
                                 <div class = "image">
                           <br>
                             <img src="Image/MaleProfilePic.jpg" alt="ProfilePic_Male" id = "ProfilePic">
                                 </div>
                         </div>   
                    <?php
                
                } 
                else{
                    ?>
                    <div class = "ContentUser">
                          <div class = "image">
                    <br>
                      <img src="Image/GirlProfilePic.jpg" alt="ProfilePic_Male" id = "ProfilePic">
                          </div>
                  </div>   
             <?php
                }
            }
                ?>
    
            <h2 id = "AboutUser">
                USER PROFILE :
            </h2> 
            <br>
        <?php

                $sql = "SELECT Lastname FROM `accounts` WHERE Firstname = '$id'";
                
                $result = mysqli_query($conn, $sql)->fetch_all(MYSQLI_ASSOC);


                foreach($result as $persons){
                    $FamilyNAME =  $persons["Lastname"];

                    echo"
                    <div class='UserData'>
                        Family Name :   " . $FamilyNAME ."
                    </div>"; 
                
                }


                $sql_Bday = "SELECT Birthdate FROM `accounts` WHERE Firstname = '$id'";
                
                $result_bday = mysqli_query($conn, $sql_Bday)->fetch_all(MYSQLI_ASSOC);


                foreach($result_bday  as $persons_bday){
                    $UserBirthdate =  $persons_bday["Birthdate"];

                    echo"
                    <div class='UserData'>
                        Your Birthday :   " . $UserBirthdate ."
                    </div>"; 
                
                }    

                $sql_Gender = "SELECT Gender FROM `accounts` WHERE Firstname = '$id'";
                
                $result_Gender = mysqli_query($conn, $sql_Gender)->fetch_all(MYSQLI_ASSOC);


                foreach( $result_Gender as $persons_Gender){
                    $UserGender =  $persons_Gender["Gender"];

                    echo"
                    <div class='UserData'>
                        Gender :   ". $UserGender."
                    </div>"; 
                
                } 

               

                $sql_Email = "SELECT Email FROM `accounts` WHERE Firstname = '$id'";
                
                $result_Email = mysqli_query($conn, $sql_Email)->fetch_all(MYSQLI_ASSOC);


                foreach($result_Email  as $persons_Email){

                    $UserEmail =  $persons_Email["Email"];

                    echo"
                    <div class='UserData'>
                        Contact(Email) :   " . $UserEmail."
                    </div>"; 
                
                } 



        ?>
        <br>
        <br>
        <div class= "ReminderContent">
            <div class = "ReminderDetails">

                <div class="dropdown">
                  <span> REMINDER TIME : </span> 
                  <br>
                  <br>     
                    <button class="dropbtn">One Week</button>
                    <div class="dropdown-content">
                    <a href="#">Two Week </a>
                    <a href="#">Three Week</a>
                    <a href="#">Four Week</a>
                    </div>
                 </div>
            </div>


            <div class = "UpdateDetials">
                <a href="password.php">RESET PASSWORD</a>
                <br>
                <br>
                UPDATE
            </div>
            
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
   </div>

        
       
        <?php include_once 'includes/footer.php';?> 

</body>
</html>