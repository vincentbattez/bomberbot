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
    <title>BomberBot - Mentions légales</title>
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
        include_ONCE 'php/includes/nav2.php';
    ?>

        <div class="container">
           <h1 class="text-center">Plan du site</h1>
            <div class="row debugFooter">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <ul>
                        <li><a href="index.php">Index</a></li>
                        <li><a href="index.php#telechargement">Télécharger le jeu</a></li>
                        <li><a href="classement.php">Classement</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a>
                            <ul>
                                <li><a href="mdpoublie.php">Mot de passe oublié</a></li>
                                <li><a href="parametres.php">Paramètres du compte</a>
                                    <ul>
                                        <li><a href="info.php">Informations du compte</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="sitemap.php">Plan du site</a>
                        <li><a href="contact.php">Nous contacter</a>
                        <li><a href="mentions.php">Mentions légales</a>
                    </ul>
                </div>
            </div>
        </div>


        <?php
            include_ONCE 'php/includes/footer.php';
            include_ONCE 'php/includes/script.php';
        ?>
</body>

</html>