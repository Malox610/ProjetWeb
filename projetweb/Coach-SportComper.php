<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport</title>
    <!-- BROWSER ICON -->
    <link rel="icon" href="./img/icons/favicon.ico">
    <!-- JAVASCRIPT -->

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/CardCoach.scss">
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
                        <li class="active">
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
                <div id="football" style="display: none" class="scrollable-content">
                    <!-- mettre le contenu de la page ici -->
                    <div class="albums-container description">
                        <h2 id="new-title">Le football</h2><br>
                        <p>Le football est un sport collectif joué entre deux équipes de onze joueurs (un gardien et dix
                            joueurs de champ) avec un ballon sphérique. Appelé « soccer » en Amérique du Nord, il est
                            pratiqué par 250 millions de joueurs dans plus de 200 pays, ce qui en fait le sport le plus
                            populaire au monde.</p>
                    </div>
                    <div class="albums-container">
                        <h4>Coach de football</h4>
                        <div class="cardbody container">
                            <div class="card">

                                <img src="./img/albums/football.png" alt="" />
                                <h2 class="card__title">Zinedine Zidane</h2>
                                <span class="card__description">Football</span>
                                <a class="submit">Profil</a>
                            </div>
                            <div class="card">

                                <img src="./img/albums/football.png" alt="" />
                                <h2 class="card__title">Laure Boulleau</h2>
                                <span class="card__description">Football</span>
                                <a class="submit">Profil</a>
                            </div>
                            <div class="card">
                                <img src="./img/albums/neymar.png" alt="" />
                                <h2 class="card__title">Jean Neymar</h2>
                                <span class="card__description">Football</span>
                                <a href="Profil-Coach.php?1" class="submit">Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div id="basketball" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Le Basketball</h4>
                            <br>
                            <p>Le basket-ball est un sport collectif de balle opposant deux équipes de cinq joueurs sur
                                un terrain rectangulaire. L'objectif de chaque équipe est de faire passer un ballon au
                                sein du panier. Chaque panier inscrit rapporte deux points à son équipe, à l'exception
                                des tirs effectués au-delà de la ligne des trois points (qui rapportent trois points) et
                                des lancers francs accordés à la suite d'une faute (qui rapportent un point). L'équipe
                                avec le nombre de points le plus important remporte la partie.</p>
                        </div>
                        <div class="albums-container">
                            <h4>Coach basketball</h4>
                            <div class="cardbody">
                                <div class="card">
                                    <img src="./img/albums/Mimie.png" alt="" />
                                    <h2 class="card__title">Mimie Mathy</h2>
                                    <span class="card__description">Basketball</span>
                                    <a href="Profil-Coach.php?4" class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="./img/albums/luc.png" alt="" />
                                    <h2 class="card__title">Erik Spoelstra</h2>
                                    <span class="card__description">Basketball</span>
                                    <a class="submit">Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pingpong" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Le Ping-Pong</h4><br>
                            <p>Le Ping-Pong est un sport dans lequel deux ou quatre joueurs frappent une balle légère l'aide de petites raquettes . Le jeu se déroule sur une table en dur divisée par un filet. Sauf pour le service initial, les joueurs doivent permettre à une balle jouée vers eux de rebondir une fois de leur côté de la table et doivent la retourner pour qu'elle rebondisse du côté opposé au moins une fois. Un point est marqué lorsqu'un joueur ne renvoie pas la balle dans les règles.</p>
                        </div>

                        <div class="albums-container">
                            <h4>Coach Ping-Pong</h4>
                            <div class="cardbody">
                                <div class="card">
                                    <img src="./img/albums/sonic.png" alt="" />
                                    <h2 class="card__title">Sonic Le hérisson bleu</h2>
                                    <span class="card__description">Ping-pong</span>
                                    <a href="Profil-Coach.php?5" class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="" />
                                    <h2 class="card__title">nicson</h2>
                                    <span class="card__description">Ping-pong</span>
                                    <a class="submit">Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="badminton" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Le Badminton</h4>
                            <br>
                            <p>Le badminton est un sport de raquette qui oppose soit deux joueurs (simples), soit deux paires (doubles), placés dans deux demi-terrains séparés par un filet. Les joueurs, appelés badistes, marquent des points en frappant un volant à l'aide d'une raquette afin de le faire tomber dans le terrain adverse.</p>
                        </div>

                        <div class="albums-container">
                            <h4>Coach Badminton</h4>
                            <div class="cardbody">
                                <div class="card">
                                    <img src="football.png" alt="" />
                                    <h2 class="card__title">Brice Leverdez</h2>
                                    <span class="card__description">badminton</span>
                                    <a class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="" />
                                    <h2 class="card__title">NEW ds</h2>
                                    <span class="card__description">badminton</span>
                                    <a class="submit">Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Tennis" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Le Tennis</h4> <br>
                            <p>Le tennis est un sport de raquette qui oppose soit deux joueurs (dotés de raquette) soit quatre joueurs qui forment deux équipes de deux.Le but du jeu est de frapper la balle de telle sorte que l'adversaire ne puisse la remettre dans les limites du terrain, soit en marquant le point en mettant l'adversaire hors de portée de la balle, soit en l'obligeant à commettre une faute (si sa balle ne retombe pas dans les limites du court, ou si elle ne passe pas le filet).</p>
                        </div>
                        <div class="albums-container">

                            <h4>Coach Tennis</h4>
                            <div class="cardbody">
                                <div class="card">
                                    <img src="football.png" alt="" />
                                    <h2 class="card__title">Roger Federer</h2>
                                    <span class="card__description">Tennis</span>
                                    <a class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="" />
                                    <h2 class="card__title">Rafael Nadal</h2>
                                    <span class="card__description">Tennis</span>
                                    <a class="submit">Profil</a>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div id="rugby" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Le Rugby</h4>  <br>
                            <p>Le rugby se joue par équipes de quinze joueurs.L'objectif du jeu est de marquer plus de points que l'adversaire, par des essais (donnant droit à des transformations), des buts de pénalité ou encore par des drops (coups de pied tombés dans le cours du jeu). De nos jours, l'essai vaut cinq points et sept s'il est transformé, le drop et le but (de pénalité) valent trois points chacun.</p>
                        </div>
                        <div class="albums-container">
                            <h4>Coach rugby</h4>
                            <div class="cardbody">
                                <div class="card">
                                    <img src="football.png" alt="" />
                                    <h2 class="card__title">Richard hill</h2>
                                    <span class="card__description">Rugby</span>
                                    <a class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="" />
                                    <h2 class="card__title">Eddie Jones</h2>
                                    <span class="card__description">Rugby</span>
                                    <a class="submit">Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Cornemuse" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Cornemuse</h4>  <br>
                            <p>Soufflez et le son sortira tout seul</p>
                        </div>
                        <div class="albums-container">
                            <h4>Coach Cornemuse</h4>
                            <div class="cardbody">
                                <div class="card">
                                <img src="./img/albums/willie.png" alt="" />
                                    <h2 class="card__title"> Willie L'écossais</h2>
                                    <span class="card__description">Cornemuse</span>
                                    <a href="Profil-Coach.php?6" class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="" />
                                    <h2 class="card__title">Eddie Jones</h2>
                                    <span class="card__description">Cornemuse</span>
                                    <a class="submit">Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Jedi" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Sabre laser</h4>  <br>
                            <p>Viens affronter les plus grands Jedi</p>
                        </div>
                        <div class="albums-container">
                            <h4>Coach Jedi</h4>
                            <div class="cardbody">
                                <div class="card">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="" />
                                    <h2 class="card__title"> Dark Vador</h2>
                                    <span class="card__description">Sabre laser</span>
                                    <a class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="./img/albums/luc.png"
                                        alt="" />
                                    <h2 class="card__title">Luc CielMarcheur</h2>
                                    <span class="card__description">Sabre laser</span>
                                    <a href="Profil-Coach.php?2" class="submit">Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Quiddich" style="display: none" class="scrollable-content">
                        <!-- mettre le contenu de la page ici -->
                        <div class="albums-container description">
                            <h4>Quiddich</h4>  <br>
                            <p>Des lycéens qui se battent dans les airs sur des balais pour plaire aux lycéennes.</p>
                        </div>
                        <div class="albums-container">
                            <h4>Coach Quidditch</h4>
                            <div class="cardbody">
                                <div class="card">
                                <img src="./img/albums/ron.png" alt="" />
                                    <h2 class="card__title">Ron LeRoux</h2>
                                    <span class="card__description">Quidditch</span>
                                    <a href="Profil-Coach.php?3" class="submit">Profil</a>
                                </div>
                                <div class="card">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="" />
                                    <h2 class="card__title">Harry le sorcier</h2>
                                    <span class="card__description">Quidditch</span>
                                    <a class="submit">Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script> const query = window.location.search;
                        var node;

                        console.log(query);
                        switch (query) {
                            case '?${foot}':
                            node = document.getElementById('football');
                            node.style.display = 'block';
                                break;
                            case '?${basketball}':
                            node = document.getElementById('basketball');
                            node.style.display = 'block';
                                break;
                            case '?${pingpong}':
                            node = document.getElementById('pingpong');
                            node.style.display = 'block';
                                break;
                            case '?${badminton}':
                            node = document.getElementById('badminton');
                            node.style.display = 'block';
                                break;
                            case '?${tennis}':
                            node = document.getElementById('Tennis');
                            node.style.display = 'block';
                                break;
                            case '?${rugby}':
                            node = document.getElementById('rugby');
                            node.style.display = 'block';
                            break;
                            case '?Cornemuse':
                            node = document.getElementById('Cornemuse');
                            node.style.display = 'block';
                            break;
                            case '?Quiddich':
                            node = document.getElementById('Quiddich');
                            node.style.display = 'block';
                            break;
                            case '?Jedi':
                            node = document.getElementById('Jedi');
                            node.style.display = 'block';
                            break;

                            default:
                                console.log(`Sorry, we are out of ${expr}.`);
                        }
                    </script>
                </div>
        </section>
        <!-- FOOTER -->
        <footer class="player">
            <!-- PLAYER SONG -->
            <div class="player-song">
                <div class="song-txt">
                    <address>
                        <h4><a href="https://www.google.com/maps/place/ECE+Paris+Lyon/@48.8517703,2.2842932,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6701b4f58251b:0x167f5a60fb94aa76!8m2!3d48.8517668!4d2.2864819">37
                                Quai de Grenelle</a></h4>
                    </address>
                    <span><a href="https://www.google.com/maps/place/ECE+Paris+Lyon/@48.8517703,2.2842932,17z/data=!3m1!4b1!4m5!3m4!1s0x47e6701b4f58251b:0x167f5a60fb94aa76!8m2!3d48.8517668!4d2.2864819">75015,
                            Paris, France</a></span>
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
        <script type="text/javascript" src="./js/script.js"></script>
        <script type="text/javascript" src="./js/coachSportComptet.js"></script>
    </main>
</body>

</html>
