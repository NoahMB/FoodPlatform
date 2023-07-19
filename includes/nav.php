<?php
include_once "includes/conn.php";

if (isset($_SESSION["Voornaam"])) {
  $sql = "SELECT * FROM tblGuardian WHERE GuardianID = " . $_SESSION["GuardianID"];
  $result = mysqli_query($conn, $sql);
  $id = $_SESSION['Voornaam'];
           
  echo"

  <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <a class='nav-item nav-link' href='index.php'>FOODPLATFORM</a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false'aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse justify-content-end' id='navbarNavAltMarkup'>
    <div class='navbar-nav'>
      <a class='nav-item nav-link' href='includes/logout.php'>Logout</a>
      <a class='nav-item nav-link' href='Calendar.php'>Welcome, " . $id ."</a>
    </div>
  </div>
</nav>
  ";

}
else 
{
  echo"
  <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <a href='index.php' class='logo'>FOODPLATFORM</a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false'aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse justify-content-end' id='navbarNavAltMarkup'>
    <div class='navbar-nav'>
      <a class='nav-item nav-link' href='index.php'>Home</a>
      <a class='nav-item nav-link' href='signup.php'>Sign Up</a>
      <a class='nav-item nav-link' href='login.php'>Log In</a>
    </div>
  </div>
</nav>              
  ";
}
