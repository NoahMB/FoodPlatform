<?php

function emptyInputSignup($name, $email, $phonenumber, $pwd, $pwdrepeat, $gender, $birthday, $LastName)
{
    $result;
    if (empty($name) || empty($email) || empty($phonenumber) || empty($pwd) || empty($pwdrepeat)|| empty($gender)|| empty($birthday)|| empty($LastName) ) {
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
    $sql = "SELECT * FROM accounts WHERE Email = ?;";
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


function createUser($conn, $name, $phonenumber, $email, $pwd, $gender, $birthday, $LastName)
{
    $sql = "INSERT INTO accounts (FirstName, PhoneNr, Email , Gender, Birthdate, LastName ,Password) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed2");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $name, $phonenumber, $email, $gender, $birthday, $LastName, $hashedPwd);

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
        $_SESSION["fldAccountsID"] = $uidExists["AccountsID"];
        $_SESSION["Firstname"] = $uidExists["Firstname"];

        header("location: ../calendaPage.php?table=created");
        exit();
    }
}

function emptyInputadres($straat, $huisnr, $gemeente, $postcode, $leveruur)
{
    $result;
    if (empty($straat) || empty($huisnr) || empty($gemeente) || empty($postcode) || empty($leveruur)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
