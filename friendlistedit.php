<?php
 include_once 'includes/header.php'; 

 require_once 'includes/conn.php';
 ?>
 <title>Edit FriendList</title>
 </head>
 <body>
        <style>
              .kleiner{
                      width: 50px;
                      height: 50px;
              }  
              .flexy{
                      display: flex;
                      flex-direction: row;
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

                ?>  
                        <div class="EditFriendListContent">
                                <h1>Edit Friend</h1>
                        <?php         
                                echo '<br>';               
                                echo "<form action='friendlistedit.php?id=".$id."' method ='POST'>";
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
                        $sql2 = "SELECT * FROM interests WHERE InterestsID in (SELECT InterestsID from friendsinterests where FriendsID=".$id.")";
                                        $result2= mysqli_query($conn , $sql2);
                                        echo   "<td>";
                                        while ($row2 = $result2->fetch_assoc()) {
                                                
                                                echo"<div class='flexy'><select name='interest' class ='InputEditList' id='interest' multiple>";
                                                
                                $sql3    = "SELECT * FROM interests";
                                
                                $result = mysqli_query($conn, $sql3);
                                
                                if ($result->num_rows > 0) {
                                while ($row3 = $result->fetch_assoc()) {
                                        echo $row3['Interests'] ;
                                        echo $row2['Interests'] ;
                                        if($row3['Interests'] == $row2['Interests']){
                                                echo "<option value='".$row3['Interests']."' selected>".$row3['Interests']."</option>";
                                        }
                                        else{
                                                echo "<option value='".$row3['Interests']."'>".$row3['Interests']."</option>";
                                        }
                                        
                                        
                                }
                                }
                                
                                
                                                echo"</select>";
                                                echo"<a href='deleteinterest.php?id=".$row2['InterestsID']."'><div class='kleiner'><svg xmlns='http://www.w3.org/2000/svg' class='h-2 w-2' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                                                <path stroke-linecap='round' stroke-linejoin='round' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                                        </svg></div></a></div>";
                                                echo '<br>';echo '<br>';
                                        }
                        echo"<br>
                        <button type='submit' name='submit' id='submit'>Edit</button>
                        </form>
                        
                        
                        ";

                        
                                }
                                if (isset($_POST["submit"])) {
                                        //code...
                                $interest = $_POST["interest"];
                                $Birthdate = $_POST["Birthdate"];
                                $Lastname = $_POST["Lastname"];
                                $Firstname = $_POST["Firstname"];
                                

                                $sqlupdate = "UPDATE friends SET Firstname = '".$Firstname."', Lastname = '".$Lastname."', Birthdate = '".$Birthdate."' WHERE FriendsID = $id";
                                mysqli_query($conn, $sqlupdate);
                                
                                // idk with new database ??????????????????????????
                                $updateinterest = "";
                                }
                        ?>
                        </div>                      
                                        
                 

</div>



            
                  
            