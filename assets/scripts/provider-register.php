<?php
//<!--Start session-->
session_start();
include('connection.php'); 

global $errors;

//<!--Check user inputs-->
//    <!--Define error messages-->
$missingBusinessName = '<p><strong>Please enter a Business Name!</strong></p>';
$missingBusinessPhone = '<p><strong>Please enter a Business Phone!</strong></p>';
$missingBusinessEmail = '<p><strong>Please enter Business email address!</strong></p>';
$invalidBusinessEmail = '<p><strong>Please enter a valid Business email address!</strong></p>';
$missingBusinessAddress = '<p><strong>Please enter Business address!</strong></p>';
$missingBusinessInstagram = '<p><strong>Please enter Business Instagram handle!</strong></p>';
$missingBusinessFacebook = '<p><strong>Please enter Business Facebook profile!</strong></p>';

$missingGuarantorFirstname = '<p><strong>Please enter guarantor\'s first name!</strong></p>';
$missingGuarantorLastname = '<p><strong>Please enter guarantor\'s last name!</strong></p>';
$missingGuarantorPhone= '<p><strong>Please enter guarantor\'s phone number!</strong></p>';
$missingGuarantorEmail = '<p><strong>Please enter guarantor\'s email address!</strong></p>';
$invalidGuarantorEmail = '<p><strong>Please enter a valid email address for guarantor!</strong></p>';



//    <!--Get username, email, password, usertype-->
//Get business name
if(empty($_POST["businessName"])){
    $errors .= $missingBusinessName;
}else{
    $businessName = filter_var($_POST["businessName"], FILTER_SANITIZE_STRING);   
}

//Get business phone
if(empty($_POST["businessPhone"])){
    $errors .= $missingBusinessPhone;
}else{
    $businessPhone = filter_var($_POST["businessPhone"], FILTER_SANITIZE_STRING);   
}

//Get bsuiness email
if(empty($_POST["businessEmail"])){
    $errors .= $missingBusinessEmail;   
}else{
    $businessEmail = filter_var($_POST["businessEmail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($businessEmail, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidBusinessEmail;   
    }
}

//Get business address
if(empty($_POST["businessAddress"])){
    $errors .= $missingBusinessAddress;
}else{
    $businessAddress = filter_var($_POST["businessAddress"], FILTER_SANITIZE_STRING);   
}

//Get instagram handle
if(empty($_POST["instagram"])){
    $errors .= $missingBusinessInstagram;
}else{
    $businessInstagram = filter_var($_POST["instagram"], FILTER_SANITIZE_STRING);   
}

//Get facebook profile
if(empty($_POST["facebook"])){
    $errors .= $missingBusinessFacebook;
}else{
    $businessFacebook = filter_var($_POST["facebook"], FILTER_SANITIZE_STRING);   
}

//Get Guarantor Firstname
if(empty($_POST["guarantorFirstname"])){
    $errors .= $missingGuarantorFirstname;
}else{
    $guarantorFirstName = filter_var($_POST["guarantorFirstname"], FILTER_SANITIZE_STRING);   
}

//Get Guarantor Lastname
if(empty($_POST["guarantorLastname"])){
    $errors .= $missingGuarantorLastname;
}else{
    $guarantorLastName = filter_var($_POST["guarantorLastname"], FILTER_SANITIZE_STRING);   
}

//Get  guarantor phone
if(empty($_POST["guarantorphone"])){
    $errors .= $missingGuarantorPhone;
}else{
    $guarantorPhone = filter_var($_POST["guarantorphone"], FILTER_SANITIZE_STRING);   
}

//Get guarantor email
if(empty($_POST["guarantoremail"])){
    $errors .= $missingGuarantorEmail;   
}else{
    $guarantorEmail = filter_var($_POST["guarantoremail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($guarantorEmail, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidGuarantorEmail;   
    }
}

//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//no errors

//Prepare variables for the queries
$businessName = mysqli_real_escape_string($link, $businessName);
$businessPhone = mysqli_real_escape_string($link, $businessPhone);
$businessEmail = mysqli_real_escape_string($link, $businessEmail);
$businessAddress = mysqli_real_escape_string($link, $businessAddress);
$businessState =  filter_var($_POST["state"], FILTER_SANITIZE_STRING); 
$businessLga =  filter_var($_POST["lga"], FILTER_SANITIZE_STRING); 
$businessInstagram = mysqli_real_escape_string($link, $businessInstagram);
$businessFacebook = mysqli_real_escape_string($link, $businessFacebook); 
$guarantorFirstName = mysqli_real_escape_string($link, $guarantorFirstName);
$guarantorLastName = mysqli_real_escape_string($link, $guarantorLastName);
$guarantorPhone = mysqli_real_escape_string($link, $guarantorPhone);
$guarantorEmail = mysqli_real_escape_string($link, $guarantorEmail);
$time = time();



//Insert service provider details  in the serviceProviders table
$sql = "INSERT INTO serviceproviders 
(businessName, businessPhone, businessEmail, businessAddress, businessState, businessLga, businessInstagram, businessFacebook, guarantorFirstName, guarantorLastName, guarantorPhone, guarantorEmail, date) 
VALUES 
('$businessName', '$businessPhone', '$businessEmail', '$businessAddress', '$businessState', '$businessLga', '$businessInstagram', '$businessFacebook', '$guarantorFirstName', '$guarantorLastName', '$guarantorPhone', '$guarantorEmail', '$time')";

$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the service provider details in the database!</div>'; 
    exit;
}

//Send the user an email with a link to activate.php with their email and activation code
$message = "New Service Provider Registration\n\n";
$message .= "
<html>
<body style='width:500px; margin:auto'>
    <div class='container' style='background:#29AAFE; padding:10px;font-family:calibri; line-height:30px;color:dimgray;'>
        <div style='background:#fff;border:solid 2px dimgray;padding:10px; font-size:1.1em;'>
            <h3>Service Provider Registration</h3>
            <p>Business Name: $businessName </p>
            <p>Business Phone: $businessPhone </p>
            <p>Business Email: $businessEmail </p>
            <p>Business Address: $businessAddress </p>
            <p>Business State: $businessState </p>
            <p>Business LGA: $businessLga </p>
            <p>Business Instagram: $businessInstagram </p>
            <p>Business Facebook: $businessFacebook </p>
            <p>Guarantor First Name: $guarantorFirstName </p>
            <p>Guarantor Last Name: $guarantorLastName </p>
            <p>Guarantor Phone: $guarantorPhone </p>
            <p>Guarantor Email: $guarantorEmail </p>
        </div>
    </div>  
  </body>
</html>
";

$headers = "From: no-reply@rm29.org\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(mail('tundeogunjimi@gmail.com, programmes@rm29.org', 'New Service Provider Registration from rm29.org', $message, $headers)){
       echo "<div class='alert alert-success'>Thank for your registering! We will get back to you shortly.</div>";
}
        
?>
		