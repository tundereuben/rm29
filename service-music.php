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
        <h3>MUSIC PROVIDER IN LAGOS	</h3>
      </div>
    </div>
    <!-- Jumbotron Ends  -->
      <div class="container">
       <p></p>
        <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>NAME OF MUSIC BAND</th>
                <th>EMAIL</th>
                <th>ADDRESS	</th>
                <th>PHONE	</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Extol Services</td>
                <td>info@extolsecurity.com</td>
                <td>3A, Joe Babs-Dare Close,Off Adeyeri Close, Off Opebi Road, Ikeja</td>
                <td>0805 303 7897, 0805 555 5020, 0819 118 5406</td>
              </tr>
              <tr>
                <td>Theory-X Entertainment</td>
                <td>info@theory-x.org</td>
                <td>Alade Shopping Complex, Afolabi Aino Street, Allen Avenue, Ikeja</td>
                <td>0805 983 7111, 01 826 9689</td>
              </tr>
              <tr>
                <td>Shaunz Karaoke Bar And Lounge</td>
                <td>info@shaunzbar.com</td>
                <td>27 Sanusi Fafunwa Street, Victoria Island</td>
                <td>07089253344, 08038077536, 07045984347</td>
              </tr>
              <tr>
                <td>Talkative Afrika Entertainment</td>
                <td>info@talkativeafrika.com.ng</td>
                <td>11, Eric Moore Close, Surulere</td>
                <td>08083889377, 08038891707</td>
              </tr>
              <tr>
                <td>No Surprises Events Limited</td>
                <td>surpriseme@nosurprisesevents.com</td>
                <td>3b Ahmad Tijani Ottun Street, Lekki phase 1</td>
                <td>0806 113 9049, 01 342 7521</td>
              </tr>
              <tr>
                <td>DJ Weymo</td>
                <td></td>
                <td>Beside Dr, Ladi Alakija Street, Off Babatope Bedeji Street, Lekki Phase 1, Lekki</td>
                <td>0803 557 2670</td>
              </tr>
              <tr>
                <td>DJ Neptune</td>
                <td>djneptuneent@gmail.com</td>
                <td>6A Wole Ariyo Street, Lekki Phase 1</td>
                <td>0802 528 2300, 0810 000 0672</td>
              </tr>
              <tr>
                <td>DJ SoniQ</td>
                <td></td>
                <td>Grace Court Estate, Makoko Road, Yaba</td>
                <td>0813 167 4747, 0705 549 7929</td>
              </tr>
              <tr>
                <td>Godbless and the Eboni Band</td>
                <td>info@godblessentertainment.com</td>
                <td>14 Hauwa Abikan Street, Chevyview Estate, Estate Chevron, Eti-Osa Lekki</td>
                <td>08033077641, 08058099992</td>
              </tr>
              <tr>
                <td>De Feels Music Entertainment Limited</td>
                <td>defeelsmusic@gmail.com</td>
                <td>140, Ikotun Idimu Road, Idimu Alimosho</td>
                <td>0803 495 5003, 0705 956 5669</td>
              </tr>
              <tr>
                <td>J-World ntertainment</td>
                <td>info@jworldntertainment.com.ng</td>
                <td>18 Road 16, Ikota Villa Estate, Lekki</td>
                <td>0708 366 2893</td>
              </tr>
              <tr>
                <td>IM Media Concept</td>
                <td>info@immediaconcept.com</td>
                <td>10 Durotolu close, old Addo- Owode road, Ajah</td>
                <td>0813 605 5281</td>
              </tr>
              <tr>
                <td>Cogito Ergo Sum Limited - Lagos</td>
                <td>info@cogitoergosumng.com</td>
                <td>39, Bode Thomas Street, By Eric Moore Road, Surulere</td>
                <td>0802 766 6373, 0704 446 8601</td>
              </tr>
              <tr>
                <td>Rockaholic Entertainment</td>
                <td></td>
                <td>33, Akerele Road, Surulere</td>
                <td>0703 711 5740</td>
              </tr>
              <tr>
                <td>Xpeez Music</td>
                <td></td>
                <td>Haruna Road, Agric, Ikorodu</td>
                <td>07068036485</td>
              </tr>
              <tr>
                <td>Morgeez Production</td>
                <td>morgeeznaija@gmail.com</td>
                <td>338 Ikorodu Road, Maryland, Kosofe</td>
                <td>08181337055, 08146197696</td>
              </tr>
              <tr>
                <td>Solarsound Plus Event</td>
                <td></td>
                <td>1 Kingsley Emu Street, Lekki Estate Phase 1, Lekki Eti Osa</td>
                <td>08029401566, 08034703535</td>
              </tr>
              <tr>
                <td>Harmony G Band	</td>
                <td></td>
                <td>1 Nuru Oniwo Street, Surulere</td>
                <td>08056718300, 08185757524</td>
              </tr>
              <tr>
                <td>Golden Pyramid Production</td>
                <td></td>
                <td>97 Falolu Road, Surulere</td>
                <td>08033061149, 08102852444</td>
              </tr>
              <tr>
                <td>DJ Humility</td>
                <td>djhumility@yahoo.com</td>
                <td>1 Yomi Ajisola Street, Langbasa, Ajah</td>
                <td>0802 350 7661</td>
              </tr>
              <tr>
                <td>Popee Live Band	</td>
                <td></td>
                <td>42, Babajide Awolesi Street, Magodo G.R.A, Ikeja</td>
                <td>0708 214 3455, 0703 973 0667</td>
              </tr>
              <tr>
                <td>More Money Production</td>
                <td></td>
                <td>12, Market Street Adeolu Plaza, Oyingbo, Lagos Mainland</td>
                <td>0812 163 1068, 0803 912 1366</td>
              </tr>
              <tr>
                <td>Seun Aransiola & De-Honey Voices</td>
                <td></td>
                <td>69 Ajose Street, Maryland Mende</td>
                <td>0803 343 8160, 0802 995 8269</td>
              </tr>
              <tr>
                <td>Cream Events Productions</td>
                <td></td>
                <td>47 Market Street, Onipanu</td>
                <td>0817 959 9145</td>
              </tr>
              <tr>
                <td>Solarsound Entertainment</td>
                <td>solarsound2010@yahoo.com</td>
                <td>4 Kingsley Emu Street, Lekki Phase One</td>
                <td>0803 470 3535, 0802 940 1566</td>
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