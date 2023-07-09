<?php
include_once "includes/conn.php";


if (isset($_SESSION["Voornaam"])) {
  $sql = "SELECT * FROM tblGuardian WHERE GuardianID = " . $_SESSION["GuardianID"];
  $result = mysqli_query($conn, $sql);
  $id = $_SESSION['Voornaam'];
           
  echo"
  <div class='header'>
    <a href='index.php' class='logo'>FOODPLATFORM</a>
    <div class='header-right'>
    <a href='includes/logout.php'>Logout</a>
    <a href='Calendar.php'>Welcome, " . $id ."</a>
    </div>
  </div>";
}
else {
  echo"<div class='header'>
  <a href='index.php' class='logo'>FOODPLATFORM</a>
  <div class='header-right'> 
    <a href='index.php'>Home</a>
    <a href='signup.php'>Sign Up</a>
    <a href='login.php'>Log In</a>
  </div>
</div>";
}
