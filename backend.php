<?php 
include_once 'includes/header.php';

?>
<link rel="shortcut icon" type="icon" href ="Image/Calenda.ico">
</head>

<div>
<form method ="POST" action="includes/generatexls.inc.php">
<label for="month">Maand (09 voor September):</label><br>
  <input type="text" id="month" name="month" required><br>
  <label for="year">Jaar (2023):</label><br>
  <input type="text" id="year" name="year" required><br>
<input type="submit" value="genereer excel file" id="submit" name="submit">
</form>
</div>