<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Omnes Sport</title>
    <!-- BROWSER ICON -->
    <link rel="icon" href="./img/icons/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
                <a class="vertical-center" href="MonCompte-Client.html">
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
              <!-- Slider -->
              <div class="slider__warpper">
                <div class="flex__container flex--pikachu flex--active" data-slide="1">
                  <div class="flex__item flex__item--left">
                    <div class="flex__content">
                      <p class="text--sub">Match de football universitaire</p>
                      <h2 class="text--big">ECE VS</h2><h1 class="text--semibig">ESILV</h1>
                      <p class="text--normal">Match de championnat pour l'équipe de football de l'ECE contre l'ESILV au stade Suzanne Lenglen le 19/03/2022 à 15h.</p>
                    </div>
                    <p class="text__background">FOOT</p>
                  </div>
                  <div class="flex__item flex__item--right"></div>
                  <img class="pokemon__img" src="./img/albums/football.png"/>
                </div>
                <div class="flex__container flex--piplup animate--start" data-slide="2">
                  <div class="flex__item flex__item--left">
                    <div class="flex__content">
                      <p class="text--sub">Match de five football universitaire</p>
                      <h2 class="text--big">ECE VS</h2><h1 class="text--semibig">ESILV</h1>
                      <p class="text--normal">C'est comme du foot mais à 5 contre 5 au lieu de 11 contre 11.</p>
                    </div>
                    <p class="text__background">FIVE</p>
                  </div>
                  <div class="flex__item flex__item--right"></div>
                  <img class="pokemon__img" src="./img/albums/football.png" />
                </div>
                <div class="flex__container flex--blaziken animate--start" data-slide="3">
                  <div class="flex__item flex__item--left">
                    <div class="flex__content">
                      <p class="text--sub">Match de Quidditch universitaire</p>
                      <h2 class="text--big">ECE VS</h2><h1 class="text--semibig">ESILV</h1>
                      <p class="text--normal">Alors POTTER, on fait du quidditch ?</p>
                    </div>
                    <p class="text__background">POTTER</p>
                  </div>
                  <div class="flex__item flex__item--right"></div>
                  <img class="pokemon__img" src="./img/albums/quidditch.png" />
                </div>
                <div class="flex__container flex--dialga animate--start" data-slide="4">
                  <div class="flex__item flex__item--left">
                    <div class="flex__content">
                      <p class="text--sub">Match de PingPong universitaire</p>
                      <h2 class="text--big">ECE VS</h2><h1 class="text--semibig">ESILV</h1>
                      <p class="text--normal">Un match passionnant s'annonce.</p>
                    </div>
                    <p class="text__background">PingPong</p>
                  </div>
                  <div class="flex__item flex__item--right"></div>
                  <img class="pokemon__img" src="./img/albums/pingpong.png" />
                </div>
                <div class="flex__container flex--zekrom animate--start" data-slide="5">
                  <div class="flex__item flex__item--left">
                    <div class="flex__content">
                      <p class="text--sub">Match de Sabre Laser universitaire</p>
                      <h2 class="text--big">ECE VS</h2><h1 class="text--semibig">ESILV</h1>
                      <p class="text--normal">Gros match de sabre laser, premier qui touche l'autre gagne.</p>
                    </div>
                    <p class="text__background">LASER</p>
                  </div>
                  <div class="flex__item flex__item--right"></div>
                  <img class="pokemon__img" src="./img/albums/sabrelaser.png" />
                </div>

              <div class="slider__navi">
                <a href="#" class="slide-nav active" data-slide="1">pikachu</a>
                <a href="#" class="slide-nav" data-slide="2">piplup</a>
                <a href="#" class="slide-nav" data-slide="3">blaziken</a>
                <a href="#" class="slide-nav" data-slide="4">dialga</a>
                <a href="#" class="slide-nav" data-slide="5">zekrom</a>
              </div>
              <script type="text/javascript" src="./js/script.js"></script>
            </div>
            <!-- Albums -->
            <div class="albums-container">
              <h2 id="new-title2">Quelques activités</h2>
              <div class="albums-row">
                <div class="albums-item txt-center">
                  <a href="Coach-SportComper.php?${foot}">
                    <div class="img-album">
                      <img class="img-responsive" src="./img/albums/football.png" alt="">
                      <i class="far fa-text">J'y vais</i>
                    </div>
                  </a>
                  <h4>Football</h4>
                  <p>Le sport le plus populaire du monde et de OMNES Sport.</p>
                </div>
                <div class="albums-item txt-center">
                    <a href="Coach-SportComper.php?${basketball}">
                      <div class="img-album">
                        <img class="img-responsive" src="./img/albums/iverson.png" alt="">
                        <i class="far fa-text">J'y vais</i>
                      </div>
                    </a>
                  <h4>Basketball</h4>
                  <p>Vous pensez être le futur LeBron James ?</p>
                </div>
                <div class="albums-item txt-center">
                  <a href="Coach-SportComper.php?${pingpong}">
                    <div class="img-album">
                      <img class="img-responsive" src="./img/albums/pingpong.png" alt="">
                      <i class="far fa-text">J'y vais</i>
                    </div>
                  </a>
                  <h4>Ping Pong</h4>
                  <p>Vous pensez être le futur *Je ne connais pas de joueur de pongiste* ?</p>
                </div>
                <div class="albums-item txt-center">
                  <a href="Coach-SportComper.php?${badminton}">
                    <div class="img-album">
                      <img class="img-responsive" src="./img/albums/sabrelaser.png" alt="">
                      <i class="far fa-text">J'y vais</i>
                    </div>
                  </a>
                  <h4>Sabre Laser</h4>
                  <p>Trouve ton maître Jedi.</p>
                </div>
                <div class="albums-item txt-center">
                  <a href="Coach-SportComper.php?${tennis}">
                    <div class="img-album">
                      <img class="img-responsive" src="./img/albums/quidditch.png" alt="">
                      <i class="far fa-text">J'y vais</i>
                    </div>
                  </a>
                  <h4>Quidditch</h4>
                  <p>Des lycéens qui se battent dans les airs sur des balais pour plaire aux lycéennes.</p>
                </div>
                <div class="albums-item txt-center">
                  <a href="Coach-SportComper.php?${rugby}">
                    <div class="img-album">
                      <img class="img-responsive" src="./img/albums/cornemuse.png" alt="">
                      <i class="far fa-text">J'y vais</i>
                    </div>
                  </a>
                  <h4>Cornemuse</h4>
                  <p>Comment ça c'est pas un sport ? Vous avez jamais fais de cornemuse vous !</p>
                </div>
              </div>
            </div>
            <div class="albums-container">
              <h2 id="new-title">Quelques coachs</h2>
              <p class="soustitre">Les meilleurs dans leur domaine, parfois les seuls.</p>
              <div class="albums-row">
                <div class="albums-item rounded txt-center">
                  <div class="img-album">
                    <img class="img-responsive" src="./img/albums/neymar.png" alt="">
                    <i class="far fa-text">Football</i>
                  </div>
                  <h4>Jean Neymar</h4>
                </div>
                <div class="albums-item rounded txt-center">
                  <div class="img-album">
                    <img class="img-responsive" src="./img/albums/luc.png" alt="">
                    <i class="far fa-text">Sabre Laser</i>
                  </div>
                  <h4>Luc CielMarcheur</h4>
                </div>
                <div class="albums-item rounded txt-center">
                  <div class="img-album">
                    <img class="img-responsive" src="./img/albums/ron.png" alt="">
                    <i class="far fa-text">Quidditch</i>
                  </div>
                  <h4>Ron LeRoux</h4>
                </div>
                <div class="albums-item rounded txt-center">
                  <div class="img-album">
                    <img class="img-responsive" src="./img/albums/mimie.png" alt="">
                    <i class="far fa-text">Basketball</i>
                  </div>
                  <h4>Mimie Mathy</h4>
                </div>
                <div class="albums-item rounded txt-center">
                  <div class="img-album">
                    <img class="img-responsive" src="./img/albums/sonic.png" alt="">
                    <i class="far fa-text">Ping Pong</i>
                  </div>
                  <h4>Sonic</h4>
                </div>
                <div class="albums-item rounded txt-center">
                  <div class="img-album">
                    <img class="img-responsive" src="./img/albums/willie.png" alt="">
                    <i class="far fa-text">Cornemuse</i>
                  </div>
                  <h4>Willy</h4>
                </div>
              </div>
            </div>
        </div>
      </section>

    </main>
  </body>
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
</html>
