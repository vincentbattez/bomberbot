<?php
	ob_start();
    session_start();
	include('includes/connexion.inc.php');
	include('includes/verif_util.inc.php');
	
	if($connect == true){
		$cookie = $_COOKIE['connexion'];
		$query = $bdd->query("SELECT id, email FROM utilisateurs WHERE sid='$cookie';");
		$data = $query->fetch();
	}else{
		header('Location:connexion.php');
        
	}

	//--Le cas si le bouton Modifier Email est activé.--//
	if(isset($_POST['btnChange'])){
		//--On vérifie que le champ est rempli.--//
		$emailFilled = array('email');
		$error = false;
		foreach($emailFilled as $field){
			if(empty($_POST[$field])){
				$error = true;
			}
		}
		
		if($error == true){
			header('Location:../moncompte.php');
		}else{
			//--On vérifie la validité de l'email avec le filtre.--//
			//--Puis on vérifie que l'email n'est pas déjà utilisé.--//
			//--Si elle n'est pas utilisée, on met à jour.--//
			$email = $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo 'Erreur: Votre adresse e-mail est invalide.';
			}else{
				$emailCheck = $bdd->query("SELECT email FROM utilisateurs WHERE email='$email';");
				if($emailCheck->rowCount() == 1 || $emailCheck->rowCount() > 1){
					echo 'Erreur: l\'adresse email est déjà utilisée. Saisissez en une autre.';
				}else{
					$id = $data['id'];
					$updtEmail = $bdd->exec("UPDATE utilisateurs SET email='$email' WHERE id=$id;");
					header('Location:../moncompte.php');
				}
			}
		}
	}
	
	//--Cas si le bouton modifier mot de passe est activé.--//
	if(isset($_POST['submdp'])){
		
		//--On vérifie que les champs nécessaires sont tous remplis.--//
		$fieldFilled = array('currentmdp', 'newmdp', 'newmdpCheck');
		$error = false;
		foreach($fieldFilled as $field){
			if(empty($_POST[$field])){
				$error = true;
			}
		}
		
		if($error == true){
			echo 'Tout les champs pour changer le mot de passe doivent être rempli';
		}else{
			//-- On défini les variables à utiliser plus tard, et on fait les diverses vérifications.--//
			$currentmdp = pg_escape_string(htmlspecialchars(md5($_POST['currentmdp'])));
			$newmdp = pg_escape_string(htmlspecialchars(md5($_POST['newmdp'])));
			$newmdpCheck = pg_escape_string(htmlspecialchars(md5($_POST['newmdpCheck'])));
			$id = $data['id'];
			$querymdp = $bdd->query("SELECT pseudo,email,mdp FROM utilisateurs WHERE id=$id;");
			$checkmdp = $querymdp->fetch();
			if($currentmdp != $checkmdp['mdp']){
				echo 'Erreur: Le mot de passe actuel saisi est incorrect.';
			}else{
				if($newmdp != $newmdpCheck){
					echo 'Erreur: Le nouveau mot de passe et la confirmation sont différents.';
				}else{
					$updatemdp = $bdd->exec("UPDATE utilisateurs SET mdp='$newmdp' WHERE id=$id;");
					echo 'Votre mot de passe a bien été modifié.';
					$sendmdp = pg_escape_string(htmlspecialchars($_POST['newmdp']));
					//--On envoie un email pour prévenir de la modification du mot de passe.--//
					include('includes/email.inc.php');
					require_once('PHPMailer-master/PHPMailerAutoload.php');
					editmdp();
				}
			}
		}
	}
	ob_end_flush();
?>
