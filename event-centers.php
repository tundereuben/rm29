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
        <h3>APPROVED EVENT CENTERS</h3>
      </div>
    </div>
    <!-- Jumbotron Ends  -->
      <div class="container">
       <p></p>
        <table class="table table-hover table-striped table-bordered table-responsive">
            <thead>
              <tr>
                <th>NAME OF EVENT CENTER</th>
<!--                <th>EMAIL</th>-->
                <th>ADDRESS</th>
                <th>PHONE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Jehovah-Rabor Agrotechnologies</td>
                <td>76, Allen avenue, Allen Avenue, Ikeja</td>
                <td>08142690232</td>
              </tr>
              <tr>
                <td>Alpha communications</td>
                <td>2, Osunlalu street oke ira aguda ogba Ikeja</td>
                <td>08028168956, 08188341938</td>
              </tr>
              <tr>
                <td>Boat Halls</td>
                <td>21, Ogunnusi Road, Ogba</td>
                <td>"08023079485, </td>
              </tr>
              <tr>
                <td>The Blue Carpet Events</td>
                <td>34, Ojodu Berger, Ojudu Berger</td>
                <td>08054424377</td>
              </tr>
              <tr>
                <td>Grandeur Event Centre</td>
                <td>17, Billings Way, Oregun</td>
                <td>08023541327</td>
              </tr>
              <tr>
                <td>Royal Event Center</td>
                <td>105, Obafemi Awolowo Way Ikeja House (Rightway House)</td>
                <td>08063983706, 07032609581</td>
              </tr>
              <tr>
                <td>Lydia Halls Event Centre</td>
                <td>12, Limson Road,River Valley Estate Gate B Ojodu-Berger, Ojodu</td>
                <td>8020600229, 08060363664</td>
              </tr>
              <tr>
                <td>Tyttlo Event Centre</td>
                <td>8B, CMD-Jubilee Road, Magodo</td>
                <td>09077337703, 08086407020</td>
              </tr>
              <tr>
                <td>Anchore Events Place</td>
                <td>1, Registration Close, Off Lateef Jakande Road, Agidingbi</td>
                <td>08055084150,08077906222</td>
              </tr>
              <tr>
                <td>Party Makers Limited</td>
                <td>7, Niger Cadar / Good Shepard Estate, Ojodu Berger</td>
                <td>08037210969, 08033847543</td>
              </tr>
              <tr>
                <td>Praise Hall Events Centre</td>
                <td>Plot 4, Wempco Road, Ogba</td>
                <td>08035003068</td>
              </tr>
              <tr>
                <td>Yard 158</td>
                <td>Plot 34, Kudirat Abiola Way, Oregun</td>
                <td>08068186886</td>
              </tr>
              <tr>
                <td>Etal Hall </td>
                <td>30 Kudirat Abiola Way</td>
                <td>23417942913, 23417939227</td>
              </tr>
              <tr>
                <td>Memorable Gathering Hall and Events</td>
                <td>Plot 15, Block C Nerdc Road, State Secretariat Alausa</td>
                <td>07030307752</td>
              </tr>
              <tr>
                <td>Classique Event Place</td>
                <td>7a Kudirat Abiola Way</td>
                <td>08085150080</td>
              </tr>
              <tr>
                <td>Sheba Centre Ltd</td>
                <td>20 Mobolaji Bank Anthony Way</td>
                <td>08039595940</td>
              </tr>
              <tr>
                <td>BLUE PEARL HALL</td>
                <td>50-52, Toyin Street</td>
                <td>07036613677</td>
              </tr>
              <tr>
                <td>The Events Centre</td>
                <td>Plot 1 Block B Hakeem Balogun Street, Off Cadbury’s, Agidingbi Road, Behind MKO Gardens Alausa</td>
                <td>2348023218218, 2347068652241</td>
              </tr>
              <tr>
                <td>Imperial Hall</td>
                <td>Otunba Jobifele Way, Alausa</td>
                <td>08055109185</td>
              </tr>
              <tr>
                <td>K & G Events Center</td>
                <td>Kudirat Abiola Way</td>
                <td>08067067387</td>
              </tr>
              <tr>
                <td>10 Degrees Events Centre</td>
                <td>Billings Way Road</td>
                <td>09091987211</td>
              </tr>
              <tr>
                <td>Time Square Entertainment And Events Limited</td>
                <td>27, Ajao Road, Off Adeniyi Jones, Ikeja Area Office</td>
                <td>08023170987,07031858521</td>
              </tr>
              <tr>
                <td>DSI Inc.</td>
                <td>No 8, Majekodunmi street, Allen Avenue</td>
                <td>08130196767</td>
              </tr>
              <tr>
                <td>WFC Event Center</td>
                <td>9/11, Kudira Abiola Way, Oregun</td>
                <td>07081770075, 08023043465</td>
              </tr>
              <tr>
                <td>Mimaya event center</td>
                <td>15b, Kudirat Abiola Way Oregun</td>
                <td>09020040541, 08026339154</td>
              </tr>
              <tr>
                <td>Double T Event Centre</td>
                <td>45, Ogudu Road Ojota Lagos (Beside Sacred Heart Catholic Church), Ogudu</td>
                <td>08067747610</td>
              </tr>
              <tr>
                <td>NELO'S PLACE EVENT CENTER</td>
                <td>Behind Etiebet Place Abule Bus stop along Mobolaji Bank Anthony Way</td>
                <td>07035254010, 08033071085</td>
              </tr>
              <tr>
                <td>Celebration Gardens International and Event Center</td>
                <td>28B, Isaac John Street, G.R.A</td>
                <td>08186804581, 07058885140</td>
              </tr>
              <tr>
                <td>Daphnes De Event Place</td>
                <td>41, Denro Road, Ojodu Berger</td>
                <td>08035368838, 08128104471</td>
              </tr>
              <tr>
                <td>Mocube events place and hotel</td>
                <td>21b, Lateef jakande road,agidingbi</td>
                <td></td>
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