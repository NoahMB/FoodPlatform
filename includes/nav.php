<?php


include_once "includes/conn.php";


if (isset($_SESSION["Firstname"])) {
  $sql = "SELECT * FROM accounts WHERE AccountsID = " . $_SESSION["AccountsID"];
  $result = mysqli_query($conn, $sql);
  $id = $_SESSION['Firstname'];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  if($row['Email'] == "admin@gmail.com"){
                    echo"
                    <div class='header'>
                      <a href='Calendar.php' class='logo'>FOODPLATFORM</a>
                      <div class='header-right'>
                      <a href='includes/logout.php'>Logout</a>
                      <a href='friendlist.php'>Friend List</a>
                      <a href='backend.php'>Back-end</a>
                      <a href='UserProfile.php'>Welcome, " . $id ."</a>
                      </div>
                    </div>";
                  }
                  else{
                    echo"
                    <div class='header'>
                      <a href='Calendar.php' class='logo'>KADDOO</a>
                      <div class='header-right'>
                      <a href='includes/logout.php'>Logout</a>
                      <a href='friendlist.php'>Friend List</a>
                      <a href='UserProfile.php'>Welcome, " . $id ."</a>
                      </div>
                    </div>";
                  }
                
                }
  
  

}
}
else{
  echo"<div class='header'>
  <a href='index.php' class='logo'>FOODPLATFORM</a>
  <div class='header-right'> 
    <a href='index.php'>Home</a>
    <a href='signup.php'>Sign Up</a>
    <a href='login.php'>Log In</a>
  </div>
</div>";
}
