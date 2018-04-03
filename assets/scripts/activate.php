<?php
//The user is redirected to this file after clicking the activation link
//Signup link contains two GET parameters: email and activation key
session_start();
include('connection.php');

?>


<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
<style>
    h1{
        color:purple;   
    }
    .contactForm{
        border:1px solid #7c73f6;
        margin-top: 50px;
        border-radius: 15px;
    }
</style> 

</head>
        <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
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
        <p class="lead">Nullam at elementum risus. Quisque ornare hendrerit risus, sed cursus lectus accumsan eu. Suspendisse non ultrices urna. Aenean vel leo dictum, lobortis est non, sollicitudin lorem.</p>
          
          <div>
            <div style="text-align:center; margin:auto"><a class="btn btn-success" href="user-login.html">Login</a></div>
          </div>
      </div> 
        '; 
    exit;
    }else {
        //Show error message 
        echo '<div class="alert alert-danger">Your account could not be activated. Please try again later.</div>'; 
    }
            
?>
            
        </div>
    </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        </body>
</html>
<?php ob_flush(); ?>