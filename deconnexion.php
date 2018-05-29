<?php
    session_start();
	include('php/includes/connexion.inc.php');
	include('php/includes/verif_util.inc.php');
	//--Si la vérification trouve le cookie voulue, on le supprime.--//
	//--Sinon, on redirige uniquement à l'index.php.--//
	if($connect == true){
		setcookie("connexion","$sid",-3600);
        session_destroy();
        setcookie('connexionCompte','',-3600);
		header('Location:index.php');
	}else{
		header('Location:index.php');
	}
?>
