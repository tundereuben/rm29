<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('assets/scripts/connection.php');

$user_id = $_SESSION['user_id'];
$user_firstname = $_SESSION['firstname'];
$user_lastname = $_SESSION['lastname'];
$user_email = $_SESSION['email'];
$id= $_GET['i'];
$_SESSION['event_id'] = $id;

//get the id of the note through Ajax
//$event_id = $_SESSION['event_id'];

// run a query to select event
$sql = "SELECT * FROM events WHERE id ='$id'";

$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error'; 
}


if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
//        $event_id = $row['id'];
        $event_title = $row['event_title'];
        $event_type= $row['event_type'];
        $event_description = $row['event_description'];
        $event_location = $row['event_location'];
        $pdf= $row['pdf'];
        $eventPic= $row['eventPic'];
        $date = $row['date'];
//        $date = date("F d, Y", $date);
    }
}else{
    echo '<div class="alert alert-warning">No record found!</div>'; exit;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Update event</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
    <?php include 'nav-login.php';?>
       
    <div class="row add-event">
       <div class="col-sm-12">
           <h3>Update Event Program</h3>
           
           <form method="post" id="update_event" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control input-lg" value="<?php echo $event_title ;?>" name="event_title">
                </div>
                <div class="col">
                  <select class="form-control selectpicker" name="event_type">
                  <option>Event Type</option>
                  <option>Wedding</option>
                  <option>Birthday</option>
                  <option>Burial</option>
                  <option>Religion</option>
                  <option>Seminar</option>
                  <option>Dinner</option>
                  <option>Others</option>
                </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <textarea class="form-control" rows="3" value="" name="event_description"><?php echo $event_description ;?></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <input  type="text" class="form-control input-lg" value="<?php echo $event_location ;?>" name="location">
                </div>
                <div class="col">
                  <input type="date" class="form-control input-lg" placeholder="Date" name="date">
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                 <label for="eventPic" class="upload">
                 CHOOSE AN EVENT IMAGE <input id="eventPic" name="eventPic" type="file">
                 </label>
                </div>
                <div class="col">
                     <label for="pdf" class="upload">
                         UPLOAD PROGRAM <input id="pdf" name="pdf" type="file">
                     </label>
                </div>
              </div>
              
              <div class="form-row">
               <hr>

                <p class="text-center"><button class="btn btn-success btn-xl btn-round">Submit your event</button></p>
              </div>
              <div id="neweventmessage"></div>
            </form>
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