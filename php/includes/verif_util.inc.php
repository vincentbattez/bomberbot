<?php
	include('connexion.inc.php');
	$connect = false;
	$connectAdmin = false;
	$noConnexion =  false;
	//Vérifie et ajoute le sid dans la bdd si il existe et est non vide.
	if(isset($_COOKIE['connexion'])&&!empty($_COOKIE['connexion'])){
		$cookie = htmlentities($_COOKIE['connexion']);
		$check = $bdd->query("SELECT sid FROM utilisateurs WHERE sid ='$cookie';");
		$test = $check->fetch();
		
		if($test){
			$connect = true;
			$getEmail = $bdd->query("SELECT pseudo,email FROM utilisateurs WHERE sid = '$cookie';");
			while ($checkUser = $getEmail->fetch()){
//				echo '<div class="alert alert-success">
//						<strong>'.utf8_encode("Vous êtes connecté sur le compte de ").$checkUser["pseudo"].'</strong> 
//					</div>';
			}
		}else{
			$connect = false;
			echo "Erreur: Une erreur s'est produite avec la base de données.";
		}
		$check->closeCursor();
	}
	
	if(isset($_COOKIE['connexionAdmin']) &&!empty($_COOKIE['connexionAdmin'])){
		$cookieAdmin = htmlentities($_COOKIE['connexionAdmin']);
		$checkAdmin = $bdd->query("SELECT sid FROM utilisateurs WHERE sid ='$cookieAdmin';");
		$testAdmin = $checkAdmin->fetch();
		
		if($testAdmin){
			$connectAdmin = true;
			$getEmail = $bdd->query("SELECT pseudo,email FROM utilisateurs WHERE sid = '$cookieAdmin';");
			while ($checkUser = $getEmail->fetch()){
				echo '<div class="alert alert-success">
						<strong>'.utf8_encode("Vous êtes connecté sur le compte de ").$checkUser["pseudo"].'</strong> 
					</div>';
			}
		}else{
			$connectAdmin = false;
			echo "Erreur: Une erreur s'est produite avec la base de données.";
		}
		$checkAdmin->closeCursor();
	}
	
	if(isset($_COOKIE['noConnexion']) && !empty($_COOKIE['noConnexion'])){
		$noConnexion = true;
	}
?>