<?php
//Start Session
session_start();
//Connect to the database
include("connection.php");

$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];

global $imageFile;


    
//IMAGE UPLOAD
if(isset($_FILES["profilePic"]["name"])){
    $imageFile = ($_FILES["profilePic"]["name"]);
    $imageType = ($_FILES["profilePic"]["type"]);
    $validExt = array("jpeg", "jpg", "png");
    $fileExt = pathinfo($imageFile, PATHINFO_EXTENSION);
    echo $fileExt . "<br>";
    $ready = '';
    if(($imageType == "image/jpeg") || ($imageType == "image/jpg") || ($imageType == "image/png") && (in_array($fileExt, $validExt)) ) {
        $ready = true;
        echo "was valid image<br>";
    }else{
        echo "was not an image<br>";
        $ready = false;
    }
    
    if(($_FILES["profilePic"]["size"]<1000000) && $ready !=false){
        $ready = true;
        echo "file size is " . $_FILES["profilePic"]["size"] ."<br>";
    }else {
        echo "file was TOO BIG!<br>";
        $ready=false;
    }
    
    if($_FILES["profilePic"]["error"]){
        echo "looks like there was an error ".$_FILES["profilePic"]["error"]."<br>";
        $ready=false;
    }
    
    $targetPath = "../../images/".$imageFile;
    $sourcePath = $_FILES["profilePic"]["tmp_name"];
    if(file_exists($targetPath)){
        echo "File already there <br>";
        $ready = false;
    }
    
   if($ready == true){
      move_uploaded_file($sourcePath, $targetPath);
//       echo "upload successful <br> <img src='".$targetPath. "'width='100px' height='100px'>";
       $sql = "UPDATE users SET profilePic='$imageFile' WHERE user_id = '$user_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo 'error';   
        }else{
            echo "Event program uploaded successfully.";
        }
   }
}
//  Image upload ends

//Prepare variales for the database
$firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);

$short_desc = filter_var($_POST["short_desc"], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
$address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
$state = filter_var($_POST["state"], FILTER_SANITIZE_STRING);
$state = filter_var($_POST["state"], FILTER_SANITIZE_STRING);
$city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
//    Amend city to stop throwing errors
if(empty($city)){
    $city=" ";
}else{
   $city = filter_var($_POST["city"], FILTER_SANITIZE_STRING); 
}

//Image Upload


//End Image Upload


        //Run query: Check combination if email and user_id exists
//$sql = "SELECT * FROM users WHERE email='$email' AND user_id='$user_id'";
//
//$result = mysqli_query($link, $sql);
//
//if(!$result){
//    echo '<div class="alert alert-danger">Error running the query!</div>';
//    exit;
//}
//        //If email and user_id don't match print error
//$count = mysqli_num_rows($result);
//
//if($count !== 1){
//    echo '<div class="alert alert-danger">Wrong username or password.</div>';  
//}else{
    //log the user in: Set session variables
//    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//    $_SESSION['user_id'] = $row['user_id'];
//    $_SESSION['firstname'] = $row['firstname'];
//    $_SESSION['lastname'] = $row['lastname'];
//    $_SESSION['email'] = $row['email'];
    
    //Insert user details and activation code in the users table
//    $sql = "INSERT INTO users (firstname, lastname, email, short_desc) VALUES ('$firstname', '$lastname', '$email', '$short_desc')";
//    $result = mysqli_query($link, $sql);
    
    
    $sql = "UPDATE users SET short_desc='$short_desc', phone='$phone', address='$address', state='$state', city='$city' WHERE user_id = '$user_id'";
    
    $result = mysqli_query($link, $sql);
    
    if(!$result){
    //    echo '<div class="alert alert-danger">There was an error inserting the user details into the database!</div>'; 
        echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
        exit;
    }else{
        echo '
        <div class="alert alert-success">You have successfully updated your profile information! 
        </div>
        ';
    }
      
?>