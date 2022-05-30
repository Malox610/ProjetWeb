<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation</title>
    <!-- BROWSER ICON -->
    <link rel="icon" href="./img/icons/favicon.ico">
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="./js/script.js"></script>
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <!-- APPLICATION -->
    <main class="app">
      <!-- MAIN WINDOW -->
      <section class="main-window">
        <!-- NAVBAR LEFT -->
        <aside class="navbar-left">
          <div class="navbar-left-menu">
            <a href="index.php">
              <img class="navbar-logo desktop" src="./img/icons/logo-white.svg" alt="">
            </a>
            <a href="index.php">
              <img class="navbar-logo mobile" src="./img/icons/logo-small-white.svg" alt="">
            </a>
            <ul class="v-list nav">
              <li>
                <a href="index.php">
                  <img src="./img/icons/left-nav/home.svg" alt="">
                  <span>Accueil</span>
                </a>
              </li>
              <li>
                <a href="Recherche1.php">
                  <img src="./img/icons/left-nav/search.svg" alt="">
                  <span>Recherche</span>
                </a>
              </li>
              <li>
                <a href="Parcourir.php">
                  <img src="./img/icons/left-nav/football.svg" alt="">
                  <span>Tout Parcourir</span>
                </a>
              </li>
              <li>
                <a href="rendezvous.php">
                  <img src="./img/icons/left-nav/calendar.svg" alt="">
                  <span>Rendez-vous</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="navbar-left-user">
            <div class="user">
              <a class="vertical-center" href="MonCompte-Client.html">
                <img src="./img/icons/left-nav/profile.png" alt="">
                <h6>Votre compte</h6>
              </a>
            </div>
          </div>
        </aside>
        <!-- SCROLLABLE WINDOW -->
        <div class="scrollable-container">
          <!-- SCROLLABLE CONTENT -->
          <div class="scrollable-content">
            <!-- mettre le contenu de la page ici -->
            <h2 id="new-title">Confirmation</h2>
            <p class="soustitre">Demande bien prise en compte.</p>
        <script type="text/javascript" >
          const query = window.location.search;
          <?php
             $dateheure = "<script>document.write(query)</script>";  
             list($date, $heure ) = explode('/', $dateheure);
             echo $date ;
             echo $heure ;
             ?>

        </script>
           
            <form class="formulaire" id="commande" action="ConnexionCoach.php" method="post">
              <fieldset>
                <div class="LigneForm">
                  <label class="inputform">Heure : </label>
                  <input id=searchbar2 type="text" name="heure" placeholder="heure" value="<?php echo htmlspecialchars($heure); ?>" required/>
                </div>
                <div class="LigneForm">
                  <label class="inputform">Date : </label>
                  <input id=searchbar2 type="texte" name="date" placeholder="" value="<?php $date ?>" required/>
                </div>

                <div class="LigneForm">
                  <label class="inputform">Coach : </label>
                  <input id=searchbar2 type="texte" name="Coach" placeholder="" value="<?php $bla ?>" required/>
                </div>
                 <div class="LigneForm">
                  <label class="inputform">Coach : </label>
                  <input id=searchbar2 type="texte" name="Coach" placeholder="" value="" required/>
                </div>

                <div class="LigneForm">
                  <input class="submit" id="connecter" type="submit" name="envoi" value="Se connecter"/>
                </div>
              </fieldset>
            </form>

            <div class="LigneForm">
                <label class="inputform">Heure</label>

                <label class="inputform">Jour</label>
            </div>
            <div class="LigneForm">
                <label class="inputform">Coach</label>

                <label class="inputform">Spécialité</label>

            </div>
            <div class="LigneForm">
              <input class="submit" id="payer" type="submit" name="envoi" value="Confirmer"/>
            </div>
          </div>
        </div>
      </section>
      <!-- FOOTER -->
      <footer class="player">
        <!-- PLAYER SONG -->
        <div class="player-song">
            <div class="song-txt">
              <address><h4><a href="https://www.google.com/maps/place/ECE+Paris+Lyon/@48.8517703,2.2842932,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6701b4f58251b:0x167f5a60fb94aa76!8m2!3d48.8517668!4d2.2864819" target="_blank">37 Quai de Grenelles</a></h4></address>
              <span><a href="https://www.google.com/maps/place/ECE+Paris+Lyon/@48.8517703,2.2842932,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6701b4f58251b:0x167f5a60fb94aa76!8m2!3d48.8517668!4d2.2864819" target="_blank">75015, Paris, France</a></span>
            </div>
        </div>
        <div class="player-song">
            <div class="song-txt">
              <h4><a>Contactez-nous par email</a></h4>
              <span><a href="mailto:omnes.sport@ece.fr">omnes.sport@ece.fr</a></span>
            </div>
        </div>
        <div class="player-song">
            <div class="song-txt">
              <h4><a>Contactez-nous par téléphone</a></h4>
              <span><a href="tel:+33611223344">+33 6 11 22 33 44</a></span>
            </div>
        </div>
      </footer>
    </main>
  </body>
</html>
