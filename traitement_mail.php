<?php

    session_start();
$adresse = "vincent.battez@hotmail.fr";
$site = "bomberbot.fr";

$TO = $adresse;

$head = "From: ".$_POST['email']."\n";
$head .= "X-Sender: <".$adresse.">\n";
$head .= "X-Mailer: PHP\n";
$head .= "Return-Path: <".$adresse.">\n";
$head .= "Content-Type: text/plain; charset=iso-8859-1\n";

$sujet = "Formulaire contact du site Bomberbot";


$informations = "
Prenom: ".$_POST['prenom']." \r\n
Nom: ".$_POST['nom']." \r\n
Email: ".$_POST['email']." \r\n
Message: ".$_POST['message']." \r\n
";



mail($TO, $sujet ,$informations, $head);

setcookie("mailSend","true",(time()+1));
Header("Location:contact.php");



?>