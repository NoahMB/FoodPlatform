<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>Contact us</title>
</head>
<body>
<?php include_once 'header.php';?> 


      <div class="SignUP_C">
        <div class="content">
            <h1>
                CONTACT US
            </h1>
            <H2>
                LET'S GET IN TOUCH
            </H2>
            <br>
            <label for="form-firstname" >
               YOUR NAME
           </label>
           <br>
           <input type="text" name="Firstname" id="User_name" placeholder="Insert Your Name" >
           <br>
            <label for="email">
              YOUR EMAIL
             </label>
            <br>
            <input type="email" id="email" name="email" placeholder="Enter your Email"> 
            <br>
            <label for="form-firstname" >
               SUBJECT 
           </label>
           <br>
           <input type="text" name="Subject" id="Subject" placeholder="Insert Your Subject" >
            <br>
            <br>
            <textarea rows="8" cols="60" name="comment" form="usrform">
               </textarea>
               <br>
               <br>
               <input type="submit" value="Send Message" id="btn_submit" name="submit">
               <br>
               <br>
               <p>  CALL US :<a href="tel:+4733378901">+47 333 78 901</a></p>
        </div>
        
      </div>


      <br>
      <br>
      <br>
      <br>
      <br>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.html">Home</a></li>
                <li class="list-inline-item"><a href="contact.html">CONTACT US</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">CODE QUEST © 2022</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>