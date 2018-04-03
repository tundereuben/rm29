<?php ob_start(); ?>
<!--This file receives the user_id and key generated to create the new password-->
<!--This file displays a form to input new password-->

<?php
session_start();
include('connection.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <title>RM29 - Reset Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link href="../../style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
        <div class="col-sm-4 offset-sm-4" id="reset-password">
           <h4><a href="index.php">RM29</a></h4>
           <p>Reset Your Password</p>
           
           <div id="resultmessage"></div>
           
            <?php
            //If user_id or key is missing
            if(!isset($_GET['user_id']) || !isset($_GET['key'])){
                echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>'; exit;
            }
            //else
                //Store them in two variables
            $user_id = $_GET['user_id'];
            $key = $_GET['key'];
            $time = time() - 86400;
                //Prepare variables for the query
            $user_id = mysqli_real_escape_string($link, $user_id);
            $key = mysqli_real_escape_string($link, $key);
                //Run Query: Check combination of user_id & key exists and less than 24h old
            $sql = "SELECT user_id FROM forgotpassword WHERE rkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
            $result = mysqli_query($link, $sql);
            if(!$result){
                echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
            }
            //If combination does not exist
            //show an error message
            $count = mysqli_num_rows($result);
            if($count !== 1){
                echo '<div class="alert alert-danger">Please try again.</div>';
                exit;
            }
            //print reset password form with hidden user_id and key fields
            echo "
            <form method=post id='passwordreset'>
            <input type=hidden name=key value=$key>
            <input type=hidden name=user_id value=$user_id>
            
            <div class='form-group'>
                <label for='password' class='sr-only'>Enter your new Password:</label>
                <input type='password' name='password' id='password' placeholder='Enter Password' class='form-control'>
            </div>
            <div class='form-group'>
                <label for='password2' class='sr-only'>Re-enter Password:</label>
                <input type='password' name='password2' id='password2' placeholder='Re-enter Password' class='form-control'>
            </div>
            <input type='submit' name='resetpassword' class='btn btn-info btn-lg' value='Reset Password'>


            </form>
            ";


            ?>
            
<!--
           <form>
               <div class="form-group">
                <label class="col-form-label sr-only" for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
                <div class="form-group">
                <label class="col-form-label sr-only" for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
               <button class="btn btn-info"> RESET PASSWORD </button>
               </form>
-->
        </div>
    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <!--Script for Ajax Call to storeresetpassword.php which processes form data-->
        <script>
         //Once the form is submitted
        $("#passwordreset").submit(function(event){ 
            //prevent default php processing
            event.preventDefault();
            //collect user inputs
            var datatopost = $(this).serializeArray();
        //    console.log(datatopost);
            //send them to signup.php using AJAX
            $.ajax({
                url: "storeresetpassword.php",
                type: "POST",
                data: datatopost,
                success: function(data){

                    $('#resultmessage').html(data);
                },
                error: function(){
                    $("#resultmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

                }

            });

        });           

        </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
  </body>
</html>