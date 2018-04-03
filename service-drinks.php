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
        <h3>DRINKS SUPPLIERS IN LAGOS</h3>
      </div>
    </div>
    <!-- Jumbotron Ends  -->
      <div class="container">
       <p></p>
        <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>NAME OF SUPPLIER</th>
                <th>EMAIL</th>
                <th>ADDRESS	</th>
                <th>PHONE	</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Lobby Bar</td>
                <td></td>
                <td> 30 Mobolaji Bank Anthony Way, Ikeja </td>
                <td>01 280 0100, 01 280 2280</td>
              </tr>
              <tr>
                <td>Joland events and cocktail</td>
                <td>contactus@jolandevents.com</td>
                <td>33 Mogaji Street, Ijeshatedo, Surulere</td>
                <td>08023359312, 08033731986</td>
              </tr>
              <tr>
                <td>Teem Bitter Lemon</td>
                <td></td>
                <td>247, Moshood Abiola Way, Ijora, Apapa</td>
                <td>08056900900</td>
              </tr>
              <tr>
                <td>Banex Hotel and Suites</td>
                <td>info@banexhotelandsuites.com</td>
                <td>60, Olorunlogbon Street, Banex Estate, Anthony Maryland</td>
                <td>07087355551, 08074162771</td>
              </tr>
              <tr>
                <td>Liquid and Ice</td>
                <td>info@liquidandice.com</td>
                <td>75, Ijesha Rd, Gbadamosi Bus Stop, Ijesha,</td>
                <td>08035025015, 08128445405</td>
              </tr>
              <tr>
                <td>Planet One Hotels and Events</td>
                <td>doyebode@planetonehospitality.com</td>
                <td>5 Mobolaji Bank, Anthony Way, Maryland, Ikeja</td>
                <td>0811 911 1115</td>
              </tr>
             <tr>
                <td>Victoria Crown Plaza Hotel</td>
                <td>reservations@vcphotels.com</td>
                <td>292B Ajose Adeogun Street, Victoria Island</td>
                <td>0703 188 1523</td>
              </tr>
              <tr>
                <td>Rehoboth Delicacies</td>
                <td></td>
                <td>13, Deji Olamiju Street, Sholuyi Gbagada, </td>
                <td>0802 315 7707</td>
              </tr>
              <tr>
                <td>La Cuisine Exotique</td>
                <td>info@lacuisineexotique.com</td>
                <td>4th Avenue, 40/41 Road, Plot 1084, Festac Town</td>
                <td>0803 920 5987, 0808 788 2486</td>
              </tr>
              <tr>
                <td>Kingserve Drinks & Events Management</td>
                <td></td>
                <td>118, Ladipo Street, Matori,</td>
                <td>0803 316 2215, 0708 637 5849, 01 293 0913</td>
              </tr>
            <tr>
                <td>Lovinaa Events</td>
                <td>ibidunniajose@yahoo.com</td>
                <td>2, Elias Close, Lawanson Surulere,</td>
                <td>0809 823 3516, 0703 012 4095</td>
              </tr>
              <tr>
                <td>Drinks Atelier</td>
                <td>drinksatelier@gmail.com</td>
                <td>32 Nuru Oniwo Street, Surulere</td>
                <td>0818 347 4778, 0816 604 1657</td>
              </tr>
              <tr>
                <td>Funtols Foods and Confectioneries</td>
                <td></td>
                <td>135A, Apapa Road, Costain, Ebute Metta</td>
                <td>08025709039, 08033268947, 07028725769</td>
              </tr>
              <tr>
                <td>Huge Finger Foods</td>
                <td></td>
                <td>7 Sebastian Street, Shangisha, Magodo Kosofe</td>
                <td>07062620609</td>
              </tr>
            <tr>
                <td>Triple Cevents</td>
                <td>rubby4luv@yahoo.com</td>
                <td>Ajao Estate, Isolo,</td>
                <td>0808 725 1750</td>
              </tr>
              <tr>
                <td>Vastnice Events</td>
                <td>vastniceevents@gmail.com</td>
                <td>7 Olabode street, Ogba</td>
                <td>08137568973, +2348089078700</td>
              </tr>
              <tr>
                <td>So Fresh</td>
                <td>ordersatsofresh@gmail.com</td>
                <td>71, Opebi Road, Ikeja</td>
                <td>0817 954 5565, 01 293 1977</td>
              </tr>
              <tr>
                <td>BoldRich Events</td>
                <td>boldrichevents@gmail.com</td>
                <td>7 Abioye Street, Ogba Ikeja</td>
                <td>08036175692, 08093195429</td>
              </tr>
               <tr>
                <td>Royalbees Catering Service</td>
                <td></td>
                <td>19 Olaleye Street, Sawmil, Gbagada</td>
                <td>0708 683 8369, 0810 650 6793</td>
              </tr>
              <tr>
                <td>Chef Moe</td>
                <td></td>
                <td>8, Okiki Street, Agric Ikorodu, Okota, Isolo</td>
                <td>0703 093 3263</td>
              </tr>
              <tr>
                <td>Liteeiq Events Catering Services</td>
                <td></td>
                <td>1 Church Street, Ketu</td>
                <td>0805 640 9689</td>
              </tr>
              <tr>
                <td>Ace55 Events & Studio</td>
                <td>ifekarichy@gmail.com</td>
                <td>67 Isolo-Mushi Road, Isolo</td>
                <td>0808 600 7197, 0803 378 9570, 0813 522 9804</td>
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