<!DOCTYPE html>
<html>
	<head>
		<title>Messages</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>
	
<?php
//On inclut le fichier config pour accéder à la base de données
include ("./config.php");
//On inclut le menu
require("./menu.php"); 
//On inclut le modèle Message
require("../modele/Message.php");

	$messages = Message::getAllMessage($connect);


//On inclut la vue d'affichage des message
include ("../vue/viewMessages.php");	
//On inclut le footer
require("./footer.php");
?>

