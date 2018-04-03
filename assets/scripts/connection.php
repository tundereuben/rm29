<?php

//$link = mysqli_connect("localhost", "rm29org_admin", "@1lucent", "rm29org_db");

$link = mysqli_connect("localhost", "root", "", "rm29");


if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error()); 
    echo "<script>window.alert('Hi!')</script>";
}
?>