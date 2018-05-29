<?php
    session_start();

	include('php/includes/connexion.inc.php');
	include('php/includes/verif_util.inc.php');
	//--Si le cookie existe et est valide, on redirige pour ne pas donner accès à l'inscription en étant connecté.--//
	//--Sinon, on commence le traitement.--//
	if($connect == true){
        echo 'vous devez vous déconnecter avant de pouvoir créer un autre compte';
        echo '
            <form class="form-inline" action="deconnexion.php" method="POST" enctype="multipart/form-data" role="form">
                <button type="submit" class="btn btn-primary" name="deconnexion">deconnexion</button>
            </form>
            <a href="index.php">index</a>
            ';
    
	}else{
		//--Si le bouton de modification d'email est initialisé--//
		if(isset($_POST['signIn'])){
			//--On crée un tableau de string pour vérifier plus tard si tout les champs ont été rempli.--//
			$isFilled = array('pseudo', 'mdp', 'checkmdp', 'email');
			$error = false;
			foreach($isFilled as $field){
				if(empty($_POST[$field])){
					$error = true;
				}
			}
			
			//--Si error est à true, un champ n'est pas rempli.--//
			//--Sinon, on continue le traitement.--//
			if($error == true){
                setcookie("erreurInscriptionChamps","true",(time()+1));
                header('Location:inscription.php');
			}else{
				$pseudo = htmlspecialchars($_POST['pseudo']);
				$mdp = htmlspecialchars(md5($_POST['mdp']));
				$checkmdp = htmlspecialchars(md5($_POST['checkmdp']));
				$email = htmlspecialchars($_POST['email']);
				
				if($mdp != $checkmdp){
                    setcookie("erreurInscriptionMpdCheck","true",(time()+1));
                    header('Location:inscription.php');
				}else{
					//--Vérification de l'email avec le filtre PHP--//
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        setcookie("erreurInscriptionEmailInvalid","true",(time()+1));
                        header('Location:inscription.php');
					}else{
						$emailCheck = $bdd->query("SELECT email FROM utilisateurs WHERE email='$email';");
						//--Si il y a au moins une ligne de résultat, l'email est déjà utilisé.--//
						//--Sinon, on continue le traitement.--//
						if($emailCheck->rowCount() > 0){
                            setcookie("erreurInscriptionEmailUse","true",(time()+1));
                            header('Location:inscription.php');
						}else{
							//--On vérifie la taille du pseudo.--//
							//--Si la taille est inférieur ou égal à 25 caractères, on continue.--//
							//--Sinon on retourne une erreur.--//
							if(strlen($pseudo) <= 25){
								$pseudoCheck = $bdd->query("SELECT pseudo FROM utilisateurs WHERE pseudo='$pseudo';");
								if($pseudoCheck->rowCount() == 1 || $pseudoCheck->rowCount() > 1){
                                    setcookie("erreurInscriptionPseudoUse","true",(time()+1));
                                    header('Location:inscription.php');
								}else{
									$pseudoAdd = $bdd->exec("INSERT INTO utilisateurs(pseudo, email, mdp, typeutil) VALUES('$pseudo', '$email', '$mdp', 1)");
						              setcookie("inscriptionEffectue","true",(time()+1));
		                              header('Location:inscription.php');
								}
							}
						}
					}
				}
			}
		}

	}
?>