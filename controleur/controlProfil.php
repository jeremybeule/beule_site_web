<!DOCTYPE html>
<html>
    <head>
   	 	<meta charset="utf-8" />
   	 	<link rel="stylesheet" type="text/css" href="../style.css" />
    </head>

<?php 
	//On inclut le menu en fonction de la session en cours
	include("./menu.php");
	//On inclut le fichier config pour accéder à la base de données
	include("config.php");

	$connexion = FALSE;
	if (isset($_COOKIE['PolyRencontreSession']))
	{
			$connexion = Etudiant::verifConnexion($_COOKIE['PolyRencontreSession'],$connect);
	}
	if($connexion)
	{
		//Appel de la fonction getUtilisateurByEmail de la classe Etudiant
		$profil = Etudiant::getEtudiantBySession($_COOKIE['PolyRencontreSession'],$connect);
    	//On affiche la vue de validation du profil
    	include('../vue/viewProfil.php');
	}
	else
	{
    	//on inclut la vue d'afficha de la page d'erreur
    	include('../vue/viewErrorProfil.php');
	}

	//On inclut le footer
	include("./footer.php"); 
?>