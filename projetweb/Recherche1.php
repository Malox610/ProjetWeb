<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recherche</title>
    <!-- BROWSER ICON -->
    <link rel="icon" href="./img/icons/favicon.ico">
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="./js/script.js"></script>
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="../projetweb/css/style.css">
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
              <li class="active">
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
                    <a class="submit" id="seconnecter" href="deconnexion.php">Se déconnecter</a>
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
          <h2 id="new-title">Recherche</h2>
          <!-- input tag -->
          <form action="Recherche.php" method="post">
          <!-- <input id="searchbar" onkeyup="rechercher()" type="text" name="search" placeholder="Rechercher.."> -->
          <input type="text" id="searchbar" name="recherche" placeholder="recherche" value="" required/>
          <input class="submit" type="submit" name="submit" value="Rechercher"><br>
          <input class="boutonradio" type="radio" name="choix" value="1"><label>Nom</label>
          <input class="boutonradio" type="radio" name="choix" value="2"><label>Spécialité</label>
          <input class="boutonradio" type="radio" name="choix" value="3"><label>Numéro</label>
          <div class="resultat_recherche">
            <table class="tableau_resultat">
              <thead class="head_resultat">
                <tr class="ligne_head">
                  <th># Nom Prénom</th>
                  <th>Spécialitié</th>
                  <th>Établissement</th>
                  <th>Bureau</th>
                  <th>Telephone</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody class="list-body">
              </tbody>
            </table>
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
              <h4><a>Contactez-nous par téléphone</a></h4>
              <span><a href="tel:+33611223344">+33 6 11 22 33 44</a></span>
            </div>
        </div>
      </footer>
    </main>
  </body>
</html>
