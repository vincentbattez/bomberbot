<?php
	try {
        $bdd = new PDO('mysql:host=localhost;dbname=bomberbot;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	}catch (PDOException $e){
		print("Erreur :( :").$e->getMessage();
		die();
	}
?>