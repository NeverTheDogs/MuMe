<?php include "api/shared/sessioni.php";
if ($email)
{
  header("location: http://127.0.0.1:8080/api/shared/err.php");
}
?>
<!DOCTYPE html>
<html>
<title>MUseo Messina</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="http://tradizionisicilia.it/wp-content/uploads/2012/09/Provincia_di_Messina-Stemma.png">
<script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>

<body>

<!-- Navbar per schermi grandi nascosta sugli schermi piccoli-->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
  </div>
</div>

<!-- immagine bgimg-1 di background a scomparsa -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">MU<span class="w3-hide-small"></span>ME</span>
  </div>
</div>

<!-- form per l'inserimento dei dati del nuovo utente -->
<div class="w3-content w3-container w3-padding-64" id="contact">
  <h3 class="w3-center">Effettua la registrazione</h3>
  <p class="w3-center"><em>Aiutaci a documentare i beni di Messina!</em></p>
    <div class="w3-content w3-container" style="max-width:600px">
      <form method="post" action="api/shared/registrazione.php">
          <p><div><input class="w3-input w3-border" type="email" placeholder="Email" required name="mai" id="email"><span id="check_email"></span></div></p>
          <p><div><input pattern=".{8,}" class="w3-input w3-border" type="password" placeholder="Password (min 8 char)" required name="psw" id="pass"></div></p>
          <p><div><input pattern=".{8,}" class="w3-input w3-border" type="password" placeholder="Ripeti password" required name="ver" id="veri"></div></p>
          <p><div><input class="w3-input w3-border" type="text" placeholder="Cognome" required name="cog"></div></p>
          <p><div><input class="w3-input w3-border" type="text" placeholder="Nome" required name="nom"></div></p>
          <p><div><input pattern="[0-9]{10}" class="w3-input w3-border" type="text" placeholder="Telefono" maxlength="10" required name="tel"></div></p>
          <p><div><input class="w3-input w3-border" type="text" placeholder="Città" required name="cit"></div></p>
          <p><div><input class="w3-input w3-border" type="text" placeholder="Indirizzo" required name="ind"></div></p><br>
        <div class="w3-center"><button class="w3-button w3-black w3-center" type="submit"><i class="fa fa-paper-plane"></i> REGISTRATI</button></div>
      </form>
    </div>
</div>

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
<script src="app/app.js"></script>
<script type="text/javascript">

//controllo che la mail non sia già presente nel database ad ogni inserimento nell'input
$(document).ready(function() { $("#email").keyup(function(){
  var email = this.id;
  if (this.value!="")
  {
    $.ajax({ type: "POST",
      url: "api/shared/checkmail.php",
      data: email+"="+this.value,
      success: function(response){
        if(response== '0')
        {
          $("#check_email").html(' Disponibile ');
        }
        else
        {
          $("#check_email").html(' Non disponibile ');
          $("#email").val("");
        }
      }
    });
  }
});});
//controllo che le pass inserite nel form siano uguali
$(document).ready(function() { $("#pass").blur(function(){
  $(document).ready(function() { $("#veri").blur(function(){
   if (pass.value!=veri.value)
     {
        alert("Le password inserite sono diverse");
      } 
});});
});});
</script>
</body>
</html>
