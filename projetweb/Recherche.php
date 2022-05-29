<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
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
            <a href="index.html">
              <img class="navbar-logo desktop" src="./img/icons/logo-white.svg" alt="">
            </a>
            <a href="index.html">
              <img class="navbar-logo mobile" src="./img/icons/logo-small-white.svg" alt="">
            </a>
            <ul class="v-list nav">
              <li>
                <a href="index.html">
                  <img src="./img/icons/left-nav/home.svg" alt="">
                  <span>Accueil</span>
                </a>
              </li>
              <li class="active">
                <a href="Recherche.html">
                  <img src="./img/icons/left-nav/search.svg" alt="">
                  <span>Recherche</span>
                </a>
              </li>
              <li>
                <a href="Parcourir.html">
                  <img src="./img/icons/left-nav/football.svg" alt="">
                  <span>Tout Parcourir</span>
                </a>
              </li>
              <li>
                <a href="rendezvous.html">
                  <img src="./img/icons/left-nav/calendar.svg" alt="">
                  <span>Rendez-vous</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="navbar-left-user">
            <div class="user">
              <a class="vertical-center" href="Login-Client.html">
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
            <h2 id="new-title">Recherche</h2>
            <div class="resultat_recherche">
            <?php
          //identifier le nom de base de données
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
              //connectez-vous dans votre BDD
              //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
              $db_handle = mysqli_connect('localhost', 'root', '' );
              $db_found = mysqli_select_db($db_handle, $database);
              //si le BDD existe, faire le traitement
              if ($db_found) {
                session_start();
                  switch ($choix) {

                      case 1:
                      $sql = "SELECT * FROM coach NATURAL JOIN sport WHERE nom LIKE '%$_recherche%'";
                      $result = mysqli_query($db_handle, $sql);
                    
                        echo "<table border=0 class=\"tableau_resultat\">";
                          echo "<thead class=\"head_resultat\">";
                            echo "<tr class=\"ligne_head\">";
                              echo "<th>" . "Nom" . "</th>";
                              echo "<th>" . "Prénom" . "</th>";
                              echo "<th>" . "Spécialité" . "</th>";
                              echo "<th>" . "Etablissement" . "</th>";
                              echo "<th>" . "Bureau" . "</th>";
                              echo "<th>" . "Téléphone" . "</th>";
                              echo "<th>" . "Email" . "</th>";
                            echo "</tr>";
                        echo "</thead>";

                        //afficher le resultat
                        while ($data = mysqli_fetch_assoc($result)) {
                         
                         
                            $_SESSION['id_coach']=$data['id_coach'];
                        
                          echo"<tbody class=\"list-body\">";
                            echo "<tr class=\"ligne_body\">";
                              echo "<td>" . $data['nom'] . "</td>";
                              echo "<td>" . $data['prenom'] . "</td>";
                              echo "<td>" . $data['nom_sport'] . "</td>";
                              echo "<td>" . "ECE Paris" . "</td>";
                              echo "<td>" . $data['bureau'] . "</td>";
                              echo "<td>" . $data['telephone'] . "</td>";
                              echo "<td>" . $data['email'] . "</td>";
                              echo "<td class=\"big-td\">" ."<button onclick=\"window.location.href = 'Reservation.php'\">" . "J'y vais !" . "</button>". "</td>";
                            echo "</tr>";
                          echo"</tbody>";
                        }
                        echo "</table>";
                      break;

                      case 2:
                      $sql = "SELECT * FROM coach NATURAL JOIN sport WHERE nom_sport LIKE '%$_recherche%'";
                      $result = mysqli_query($db_handle, $sql);
                        echo "<table border=0 class=\"tableau_resultat\">";
                          echo "<thead class=\"head_resultat\">";
                            echo "<tr class=\"ligne_head\">";
                              echo "<th>" . "Spécialité" . "</th>";
                              echo "<th>" . "Nom" . "</th>";
                              echo "<th>" . "Prénom" . "</th>";
                              echo "<th>" . "Etablissement" . "</th>";
                              echo "<th>" . "Bureau" . "</th>";
                              echo "<th>" . "Téléphone" . "</th>";
                              echo "<th>" . "Email" . "</th>";
                            echo "<tr>";
                          echo "</thead>";

                        //afficher le resultat
                        while ($data = mysqli_fetch_assoc($result)) {
                          $_SESSION['id_coach']=$data['id_coach'];
                            echo"<tbody class=\"list-body\">";
                              echo "<tr class=\"ligne_body\">";
                              echo "<td>" . $data['nom_sport'] . "</td>";
                              echo "<td>" . $data['nom'] . "</td>";
                              echo "<td>" . $data['prenom'] . "</td>";
                              echo "<td>" . "ECE Paris" . "</td>";
                              echo "<td>" . $data['bureau'] . "</td>";
                              echo "<td>" . $data['telephone'] . "</td>";
                              echo "<td>" . $data['email'] . "</td>";
                              echo "<td class=\"big-td\">" ."<button onclick=\"window.location.href = 'Reservation.php'\">" . "J'y vais !" . "</button>". "</td>";
                              echo "</tr>";
                            echo"</tbody>";
                        }
                        echo "</table>";
                      break;

                      case 3:
                      $sql = "SELECT * FROM salle NATURAL JOIN adresse WHERE num_salle LIKE '%$_recherche%'";
                      $result = mysqli_query($db_handle, $sql);
                        echo "<table border=0 class=\"tableau_resultat\">";
                          echo "<thead class=\"head_resultat\">";
                            echo "<tr class=\"ligne_head\">";
                              echo "<th>" . "Numéro de la salle" . "</th>";
                              echo "<th>" . "Téléphone" . "</th>";
                              echo "<th>" . "Email" . "</th>";
                              echo "<th>" . "Adresse" . "</th>";
                            echo "<\tr>";
                          echo "</thead>";

                        //afficher le resultat
                        while ($data = mysqli_fetch_assoc($result)) {
                          $_SESSION['id_coach']=$data['id_coach'];
                          echo"<tbody class=\"list-body\">";
                            echo "<tr class=\"ligne_body\">";
                              echo "<td>" . $data['num_salle'] . "</td>";
                              echo "<td>" . $data['telephone'] . "</td>";
                              echo "<td>" . $data['email'] . "</td>";
                              echo "<td>" . $data['num_rue'] . $data['nom_rue']  . $data['code_postal'] . $data['ville']  . $data['pays'] ."</td>";
                              echo "<td class=\"big-td\">" ."<button onclick=\"window.location.href = 'Reservation.php'\">" . "J'y vais !" . "</button>". "</td>";
                     
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                      break;
                  }
          }//end if
              //si le BDD n'existe pas
              else {
                  echo "Database not found";
                  }//end else
              //fermer la connection
              mysqli_close($db_handle);
          ?>
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
