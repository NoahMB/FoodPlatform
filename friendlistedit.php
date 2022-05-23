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
               label {
        display: block;
        padding-left: 15px;
        text-indent: -15px;
      }
      input {
        width: 100px;
        height: 40px;
        padding: 0;
        margin: 0;
        vertical-align: bottom;
        position: relative;
        top: -1px;
      }
             
        </style>
 <?php include_once 'includes/nav.php';?>
<div class="EditFriendListContainer">
<?php

$id = intval($_GET['id']);
$sql = "SELECT * FROM friends WHERE FriendsID = ".$id;
        $result = mysqli_query($conn , $sql);
        while ($row = $result->fetch_assoc()) {

 
echo "<div class='EditFriendListContent'>
        <h1>Edit Friend</h1>";
        
echo '<br>';               
echo "<form method ='POST' action='includes/friendedit.php?id=" . $id . "'>";
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

        echo"<div class='InterestSelectBox'>";

$sql2 = "SELECT * FROM interests";
$result2= mysqli_query($conn , $sql2);
while ($row2 = $result2->fetch_assoc()) {                
        $sql3    = "SELECT * FROM interests WHERE InterestsID in (SELECT InterestsID from friendsinterests where FriendsID=".$id.") AND Interests = '" . $row2["Interests"] . "';"; 
        $result3 = mysqli_query($conn, $sql3);
        $row3 = $result3->fetch_assoc();
                if(!empty($row3["Interests"])){
                        echo "<input type='checkbox' id = 'interest' name='interest[]' value='".$row2['InterestsID']."' id=". $row2['Interests'] . " checked/>".
                        "<label for=" . $row2['Interests'] . ">" . $row2['Interests'] . "</label><br>";
                }
                else{
                        echo "<input type='checkbox' name='interest[]' value='".$row2['InterestsID']."' id=". $row2['Interests'] . "/>".
                        "<label for=" . $row2['Interests'] . ">" . $row2['Interests'] . "</label><br>";
                }

        }



        
echo"</div>";
echo '<br>';echo '<br>';            
echo"<br>
<button type='submit' name='submit' id='submit'>Edit</button>
</form>";
?>
</div>                      
</div>
