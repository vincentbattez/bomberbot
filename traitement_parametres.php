<?php
    session_start();
	include('php/includes/connexion.inc.php');
	include('php/includes/verif_util.inc.php');


		if(isset($_POST['mdp'])){
			
			$pseudoPost = htmlspecialchars($_SESSION['pseudo']);
			$mdpPost = htmlspecialchars(md5($_POST['mdp']));
			
			$firstCheck = $bdd->query("SELECT pseudo FROM utilisateurs WHERE mdp='$mdpPost';");
			//--Si il y n'a aucune ligne de retourné ou plus d'une, c'est qu'il y a une erreur.--//
			//--Sinon on passe à la suite du traitement.--//
			if($firstCheck->rowCount() == 0 || $firstCheck->rowCount() > 1){
                        $_SESSION['erreur'] = "Mot de passe incorrect";
						header("Location:parametres.php");
			}else{
				$query=$bdd->query("SELECT pseudo, mdp, email FROM utilisateurs WHERE mdp='$mdpPost';");
				while($data = $query->fetch()){
					if($data['pseudo'] == $pseudoPost && $data['mdp'] == $mdpPost){
                        $_SESSION['pc'] = TRUE;
						header("Location:info.php");
					}else{
                        $_SESSION['erreur'] = "Mot de passe incorrect";
						header("Location:parametres.php");
					}
				}
				$query->closeCursor();
			}
		}
?>