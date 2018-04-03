<?php
//The user is redirected to this file after clicking the activation link
//Signup link contains two GET parameters: email and activation key
session_start();
include('assets/scripts/connection.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <title>RM29 - Confirmation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
        <div class="col-sm-8 offset-sm-2" id="login-form">
           <h4><a href="index.php"><img src="assets/img/logo.png"></a></h4>
           <hr>
           <p>Account Confirmation</p>
                    
            <!-- CONFIRM THAT USER IS REGISTERED -->
            <?php
            //If email or activation key is missing show an error
            if(!isset($_GET['email']) || !isset($_GET['key'])){
                echo '<div class="alert alert-danger">There was an error. Please click on the activation link you recieved by email.</div>'; 
                exit;
            }
            //else
                //Store them in two variables
                $email = $_GET['email'];
                $key = $_GET['key'];
                //Prepare variables for the query
                $email = mysqli_real_escape_string($link, $email);
                $key = mysqli_real_escape_string($link, $key);
            
            
                //Run query: set activation field to "activate" for the provided email
                $sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
                $result = mysqli_query($link, $sql);
                //If query is successful, show success message and invite user to login
                if (mysqli_affected_rows($link) == 1){
                    echo '
                    <div class="container no-shadow">
                    <h1 class="text-center">Success!</h1>
                    <p class="lead">You have successfully actived your account.</p>

                      <div>
                        <div style="text-align:center; margin:auto"><a class="btn btn-success" href="user-login.php">Login</a></div>
                      </div>
                  </div> 
                    '; 
                exit;
                }else {
                    //Show error message 
                    echo '<div class="alert alert-danger">Your account could not be activated. Please try again later. $key</div>'; 
                }

            ?>
            
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>