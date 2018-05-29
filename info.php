<?php
    ob_start();
	include('php/includes/connexion.inc.php');
	include('php/includes/verif_util.inc.php');
	if($connect == true){
		$cookie = $_COOKIE['connexion'];
		$query = $bdd->query("SELECT id, email, pseudo FROM utilisateurs WHERE sid='$cookie';");
		$data = $query->fetch();
	}else{
		header('Location:info.php');
	}

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
    
    //CHANGEMENT ACCEPTED
       if(isset($_COOKIE['mailChange'])&&($_COOKIE['mailChange']) == true){
        echo '<div class="alert alert-success text-center">
                <strong>Votre E-mail a été modifié.</strong> 
            </div>
            ';
        }
       if(isset($_COOKIE['mdpChange'])&&($_COOKIE['mdpChange']) == true){
        echo '<div class="alert alert-success text-center">
                <strong>Votre mot de passe a été modifié.</strong> 
            </div>
            ';
        }
       if(isset($_COOKIE['pseudoChange'])&&($_COOKIE['pseudoChange']) == true){ 
        echo '<div class="alert alert-success text-center">
                <strong>Votre pseudo a été modifié.</strong> 
            </div>
            ';
        }
    //ERREUR
       if(isset($_COOKIE['erreurPseudoChange'])&&($_COOKIE['erreurPseudoChange']) == true){ 
        echo '<div class="alert alert-danger text-center">
                <strong>le pseudo est déjà utilisée. Saisissez en une autre.</strong> 
            </div>
            ';
        }
       if(isset($_COOKIE['erreurMdpChamps'])&&($_COOKIE['erreurMdpChamps']) == true){ 
        echo '<div class="alert alert-danger text-center">
                <strong>Veuillez remplir tous les champs concernant le mot de passe pour changer de mot de passe.</strong> 
            </div>
            ';
        }
       if(isset($_COOKIE['erreurMdpDiff'])&&($_COOKIE['erreurMdpDiff']) == true){ 
        echo '<div class="alert alert-danger text-center">
                <strong>Le nouveau mot de passe et la confirmation sont différents.</strong> 
            </div>
            ';
        }
       if(isset($_COOKIE['erreurMdpIncorrect'])&&($_COOKIE['erreurMdpIncorrect']) == true){ 
        echo '<div class="alert alert-danger text-center">
                <strong>Le mot de passe actuel saisi est incorrect.</strong> 
            </div>
            ';
        }
       if(isset($_COOKIE['erreurMailUsed'])&&($_COOKIE['erreurMailUsed']) == true){ 
        echo '<div class="alert alert-danger text-center">
                <strong>l\'adresse email est déjà utilisée. Saisissez en une autre.</strong> 
            </div>
            ';
        }
    //INFO CHANGE
       if(isset($_COOKIE['infoChange'])&&($_COOKIE['infoChange']) == true){ 
        echo '<div class="alert alert-info text-center">
                <strong>Vous n\'avez rien changé.</strong> 
            </div>
            ';
        }
    ?>
   <?php
       if(isset($_SESSION['pc']) && ($_SESSION['pc']) == true ){ // Si le cookie existe

           echo '
                <div class="container">
                    <div class="row debugFooter">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3" id="div_parametre">
                            <h1 class="text-center">Informations du compte de <strong>'.$_SESSION['pseudo'].'</strong></h1>
                            <form action="info.php" method="POST" role="form" enctype="multipart/form-data">
                                <fieldset class="form-group">
                                    <label for="currentmdp">Mot de passe actuel</label>
                                    <input type="password" class="form-control" id="currentmdp" placeholder="Laissez vide pour ne pas changer" name="currentmdp">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="newmdp">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="newmdp" placeholder="Laissez vide pour ne pas changer" name="newmdp">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="newMdpCheck">Confirmation nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="newMdpCheck" placeholder="Laissez vide pour ne pas changer" name="newMdpCheck">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="pseudo">Nouveau pseudo</label>
                                    <input type="text" class="form-control" id="pseudo" maxlength="25" placeholder="Laissez vide pour ne pas changer" name="pseudo">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Nouveau E-mail</label>
                                    <input type="email" class="form-control" id="email" placeholder="Laissez vide pour ne pas changer" name="email"><br/>
                                <button type="submit" class="btn btn-primary w100p mb30" id="btn_info_accepter" name="btnChange">Accepter les changements</button>
                            </form>
                        </div>
                    </div>
                </div>
                ';
        }else{
            header('Location:erreur/erreur_connect.php');
       }
            //--Le cas si le bouton Modifier Email est activé.--//
        if(isset($_POST['btnChange'])){
            $pseudo = htmlspecialchars($_POST['pseudo']); ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////EMAIL/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //--On vérifie que le champ est rempli.--//
            $emailFilled = array('email');
            $error = false;
            foreach($emailFilled as $field){
                if(empty($_POST[$field])){
                    $error = true;
                }
            }
            if($error == true){
            }else{
                //--On vérifie la validité de l'email avec le filtre.--//
                //--Puis on vérifie que l'email n'est pas déjà utilisé.--//
                //--Si elle n'est pas utilisée, on met à jour.--//
                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo 'Erreur: Votre adresse e-mail est invalide.<br/>';
                }else{
                    $emailCheck = $bdd->query("SELECT email FROM utilisateurs WHERE email='$email';");
                    if($emailCheck->rowCount() == 1 || $emailCheck->rowCount() > 1){
                        echo 'Erreur: l\'adresse email est déjà utilisée. Saisissez en une autre.<br/>';
                        setcookie("erreurMailUsed","true",(time()+1));
                        header('Location:info.php');
                    }else{
                        $id = $data['id'];
                        $updtEmail = $bdd->exec("UPDATE utilisateurs SET email='$email' WHERE id=$id;");
                        setcookie("mailChange","true",(time()+1));
                        header('Location:info.php');
                    }
                }
            } ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////PSEUDO////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            //--On vérifie que le champ est rempli.--//
            $pseudoFilled = array('pseudo');
            $error = false;
            foreach($pseudoFilled as $field){
                if(empty($_POST[$field])){
                    $error = true;
                }
            }
            if($error == true){
            }else{
                //--On vérifie la taille du pseudo.--//
                //--Si la taille est inférieur ou égal à 25 caractères, on continue.--//
                //--Sinon on retourne une erreur.--//
                if(strlen($pseudo) <= 25){
                    $pseudoCheck = $bdd->query("SELECT pseudo FROM utilisateurs WHERE pseudo='$pseudo';");
                    if($pseudoCheck->rowCount() == 1 || $pseudoCheck->rowCount() > 1){
                        setcookie("erreurPseudoChange","true",(time()+1));
                        header('Location:info.php');
                    }else{
                        $id = $data['id'];
                        $updtpseudo = $bdd->exec("UPDATE utilisateurs SET pseudo='$pseudo' WHERE id='$id';");
                        setcookie("pseudoChange","true",(time()+1));
						setcookie("pseudo","$pseudo",(time()+365*24*3600));
                        header('Location:info.php');
                    }
                }
            } ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////EMAIL/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //--On vérifie que les champs nécessaires sont tous remplis.--//
            $fieldFilled = array('currentmdp', 'newmdp', 'newMdpCheck');
            $error = (int) 0;
            foreach($fieldFilled as $field){
                if(!empty($_POST[$field])){
                    $error += (int) 1;
                }
            }
            if($error == (int) 0){
                header('Location:info.php');
            }elseif($error > (int) 0 && $error != 3){
                setcookie("erreurMdpChamps","true",(time()+1));
                header('Location:info.php');
            }else{
                //-- On défini les variables à utiliser plus tard, et on fait les diverses vérifications.--//
                $currentmdp = htmlspecialchars(md5($_POST['currentmdp']));
                $newmdp = htmlspecialchars(md5($_POST['newmdp']));
                $newMdpCheck = htmlspecialchars(md5($_POST['newMdpCheck']));
                $id = $data['id'];
                $querymdp = $bdd->query("SELECT pseudo,email,mdp FROM utilisateurs WHERE id=$id;");
                $checkmdp = $querymdp->fetch();
                if($currentmdp != $checkmdp['mdp']){
                        setcookie("erreurMdpIncorrect","true",(time()+1));
                        header('Location:info.php');
                }else{
                    if($newmdp != $newMdpCheck){
                        setcookie("erreurMdpDiff","true",(time()+1));
                        header('Location:info.php');
                    }else{
                        $updatemdp = $bdd->exec("UPDATE utilisateurs SET mdp='$newmdp' WHERE id=$id;");
                        setcookie("mdpChange","true",(time()+1));
                        header('Location:info.php');
//                            $sendmdp = pg_escape_string(htmlspecialchars($_POST['newmdp']));
//                            //--On envoie un email pour prévenir de la modification du mot de passe.--//
//                            include('includes/email.inc.php');
//                            require_once('PHPMailer-master/PHPMailerAutoload.php');
//                            editmdp();
                    }
                }
            }
            //--On vérifie que les champs nécessaires sont tous remplis.--//
            $fieldFilled = array('currentmdp', 'newmdp', 'newMdpCheck', 'pseudo', 'email');
            $error = (int) 0;
            foreach($fieldFilled as $field){
                if(empty($_POST[$field])){
                    $error += (int)1;
                }
            }
            if($error == (int) 5){
                setcookie("infoChange","true",(time()+1));
                header('Location:info.php');
            }
        }
        include_ONCE 'php/includes/footer.php';
        include_ONCE 'php/includes/script.php';
    ?>
</body>
</html>
<?php
    ob_end_flush();
?>





                                
