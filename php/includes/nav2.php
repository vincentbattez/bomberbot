<?php
    session_start();
//var_dump($_SESSION);
//var_dump($_COOKIE);
	include('php/includes/connexion.inc.php');
	include('php/includes/verif_util.inc.php');
	include('php/includes/message_info.php');
	if($connect == true){
		$cookie = $_COOKIE['connexion'];
		$query = $bdd->query("SELECT id, email, pseudo FROM utilisateurs WHERE sid='$cookie';");
		$data = $query->fetch();
	}
?>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <li class="visible-xs-inline">
                <a href="index.php" id="logo">
                    <img class="img-responsive" id="logoNavXS" src="img/index/menu/logo.svg" alt="Logo sur site Bomberbot" />
                </a>
            </li>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="row">
            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="col-xs-12 col-sm-5 col-md-4 persoNav">
                    <ul class="nav navbar-nav">
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menuTelechargement" data-toggle="dropdown">
                                    téléchargement<span class="caret" style="color: #FF8600!important;"></span>
                                </button>
                                <ul class=" dropdown-menu " role="menu " aria-labelledby="menu1 ">
                                    <?php 
                                        if(!isset($_COOKIE['connexion'])&&empty($_COOKIE['connexion'])){ // Si je ne pas connecté
                                            echo'
                                                <li role="presentation">
                                                    <a role="menuitem" href="connexion.php"><span class="glyphicon glyphicon-download-alt icondl"></span> Windows</a>
                                                </li>
                                                <li role="presentation">
                                                    <a role="menuitem" href="connexion.php"><span class="glyphicon glyphicon-download-alt icondl"></span> Mobile / tablette (Android)</a>
                                                </li>
                                            ';
                                        }else{ // Sinon (si je suis connecté)
                                           echo'
                                                <li role="presentation">
                                                    <a role="menuitem" href="game/bomberbot.exe"><span class="glyphicon glyphicon-download-alt icondl"></span> Windows</a>
                                                </li>
                                                <li role="presentation">
                                                    <a role="menuitem" href="https://play.google.com/store/apps/details?id=com.supercell.clashroyale&hl=fr"><span class="glyphicon glyphicon-download-alt icondl" target="_blank"></span> Mobile / tablette (Android)</a>
                                                </li>
                                            ';
                                       }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="classement.php">Classement</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-4 persoNav hidden-xs ">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php" id="logo">
                                <img class="img-responsive " src="img/index/menu/logo.svg " alt="mon logo " />
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-4 persoNav persoNavInCo ">
                    <ul class="nav navbar-nav navbar-right ">
                        <?php 
                            if(!isset($_COOKIE['connexion'])&&empty($_COOKIE['connexion'])){ // Si je ne pas connecté
                                echo'
                                    <li class="connexionInscrition">
                                        <a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscription</a>
                                    </li>
                                    <li class="connexionInscrition">
                                        <a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                                    </li>
                                ';
                            }else{ // Sinon (si je suis connecté) : button deco :
                               echo'
                                <form class="form-inline" action="deconnexion.php" method="POST" enctype="multipart/form-data" role="form">                        
                                    <li>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="menuTelechargement" data-toggle="dropdown">
                                                '.$_SESSION['pseudo'].' <span class="caret" style="color: #FF8600!important;"></span>
                                            </button>
                                            <ul class=" dropdown-menu " role="menu" aria-labelledby="menu1">
                                                <li role="presentation">
                                                    <a role="menuitem" href="parametres.php" id="menu_parametres">Paramètres</a>
                                                </li>
                                                <li role="presentation">
                                                    <button type="submit" class="btn btn_deco" name="deconnexion">deconnexion</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </form>
                                ';
                           }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
