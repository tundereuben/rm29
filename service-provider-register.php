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
    
         
    
    <div class="row detail-content" style="margin: 100px 30px">
     
     <div class="col-sm-12" style="margin:auto;">
         <h3>REGISTER AS A SERVICE PROVIDER</h3>
     </div>
         
      <div class="col-sm-12">
         <hr>
        <h4>Business Information</h4>
          <form method="post" id="serviceprovider">
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" name="businessName" placeholder="Business Name">
                </div>
              </div>
              
              <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Phone No" name="businessPhone" >
                </div>
                <div class="col">
                  <input type="email" class="form-control" placeholder="Email" name="businessEmail">
                </div>
              </div>
          
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" name="businessAddress" placeholder="Address">
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                    <select class="form-control js-states" id="state"  placeholder="" name="state"></select>
                </div>
                <div class="col">
                  <select class="form-control js-local-govt" id="city"  placeholder="" name="lga"></select>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control input-lg" placeholder="Instangram handle" name="instagram">
                </div>
                <div class="col">
                  <input type="text" class="form-control input-lg" placeholder="Facebook profile" name="facebook">
                </div>
              </div>
                <hr>
                <h4>Guarantor Information</h4>
                
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control input-lg" placeholder="Firstname" name="guarantorFirstname">
                </div>
                <div class="col">
                  <input type="text" class="form-control input-lg" placeholder="Lastname" name="guarantorLastname">
                </div>
              </div>
              
              <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Phone no" name="guarantorphone">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Email" name="guarantoremail">
                </div>
              </div>
             
              <div class="form-row">
           <hr>

            <p class="text-center"> <button class="btn btn-success btn-xl btn-round">REGISTER</button></p>
          </div>
              <div id="providermessage"></div>
        </form>
      </div> 
         
    </div>
          
    
    <!-- Site footer -->
    <footer class="site-footer">

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
    
    <!--    Call state and local government-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>
		var DataPath = "https://locationsng-api.herokuapp.com/api/v1/lgas";
		$.ajax({
			url: DataPath,
			headers: {
				"Accept" : "application/json; charset=utf-8",
				"Content-Type": "application/javascript; charset=utf-8",
				"Access-Control-Allow-Origin" : "*"
			},
			success: function(responseData){
			  DataStates(responseData);
			},
			error: function(responseData) {
			 console.log('Error fetching data')
			}
		});
		var data;
		function DataStates(collectionData) {
			data = collectionData;
			$('.js-states').change(function() {
				selectedLG();
			});
			$(document).ready(function() {
				selectedLG();
			});				
		}
		function selectedLG() {
			
			var selectedState = $('option:selected').val()
			DataPath = "https://locationsng-api.herokuapp.com/api/v1/lgas";
			$('.js-local-govt').empty();
			$.each(data, function(i, item) {
				if($('.js-states option').length <= data.length){
					$('.js-states').append('<option>'
						+ item.state
						+ '</option>')
				}
				
				if (selectedState === item.state && data[i].lgas != null) {
					for(var j=0; j<data[i].lgas.length; j++){
						$('.js-local-govt').append('<option>'
							+ item.lgas[j]
							+ '</option>')
					}
				}
			});
		}	
	</script>
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <script src="assets/scripts/script.js"></script>
  </body>
</html>