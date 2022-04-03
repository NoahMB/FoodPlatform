<?php

function emptyInputSignup($name, $email, $phonenumber, $username, $pwd, $pwdrepeat)
{
    $result;
    if (empty($name) || empty($email) || empty($phonenumber) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
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
function uidExists($conn, $username, $email)
{
    $result = true;
    $sql = "SELECT * FROM tblbesteller WHERE fldGebruikersnaam = ? OR fldMail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
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

function createUser($conn, $name, $phonenumber, $email, $username, $pwd)
{
    $sql = "INSERT INTO tblbesteller (fldVoorNaam, fldTel, fldMail , fldGebruikersnaam, fldWachtwoord) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $phonenumber, $email, $username, $hashedPwd);

    mysqli_stmt_execute($stmt);
    $id = $conn->insert_id;
    $sql = "INSERT INTO tblrelatieacctype (fldmasterID, fldchildID) VALUES ('$id', '$id')";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["fldWachtwoord"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $sql = "SELECT tblafdeling.fldBedrijfID FROM tblafdelingbesteller
        INNER JOIN tblafdeling USING(fldAfdelingID)
        WHERE tblafdelingbesteller.fldBestellerID = ?
        LIMIT 1";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $resultdata = mysqli_stmt_get_result($stmt);
        $uidBedrijf = mysqli_fetch_assoc($resultdata);
        mysqli_stmt_close($stmt);
        $_SESSION["fldBestellerID"] = $uidExists["fldBestellerID"];
        $_SESSION["fldGebruikersnaam"] = $uidExists["fldGebruikersnaam"];
        $_SESSION["fldBedrijfID"] = $uidBedrijf["fldBedrijfID"];

        header("location: ../../frontend/index.php?table=created");
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
