<?php
    session_start();
	include('php/includes/connexion.inc.php');
	include('php/includes/verif_util.inc.php');

	
	//--Si la vérification du cookie est vérifié, on redirige pour éviter de pouvoir se connecter plusieurs fois.--//
	//--Sinon, on passe au début du traitement.--//
	if($connect == true){
		header('Location:index.php');
	}else{
		if(isset($_POST['pseudo'])){
			
			$pseudoPost = htmlspecialchars($_POST['pseudo']);
			$mdpPost = htmlspecialchars(md5($_POST['mdp']));
			
			$firstCheck = $bdd->query("SELECT pseudo FROM utilisateurs WHERE pseudo='$pseudoPost' LIMIT 1;");
			//--Si il y n'a aucune ligne de retourné ou plus d'une, c'est qu'il y a une erreur.--//
			//--Sinon on passe à la suite du traitement.--//
			if($firstCheck->rowCount() == 0 || $firstCheck->rowCount() > 1){
                        $_SESSION['erreur'] = "L'identifiant ou le mot de passe est incorrect.";
						header("Location:connexion.php");
			}else{
				$query=$bdd->query("SELECT pseudo, mdp, id, email FROM utilisateurs WHERE pseudo='$pseudoPost';");
				while($data = $query->fetch()){
					//--On revérifie le pseudo et le mot de passe. Si la vérification est valide, on fini le traitement.--//
					//--Sinon on retourne un message d'erreur.--//
					if($data['pseudo'] == $pseudoPost && $data['mdp'] == $mdpPost){
						$sid = md5($data['email'].time());
						$updateUtil = $bdd->exec("UPDATE utilisateurs SET sid='$sid' WHERE pseudo='$pseudoPost';");
						setcookie("connexion","$sid",(time()+365*24*3600));
                        $_SESSION['id'] = $data['id'];
                        $_SESSION['pseudo'] = $data['pseudo'];
						header("Location:index.php");
					}else{
                        $_SESSION['erreur'] = "L'identifiant ou le mot de passe est incorrect.";
						header("Location:connexion.php");
					}
				}
				$query->closeCursor();
			}
		}
	}
?>