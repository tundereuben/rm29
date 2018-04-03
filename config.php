<?php 
    session_start();

    require_once "Facebook/autoload.php";

    $FB = new \Facebook\Facebook([
       'app_id'  => '197495780811448',
        'app_secret' => '318120bf5f8f2af1d4fda96b6c289b77',
        'default_graph_version' => 'v2.10',
//        'persistent_data_handler'=>'session'
    ]);

    $helper = $FB -> getRedirectLoginHelper();

?>