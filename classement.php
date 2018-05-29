<?php
    include ('php/includes/connexion.inc.php');
    $reponse = $bdd->query('SELECT * FROM highscores JOIN utilisateurs ON utilisateurs.id = highscores.idutilisateurs ORDER BY highscores DESC LIMIT 20;');
?>
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
    <title>BomberBot - Connexion</title>
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
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
                    <h1 class="text-center">Classement</h1>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <div class="row">
                    <thead>
                        <tr>
                            <th class="col-xs-1 col-sm-1 col-md-1 text-center tabTitre">#</th>
                            <th class="col-xs-4 col-sm-4 col-md-2 tabTitre text-center">Joueur</th>
                            <th class="col-xs-4 col-sm-4 col-md-4 tabTitre text-center">Score</th>
                        </tr>
                    </thead>
                </div>
                <div class="row">
                    <tbody>
                       <?php
                            $classement = 0;
                            while ($donnees = $reponse->fetch()){
                                $classement += 1;
                                $pseudo = htmlspecialchars($donnees['pseudo']);
                                $highscores = htmlspecialchars($donnees['highscores']);
                                ?>
                                    <tr>
                                        <td class="col-xs-1 col-sm-1 col-md-1 classement text-center"><?php echo $classement; ?></td>
                                        <td class="col-xs-4 col-sm-4 col-md-4 joueur"><?php echo $pseudo; ?></td>
                                        <td class="col-xs-4 col-sm-4 col-md-4 score text-center"><?php echo $highscores; ?></td>
                                    </tr>
                                <?php
                        }
                            $reponse->closeCursor(); // Termine le traitement de la requête
                        ?>
                    </tbody>
                </div>
            </table>
        </div>



        <?php
        include_ONCE 'php/includes/footer.php';
        include_ONCE 'php/includes/script.php';
    ?>
</body>

</html>