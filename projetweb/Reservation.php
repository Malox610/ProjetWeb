<?php
session_start();
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
                      <?php echo "<h6>" . $_SESSION["nom"] . "</h6>"; ?>
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
            <h2 id="new-title">Reservations</h2>
            <div class="resultat_recherche">
            <?php
            //identifier le nom de base de donn??es
            $database = "web";
            $_recherche="";

            //connectez-vous dans votre BDD
            //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);
            //si le BDD existe, faire le traitement
            if ($db_found) {
                $_idcoach= $_SESSION['id_coach'];

            $sql = "SELECT * FROM dispo NATURAL JOIN coach WHERE id_coach LIKE '$_idcoach'";
            $result = mysqli_query($db_handle, $sql);
            echo "<table border=0 class=\"tableau_resultat\">";
              echo "<thead class=\"head_resultat\">";
                echo "<tr class=\"ligne_head\">";
                  echo "<th>" . "Jour" . "</th>";
                  echo "<th>" . "08H00" . "</th>";
                  echo "<th>" . "10H00" . "</th>";
                  echo "<th>" . "14H00" . "</th>";
                  echo "<th>" . "16H00" . "</th>";
                echo "</tr>";
              echo "</thead>";

            while ($data = mysqli_fetch_assoc($result)) {
                $heure1=0;
                $heure2=0;
                $heure3=0;
                $heure4=0;
                $date = $data['jour'];

                $sql1 = "SELECT heure FROM rdv WHERE id_coach LIKE '$_idcoach' AND date like '$date' ";
                $result1 = mysqli_query($db_handle, $sql1);
                    while($data1 = mysqli_fetch_assoc($result1))
                    {

                        if($data['matin']=="1")
                        { //il est present
                                if($data1['heure']=='08:00:00')
                                {
                                    //ducoup il est pas dispo
                                    $heure1=1;
                                }
                                if($data1['heure']=='10:00:00')
                                {// ducoup il est pas dispo
                                    $heure2=1;
                                }
                                }else{
                                //il est  pas present
                                    $heure1=1;
                                    $heure2=1;
                                }

                        if($data['aprem']==1)
                        { //il est present

                                if($data1['heure']=='14:00:00')
                                {
                                    //ducoup il est pas dispo
                                    $heure3=1;
                                }
                                if($data1['heure']=='16:00:00')
                                {
                                        //ducoup il est pas dispo
                                    $heure4=1;
                                }
                                }else
                                {
                                    $heure3=1;
                                    $heure4=1;
                                }
                      }
                                $joursem = array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
                                // extraction des jour, mois, an de la date
                                list($annee, $mois,$jour ) = explode('-', $date);
                                // calcul du timestamp

                                $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
                               
                                if((isset($_SESSION["id_client"])))
                                {   $id_client=$_SESSION["id_client"];
                                  $sql3 = "SELECT * FROM client WHERE id_client LIKE '$id_client'";
                                  $result3 = mysqli_query($db_handle, $sql3);
                                 
                                    while ($data3 = mysqli_fetch_assoc($result3)){
                                      $idpayment= $data3['id_paiement'];
                                     
                                    }
                                   if(isset($idpayment))
                                   {
                                    
                                    if($heure1 == 0)
                                    {  $bout = $date ."/heure1";
                                      $heure1="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                    if($heure2 == 0)
                                    {
                                        $bout = $date ."/heure2";
                                        $heure2="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                    if($heure3 == 0)
                                    {
                                        $bout = $date ."/heure3";
                                      $heure3="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                    if($heure4 == 0)
                                    {
                                        $bout = $date ."/heure4";
                                      $heure4="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                   }else{
                                    
                                    if($heure1 == 0)
                                    {  $bout = $date ."/heure1";
                                      $heure1="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                    if($heure2 == 0)
                                    {
                                        $bout = $date ."/heure2";
                                        $heure2="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                     // $heure2="<button id=.$bout. onclick=\"window.location.href = 'Paiement.php'\">" . "R??server" . "</button>";
                                    }
                                    if($heure3 == 0)
                                    {
                                        $bout = $date ."/heure3";
                                      $heure3="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                    if($heure4 == 0)
                                    {
                                        $bout = $date ."/heure4";
                                      $heure4="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                    }
          
          
                                  }
          
                                  }else
                                  {
                                   
                                    if($heure1 == 0)
                                    {  $bout = $date ."/heure1";
                                      $heure1="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                    if($heure2 == 0)
                                    {
                                        $bout = $date ."/heure2";
                                        $heure2="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                     // $heure2="<button id=.$bout. onclick=\"window.location.href = 'Paiement.php'\">" . "R??server" . "</button>";
                                    }
                                    if($heure3 == 0)
                                    {
                                        $bout = $date ."/heure3";
                                      $heure3="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                    if($heure4 == 0)
                                    {
                                        $bout = $date ."/heure4";
                                      $heure4="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "R??server" . "</button>";
                                    }
                                  }
                                // affichage du jour de la semaine
                                //afficher le resultat
                                    echo "<tr>";
                                        echo "<td>" . $joursem[date("w",$timestamp)] . "</td>";
                                        echo "<td>" . $heure1 . "</td>";
                                        echo "<td>" . $heure2 . "</td>";
                                        echo "<td>" . $heure3 . "</td>";
                                        echo "<td>" . $heure4 . "</td>";
                                    echo "</tr>";
                          }
                          echo "</table>";
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
