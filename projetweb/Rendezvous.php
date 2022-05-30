<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes rendez-vous</title>
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
              <li class="active">
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
            <h2 id="new-title">Mes rendez-vous</h2>
            <div class="resultat_recherche">
              <table class="tableau_resultat">
                <thead class="head_resultat">
                  <tr class="ligne_head">
                    <th># Coach</th>
                    <th>Sport</th>
                    <th>Établissement</th>
                    <th>Service</th>
                    <th>Jour</th>
                    <th><img src="./img/icons/autre/clock.svg" alt=""></th>
                    <th>Informations complémentaires</th>
                  </tr>
                </thead>
              </table>
              <div class="soustableau">
                <?php if((isset($_SESSION["id_client"]))||(isset($_SESSION["id_coach"] ))||(isset($_SESSION["id_admin"] ))){ ?>

<!-- insérer les rendez-vous clients -->
<?php 
$database = "web";

$_recherche="";

$choix = isset($_POST["choix"])? $_POST["choix"] : "";
if (empty($choix)) {
$choix = 0;
}
$choix = (int)$choix;

if (isset($_POST["submit"])){ //si $_POST est declare. si formulaire soumis
    $_recherche = $_POST["recherche"];
}
if((isset($_SESSION["id_client"])))
{
 $id_client= $_SESSION["id_client"];


//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
//si le BDD existe, faire le traitement
if ($db_found) {

        $sql = "SELECT * FROM rdv NATURAL JOIN coach WHERE id_client LIKE '$id_client'";
        $result = mysqli_query($db_handle, $sql);
        $sql1 = "SELECT * FROM rdv NATURAL JOIN sport WHERE id_client LIKE '$id_client'";
        $result1 = mysqli_query($db_handle, $sql1);
          echo "<table border=0 class=\"tableau_resultat\">";
            echo "<thead class=\"head_resultat\">";
              echo "<tr class=\"ligne_head\">";
                echo "<th>" . "Sport" . "</th>";
                echo "<th>" . "Coach" . "</th>"; 
                echo "<th>" . "Date" . "</th>";
                echo "<th>" . "Heure" . "</th>";
                
              echo "</tr>";
          echo "</thead>";

          //afficher le resultat && $data2 = mysqli_fetch_assoc($result1)
          while (($data = mysqli_fetch_assoc($result)) && ($data2 = mysqli_fetch_assoc($result1)))   {
             
            echo"<tbody class=\"list-body\">";
              echo "<tr class=\"ligne_body\">";
                echo "<td>" . $data2['nom_sport'] . "</td>";
                echo "<td>" . $data['prenom'] ." ".$data['nom']. "</td>";
                echo "<td>" . $data2['date'] . "</td>";
                echo "<td>" . $data2['heure'] . "</td>";
                echo "</tr>";
            echo"</tbody>";
          }
          echo "</table>";
        }
      }
      else{
        echo "Vous n'êtes pas connecté ";
      }

?>
              <?php }else{ ?>
                <h2 id="surbouton">Vous n'êtes pas connecté</h2>
                <a class="submit" id="seconnecter" href="Login-Client.html">Se connecter</a>
              <?php } ?>
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
