<?php
//Start Session
session_start();
//Connect to the database
include("connection.php");

$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];

global $event_title, $event_type, $event_description, $username, $email;



//Prepare variales for the database
$event_title = filter_var($_POST["event_title"], FILTER_SANITIZE_STRING);
$event_type = filter_var($_POST["event_type"], FILTER_SANITIZE_STRING);
$event_description = filter_var($_POST["event_description"], FILTER_SANITIZE_STRING);
$event_location = filter_var($_POST["location"], FILTER_SANITIZE_STRING);
$event_date=  filter_var($_POST["date"], FILTER_SANITIZE_STRING);

echo $event_title;

//UPLOAD PDF FILE
if(isset($_FILES['pdf'])){
    $file = $_FILES['pdf'];
    
    //File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    
    //Work out the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    
    $allowed = array('pdf');
    
//    print_r($file);
    if(in_array($file_ext, $allowed)){
        if($file_error === 0){
            if($file_size <= 2097152){
               $file_name_new = uniqid('', true). '.' . $file_ext;
                $file_destination = '../../pdf/' . $file_name_new;
                if(move_uploaded_file($file_tmp, $file_destination)){
                    $file_destination = 'pdf/' . $file_name_new; // To solve file relative path problems
                }
            }
        }
    }
}

//UPLOAD EVENT IMAGE
if(isset($_FILES['eventPic'])){
    $file = $_FILES['eventPic'];
    
    //File properties
    $file_name2 = $file['name'];
    $file_tmp2 = $file['tmp_name'];
    $file_size2 = $file['size'];
    $file_error2 = $file['error'];
    
    //Work out the file extension
    $file_ext2 = explode('.', $file_name2);
    $file_ext2 = strtolower(end($file_ext2));
    
    $allowed2 = array('jpg', 'png','jpeg');
    
//    print_r($file);
    if(in_array($file_ext2, $allowed2)){
        if($file_error2 === 0){
            if($file_size2 <= 10485760){
               $file_name_new2 = uniqid('', true). '.' . $file_ext2;
                $file_destination2 = '../../images/' . $file_name_new2;
                if(move_uploaded_file($file_tmp2, $file_destination2)){
                    $file_destination2 = 'images/' . $file_name_new2;// To solve file relative path problems
                }
            }
        }
    }
}

$time = time();


// A random number to be added to the url
$rand = bin2hex(openssl_random_pseudo_bytes(16));

//Run query: Check combination if email and user_id exists
$sql = "SELECT * FROM users WHERE email='$email' AND user_id='$user_id'";

$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}

//If email and user_id don't match print error
$count = mysqli_num_rows($result);


$sql = "INSERT INTO events (user_id, event_title, event_type, event_description, event_location, date, pdf, eventPic, time, rand) VALUES ('$user_id', '$event_title', '$event_type', '$event_description', '$event_location', '$event_date', '$file_destination','$file_destination2', '$time', '$rand')";

$result = mysqli_query($link, $sql);

if(!$result){
//    echo '<div class="alert alert-danger">There was an error inserting the user details into the database!</div>'; 
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}else{
    echo '
    <div class="alert alert-success">You have successfully created an event! Click the manage events tab to view your events.
    </div>
    ';
}
  
echo $file_destination, $file_destination2;      
?>




<!--old code. to be discarded-->
<?php
/*
//Start Session
session_start();
//Connect to the database
include("connection.php");

$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];

//global $errors, $username, $email, $password, $password2;

//pdf UPLOAD
if(isset($_FILES['pdf'])){
    $file = $_FILES['pdf'];
    
    //File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    
    //Work out the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    
    $allowed = array('pdf', 'jpg', 'png','jpeg');
    
//    print_r($file);
    if(in_array($file_ext, $allowed)){
        if($file_error === 0){
            if($file_size <= 2097152){
               $file_name_new = uniqid('', true). '.' . $file_ext;
                $file_destination = 'images/' . $file_name_new;
                if(move_uploaded_file($file_tmp, $file_destination)){
                    echo $file_destination;
                }
            }
        }
    }
}
//  pdf upload ends


//Prepare variales for the database
$event_title = filter_var($_POST["event_title"], FILTER_SANITIZE_STRING);
$event_type = filter_var($_POST["event_type"], FILTER_SANITIZE_STRING);
$event_description = filter_var($_POST["event_description"], FILTER_SANITIZE_STRING);
//collect file name
$time = time();


//Run query: Check combination if email and user_id exists
$sql = "SELECT * FROM users WHERE email='$email' AND user_id='$user_id'";

$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
        //If email and user_id don't match print error
$count = mysqli_num_rows($result);

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
    
    
    $sql = "INSERT INTO events (user_id, event_title, event_type, event_description, pdf, time) VALUES ('$user_id', '$event_title', '$event_type', '$event_description', '', '$time')";
    
    $result = mysqli_query($link, $sql);
    
    if(!$result){
    //    echo '<div class="alert alert-danger">There was an error inserting the user details into the database!</div>'; 
        echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
        exit;
    }else{
        echo '
        <div class="alert alert-success">You have successfully created an event! Click the manage events tab to view your events.
        </div>
        ';
    }
    
 */       
?>