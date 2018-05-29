<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            line-height: 1.2;
            margin: 0;
        }
        
        html {
            color: #888;
            display: table;
            font-family: sans-serif;
            height: 100%;
            text-align: center;
            width: 100%;
        }
        
        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
        }
        
        h1 {
            color: #555;
            font-size: 2em;
            font-weight: 400;
        }
        
        p {
            margin: 0 auto;
            width: 280px;
        }
        
        @media only screen and (max-width: 280px) {
            body,
            p {
                width: 95%;
            }
            h1 {
                font-size: 1.5em;
                margin: 0 0 0.3em;
            }
        }
    </style>
</head>

<body>
   <?php
       if(!isset($_COOKIE['connexion'])&&empty($_COOKIE['connexion'])){ // Si je ne pas connecté
        echo'
            <h1>Connexion nécessaire</h1>
            <p>Vous devez vous connecter pour accéder au <strong>paramètre de votre compte</strong>.</p>
            <a href="../connexion.php">Vous connecter</a>
        ';
        }else{ // Sinon (si je suis connecté)
       echo'
            <h1>Vérification du mot de passe nécessaire</h1>
            <p>Veuillez entrer votre mot de passe à nouveau afin <strong>d\'accéder aux paramètres</strong>.</p>
            <a href="../parametres.php">Vérification du mot de passe</a>
        ';
        }
    ?>
</body>

</html>
<!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->