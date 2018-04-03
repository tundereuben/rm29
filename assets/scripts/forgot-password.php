<?php
global $errors, $row, $user_id,  $resultMessage;
//Start session
session_start();
//Connect to the database
include('connection.php');

//Check user inputs
//    Define error message
$missingEmail = '<p>Please enter your email address!</p>';
$invalidEmail = '<p>Please enter a valid email address</p>';

//    Get email
//    Store errors in errors variable
if(empty($_POST["forgotemail"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}

//    IF there are any errors
    //        print error messages
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage; 
    exit;
}
//    else: No errors
    //Prepare variables for the query
$email = mysqli_real_escape_string($link, $email);
//        Run query to check if the email exists in the users table
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
$count = mysqli_num_rows($result);

//        If the email does not exist
//            print error message
if($count != 1){
    echo '<div class="alert alert-danger">That email does not exist in our database!</div>';     exit;
}

//        else
//            get user_id
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['user_id'];
    //            Create a unique activation code

$key = bin2hex(openssl_random_pseudo_bytes(16));
    // Insert user details and activation code in the forgotpassword table
$time = time();
$status = 'pending';
$sql = "INSERT INTO forgotpassword
(`user_id`, `rkey`, `time`, `status`) VALUES ('$user_id', '$key', '$time', '$status')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the user details into the database!</div>'; 
    exit;
}

// Send email with link to resetpassword.php with user id and activation code
$message = "Please click on this link to reset your password:\n\n";
$message .= "rm29.org/assets/scripts/user-reset-pass.php?user_id=$user_id&key=$key";

if(mail($email, 'Reset your password', $message, 'From:'.'registration@RM29.org')){
     // If email sent successfully
        //   print success message
  echo "<div class='alert alert-success'>An email has been sent to $email. Please click on the link to reset your password.</div>";   
}
    
            
?>