<?php include_once 'includes/header.php';?>
    <title>Sign Up</title>
    <link rel="shortcut icon" type="icon" href ="Image/AddUser.ico">
</head>
<body>
    <?php include_once 'includes/nav.php';?> 
        
        <div class="loginSignup">
            <h1>Welkom!</h1>
            <p><strong>Al een account? </strong> <a href="login.php">Inloggen</a> </p>
            <form method ="POST" action="includes/signup.inc.php">  
                
            <div class="form-group">
                <label for="Voornaam" >Voornaam</label>
                <input type="text" name="Voornaam" id="Voornaam" placeholder="Voornaam" >
            </div>
            <div class="form-group">
                <label for="Naam">Naam</label>
                <input type="text" name="Naam" id="Naam" placeholder="Naam" required="true">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" id="Email" name="Email" placeholder="Email"> 
            </div>
            <div class="form-group">
                <label for="Pwd">Wachtwoord</label>
                <input type="password" id="Pwd" name="Pwd" minlength="8" placeholder="Wachtwoord">
            </div>
            <div class="form-group">
                <label for="Pwdrepeat">Herhaal Wachtwoord</label>
                <input type="password" id="Pwdrepeat" name="Pwdrepeat" minlength="8" placeholder="Herhaal Wachtwoord">
            </div>
            <div class="form-group">
                <label for="Bday">Geboortedatum</label>
                <input type="date" id="Bday" name="Bday"value="">
            </div>
            <div class="form-group">
                <label for="Telefoonnummer">Telefoonnummer</label>
                <input type="tel" id="Telefoonnummer" name="Telefoonnummer" placeholder="Telefoonnummer"> 
            </div>
            <div class="form-group">
                <label for="gender">Geslacht</label>
                <select name="gender" id="gender">
                    <option value="male">
                        Man
                    </option>
                    <option value="female">
                        Vrouw
                    </option>
                    <option value="Geen">
                        Zeg ik liever niet
                    </option>
                </select>
            </div>
                <input type="submit" value="Account aanmaken" id="submit" name="submit" class="btn btn-primary">
            </form>
       </div>
   
<?php include_once 'includes/footer.php';?>