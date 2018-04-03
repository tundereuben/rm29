<?php 
session_start();
include("assets/scripts/connection.php");
require_once "config.php";


try {
    $accessToken = $helper->getAccessToken();
} catch(\Facebook\Exceptions\FacebookResponseException $e){
    echo "Response Exception: " . $e->getMessage();
    exit();
} catch (\Facebook\Exceptions\FacebookSDKException $e){
     echo "SDK Exception: " . $e->getMessage();
    exit();
}

if(!$accessToken){
    header('Location: user-login.php');
    exit();
}

$oAuth2Client = $FB-> getOAuth2Client();
if(!$accessToken->isLongLived()){
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
}
    
    
$response = $FB->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
$userData = $response->getGraphNode() ->asArray();
$_SESSION['userData'] = $userData;
$_SESSION['access_token'] = (string) $accessToken;

$email = $_SESSION['userData']['email'];






//Run query: Check combination if email and password exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}


//If email doesn't exist in the database base, print error
$count = mysqli_num_rows($result);
if($count !== 1){
    echo "<div class='alert alert-danger'>You have to sign up first. <a href='https://www.rm29.org/user-register.php;'>Register an account</a> </div>";
    header('Location: user-register.php');
}else{
    //log the user in: Set session variables
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['short_desc'] = $row['short_desc'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['state'] = $row['state'];
    $_SESSION['city'] = $row['city'];
    
    header('Location: event-manage.php');
    exit();
}



?>

