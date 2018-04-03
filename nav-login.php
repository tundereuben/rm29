
<?php
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}


include('assets/scripts/connection.php');

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email='$user_email' AND user_id='$user_id'";
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['email'] = $row['email'];
$_SESSION['imageFile'] = $row['profilePic'];


$user_id = $_SESSION['user_id'];
$user_firstname = $_SESSION['firstname'];
$user_lastname = $_SESSION['lastname'];
$user_email = $_SESSION['email'];
$short_desc = $_SESSION['short_desc'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$state = $_SESSION['state'];
$city = $_SESSION['city'];
$imageFile = $_SESSION['imageFile'];

 if(isset($_SESSION['access_token'])){
    $targetPath = $_SESSION['userData']['picture']['url'];
}else{
     $targetPath = "images/".$imageFile;
 }


?>



 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <div class="col-sm-7"></div>
    <div class="col-sm-5">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="event-add.php" style="color:#29AAFE; font-weight:bold;">Create Program</a>
          </li>  
           <li class="nav-item">
            <a class="nav-link" href="generate-code.php">Generate VIP Code<span class="sr-only">(current)</span></a>
          </li> 
                 
          <li class="nav-item dropdown">
             <?php echo "<img src='".$targetPath. "' width='40px' style='float:left; margin: 2px; border-radius:100%;'>"; ?>
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user_firstname?></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="event-manage.php">Manage Programs</a>
                <a class="dropdown-item" href="profile-detail.php">View Profile</a>
                <a class="dropdown-item" href="profile-add.php">Update Profile</a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?logout=1">Logout</a>
              </div>
          </li>
        </ul>
    </div>
  </div>
</nav>
