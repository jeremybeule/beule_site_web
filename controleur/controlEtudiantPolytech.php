<!DOCTYPE html>
<html>
	<head>
		<title>Liste des étudiant de polytech</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>
	
<?php
//On inclut le fichier config pour accéder à la base de données
include ("./config.php");
//On inclut le menu
require("./menu.php"); 
//On inclut le modèle Message

$etudiants = Etudiant::getAllEtudiant($connect);
$connexion = FALSE;
	if (isset($_COOKIE['PolyRencontreSession']))
	{
			$connexion = Etudiant::verifConnexion($_COOKIE['PolyRencontreSession'],$connect);
	}
	if($connexion)
	{
    	//On inclut la vue d'affichage des message
		include ("../vue/viewEtudiantsLike.php");	
	}
	else
	{
    	//on inclut la vue d'afficha de la page d'erreur
    	include('../vue/viewEtudiants.php');
	}

	

//On inclut le footer
require("./footer.php");
?>

