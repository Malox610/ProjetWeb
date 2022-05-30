<?php
session_start();
          //identifier le nom de base de données
              $database = "web";
              $login = "" ;// recuperation du string mis dans le login
              $mdp ="" ; // recuperation du string mis dans le mdp
              //connectez-vous dans votre BDD
              //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
              $db_handle = mysqli_connect('localhost', 'root', '' );
              $db_found = mysqli_select_db($db_handle, $database);
              //si le BDD existe, faire le traitement
              if ($db_found) {

                  $sql = "SELECT * FROM salle WHERE id_salle = 1";
                  $result = mysqli_query($db_handle,$sql);
                  $sql2 = "SELECT * FROM salle WHERE id_salle = 2";
                  $result2 = mysqli_query($db_handle,$sql2);
                  $sql3 = "SELECT nom_sport FROM sport WHERE id_salle = 1";
                  $result3 = mysqli_query($db_handle,$sql3);
                  $sql4 = "SELECT nom_sport FROM sport WHERE id_salle = 2";
                  $result4 = mysqli_query($db_handle,$sql4);
                  }//end if
              //si le BDD n'existe pas
              else {
                  echo "Database not found";
                  }//end else
              //fermer la connection
              mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salle</title>
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
                <a href="rendezvous.php">
                  <img src="./img/icons/left-nav/calendar.svg" alt="">
                  <span>Rendez-vous</span>
                </a>
              </li>
            </ul>
          </div>
          <?php if($_SESSION["id_client"] != 0){ ?>
            <div class="navbar-left-user">
              <div class="user">
                <a class="submit" id="seconnecter" href="deconnexion.php">Se déconnecter</a>
              </div>
            </div>
            <div class="navbar-left-user">
              <div class="user">
                <a class="vertical-center" href="MonCompte-Client.php">
                  <img src="./img/icons/left-nav/profile.png" alt="">
                  <h6>Votre compte</h6>
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
            <h2> Les salles </h2>
            <div class="Profil">
              <img src="./img/albums/ron.png" alt="" />
              <div class="Info">
                <h2> Salle de sport OMNES</h2>
                  <br>
                  <?php
                  while ($data = mysqli_fetch_assoc($result)){
                    echo "Salle:" . $data['num_salle']. "<br>";
                    echo "Téléphone:" . $data['telephone'] ."<br>";
                    echo "Email:" . $data['email'] . "<br>";
                   }
                   echo "Sports dans cette salle: <br>";
                   echo "(cliquez sur le sport pour plus d'informations)<br>";
                   while ($data = mysqli_fetch_assoc($result3)){
                   echo "<span><a href=Parcourir.php>"  . $data['nom_sport'] . "</a></span><br>";
                   }
                  ?>
              </div>
            </div>
            <div class="Profil">
              <img src="./img/albums/ron.png" alt="" />
              <div class="Info">
                <h2> Salle de sport OMNES</h2>
                  <br>
                  <?php
                  while ($data = mysqli_fetch_assoc($result2)){
                    echo "Salle:" . $data['num_salle']. "<br>";
                    echo "Téléphone:" . $data['telephone'] ."<br>";
                    echo "Email:" . $data['email'] . "<br>";
                   }
                   echo "Sports dans cette salle: <br>";
                   echo "(cliquez sur le sport pour plus d'informations)<br>";
                   while ($data = mysqli_fetch_assoc($result4)){
                   echo "<span><a href=Parcourir.php>"  . $data['nom_sport'] . "</a></span><br>";
                   }
                  ?>
              </div>
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
