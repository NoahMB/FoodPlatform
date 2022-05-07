<?php include_once 'includes/header.php';?>
    <title>Kaddoo log in</title>
</head>
<body>
<?php include_once 'includes/nav.php';?>
<br>
<br>
<div class ="SignUP_C">  
<figure class ="card">
          <figcaption>
          <br>
        <div class="content">
            <form action="includes/login.inc.php" method="post">
            <h1>
                Welcome Back!
            </h1>
            <br>
            <p>
                Sign in to continue
            </p>
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

            <p> <strong> Don't have an accout yet?</strong> <a href="SignUp.php">Join Kaddoo.com now</a> </p>
            <input type="text" name="uid" id="uid" placeholder="E-Mail" required="true">
            <br>
            <br>
            <br>
            <input type="password" id="pwd" name="pwd" minlength="8" placeholder="Password" required="true">
            <p><a href="password.php">Forgot password?</a> </p>
            <br>
            <input type="submit" value="LOG IN" id="btn_submit" name="submit">
            <br>
            <br>

            </form>
            </figcaption>
      </figure> 
        </div>
      </div> 
      <br>     
      <?php include_once 'includes/footer.php';?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>
</html>