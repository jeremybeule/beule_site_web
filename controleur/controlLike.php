<!DOCTYPE html>
<html>
	<head>
		<title>Like</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>
	
<?php
//On inclut le fichier config pour accéder à la base de données
include ("./config.php");
//On inclut le menu
require("./menu.php"); 
//On inclut le modèle Message

require("../modele/Match.php");

$token = $_COOKIE['PolyRencontreSession'];
$idEstMatch =$_GET['id'];
$idAMatch= ETUDIANT::getIdBySession($token,$connect);
$match = new Match($idAMatch, $idEstMatch);
//Ajout d'un match
$match->create($connect);


header("Refresh: 1; URL=./controlEtudiantPolytech.php");
//On inclut le footer
require("./footer.php");
?>

