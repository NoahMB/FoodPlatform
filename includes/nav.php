


<?php


include_once "includes/conn.php";

if (isset($_SESSION["Firstname"])) {
  $id = $_SESSION['Firstname'];
echo"
<div class='header'>
  <a href='calendaPage.php' class='logo'>KADDOO</a>
  <div class='header-right'> 
  <a href='includes/Logout.php'>Logout</a>
    <a href='UserProfile.php'>Welcome, " . $id ."</a>
  </div>
</div>";
}
else{
  echo"<div class='header'>
  <a href='index.php' class='logo'>KADDOO</a>
  <div class='header-right'> 
    <a href='index.php'>Home</a>
    <a href='SignUp.php'>Sign Up</a>
    <a href='LogIn.php'>Log In</a>
  </div>
</div>";
}
