<?php
//session_start();
include 'connection.php';


if(!empty($_POST['family-friend']) AND !empty($cityState = $_POST['city-state'])){
    $familyFriend = $_POST['family-friend'];
    $cityState = $_POST['city-state'];
    
//    echo $familyFriend . " " . $cityState;
    
    $sql = "SELECT * FROM users WHERE firstname ='$familyFriend' OR lastname='$familyFriend' ";

    //shows events or alert message
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){

                $user_id = $row['user_id'];

                $sql = "SELECT * FROM events WHERE user_id ='$user_id' AND location='$cityState' ";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){

                           $event_id = $row['id'];
                            $event_title = $row['event_title'];
                            $event_type = $row['event_type'];
                            $event_description = $row['event_description'];
                            $event_pic = $row['eventPic'];
                            $event_location = $row['location'];
                            $rand = $row['rand'];
                            $date = $row['date'];

                             echo "
                                <div class='col-sm-4 col-xs-6'>
                                    <div id='phpEventLoader'>
                                        <a href='event-detail-visitor.php?i=$event_id&authval=$rand'>
                                          <img src='$event_pic' id='home-event-image'>
                                          <h5>$event_title</h5>
                                          <p>
                                              $event_type | $event_location <br>
                                              Coming up: $date
                                          </p>
                                      </a>
                                    </div>
                                </div> 
                                  ";
                        }
                    }
                }

            }
        }

    }else{
        echo '<div class="alert alert-warning">An error occured!</div>'; exit;
    }

    
}elseif(!empty($_POST['city-state']) OR !empty($cityState = $_POST['family-friend'])){
   $familyFriend = $_POST['family-friend'];
    $cityState = $_POST['city-state'];
    
//    echo $familyFriend . " " . $cityState;
    
    $sql = "SELECT * FROM users WHERE firstname ='$familyFriend' OR lastname='$familyFriend' ";

    //shows events or alert message
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){

                $user_id = $row['user_id'];

                $sql = "SELECT * FROM events WHERE user_id ='$user_id' OR  event_location='$cityState' ";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){

                           $event_id = $row['id'];
                            $event_title = $row['event_title'];
                            $event_type = $row['event_type'];
                            $event_description = $row['event_description'];
                            $event_pic = $row['eventPic'];
                            $event_location = $row['event_location'];
                            $rand = $row['rand'];
                            $date = $row['date'];

                             echo "
                                <div class='col-sm-4 col-xs-6'>
                                    <div id='phpEventLoader'>
                                        <a href='event-detail-visitor.php?i=$event_id&authval=$rand'>
                                          <img src='$event_pic' id='home-event-image'>
                                          <h5>$event_title</h5>
                                          <p>
                                              $event_type | $event_location <br>
                                              Coming up: $date
                                          </p>
                                      </a>
                                    </div>
                                </div> 
                                  ";
                        }
                    }
                }

            }
        }

    }else{
        echo '<div class="alert alert-warning">An error occured!</div>'; exit;
    }
    
    
}




?>