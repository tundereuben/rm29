<?php
session_start();
include('assets/scripts/connection.php');

//logout
include("assets/scripts/logout.php");


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
    
    <script src="https://use.fontawesome.com/20a7b84e89.js"></script>
  </head>
  <body>
   
    <!--   include PHP Navigation-->
     <?php include 'nav-logout.php' ?>
    
    <!-- Jumbotron at the top of the page -->
    <div class="jumbotron jumbotron-fluid">
     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="assets/img/bg2.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/bg1.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/bg3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      <div class="container">
        <h3>Find Programs  of friends and family</h3>
        
        <form id="======searchForm" action="search-result.php" method="post">
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
              <button class="btn btn-info">Find Programs</button>
            </div>
            <div id="result"></div>
          </div>
        </form>
      </div>
    </div>
    <!-- Jumbotron Ends  -->
    
    <div class="events">
        <div class="heading">
            <p><u>LATEST</u></p>
            <h3>Upcoming events</h3>
        </div>
    </div>
    
    
    <div class="container" id="eventBlock">
      <div class="row">
        <?php
        //run a query to look for events that are most recent
        $sql = "SELECT * FROM events ORDER BY time DESC LIMIT 9";

        //shows events or alert message
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
                    $date = strtotime($row['date']);
                    $date = date('l, jS F Y', $date);

                    echo "
                        <div class='col-sm-4 col-xs-6'>
                            <div id='phpEventLoader'>
                                <a href='event-detail-visitor.php?i=$event_id&authval=$rand'>
                                  <img src='$event_pic' id='home-event-image'>
                                  <h5>$event_title</h5>
                                  <p>
                                      $event_type | $event_location <br>
                                      <strong>Coming up:</strong> $date
                                  </p>
                              </a>
                            </div>
                        </div>
                    ";

        //            $_SESSION['event_id'] = $event_id;
                }
            }else{
                echo '<div class="alert alert-warning">You have not created any events yet!</div>'; exit;
            }

        }else{
            echo '<div class="alert alert-warning">No events found!</div>'; exit;
        //    echo "ERROR: Unable to excecute: $sql." . mysqli_error($link);
        }
        ?>
      </div>
      
      
     
        
    
        <div id="search"> </div>
      
      <div class="row">
          <a class="btn  btn-info"  href="event-list.php">SEE MORE</a>
      </div>
    </div>
    
    <div class="container-fluid how-it-works">
       <div class="row">
           <h2>HOW IT WORKS </h2> <br>       
       </div>
        <div class="row">
            <div class="col-sm-6">
                <p class="lead">
                   Unlimited Possiblities

               </p>

               <p>
                   Upload your event programs with ease by signing up with your Facebook account or your email or name and reduce cost of printing hardcopy event programs and share/refer guest to the website to view and download your event programme. We also provide VIP codes/invitation for your event instead of printing invitation cards.
               </p>
               <p>
                   All this you can do by just signing up and upload your programme events, there are also additional services like list of service providers and event centers across Nigeria 
               </p>
               <a target="_blank" href="assets/rm29-user-guide.pdf" class="btn btn-info">LEARN MORE</a>
            </div>
            <div class="col-sm-6">
                <img src="assets/img/Black-woman-on-twitter-1000x666.png">
            </div>
        </div>
    </div>

      
      <div class="container service-providers" id="eventBlock" style="margin:50px auto">
      <h2 style="color: #29AAFE">POPULAR SERVICE PROVIDERS</h2>
      <div class="row">
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-catering.php'>
                 <i class="fa fa-cutlery"></i>
                  <h5>Food</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-drinks.php'>
                  <i class="fa fa-glass"></i>
                  <h5>Drinks</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-photography.php'>
                  <i class="fa fa-camera"></i>
                  <h5>Photo</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-video.php'>
                  <i class="fa fa-video-camera"></i>
                  <h5>Video</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-music.php'>
                  <i class="fa fa-music"></i>
                  <h5>Music</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-ushers.php'>
                  <i class="fa fa-group"></i>
                  <h5>Ushers</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-providers.php'>
                  <i class="fa fa-truck"></i>
                  <h5>Transport</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-security.php'>
                  <i class="fa fa-male"></i>
                  <h5>Security</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-makeup.php'>
                  <i class="fa fa-paint-brush"></i>
                  <h5>Make-Up Artist</h5>
              </a>
            </div>
        </div>
<!--
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='#'>
                  <i class="fa fa-eye-slash"></i>
                  <h5>Event Decorators</h5>
              </a>
            </div>
        </div>
-->
        <div class='col-sm-4 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-chauffeur.php'>
                  <i class="fa fa-taxi"></i>
                  <h5>chauffeur</h5>
              </a>
            </div>
        </div>
        <div class='col-sm-8 col-xs-6'>
            <div id='phpEventLoader'>
                <a href='service-provider-register.php'>
                  <i class="fa fa-id-card-o"></i>
                  <h5>REGISTER AS A SERVICE PROVIDER</h5>
              </a>
            </div>
        </div>
      </div>
    </div>
    
    
    
    
    
    
    
    
    <div class="container-fluid">
       <div class="row" id="external-links">
          <div class="col-sm-6">
              <h4>
                  NEED A RIDE? <br>
                  <a href="https://taxify.eu/cities/lagos/" target="_blank"><img src="assets/img/taxify.jpg"> <br>
                  <small>Check out Taxify</small>
                  </a>
              </h4>
          </div>
          <div class="col-sm-6">
              <h4>
                  NEED A VIEW OF THE LOCATION? <br>
                  <a href="https://www.instantstreetview.com/" target="_blank">
                  <img src="assets/img/instantstreetview.png" width="150" height="150"> <br>
                  <small>Check out Instant Street View</small>
                  </a>
              </h4>
          </div> 
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
    
    <script src="assets/scripts/script.js"></script>
  </body>
</html>