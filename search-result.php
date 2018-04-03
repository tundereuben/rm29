<?php
session_start();
include('assets/scripts/connection.php');

//logout
include("assets/scripts/logout.php");

if(isset($_POST['submit'])){
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
}elseif(isset($_GET['search'])){
    $search = $_GET['search'];
}elseif(isset($_POST['search'])){
    $search = $_POST['search'];
}

$old_search = $search;

?>


<!doctype html>
<html lang="en">
  <head>
    <title>RM 29</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link href="style.css" type="text/css" rel="stylesheet">
    
    <style>
        #pagination_controls{
            margin: 20px;
            text-align: center;
        }
        #pagination_controls a{
            color: #29AAFE;
        }
    </style>
  </head>
  <body>
   <!--   include PHP Navigation-->
    <?php include 'nav-logout.php' ?>
    
    <!-- Jumbotron at the top of the page -->
    <div class="jumbotron jumbotron-fluid">

      <div class="container">
        <h3>Find Programs  of friends and family</h3>
        
        <form id="searchForm" action="" method="post">
          <div class="row">
            <div class="col-sm-10 col-xs-6">
              <input type="text" class="form-control" placeholder="Enter name of organiser or location of event to search" name="search">
            </div>
<!--
            <div class="col-sm-5 col-xs-6">
              <input type="text" class="form-control" placeholder="Location, e.g. Lagos" name="city-state">
            </div>
-->
            <div class="col-sm-2 col-xs-12">
<!--              <button class="btn btn-info">Find Programs</button>-->
              <input class="btn btn-info" type="submit" name="submit" value="Find Programs">
            </div>
            <div id="result"></div>
          </div>
        </form>
        
      </div>
    </div>
    <!-- Jumbotron Ends  -->
    
    <div class="events">
        <div class="heading">
            <h3>SEARCH RESULT</h3>
<!--            <h3>Upcoming events</h3>-->
        </div>
    </div>
    
    
    <div class="container" id="eventBlock">
     
       
       <!--From HOME SEARCH -->
     <div class="row"  id='search'> 
     
     <?php 
       

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
        $page_rows = 6;
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
     ?>
     
         <div class="row">
              <div class="col-sm-12"> 
                   <div id="pagination_controls">
                       <?php echo $paginationCtrls; ?>
                    </div> 
                </div>
          </div>
      
     </div>
     
<!--
      <script>
              function search(){
                document.getElementById('search').innerHTML = sessionStorage.result;   
              }
        </script>
-->
      
    </div>
        
    
    <!-- Site footer -->
    <footer class="site-footer">

      <!-- Top section -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-7">
            <h6>ABOUT</h6>
            <p class="text-justify">RM29 comes with a unique service of helping both event planners and individuals save cost on printing event programmes, by using this unique platform you save the stress of printing programme of events not needed, while we provide other unique services , like be your event planner , VIP or event invitation codes for VIPs coming to your event seat arrangement for your occasions and so much more and all of these is for free and you can do it yourself on any platform.  <br>

            We are hereto reduce your budget using information and technology for your events. We are pace setters in these form of service and we intend to remain so.</p>
          </div>
          
          <div class="col-xs-6 col-md-2">
            <h6>COMPANY</h6>
              <a href="#">About us</a> <br>
              <a href="#">How it works</a> <br>
              <a href="#">Help center</a> <br>
              <a href="contact.php">Contact us</a>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>SERVICE PROVIDERS</h6>
              <a href="service-providers.php">Food</a>  <br>
              <a href="service-providers.php">Drinks</a>  <br>
              <a href="service-providers.php">Photo</a>  <br>
              <a href="service-providers.php">Video</a>  <br>
              <a href="service-providers.php">Music</a>  <br>
              <a href="service-providers.php">Ushers</a>
            </ul>
          </div>
        </div>

        <hr>
      </div>
      <!-- END Top section -->

      <!-- Bottom section -->
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyrights &copy; 2017 All Rights Reserved by <a href="#">RM29 Inc</a>.</p>
          </div>

<!--
          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
-->
        </div>
      </div>
      <!-- END Bottom section -->

    </footer>    <!-- END Site footer -->
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
<!--    <script src="assets/scripts/script.js"></script>-->
  </body>
</html>