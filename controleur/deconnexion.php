<?php
	//création d'une session
	setcookie("PolyRencontreEmail", NULL,-1,'/'); ; //écrasement du cookie par un cookie vide
	unset($_COOKIE['PolyRencontreEmail']); //destruction de la valeur en local ce qui évite de l'employer plus tard
	setcookie("PolyRencontreSession", NULL,-1,'/'); //écrasement du cookie par un cookie vide
	unset($_COOKIE['PolyRencontreSession']); //destruction de la valeur en local ce qui évite de l'employer plus tard
	header('Location: ./controlAccueil.php');  


	//Termine le script courant
	exit();  
?> 