<?php
    ob_start();
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
           if(isset($_COOKIE['erreurconnexion'])&&($_COOKIE['erreurconnexion']) == true){ // S'il y a une erreur
				echo '<div class="alert alert-danger text-center">
						<strong>Le mot de passe ou l\'identifiant est incorrect.</strong> 
					</div>';
            }   
    
       if(!isset($_COOKIE['connexion'])&&empty($_COOKIE['connexion'])){ // Si je ne pas connecté
            echo'
                <div class="container">
                    <div class="row debugFooter">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 ">
                            <h1 class="text-center">Connexion</h1>
                            <form action="traitement_connexion.php" method="POST" role="form" enctype="multipart/form-data">
                                <fieldset class="form-group">
                                    <label for="pseudo">Identifiant</label>
                                    <input type="text" class="form-control" id="pseudo" placeholder="Identifiant" name="pseudo">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" name="mdp">
                                </fieldset>
                                <button type="submit" class=" btn-primary w100p" name="connection">Se connecter</button>
                                <p id="incription">Vous n\'avez pas de compte ? <a href="inscription.php">Inscrivez-vous !</a></p>
                                <p id="incription">Vous avez perdu votre mot de passe ? <a href="mdpoublie.php">Mot de passe oublié.</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            ';
        }else{ // Sinon (si je suis connecté)
		  header('Location:erreur/erreur_deco.php');
       }
    ?>





    <?php
        include_ONCE 'php/includes/footer.php';
        include_ONCE 'php/includes/script.php';
    ?>
    </body>

    </html>
    
    
    
<?php
    ob_end_flush();
?>