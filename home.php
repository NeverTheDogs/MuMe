<?php include "api/shared/sessioni.php";
if (!$email)
{
  header("location: http://127.0.0.1:8080/api/shared/err.php");
}
?>

<!DOCTYPE html>
<html>
<title>MUseo MEssina</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="http://tradizionisicilia.it/wp-content/uploads/2012/09/Provincia_di_Messina-Stemma.png">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
<link href="app/assets/css/style.css" rel="stylesheet"/>

<body>
<!-- Navbar per schermi grandi nascosta sugli schermi piccoli-->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a href="api/shared/logout.php" class="w3-bar-item w3-button w3-right">(<?php print(strtoupper($email));?>) - LOGOUT</a>
  </div>
  <!-- Navbar per gli schermi piccoli nascosta sugli schermi grandi -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="api/shared/logout.php" class="w3-bar-item w3-button w3-right">(<?php print(strtoupper($email));?>) - LOGOUT</a>
  </div>
</div>

<!-- immagine bgimg-1 di background a scomparsa -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">MU<span class="w3-hide-small"></span>ME</span>
  </div>
</div>

<!-- richiamo dal file app.js -->
<div id="app"></div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</footer>

<script src="app/assets/js/jquery.js"></script>
<script src="app/assets/js/bootbox.min.js"></script>
<script src="app/app.js"></script>
<script src="app/script/read-rep.js"></script>
<script src="app/script/create-rep.js"></script>
<script src="app/script/ricerca-rep.js"></script>
<script src="app/script/update-rep.js"></script>
<script src="app/script/delete-rep.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
