<?php
session_start();

          //identifier le nom de base de données
              $database = "web";
             
              //connectez-vous dans votre BDD
              //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
              $db_handle = mysqli_connect('localhost', 'root', '' );
              $db_found = mysqli_select_db($db_handle, $database);
              if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
          {
            $url = "https";
          }
          else
          {
            $url = "http"; 
          }  
          $url .= "://"; 
          $url .= $_SERVER['HTTP_HOST']; 
          $url .= $_SERVER['REQUEST_URI']; 
          
          list($url,$Idcoach ) = explode("?", $url);
          $idsport = "";
         
              if ($db_found) {
                
                $sql = "SELECT * FROM coach NATURAL JOIN `sport` WHERE id_coach LIKE '$Idcoach'";
                $result = mysqli_query($db_handle,$sql);

              
               while ($sport = mysqli_fetch_assoc($result)){
                  $idsport= $sport['id_sport'];
                }
                $sql = "SELECT * FROM coach NATURAL JOIN `sport` WHERE id_coach LIKE '$Idcoach'";
                $result = mysqli_query($db_handle,$sql);
                
                $sql1 = "SELECT * FROM sport NATURAL JOIN `salle` WHERE id_sport LIKE '$idsport' ";
                $result1 = mysqli_query($db_handle,$sql1);
              
              }

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
          
       
            <h2> Profil Coach</h2>
            <div class="Profil">
              
            <img src="./img/albums/coach.png" alt="" />
              <div class="Info">
              <?php 
                while ($dataCoach = mysqli_fetch_assoc($result)){
                  echo "<h2>" . $dataCoach['prenom']."  ". $dataCoach['nom'] . "<br>"."<br>"."</h2>";
                  echo "Coach:  ". $dataCoach['nom_sport']. "<br>". "<br>";
                  echo "Telepone:  ". $dataCoach['telephone']. "<br>". "<br>";
                  echo "Email:  ". $dataCoach['email']. "<br>". "<br>";
                  }
                  while ($dataSalle = mysqli_fetch_assoc($result1)){
                    echo "Salle:   " . $dataSalle['num_salle']."<br>"."<br>";

                  }
                ?>
                
              </div>
             
            </div>
            <?php 
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);
            if ($db_found) {  
              
              $sql3 = "SELECT * FROM dispo NATURAL JOIN coach WHERE id_coach LIKE '$Idcoach'";
              $result3 = mysqli_query($db_handle, $sql3);
           
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

            while ($data3 = mysqli_fetch_assoc($result3)) {
                $heure1=0;
                $heure2=0;
                $heure3=0;
                $heure4=0;
                $date = $data3['jour'];
               // echo $date;
                $sql4 = "SELECT heure FROM rdv WHERE id_coach LIKE '$Idcoach' AND date like '$date' ";
                $result4 = mysqli_query($db_handle, $sql4);
               
                    while($data4 = mysqli_fetch_assoc($result4))
                    {
                     
                        if($data3['matin']=="1")
                        { //il est present
                                if($data4['heure']=='08:00:00')
                                {
                                    //ducoup il est pas dispo
                                    $heure1=1;
                                }
                                if($data4['heure']=='10:00:00')
                                {// ducoup il est pas dispo
                                    $heure2=1;
                                }
                                }else{
                                //il est  pas present
                                    $heure1=1;
                                    $heure2=1;
                                }

                        if($data3['aprem']==1)
                        { //il est present

                                if($data4['heure']=='14:00:00')
                                {
                                    //ducoup il est pas dispo
                                    $heure3=1;
                                }
                                if($data4['heure']=='16:00:00')
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
                                  $sql6 = "SELECT * FROM client WHERE id_client LIKE '$id_client'";
                                  $result6 = mysqli_query($db_handle, $sql6);
                                 
                                    while ($data6 = mysqli_fetch_assoc($result6)){
                                      $idpayment= $data6['id_paiement'];
                                     
                                    }
                                   if(isset($idpayment))
                                   {
                                    
                                    if($heure1 == 0)
                                    {  $bout = $date ."/heure1";
                                      $heure1="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                    if($heure2 == 0)
                                    {
                                        $bout = $date ."/heure2";
                                        $heure2="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                    if($heure3 == 0)
                                    {
                                        $bout = $date ."/heure3";
                                      $heure3="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                    if($heure4 == 0)
                                    {
                                        $bout = $date ."/heure4";
                                      $heure4="<button onclick=\"window.location.href = 'Confirmation.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                   }else{
                                    
                                    if($heure1 == 0)
                                    {  $bout = $date ."/heure1";
                                      $heure1="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                    if($heure2 == 0)
                                    {
                                        $bout = $date ."/heure2";
                                        $heure2="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
                                     // $heure2="<button id=.$bout. onclick=\"window.location.href = 'Paiement.php'\">" . "Réserver" . "</button>";
                                    }
                                    if($heure3 == 0)
                                    {
                                        $bout = $date ."/heure3";
                                      $heure3="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                    if($heure4 == 0)
                                    {
                                        $bout = $date ."/heure4";
                                      $heure4="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
                                    }
          
          
                                  }
          
                                  }else
                                  {
                                   
                                    if($heure1 == 0)
                                    {  $bout = $date ."/heure1";
                                      $heure1="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                    if($heure2 == 0)
                                    {
                                        $bout = $date ."/heure2";
                                        $heure2="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
                                     // $heure2="<button id=.$bout. onclick=\"window.location.href = 'Paiement.php'\">" . "Réserver" . "</button>";
                                    }
                                    if($heure3 == 0)
                                    {
                                        $bout = $date ."/heure3";
                                      $heure3="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
                                    }
                                    if($heure4 == 0)
                                    {
                                        $bout = $date ."/heure4";
                                      $heure4="<button onclick=\"window.location.href = 'Paiement1.php?${bout}'\">". "Réserver" . "</button>";
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
                         }else{
                           echo "database not found";
                         } //end if
                  //si le BDD n'existe pas
                  mysqli_close($db_handle);

                  
            ?>

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
