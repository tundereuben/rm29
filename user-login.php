<?php
    require_once "config.php";

    if(isset($_SESSION['access_token'])){
        header('Location: event-manage.php');
        exit();
    }

    //$redirectURL = "http://localhost/a/fb-callback-login.php";
    $redirectURL = "https://www.rm29.org/fb-callback-login.php";
    $permissions = ['email'];
    $loginURL = $helper->getLoginURL($redirectURL, $permissions);
//    echo $loginURL;
?>

<!doctype html>
<html lang="en">
  <head>
    <title>RM29 - Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://use.fontawesome.com/7dcc6d90e8.js"></script>
  </head>
  <body>
    <div class="container-fluid">
        <div class="col-sm-4 offset-sm-4" id="login-form">
           <h4><a href="index.php"><img src="assets/img/logo.png" /></a></h4>
           <p>Log in to your account</p>
           
           <div id="loginmessage"></div>
           
            <form method="post" id="loginform">
              <div class="form-group">
                <label class="col-form-label sr-only" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="loginemail">
              </div>
              <div class="form-group">
                <label class="col-form-label sr-only" for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="loginpassword">
              </div>
              
              <button class="btn btn-info"> LOGIN </button>
              <!-- FACEBOOK LOGIN -->    
<!--
                <button  class="btn" type="button" value="Login with facebook" onclick="window.location='<?php echo $loginURL; ?>'" style="background:#3b5998;"><i class="fa fa-facebook" aria-hidden="true"></i>
Login with Facebook</button>
-->
            </form>
            
            
            <div class="col-xs-6">
                <a href="user-forget-pass.php">Forget Password?</a> | <a href="user-register.php">Register an account</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <script src="assets/scripts/script.js"></script>
  </body>
</html>