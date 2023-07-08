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
            <br>
            <div class = "col">
                <a href="#" class = "fb btn">
                    <i class = "fa fa-facebook fa-fw"></i> Login with Facebook
                </a>
                <br>
                <br>
                <a href="#" class = "btn google">
                    <i class = "fa fa-google fa-fw"></i> Login with Google
                </a>

            </div>
            <br>
            <br>
            <p>
                Or use an email/user name.
            </p>
            <br>
            <br>
            <p> <strong> Don't have an accout yet?</strong> <a href="SignUp.php">Join Kaddoo.com now</a> </p>
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
      <?php include_once 'includes/footer.php';?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>
</html>