<?php
 include_once 'includes/header.php'; 

 require_once 'includes/conn.php';
 ?>
 <title>Edit FriendList</title>
 <link rel="shortcut icon" type="icon" href ="Image/FriendList.ico">
 </head>
 <body>
        <style>
              .kleiner{
                      width: 50px;
                      height: 50px;
              }  
              a{
                      text-decoration: none;
                      color: black;

              }
              a:hover{
                text-decoration: none;
                      color: black; 
              }
        </style>
 <?php include_once 'includes/nav.php';?>

<?php

?>
<div class="EditFriendListContainer">
<?php
$id = intval($_GET['id']);
$sql = "SELECT * FROM friends WHERE FriendsID = ".$id;
        $result = mysqli_query($conn , $sql);
        while ($row = $result->fetch_assoc()) {

 
echo "<div class='EditFriendListContent'>
        <h1>Edit Friend</h1>";
        
echo '<br>';               
echo "<form method ='POST'>";
echo    "<label for='Firstname' class = 'EditFirendLable'>Firstname
        </label>
        <br>
        <input type='text' name='Firstname' id='Firstname' class ='InputEditList' value=" . $row["Firstname"] ." >
        <br>
        <label for='Lastname' class = 'EditFirendLable'>Lastname
        </label>
        <br>
        <input type='text' name='Lastname' id='Lastname'  class ='InputEditList' value=" . $row["Lastname"] ." >
        <br>
        <label for='Birthdate' class = 'EditFirendLable'>Birthdate
        </label>
        <br>
        <input type='date' name='Birthdate' id='Birthdate' class ='InputEditList' value=" . $row["Birthdate"] ." >
        <br>
        <br>
        <p id = 'InterestLabel'>Interests</p>  
        ";
        }
        echo"<select name='interest[]' class ='InputEditList' id='interest' multiple>";

// THIS NEEDS TOO BE REWRITTEN 


$sql2 = "SELECT * FROM interests WHERE InterestsID in (SELECT InterestsID from friendsinterests where FriendsID=".$id.")";
$result2= mysqli_query($conn , $sql2);
while ($row2 = $result2->fetch_assoc()) {                
        $sql3    = "SELECT * FROM interests";
        $result = mysqli_query($conn, $sql3);
        while ($row3 = $result->fetch_assoc()) {
                if($row3['Interests'] == $row2['Interests']){
                        echo "<option value='".$row2['InterestsID']."' selected>".$row2['Interests']."</option>";
                }
                else{
                        echo "<option value='".$row2['InterestsID']."'>".$row2['Interests']."</option>";
                }

        }
        }



        
echo"</select>";
echo '<br>';echo '<br>';            
echo"<br>
<button type='submit' name='submit' id='submit'>Edit</button>
</form>";

        if (isset($_POST["submit"])) {
                $interest = $_POST["interest"];
                $Birthdate = $_POST["Birthdate"];
                $Lastname = $_POST["Lastname"];
                $Firstname = $_POST["Firstname"];

                $sql = "DELETE FROM friendsinterests WHERE FriendsID='" . $_GET['id'] . "';";
                mysqli_query($conn , $sql);

                foreach ($interest as $int) {
                        $sql2 = "INSERT INTO friendsinterests (FriendsID, InterestsID) VALUES (".$_GET['id']."," .$int. ")";
                        mysqli_query($conn , $sql2);
                }

                $sqlupdate = "UPDATE friends SET Firstname = '".$Firstname."', Lastname = '".$Lastname."', Birthdate = '".$Birthdate."' WHERE FriendsID = $id";
                mysqli_query($conn, $sqlupdate);
        }
?>
</div>                      
</div>



            
                  
            