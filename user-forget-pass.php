<!doctype html>
<html lang="en">
  <head>
    <title>RM29 - Reset Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
        <div class="col-sm-4 offset-sm-4" id="login-form">
           <h4><a href="index.php"><img src="assets/img/logo.png" /></a></h4>
           <p>Request a password reset</p>
           
           <div id="forgotpasswordmessage"></div>
           
            <form method="post" id="forgotpasswordform">
              <div class="form-group">
                <label class="col-form-label sr-only" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="forgotemail">
              </div>              
              <button class="btn btn-info"> REQUEST A RESET LINK </button>
            </form>
            <div class="col-xs-6">
                <a href="user-login.php">Back to Login</a>  </div>
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