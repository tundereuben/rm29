<?php
session_start();

include('assets/scripts/connection.php');

//logout
include("assets/scripts/logout.php");

$i= $_GET['i'];
$rand= $_GET['authval'];
//$rand= $_GET['id'];

//get the id of the note through Ajax
//$event_id = $_SESSION['event_id'];

// run a query to select event
$sql = "SELECT * FROM events WHERE id ='$i'";
//$sql = "SELECT * FROM events WHERE id ='$i' and rand='$rand'";

$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error'; 
}


if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
//        $event_id = $row['id'];
        $event_id = $row['id'];
        $event_title = $row['event_title'];
        $event_type = $row['event_type'];
        $file_name = $row['pdf'];
        $event_description = $row['event_description'];
        $eventPic = $row['eventPic'];
        $eventLocation = $row['event_location'];
        $date = strtotime($row['date']);
        $date = date('l, jS F Y', $date);
        $rand = $row['rand'];
    }
}else{
    echo '<div class="alert alert-warning">No record found!</div>'; exit;
}

?>

<!doctype html>
<html lang="en">
  <head>
   <meta charset="UTF-8"> 
   
  <!-- Required meta tags -->
  
      <meta property="og:url"           content="https://www.rm29.org/event-detail-visitor.php?i=<?php echo $i;?>&amp;authval=<?php echo $rand;?>" />
<!--      <meta property="og:url"           content="https://www.rm29.org/event-detail-visitor.php" />-->
      <meta property="og:type"          content="website" />
      <meta property="og:title"         content="RM29 Event Hub" />
      <meta property="og:description"   content="Save costs on event" />
      <meta property="og:image"         content="https://www.rm29.org/assets/img/logo.png" />
    
    <title>Event Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
      
    <!--      Facebook Share-->
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=197495780811448&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!--      Facebook Share JS Ends -->
        

      <?php include 'nav-logout.php' ;?>
       
    <div class="row detail-content">
       <div class="col-sm-4" id="title">
           <img src="<?php echo $eventPic; ?>">
<!--           <h3 style="text-align:center"><?php echo $eventPic; ?></h3>-->
       </div>
       <div class="col-sm-8" id="description">
           <h3 style="text-align:center;color:#29AAFE;"><?php echo $event_title; ?></h3>
           <p> <span class="bold">Event type:</span> <?php echo $event_type; ?> </p>
           <p><span class="bold">Details:</span> <?php echo $event_description; ?> </p>
           <p> <span class="bold">Coming up:</span> <?php echo $date; ?> </p>
           <p> <span class="bold">Location:</span> <?php echo $eventLocation;?> </p>
        </div>
        
        
       <div class="col-sm-12" id="view">
          <div class="fb-share-button" data-href="https://www.rm29.org/event-detail-visitor.php?i=<?php echo $i; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.rm29.org%2Fevent-detail-visitor.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
          
           <a class="btn btn-success" target="_blank" href="<?php echo  $file_name; ?> ">VIEW PROGRAM</a> 
       </div>  
       
        
             
                         
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
    
    <script src="assets/scripts/myevents.js"></script>
  </body>
</html>