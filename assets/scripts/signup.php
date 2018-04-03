<?php
//<!--Start session-->
session_start();
include('connection.php'); 

global $errors;

//<!--Check user inputs-->
//    <!--Define error messages-->
$missingFirstname = '<p><strong>Please enter a username!</strong></p>';
$missingLastname = '<p><strong>Please enter a username!</strong></p>';
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long!</strong></p>';

$missingUsertype = '<p><strong>Select User type</strong></p>';



//    <!--Get username, email, password, usertype-->
//Get first
if(empty($_POST["firstname"])){
    $errors .= $missingFirstname;
}else{
    $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);   
}

//Get first
if(empty($_POST["lastname"])){
    $errors .= $missingLastname;
}else{
    $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);   
}

//Get email
if(empty($_POST["email"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}
//Get passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword; 
}elseif(!(strlen($_POST["password"])>6
//         and preg_match('/[A-Z]/',$_POST["password"])
//         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
//    if(empty($_POST["password2"])){
//        $errors .= $missingPassword2;
//    }else{
//        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
//        if($password !== $password2){
//            $errors .= $differentPassword;
//        }
    
}

//Get UserType
if(empty($_POST["userType"])){
    $errors .= $missingUsertype;
}else{
    $userType = filter_var($_POST["userType"], FILTER_SANITIZE_STRING);   
}

//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//no errors

//Prepare variables for the queries
$firstname = mysqli_real_escape_string($link, $firstname);
$lastname = mysqli_real_escape_string($link, $lastname);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
//$password = md5($password);
$password = hash('sha256', $password);
//128 bits -> 32 characters
//256 bits -> 64 characters

//If username exists in the users table print error

//If email exists in the users table print error
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;
}
//Create a unique  activation code
$activationkey = bin2hex(openssl_random_pseudo_bytes(16));
    //byte: unit of data = 8 bits
    //bit: 0 or 1
    //16 bytes = 16*8 = 128 bits
    //(2*2*2*2)*2*2*2*2*...*2
    //16*16*...*16
    //32 characters

//Insert user details and activation code in the users table
$sql = "INSERT INTO users (firstname, lastname, email, password, userType, activation, short_desc, phone, address, state, city, profilePic) VALUES ('$firstname', '$lastname', '$email', '$password', '$userType', '$activationkey', '', '', '', '', '','')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}

//Send the user an email with a link to activate.php with their email and activation code
$message = "Please click on this link to activate your account:\n\n";
$message .= "https://rm29.org/user-confirmation.php?email=" . urlencode($email) . "&key=$activationkey" . "&p=$password";

if(mail($email, 'Confirm your Registration', $message, 'From:'.'register@rm29.org')){
       echo "<div class='alert alert-success'>Thank for your registering! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
}
        
?>
		