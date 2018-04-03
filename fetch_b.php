<?php


$link = mysqli_connect("localhost", "root", "", "rm29");
if(mysqli_connect_error()){
    die('ERROR: Unable to connect:' . mysqli_connect_error()); 
}

if(isset($_POST['search'])){
    $search = $_POST['search'];
};

echo $search;

 $sql = "SELECT * FROM users WHERE firstname LIKE '%".$search."%'
   OR lastname LIKE '%".$search."%' 
   ";

$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
         
        $user_id = $row["user_id"];
        $search = $user_id;
    }
}

$output = '';

$sql = "
  SELECT * FROM events 
  WHERE user_id LIKE '%".$search."%'
  OR event_title LIKE '%".$search."%'
  OR event_location LIKE '%".$search."%'
  OR event_type LIKE '%".$search."%'
 ";

$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0 ){


    while($row = mysqli_fetch_array($result)){
         $event_id = $row['id'];
         $event_title = $row['event_title'];
         $event_type = $row['event_type'];
         $event_description = $row['event_description'];
         $event_pic = $row['eventPic'];
         $event_location = $row['event_location'];
         $rand = $row['rand'];
         $date = $row['date'];
        $output .="
           <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='event-detail-visitor.php?i=$event_id&authval=$rand'>
                  <img src='' id='home-event-image'>
                  <h5>$event_title</h5>
                  <p>
                      $event_type | $event_location <br>
                      Coming up: $date
                  </p>
              </a>
            </div>
        </div> 
       "
       ;
    }

    echo $output;
} else{
    echo "<br> nothing found!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Previous & Next</title>
</head>
<body>
 
      
   <div>      
<!--
       <h2><?php echo $textline1;  ?> Pages</h2>
       <p><?php echo $textline2; ?> </p>
       <p><?php echo $list; ?></p>
       <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
-->
   </div> 
</body>
</html>