<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $cityState = 'ikeja';
    include 'connection.php';
    
    $sql = "SELECT * FROM events WHERE user_id = '32' AND event_location='$cityState'";

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
    ?>
</body>
</html>
