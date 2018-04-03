<?php
include('connection.php');

if(isset($_POST['search'])){
    $search = $_POST['search'];
}
elseif(isset($_GET['search'])){
    $search = $_GET['search'];
}

$old_search = $search;

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

$sql = "SELECT COUNT(id) FROM events 
    WHERE user_id LIKE '%".$search."%'
    OR event_title LIKE '%".$search."%'
    OR event_location LIKE '%".$search."%'
    OR event_type LIKE '%".$search."%'
  ";
$query = mysqli_query($link, $sql);
$row = mysqli_fetch_row($query);
$rows = $row[0];
$page_rows = 3;
$last = ceil($rows/$page_rows);
if($last < 1){
    $last = 1;
}

//Establish $pagenum variable, Get url
$pagenum = 1;
if(isset($_GET['pn'])){
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
    
if($pagenum <1)   {
    $pagenum = 1;
}elseif ($pagenum >$last){
    $pagenum = $last;
}
    
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$sql = "SELECT * from events 
    WHERE user_id LIKE '%".$search."%'
    OR event_title LIKE '%".$search."%'
    OR event_location LIKE '%".$search."%'
    OR event_type LIKE '%".$search."%' 
    ORDER BY id DESC $limit";

$query = mysqli_query($link, $sql);

$textline1 = "Upcoming Events ($rows) items found";
$textline2 = "page <b>$pagenum</b> of <b>$last</b>";

$paginationCtrls = '';

if($last != 1){
    if ($pagenum >1){
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&search='.$old_search.'">Previous <a/> &nbsp; &nbsp;';
        
        for($i = $pagenum - 4; $i < $pagenum; $i++){
           if($i > 0){
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&search='.$old_search.'">'.$i.'</a> &nbsp; ';
           }
        }
    }
    
    $paginationCtrls .= ''.$pagenum. ' &nbsp; ';
    
    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&search='.$old_search.'">'.$i.'</a> &nbsp; ';
        if($i >= $pagenum+4){
            break;
        }
    }
    
    if($pagenum != $last){
        $next = $pagenum +1 ;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&search='.$old_search.'">Next</a> ';
    }
}

$list = '';
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
    $event_id = $row['id'];
    $event_title = $row['event_title'];
    $event_type = $row['event_type'];
    $event_description = $row['event_description'];
    $event_pic = $row['eventPic'];
    $event_location = $row['event_location'];
    $date = $row['time'];
    $date = date('l, jS F Y', $date);
    $rand = $row['rand'];
    
    $list .= "
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

echo $list;
echo "<p>$paginationCtrls</p>";

if(isset($_GET['search'])){
//    header("location:search-result.php");
}

?>