<?php include "api/shared/sessioni.php";
if ($email)
{
  header("location: http://127.0.0.1:8080/api/shared/err.php");
}
?>
<!DOCTYPE html>
<html>
<title>MUseo MEssina</title>
<meta charset="UTF-8">
  <link rel="icon" href="http://tradizionisicilia.it/wp-content/uploads/2012/09/Provincia_di_Messina-Stemma.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" media="all" href="lightbox/css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="lightbox/css/jquery.lightbox-0.5.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script type="text/javascript" src="lightbox/js/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.min.js"></script>
<body>


  <!-- Navbar per schermi grandi nascosta sugli schermi piccoli-->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu"></a>
    <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
  </div>
  <!-- Navbar per gli schermi piccoli nascosta sugli schermi grandi -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
   <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
  </div>
</div>



  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">GALLERIA</a>
  </div>
</div>
  <div id="w">
    <div id="content">
      <h1>Galleria Fotografica MUseo MEssina</h1>
      <div id="thumbnails">
        <ul class="clearfix">
          <li><a href="img/foto/foto0.jpg" title="Turntable by Jens Kappelmann"><img src="img/foto_min/foto0.jpg" alt="turntable"></a></li>
          <li><a href="img/foto/foto1.jpg" title="DIY Robot by Jory Raphael"><img src="img/foto_min/foto1.jpg" alt="DIY Robot Kit"></a></li>
          <li><a href="img/foto/foto2.jpg" title="Todly by Scott Wetterschneider"><img src="img/foto_min/foto2.jpg" alt="Todly"></a></li>
          <li><a href="img/foto/foto3.jpg" title="LoZ Tea Party by Joseph Le"><img src="img/foto_min/foto3.jpg" alt="legend of zelda tea party"></a></li>
          <li><a href="img/foto/foto4.jpg" title="Klaxon Icon by John Khester"><img src="img/foto_min/foto4.jpg" alt="airhorn icon"></a></li>
          <li><a href="img/foto/foto5.jpg" title="Flat Coffee by Baglan Dosmagambetov"><img src="img/foto_min/foto5.jpg" alt="flat coffee"></a></li>
          <li><a href="img/foto/foto0.jpg" title="iPad Music Player by Angel Bartolli"><img src="img/foto_min/foto0.jpg" alt="player ui"></a></li>
          <li><a href="img/foto/foto1.jpg" title="Extreme Fish Bowl by Brian Franco"><img src="img/foto_min/foto1.jpg" alt="extreme skateboarding fish bowl"></a></li>
          <li><a href="img/foto/foto3.jpg" title="Illustration by Brandon Ancone"><img src="img/foto_min/foto2.jpg" alt="city illustration"></a></li>
          <li><a href="img/foto/foto2.jpg" title="Restaurant Illustration by Dury"><img src="img/foto_min/foto3.jpg" alt="restaurant illustration"></a></li>
        </ul>
      </div>
    </div><!-- @end #content -->
  </div><!-- @end #w -->

<script type="text/javascript">
$(function() {
    $('#thumbnails a').lightBox();
});
// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
</body>
</html>