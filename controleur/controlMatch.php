<!DOCTYPE html>
<html>
	<head>
		<title>Liste des Matchs</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>
	
<?php
//On inclut le fichier config pour accéder à la base de données
include ("./config.php");
//On inclut le menu
require("./menu.php"); 
//On inclut le modèle Match
require("../modele/Match.php");

	//$etudiants = Etudiant::getAllEtudiant($connect);
	$match = Match::getAllMatch($connect);
	foreach ($match as $tuple)
	{
		$etudiants = Etudiant::getUtilisateurByID($connect, $tuple[idestMatch]);
	}

//On inclut la vue d'affichage des message
include ("../vue/viewMatchs.php");	
//On inclut le footer
require("./footer.php");
?>

