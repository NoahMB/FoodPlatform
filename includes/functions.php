<?php

function emptyInputSignup($name, $email, $phonenumber, $pwd, $pwdrepeat,  $LastName)
{
    $result;
    if (empty($name) || empty($email) || empty($phonenumber) || empty($pwd) || empty($pwdrepeat)|| empty($LastName) ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
// function invalidUid($username)
// {
//     $result;
//     if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
//         $result = true;
//     } else {
//         $result = false;
//     }
//     return $result;
// }
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdrepeat)
{
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $email)
{
    $result = true;
    $sql = "SELECT * FROM tblguardian WHERE Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed1");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
    exit();
}


function createUser($conn, $name, $phonenumber, $email, $pwd,  $LastName)
{
    $sql = "INSERT INTO tblguardian (Voornaam, PhoneNr, Email  naam ,Pwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed2");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $phonenumber, $email, $LastName, $hashedPwd);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($email, $pwd)
{
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $email, $pwd)
{
    $uidExists = uidExists($conn, $email);
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["Password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["AccountsID"] = $uidExists["AccountsID"];
        $_SESSION["Firstname"] = $uidExists["Firstname"];

        header("location: ../calendaPage.php?table=created");
        exit();
    }
}


/*function emptyInputFriends($name, $LastName, $gender, $interest)
{
    $result;
    if (empty($name) || empty($LastName) || empty($gender) || empty($interest)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function AddFriend($conn, $name, $LastName, $birthday, $interest, $id)
{
     
    $sql = "INSERT INTO friends (Firstname, Lastname, Birthdate , AccountsID) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../calendaPage.php?error=stmtfailed3");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssss", $name, $LastName, $birthday, $id);
    
    
    mysqli_stmt_execute($stmt);

    $sqlMaxID = "SELECT FriendsID FROM friends WHERE FriendsID = (SELECT MAX(FriendsID) FROM friends)";
    $resultMax = mysqli_query($conn , $sqlMaxID);
    $rowMax = mysqli_fetch_array($resultMax);

    foreach ($interest as $int) {
        $sql2 = "INSERT INTO friendsinterests (FriendsID, InterestsID) VALUES (".$rowMax['FriendsID']."," .$int. ")";
        mysqli_query($conn , $sql2);
    }

    $eventname = $name ." ". $LastName. " Birthday";
    $year = date("Y");
    $month = date("m",strtotime($birthday));
    $day = date("d", strtotime($birthday));
    $date = $year ."-". $month."-". $day;

    $sql3 = "INSERT INTO events (Name, Date, FriendsID) Values ('".$eventname."','".$date."',".$rowMax['FriendsID'].")";
    mysqli_query($conn , $sql3);
    mysqli_stmt_close($stmt);
   
    header("location: ../calendaPage.php?error=none");
    exit();
}
function emptyInputevent($friends, $Eventname, $Eventdate)
{
    $result;
    if (empty($friends) || empty($Eventname) || empty($Eventdate)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function Addevent($conn, $friends, $Eventname, $Eventdate)
{
    $sql3 = "INSERT INTO events (Name, Date, FriendsID) Values ('".$Eventname."','".$Eventdate."',".$friends.")";
    

    mysqli_query($conn , $sql3);
   
    header("location: ../calendaPage.php?error=none");
    exit();
}*/