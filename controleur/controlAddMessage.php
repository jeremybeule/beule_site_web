<!DOCTYPE html>
<html>
	<head>
		<title>Message</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>
	
<?php
	//On inclut le fichier config pour accéder à la base de données
	include ("./config.php");
	//On inclut le menu en fonction de la session en cours
	include("./menu.php"); 

	//On inclut la vue d'affichage des messages
	include ("../vue/viewAddMessage.php");	
	//On inclut le footer
	require("./footer.php");
?>