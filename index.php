<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="fr">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BomberBot</title>
    <meta name="description" content="BomberBot est un jeu réalisé par une équipe d'étudiant en BAC+3">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- FONT -->
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <?php
        include_ONCE 'php/includes/nav.php';
    ?>

        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img src="img/index/slider/img1_slide.jpg" alt="Chania">
                        <div class="carousel-caption">
                            <h3>
                                <a href="#telechargement"><button type="button" class="btn btn-primary btnSlider">Télécharger</button></a>
                            </h3>
                            <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="img/index/slider/img2_slide.jpg" alt="Chania">
                        <div class="carousel-caption">
                            <h3>zez</h3>
                            <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-justify">
                    <p id="resumeGame">BomberBot est un jeu mobile sous Android où le joueur incarne un robot qui, pour survivre à des vagues d'ennemis, devra les exploser à l'aide de bombes qu'il placera sur le chemin de ses ennemis. Ce jeu se déroule dans un univers 2D en vue de dessus où le joueur progressera à travers un labyrinthe où des murs pourront être détruits avec des bombes. Le jeu propose deux modes de jeu, le premier est un mode challenge où le joueur sera mit à rude épreuve pour survivre à des ennemis de plus en plus nombreux à chaque niveau, le joueur n'a qu'une seule vie et un score est enregistré, son score sera alors ensuite publié en ligne et il pourra comparer son score aux autres joueurs. Le deuxième mode de jeu et une partie rapide, sans score enregistré, le joueur pourra choisir le nombre de robot qu'il souhaite affronter et la partie se fini à la mort du joueur ou à sa victoire.</p>
                </div>
            </div>
        </div>
        <div class="container-fuil" id="device">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-justify">
                        <h2>Disponible aussi sur :</h2>
                    </div>
                    <div class="row debugFooter">
                        <div class="col-xs-6 col-sm-6 col-md-6 deviceDiv">
                            <span><img src="img/index/device/device_pc.svg" alt="ordinateur" id="devicePC" class="deviceIcon"></span>
                            <h3 class="text-center">Ordinateur</h3>
                            <ul class="text-center">
                                <l1>
                                    <?php
                                          if(!isset($_COOKIE['connexion'])&&empty($_COOKIE['connexion'])){ // Si je ne pas connecté
                                            echo'
                                            <a href="connexion.php" name="telechargement">
                                                <button type="button" class="btn btn-primary">Télécharger sur Windows</button>
                                            </a>
                                            ';
                                        }else{ // Sinon (si je suis connecté)
                                            echo'
                                            <a href="game/bomberbot.exe" name="telechargement">
                                                <button type="button" class="btn btn-primary">Télécharger sur Windows</button>
                                            </a>
                                            ';
                                        }
                                    ?>
                                </l1>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 deviceDiv">
                            <span><img src="img/index/device/device_mobile.svg" alt="ordinateur" id="devicePC" class="deviceIcon"></span>
                            <h3 class="text-center">Mobile (android)</h3>
                            <ul class="text-center">
                                <l1>
                                    <?php
                                          if(!isset($_COOKIE['connexion'])&&empty($_COOKIE['connexion'])){ // Si je ne pas connecté
                                            echo'
                                            <a href="connexion.php" name="telechargement">
                                                <button type="button" class="btn btn-primary">Télécharger sur mobile</button>
                                            </a>
                                            ';
                                        }else{ // Sinon (si je suis connecté)
                                            echo'
                                            <a href="https://play.google.com/store/apps/details?id=com.supercell.clashroyale&hl=fr" name="telechargement" target="_blank">
                                                <button type="button" class="btn btn-primary">Télécharger sur mobile</button>
                                            </a>
                                            ';
                                        }
                                    ?>
                                </l1>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include_ONCE 'php/includes/footer.php';
            include_ONCE 'php/includes/script.php';
        ?>
</body>

</html>