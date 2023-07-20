<?php include_once 'includes/header.php';?>
    <title>Log in</title>
    <link rel="shortcut icon" type="icon" href ="Image/FavIconLogin.ico">
</head>
<body>
<?php include_once 'includes/nav.php';?>

        <div class="loginSignup">
            <h1>
                Welkom terug!
            </h1>

            <p> <strong> Nog geen account?</strong> <a href="SignUp.php">Nu inschrijven</a> </p>
            
            <form action="includes/login.inc.php" method="post">
                <div class="form-group">
                    <label for="uid">Email</label>
                    <input type="text" name="uid" id="uid" placeholder="Email" required="true">
                </div>
                <div class="form-group">
                    <label for="pwd">Wachtwoord</label>
                    <input type="password" id="pwd" name="pwd" minlength="8" placeholder="Wachtwoord" required="true">
                </div>
                <p><a href="password.php">Wachtwoord vergeten?</a> </p>
                <input type="submit" value="Inloggen" id="btn_submit" class="btn btn-primary" name="submit">
            </form>
        </div>

<?php include_once 'includes/footer.php';?>