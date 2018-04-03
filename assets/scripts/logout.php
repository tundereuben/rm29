<?php

$logout =  $_GET['logout'];

if($logout == 1){
    if(isset($_SESSION['user_id']) && $logout == 1){
        session_destroy();
    //    setcookie("rememberme", "", time()-3600);
    }
}

?>