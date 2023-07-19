<?php include_once 'includes/header.php';?>
    <title>Log in</title>
    <link rel="shortcut icon" type="icon" href ="Image/FavIconLogin.ico">
</head>
<body>
<?php include_once 'includes/nav.php';?>

        <h1>
            Welcome Back!
        </h1>

        <p> <strong> Don't have an accout yet?</strong> <a href="SignUp.php">Join now</a> </p>
        
        <form action="includes/login.inc.php" method="post">
            <div class="form-group">
                <label for="uid">Email address</label>
                <input type="text" name="uid" id="uid" placeholder="E-Mail" required="true">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd" minlength="8" placeholder="Password" required="true">
            </div>
            <p><a href="password.php">Forgot password?</a> </p>
            <input type="submit" value="LOG IN" id="btn_submit" class="btn btn-primary" name="submit">
        </form>

<?php include_once 'includes/footer.php';?>