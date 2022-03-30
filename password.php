<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>KADDOO SSO password</title>
</head>
<body>
<?php include_once 'header.php';?>
    
    <div class="SignUP_C">
        <div  class="content">
            <form action="" method="get">
                <h1>
                    Reset Password
                </h1>
                <p>
                    Enter your address linked to your kaddoo account
                </p>
                <label for="email">
                  E-MAIL
                </label>
               <br>
               <input type="email" id="email" name="email" placeholder="Enter your Email"> 
               <br>
               <br>
               <input type="submit" value="send" id="btn_submit" name="submit">

            </form>
        </div>
    
    </div>



    <?php include_once 'footer.php';?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>