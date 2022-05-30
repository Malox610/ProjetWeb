<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coach</title>
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
              <li class="active">
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
          <?php if(($_SESSION["id_client"] != 0)||($_SESSION["id_coach"] != 0)||($_SESSION["id_admin"] != 0)){ ?>
                <div class="navbar-left-user">
                  <div class="user">
                    <a class="submit" id="seconnecter" href="deconnexion.php">Se déconnecter</a>
                  </div>
                </div>
                <div class="navbar-left-user">
                  <div class="user">
                    <?php if($_SESSION["id_admin"] != 0){ ?>
                    <a class="vertical-center" href="MonCompte-Admin.php">
                    <?php } ?>
                    <?php if($_SESSION["id_coach"] != 0){ ?>
                    <a class="vertical-center" href="MonCompte-Coach.php">
                    <?php } ?>
                    <?php if($_SESSION["id_client"] != 0){ ?>
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
            <h2> Profil Coach</h2>
            <div class="Profil">
              <img src="./img/albums/ron.png" alt="" />
              <div class="Info">
                <h2> Ron le roux</h2>
                  <br>
                  <br>
                <p>Coach, Musculation
                  <br>
                  <br>
                  Salle: G-010
                  <br>
                  <br>
                  Téléphone: +33 01 23 45 67 89
                  <br>
                  <br>
                  Email: guy.dumais@omnessports.fr</p>
              </div>
            </div>
            <div class="Calendar">
              <table>
                <tr>
                  <th> Heure </th>
                  <th> Lundi </th>
                  <th> Mardi </th>
                  <th> Mercredi </th>
                  <th> Jeudi </th>
                  <th> Vendredi </th>
                  <th> Samedi </th>

                </tr>
                <tr>
                  <td> AM</td>
                 <td>  </td>
                 <td>  </td>
                 <td>  </td>
                 <td>  </td>
                 <td>  </td>
                 <td>  </td>

                </tr>
                <tr>
                  <td> PM </td>
                  <td>  </td>
                  <td>  </td>
                  <td>  </td>
                  <td>  </td>
                  <td>  </td>
                  <td>  </td>
                </tr>
              </table>
            </div>

            <!-- mettre le contenu de la page ici -->
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