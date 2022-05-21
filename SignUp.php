<?php include_once 'includes/header.php';?>
    <title>Kaddoo Sign Up</title>
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
                <label for="Firstname" >
                     First Name
                </label>
                <br>
                <input type="text" name="Firstname" id="Firstname" placeholder="Insert Your First Name" >
                <br>
    
                <label for="family_name">
                    Last Name
                </label>
                <br>
                <input type="text" name="family_name" id="family_name" placeholder="Insert Your Last Name" required="true">
                <br>
                
                <label for="email">
                   Enter Email
                </label>
                <br>
                <input type="email" id="email" name="email" placeholder="Enter your Email"> 
                <br>
                <label for="pwd">
                    Password
                </label>
                <br>
                <input type="password" id="pwd" name="pwd" minlength="8" placeholder="Enter your Password">
                <br>
                <label for="pwdrepeat">
                   Repeat Password
                </label>
                <br>
                <input type="password" id="pwdrepeat" name="pwdrepeat" minlength="8" placeholder="Repeat your Password">
                <br>
                <label for="Bday">
                    Your Birthday
                </label>
                <br>
                <input type="date" id="Bday" name="Bday"value="">
                <br>
                <label for="PhoneNr">
                    Enter your phone number
                </label>
                <br>
                <input type="tel" id="PhoneNr" name="PhoneNr" placeholder="Enter your phone number"> 
                <br>
                <label for="gender">
                    Gender
                </label>
                <br>
                <select name="gender" id="gender">
                    <option value="male">
                        Male
                    </option>
                    <option value="female">
                        Female
                    </option>
                </select>
                <br>
                <br>
            <input type="submit" value="Create Account" id="submit" name="submit">
            <br>
            <br>
            <br>
        </form>
        <p> <strong>Have an Account Already? </strong> <a href="Login.php">LOG IN NOW</a> </p>
    
       </div>

     </div>
</div>
    </div>
  
      
   
    <?php include_once 'includes/footer.php';?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>