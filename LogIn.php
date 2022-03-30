<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>Kuddoo log in</title>
</head>
<body>
<?php include_once 'header.php';?>
      <br>
        
      <div class="SignUP_C">
        <div class="content">
            <h1>
                Welcome Back!
            </h1>
            <p>
                SIGN in to continue
            </p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p>
                OR use an email/user name.
            </p>

            <p> <strong> Don't have an accout yet?</strong> <a href="index1.html">Join Kaddoo.com now</a> </p>
            <input type="text" name="family_name" id="form_family_name" placeholder="User Name / E-Mail" required="true">
            <br>
            <br>
            <br>
            <input type="password" id="pwd" name="pwd" minlength="8" placeholder="Password" required="true">
            <p><a href="password.html">forgot password?</a> </p>
            <br>
            <input type="submit" value="LOG IN" id="btn_submit" name="submit">
            <br>
            <br>
         </div>
      </div>      
      <?php include_once 'footer.php';?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>
</html>