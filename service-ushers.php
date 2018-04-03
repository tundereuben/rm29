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
  </head>
  <body>
   <!--   include PHP Navigation-->
    <?php include 'nav-logout.php' ?>
    
    <!-- Jumbotron at the top of the page -->
    <div class="jumbotron jumbotron-fluid">

      <div class="container">
        <h3>USHERING SERVICES IN LAGOS</h3>
      </div>
    </div>
    <!-- Jumbotron Ends  -->
      <div class="container">
       <p></p>
        <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>NAME OF USHERS</th>
                <th>EMAIL</th>
                <th>ADDRESS	</th>
                <th>PHONE	</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>360eventee</td>
                <td>ask@360eventee.com</td>
                <td>14, Adegboyega Street, Ilupeju</td>
                <td>0805 522 0618, 0808 244 1532</td>
              </tr>
              <tr>
                <td>Pleasant Jay Events</td>
                <td></td>
                <td>9 ,Ajijedidun Street, Ijesha, Surulere</td>
                <td>0805 918 4480, 0819 041 6337</td>
              </tr>
              <tr>
                <td>Kimberly Daniels</td>
                <td></td>
                <td>19A, Dele Adedeji Street, Lekki Estate Phase 1, Ibeju Lekki</td>
                <td>07062642911, 08088281596</td>
              </tr>
               <tr>
                <td>Glad Tidings Events</td>
                <td></td>
                <td>1 Omoremi Street, Temu-Epe</td>
                <td>08054526792, 08026538960</td>
              </tr>
              <tr>
                <td>Damotaste Catering And Event Management</td>
                <td></td>
                <td>12 John Street, Mushin</td>
                <td>07032700050, 07014149753</td>
              </tr>
              <tr>
                <td>CT Ushers</td>
                <td></td>
                <td>51, Olanrewaju Street, Akoka</td>
                <td>08086979014</td>
              </tr>
               <tr>
                <td>ACE-Olivia Hall	</td>
                <td></td>
                <td>2nd floor, Lagos City Mall, Beside TBS, Onikan</td>
                <td>0802 401 3633, 0702 603 5518, 0702 603 5512</td>
              </tr>
              <tr>
                <td>Ohiz Logistics Hub</td>
                <td></td>
                <td>23,Adebola Street, Surulere</td>
                <td>08023322918, 09090313631</td>
              </tr>
              <tr>
                <td>Emerald Green Ushering Services</td>
                <td>emeraldgreenushers@yahoo.com</td>
                <td>H157, Road 48, Victoria Garden City, VGC, Ajah</td>
                <td>0802 692 1480</td>
              </tr>
              <tr>
                <td>Lazibah Event Planners And Ushering Service</td>
                <td></td>
                <td>22 Coker Road, Ilupeju</td>
                <td>0812 288 0070</td>
              </tr>
            </tbody>
          </table>
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