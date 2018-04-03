<?php 
session_start();

 if(!isset($_SESSION['access_token'])){
    header('Location: user-login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Facebook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" style="margin-top:100px;">
       <div class="row justify-content-center">
           <div class="col-md-3">
               <img src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
               <?php echo $_SESSION['userData']['picture']['url'] ?>
           </div>
           <div class="col-md-9">
               <table class="table table-hover table bordered">
                   <tbody>
                       <tr>
                           <td>ID</td>
                           <td><?php echo $_SESSION['userData']['id'] ?></td>
                       </tr>
                       <tr>
                           <td>First Name</td>
                           <td><?php echo $_SESSION['userData']['first_name'] ?></td>
                       </tr>
                       <tr>
                           <td>Last Name</td>
                           <td><?php echo $_SESSION['userData']['last_name'] ?></td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td><?php echo $_SESSION['userData']['email'] ?></td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>
    </div>
</body>
</html>