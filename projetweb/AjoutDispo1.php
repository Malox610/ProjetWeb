<?php
session_start();
if($_SESSION["role"] == "administrateur"){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation</title>
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
                <a href="Rendezvous.php">
                  <img src="./img/icons/left-nav/calendar.svg" alt="">
                  <span>Rendez-vous</span>
                </a>
              </li>
            </ul>
          </div>
          <?php if((isset($_SESSION["id_client"]))||(isset($_SESSION["id_coach"] ))||(isset($_SESSION["id_admin"] ))){ ?>
                <div class="navbar-left-user">
                  <div class="user">
                    <a class="submit" id="seconnecter" href="deconnexion.php">Se d??connecter</a>
                  </div>
                </div>
                <div class="navbar-left-user">
                  <div class="user">
                    <?php if((isset($_SESSION["id_admin"] ))){ ?>
                    <a class="vertical-center" href="MonCompte-Admin.php">
                    <?php } ?>
                    <?php if((isset($_SESSION["id_coach"] ))){ ?>
                    <a class="vertical-center" href="MonCompte-Coach.php">
                    <?php } ?>
                    <?php if((isset($_SESSION["id_client"]))){ ?>
                    <a class="vertical-center" href="MonCompte-Client.php">
                    <?php } ?>
                      <img src="./img/icons/left-nav/profile.png" alt="">
                      <?php echo "<h6>" . $_SESSION['nom'] . "</h6>"; ?>
                    </a>
                  </div>
                </div>
          <?php }else{ ?>
            <div class="navbar-left-user">
              <div class="user">
                <a class="submit" id="seconnecter" href="Login-Client.html">Se connecter</a>
              </div>
            </div>
          <?php } ?>
        </aside>
        <!-- SCROLLABLE WINDOW -->
        <div class="scrollable-container">
          <!-- SCROLLABLE CONTENT -->
          <div class="scrollable-content">
            <!-- mettre le contenu de la page ici -->
            <h2 id="new-title">Ajout disponibilit??s</h2>
            <form class="formulaire" action="AjoutDispo.php" method="post">
              <div class="LigneForm">
                <label class="inputform">Quel Coach?</label>
                <input id="searchbar2" type="text" name="coach" value="" required/>
              </div>
              <div class="LigneForm">
                <label class="inputform">Date ?? ajouter</label>
                <input type="date" name="date" value="" required/>
              </div>
              <div class="LigneForm">
                <label class="inputform">Disponible le matin</label>
                <input type="checkbox" name="matin" value="1">
              </div>
              <div class="LigneForm">
                <label class="inputform">Disponible l'aprem</label>
                <input type="checkbox" name="aprem" value="1">
              </div>
              <div class="LigneForm">
                <input class="submit" id="payer" type="submit" name="button" value="Payer">
              </div>
            </form>
          </div>
        </div>
      </section>
      <!-- FOOTER -->
      <footer class="player">
        <!-- PLAYER SONG -->
        <div class="player-song">
            <div class="song-txt">
              <address><h4><a href="https://www.google.com/maps/place/ECE+Paris+Lyon/@48.8517703,2.2842932,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6701b4f58251b:0x167f5a60fb94aa76!8m2!3d48.8517668!4d2.2864819" target="_blank">37 Quai de Grenelle</a></h4></address>
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
              <h4><a>Contactez-nous par t??l??phone</a></h4>
              <span><a href="tel:+33611223344">+33 6 11 22 33 44</a></span>
            </div>
        </div>
      </footer>
    </main>
  </body>
</html>
<?php
}
?>
