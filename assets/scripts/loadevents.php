<?php
session_start();
include('connection.php');

//get the user_id
$user_id = $_SESSION['user_id'];

//run a query to delete empty notes
//$sql = "DELETE FROM events WHERE event_title=''";
//$result = mysqli_query($link, $sql);
//if(!$result){
//    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
//}

//run a query to look for notes corresponding to user_id
//$sql = "SELECT * FROM events WHERE user_id ='$user_id' ORDER BY time DESC";
$sql = "SELECT * FROM events WHERE user_id ='$user_id' ORDER BY time DESC ";

//shows events or alert message
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
            $event_id = $row['id'];
            $event_title = $row['event_title'];
            $event_type = $row['event_type'];
            $event_description = $row['event_description'];
            $eventPic = $row['eventPic'];
            $eventLocation = $row['event_location'];
            $date = $row['time'];
            $date = date('l, jS F Y', $date);
            $rand = $row['rand'];
            
            
            echo "
            
                <div class='row' id='event-list'>
                    <div class='col-sm-2'>
                        <a href='event-detail.php?i=$event_id&authval=$rand'><img src='$eventPic' alt=''></a>
                    </div>
                    <div class='col-sm-8'>
                        <h3><a href='event-detail.php?i=$event_id&authval=$rand'> $event_title</a></h3>
                        <p>$event_description</p>
                    </div>
                    <div class='col-sm-2'>
                        <p><span class='bold'>$event_type</span></p>
                        <p>$eventLocation</p>
                    </div> 
                    <div class='col-sm-9'>
                    <p><span class='bold'>Last updated</span>: $date</p>
                    </div>
                    <div class='col-sm-3'>
                        <a class='btn btn-xs btn-info' href='event-detail.php?i=$event_id&authval=$rand' class='eventid'>SHOW</a>
                        <a class='btn btn-xs btn-success' href='event-update.php?i=$event_id&authval=$rand'>EDIT</a>
                        <a class='btn btn-xs btn-danger' href='event-manage.php?i=$event_id&authval=$rand'>DELETE</a>
                    </div>
                </div>
            
            ";
            
           
            
//            $_SESSION['event_id'] = $event_id;
        }
    }else{
        echo '<div class="alert alert-warning">You have not created any events yet!</div>'; exit;
    }
    
}else{
    echo '<div class="alert alert-warning">An error occured!</div>'; exit;
//    echo "ERROR: Unable to excecute: $sql." . mysqli_error($link);
}

?>