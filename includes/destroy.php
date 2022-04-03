<?php


function destroy($a){

    $servername = "127.0.0.1";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "Kaddoo");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    
    $sessieidtemp = "BESTELTEMP" . $a;
    $temptotaal = "Temptotaal" . $a;
    
    $sqldrop = " DROP TABLE " . $a;


    mysqli_query($conn, $sqldrop);

    $sqldrop1 = " DROP TABLE " . $sessieidtemp;
    

    mysqli_query($conn, $sqldrop1);

    $sqldrop2 = " DROP TABLE " . $temptotaal;
    

    mysqli_query($conn, $sqldrop2);

    session_destroy();
    header("location: ../index.php");

}