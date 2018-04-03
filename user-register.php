<?php
    require_once "config.php";

    if(isset($_SESSION['access_token'])){
        header('Location: event-manage.php');
        exit();
    }

    //$redirectURL = "http://localhost/a/fb-callback-signup.php";
    $redirectURL = "https://www.rm29.org/fb-callback-signup.php";
    $permissions = ['email'];
    $loginURL = $helper->getLoginURL($redirectURL, $permissions);
//    echo $loginURL;
?>

<!doctype html>
<html lang="en">
  <head>
    <title>RM29 - Sign Up</title>
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
        <div class="col-sm-4 offset-sm-4 col-xs-8" id="login-form">
           <h4><a href="index.php"><img src="assets/img/logo.png" /></a></h4>
           <p>Create an account</p>
           
           <div id="signupmessage"></div>
           
            <form method="post" id="signupform">
              <div class="form-group">
                <label class="col-form-label sr-only" for="firstname">First name</label>
                <input type="text" class="form-control" name="firstname"  id="firstname" placeholder="First name">
              </div>
              <div class="form-group">
                <label class="col-form-label sr-only" for="Surname">Surname</label>
                <input type="text" class="form-control" name="lastname" id="surnmame" placeholder="Surname">
              </div>
              <div class="form-group">
                <label class="col-form-label sr-only" for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="col-form-label sr-only" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
              <div class="form-group">
               <p>User type:</p>
                <label class="radio-inline">
                  <input type="radio" name="userType" value="individual"> Individual
                </label>
                <label class="radio-inline">
                  <input type="radio" name="userType" value="eventPlanner"> Event Planner
                </label>
              </div>
              <button class="btn btn-info">SIGN UP </button>
               <!-- FACEBOOK LOGIN -->    
                <button  class="btn" type="button" value="Login with facebook" onclick="window.location='<?php echo $loginURL;?>'" style="background:#3b5998;"><i class="fa fa-facebook" aria-hidden="true"></i>
Signup with Facebook</button>
            </form>
            
            
            
            <div class="col-xs-6">
                Already have an account? <a href="user-login.php">Login</a>
            </div>
        </div>
    </div>

   
      
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <script src="assets/scripts/script.js"></script>
  </body>
</html>