<?php
session_start();
include('connection.php');

global $file_destination, $file_destination2;
    
//get the id of the note sent through Ajax
//$id = $_POST['id'];
$id= $_SESSION['event_id'];


//Prepare variales for the database
$event_title = filter_var($_POST["event_title"], FILTER_SANITIZE_STRING);
$event_type = filter_var($_POST["event_type"], FILTER_SANITIZE_STRING);
$event_description = filter_var($_POST["event_description"], FILTER_SANITIZE_STRING);
$event_location = filter_var($_POST["location"], FILTER_SANITIZE_STRING);
$event_date= filter_var($_POST["date"], FILTER_SANITIZE_STRING);
$time= date('Y-m-d');

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
                $file_destination = '../../pdf/' . $file_name_new;
                if(move_uploaded_file($file_tmp, $file_destination)){
                     $file_destination = 'pdf/' . $file_name_new; // To solve file relative path problems
                    $sql = "UPDATE events SET pdf='$file_destination' WHERE id='$id'";
                    $result = mysqli_query($link, $sql);
                    if(!$result){
                        echo 'error';   
                    }else{
                        echo "Event program uploaded successfully.";
                    }
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
                    $sql = "UPDATE events SET eventPic='$file_destination2' WHERE id='$id'";
                    $result = mysqli_query($link, $sql);
                    if(!$result){
                        echo 'error';   
                    }else{
                        echo "Event image uploaded successfully.";
                    }
                }
            }
        }
    }
}


//get the time
$time = time();


//run a query to update the the Event info
$sql = "UPDATE events SET event_title='$event_title', event_type='$event_type', event_description='$event_description', event_location='$event_location', date = '$event_date', time = '$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}else{
    echo "Event details updated successfully.";
}

?>