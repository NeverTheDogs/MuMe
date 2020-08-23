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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="http://tradizionisicilia.it/wp-content/uploads/2012/09/Provincia_di_Messina-Stemma.png">
<body>

<!-- Navbar per schermi grandi nascosta sugli schermi piccoli-->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#home" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
    <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
    <a href="gallery.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> GALLERIA</a>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-in"></i> LOGIN</button>

      <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
          <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <img src="http://tradizionisicilia.it/wp-content/uploads/2012/09/Provincia_di_Messina-Stemma.png" alt="logo_museo" style="width:30%" class="w3-circle w3-margin-top">
          </div>
          <form class="w3-container" method="post" action="/api/shared/login.php">
            <div class="w3-section">
              <label><b>Email</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Inserisci Email" name="mai" required>
              <label><b>Password</b></label>
              <input class="w3-input w3-border" type="password" placeholder="Inserisci Password" name="psw" required>
              <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">LOGIN</button>
              <a href="formreg.php" class="w3-button w3-block w3-green w3-section w3-padding">REGISTRATI</a>
            </div>
          </form>
          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            <span class="w3-right w3-padding"><a href="recpass.php">Password dimenticata?</a></span>
          </div>
        </div>
      </div>

  </div>

  <!-- Navbar per gli schermi piccoli nascosta sugli schermi grandi -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
    <a href="gallery.php" class="w3-bar-item w3-button" onclick="toggleFunction()">GALLERIA</a>
  </div>
</div>

<!-- immagine bgimg-1 di background a scomparsa -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">MU<span class="w3-hide-small"></span>ME</span>
  </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">MUME</h3>
  <h5 class="w3-center"><em>Storia del Museo di Messina</em></h5>
  <h6> Istituito nel 1806 “per porre fine alle spoliazioni d'arte”, dalla Reale Accademia Peloritana su iniziativa di Carmelo La Farina (uno dei soci che
   fu anche il primo direttore), il Museo civico peloritano si avvalse delle eterogenee raccolte Alojsio, Arenaprimo, Ciancialo, Grosso-Cacopardo e Carmisino e di una raccolta di dipinti 
    dal XIV al XVIII secolo di proprietà del Senato messinese che concesse anche un contributo per il suo funzionamento.</h6><br>
    <h5 class="w3-center"><em>Criteri espositivi</em></h5>
    <h6>Assai significativo è che insieme a tali criteri espositivi – che non riguardano solo i dipinti di maggior pregio estetico, ma tengono conto anche delle opere qualificate mediocri o di periodi storici considerati decadenti (quale ad esempio il gusto barocco nel ‘600) – il documento rilevi la funzione didattica e culturale del museo il quale “più che alla curiosità con continui rapporti con l'insegnamento, deve tornare a vera utilità d'istruzione, offrendoci per mezzo di monumenti, dei dipinti, degli utensili, la immagine intiera e genuina della cultura, dell'arte, della vita dei secoli precedenti”. Criteri selettivi riaffiorano tuttavia nella valutazione dell'arte contemporanea e della pittura di genere. L'una da deporre “distinta e segregata”, l'altra in modo che “formi sezione a parte”.
Cosicché riaffiora il sospetto che la stessa esposizione delle opere considerate minori, criterio in sé nobilissimo, più che ossequio al rigore storico della documentazione e rispetto per l'opera d'arte in sé, nasconda con intellettualistica sottigliezza ottocentesca, l'intento, meno nobile, di far risaltare maggiormente le “opere maggiori”; prova ne sia che per i capolavori “sarà istituita la sala detta d'onore”, privilegio e prerogative che tuttora, in alcuni musei, tendono a separare e a distinguere le opere eccellenti.

Al La Corte-Cailler si deve anche un lavoro manoscritto sul museo, oltre ad una serie di articoli pubblicati in diverse riprese dal 1902 al 1903 sull'Archivio Storico Messinese, in cui dà notizia di nuove acquisizioni e della definitiva sistemazione della sala d'onore. Nel manoscritto, l'autore, dopo alcuni cenni storici, descrive i locali già esistenti ed enuncia in chiave progettistica una lunga serie di lavori da eseguirsi per la realizzazione di nuove sale in cui sistemare i materiali giacenti nei depositi e trasferire le opere in marmo ancora accumulate nei locali dell'Università.

Il manoscritto – pubblicato, come si è detto, nella rivista (alla voce “notizie”) e in parte sul quotidiano Il Paese nel 1908 – costituisce il primo lavoro scientifico e sistematico sulle opere contenute nel museo, delle quali riporta la scheda di catalogazione con particolare riguardo per le opere pittoriche. Fornisce, inoltre, indicazioni biografiche sugli artisti per un totale di centouno biografie.

La mancanza di personale, l'angustia dei locali, l'affollarsi dei materiali rimangono, tuttavia, problemi insoluti finché, come riferisce il La Corte-Cailler, lo stesso soprintendente ai musei e alle opere d'arte della Sicilia, Antonio Salinas, sdegnato per l'abbandono in cui è lasciato il museo dall'Amministrazione comunale, non sottoscrive nel 1907 un'energica nota di protesta al Ministero della Pubblica Istruzione. Viene quindi convocata una commissione per studiare una sistemazione definitiva e l'opportunità di trasferimento in altra sede.</h6>
  
</div>

<div class="w3-row w3-center w3-dark-grey w3-padding-16">
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">30</span><br>
    Sale Espositive
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">3</span><br>
    Giardini
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">100+</span><br>
    Collaboratori
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">500+</span><br>
    Reperti
  </div>
</div>

<!-- immagine bgimg-2 di background a scomparsa -->
<div class="bgimg-2 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
    <span class="w3-xxlarge w3-text-white w3-wide"></span>
  </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="contact">
  <h3 class="w3-center">CONTACT</h3>

  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
      <!-- Add Google Maps -->
      <div id="googleMap" class="w3-round-large w3-greyscale" style="width:100%;height:400px;"></div>
    </div>
    <div class="w3-col m8 w3-panel">
      <div class="w3-large w3-margin-bottom">
        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Messina, ME<br>
        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +00 0000000<br>
        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: mail@mail.com<br>
      </div>
    </div>
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
 
<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(38.216687, 15.564017);
  var mapOptions= {
    center:myCenter,
    zoom:15, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_plEKeqNIjEl3tRvpcxZYthUdq1bwTxY&callback=myMap"></script>
</body>
</html>
