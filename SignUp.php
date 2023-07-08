<?php include_once 'includes/header.php';?>
    <title>Sign Up</title>
    <link rel="shortcut icon" type="icon" href ="Image/AddUser.ico">
</head>
<body>
    <?php include_once 'includes/nav.php';?> 
    
    <div class="TextAllign">
        
     <div class = "StyleSignUP">
       <div class="SignUP_C">
        <div class="content">
        
            <form method ="POST" action="includes/signup.inc.php">          
                   <br>
                    <h1>
                        WELCOME
                    </h1>
                    <p>Create your Account</p>
                    <br>
                <label for="Voornaam" >
                     First Name
                </label>
                <br>
                <input type="text" name="Voornaam" id="Voornaam" placeholder="Insert Your First Name" >
                <br>
                <label for="Naam">
                    Last Name
                </label>
                <br>
                <input type="text" name="Naam" id="Naam" placeholder="Insert Your Last Name" required="true">
                <br>
                <label for="Email">
                   Enter Email
                </label>
                <br>
                <input type="email" id="Email" name="Email" placeholder="Enter your Email"> 
                <br>
                <label for="Pwd">
                    Password
                </label>
                <br>
                <input type="password" id="Pwd" name="Pwd" minlength="8" placeholder="Enter your Password">
                <br>
                <label for="Pwdrepeat">
                   Repeat Password
                </label>
                <br>
                <input type="password" id="Pwdrepeat" name="Pwdrepeat" minlength="8" placeholder="Repeat your Password">
                <br>
                <label for="Telefoonnummer">
                    Enter your phone number
                </label>
                <br>
                <input type="tel" id="Telefoonnummer" name="Telefoonnummer" placeholder="Enter your phone number"> 
                <br>
                <br>
            <input type="submit" value="Create Account" id="submit" name="submit">
            <br>
            <br>
            <br>
        </form>
        <p> <strong>Have an Account Already? </strong> <a href="login.php">LOG IN NOW</a> </p>
       </div>
      </div>
     </div>
    </div>
   
    <?php include_once 'includes/footer.php';?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>