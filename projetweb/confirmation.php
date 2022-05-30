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
                <a href="Rendezvous.php">
                  <img src="./img/icons/left-nav/calendar.svg" alt="">
                  <span>Rendez-vous</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="navbar-left-user">
            <div class="user">
              <?php if($_SESSION['role'] ='administrateur'){ ?>
              <a class="vertical-center" href="MonCompte-Admin.php">
              <?php } ?>
              <?php if($_SESSION['role'] ='coach'){ ?>
              <a class="vertical-center" href="MonCompte-Coach.php">
              <?php } ?>
              <?php if($_SESSION['role'] ='client'){ ?>
              <a class="vertical-center" href="MonCompte-Client.php">
              <?php } ?>
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

        <?php
        session_start();
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
       // echo $url;
          list($url,$dateheure ) = explode("?", $url);
         // echo $dateheure;
          list($date, $heure ) = explode("/", $dateheure);
         // echo $date ;
       if($heure=="heure1")
       {
        $heure = "08:00:00";
       }
       if($heure=="heure2")
       {
        $heure = "10:00:00";
       }
       if($heure=="heure3")
       {
        $heure = "14:00:00";
       }
       if($heure=="heure4")
       {
        $heure = "16:00:00";
       }

       $_idcoach= $_SESSION['id_coach'];


      $database = "web";
      $sport="";
      $_idsport="";


      //connectez-vous dans votre BDD
      //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
      $db_handle = mysqli_connect('localhost', 'root', '' );
      $db_found = mysqli_select_db($db_handle, $database);
      //si le BDD existe, faire le traitements
      if ($db_found) {

          $sql = "SELECT * FROM coach NATURAL JOIN sport WHERE id_coach LIKE '$_idcoach'";
          $result = mysqli_query($db_handle, $sql);
          if($data = mysqli_fetch_assoc($result))
          {
            $nomcoach = $data['nom'];
            $_idsport = $data['id_sport'];
            $sport = $data['nom_sport'];
          }
          }//end if
      //si le BDD n'existe pas
          else {
          echo "Database not found";
          }//end else
      //fermer la connection
      mysqli_close($db_handle);
        ?>
            <form class="formulaire" id="commande" action="final.php" method="post">
              <fieldset>
                <div class="LigneForm">
                  <label class="inputform">Heure :  <?php echo $heure;?></label>
                 <input id=searchbar2 type="hidden" name="heure" placeholder="heure" value="<?php echo htmlspecialchars($heure);?>" required/>
                </div>
                <div class="LigneForm">
                  <label class="inputform">Date :  <?php echo $date;?> </label>
                  <input id=searchbar2 type="hidden" name="date" placeholder="" value="<?php echo htmlspecialchars($date); ?>" required/>
                </div>

                <div class="LigneForm">
                  <label class="inputform">Coach :  <?php echo $nomcoach;?> </label>
                  <input id=searchbar2 type="hidden" name="coach" placeholder="" value="<?php echo htmlspecialchars($_idcoach); ?>" required/>
                </div>
                 <div class="LigneForm">
                  <label class="inputform">Sport :  <?php echo $sport;?> </label>
                  <input id=searchbar2 type="hidden" name="sport" placeholder="" value="<?php echo htmlspecialchars($_idsport); ?>" required/>
                </div>

                <div class="LigneForm">
                  <input class="submit" id="connecter" type="submit" name="envoi" value="Confirmer"/>
                </div>
              </fieldset>
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
