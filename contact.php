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
    <title>BomberBot - Mes paramètres</title>
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
           if(isset($_COOKIE['mailSend'])&&($_COOKIE['mailSend']) == true){ // si le mail est envoyé
				echo '<div class="alert alert-success text-center">
						<strong>Message envoyé !</strong> 
					</div>
                    ';
            }
    ?>
        <div class="container">
            <div class="row debugFooter">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 ">
                    <h1 class="text-center">Nous contacter</h1>
                    <form action="traitement_mail.php" method="POST" role="form" enctype="multipart/form-data">
                        <fieldset class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Benoît" name="prenom">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Dupont" name="nom">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="exemple@exemple.com" name="email">
                        </fieldset>
                         <fieldset class="form-group">
                             <label for="exampleTextarea">Message</label>
                             <textarea class="form-control" id="message" rows="10" placeholder="Votre message"></textarea>
                         </fieldset>
                        <button type="button" class="btn-primary w100p mb30" name="sendMail" id="sendMail">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
        include_ONCE 'php/includes/footer.php';
        include_ONCE 'php/includes/script.php';
    ?>
</body>

</html>