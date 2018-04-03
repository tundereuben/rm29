<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email='$user_email' AND user_id='$user_id'";
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['email'] = $row['email'];
$_SESSION['imageFile'] = $row['profilePic'];
$_SESSION['short_desc'] = $row['short_desc'];
$_SESSION['phone'] = $row['phone'];
$_SESSION['address'] = $row['address'];
$_SESSION['state'] = $row['state'];
$_SESSION['city'] = $row['city'];

$user_id = $_SESSION['user_id'];
$user_firstname = $_SESSION['firstname'];
$user_lastname = $_SESSION['lastname'];
$user_email = $_SESSION['email'];
$short_desc = $_SESSION['short_desc'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$state = $_SESSION['state'];
$city = $_SESSION['city'];
$imageFile = $_SESSION['imageFile'];

$targetPath = "images/".$imageFile;


$codes = array();
    
$no_of_codes = $_POST['number'] -1 ;

for ($x = 0; $x <= $no_of_codes; $x++) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
    $str = "";
    $size = strlen( $chars );
    for( $i = 0; $i < 10; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }
//        echo $str . "<br>";

    array_push($codes, $str);
} 
//        print_r($codes);
//        echo json_encode($codes);
    echo implode("<br>",$codes);
?>