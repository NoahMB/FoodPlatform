<?php
include_once "includes/conn.php";

if (isset($_SESSION["Voornaam"])) {
  $sql = "SELECT * FROM tblGuardian WHERE GuardianID = " . $_SESSION["GuardianID"];
  $result = mysqli_query($conn, $sql);
  $id = $_SESSION['Voornaam'];
           
  echo"

  <nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <a class='nav-item nav-photo' href='Calendar.php'><img src='Image/logoKasteeltje.png' alt='logo Kasteeltje' width='100%' height='100%'></a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false'aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse justify-content-end' id='navbarNavAltMarkup'>
    <div class='navbar-nav'>
      <a class='nav-item nav-link active' href='includes/logout.php'>Logout</a>
      <a class='nav-item nav-link active' href='Calendar.php'>Welcome, " . $id ."</a>
    </div>
  </div>
</nav>
  ";

}
else 
{
  echo"
  <nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <a class='nav-item nav-photo' href='index.php' class='logo'><img src='Image/logoKasteeltje.png' alt='logo Kasteeltje' width='100%' height='100%'></a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false'aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse justify-content-end' id='navbarNavAltMarkup'>
    <div class='navbar-nav'>
      <a class='nav-item nav-link active' href='index.php'>Home</a>
      <a class='nav-item nav-link active' href='signup.php'>Sign Up</a>
      <a class='nav-item nav-link active' href='login.php'>Log In</a>
    </div>
  </div>
</nav>              
  ";
}
