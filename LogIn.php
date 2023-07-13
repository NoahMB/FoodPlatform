<?php include_once 'includes/header.php';?>
    <title>Log in</title>
    <link rel="shortcut icon" type="icon" href ="Image/FavIconLogin.ico">
</head>
<body>
<?php include_once 'includes/nav.php';?>
    <div class = "TextAllign">
    <div class="StyleSignUP">
         <div class ="SignUP_C">  
          <br>
        <div class="content">
            <form action="includes/login.inc.php" method="post">
            <br>
            <h1>
                Welcome Back!
            </h1>
            <br>
            <p>
                Sign in to continue
            </p>
            
            <br>
            <p> <strong> Don't have an accout yet?</strong> <a href="SignUp.php">Join now</a> </p>
            <input type="text" name="uid" id="uid" placeholder="E-Mail" required="true">
            <br>
            <br>
            <br>
            <input type="password" id="pwd" name="pwd" minlength="8" placeholder="Password" required="true">
            <br>
            <br>
            <p><a href="password.php">Forgot password?</a> </p>
            <br>
            <input type="submit" value="LOG IN" id="btn_submit" name="submit">
            <br>
            <br>

            </form>
    
            </div>
        </div> 

    </div>

</div>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>
</html>