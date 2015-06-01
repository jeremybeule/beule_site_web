<!DOCTYPE html>
<html>
	<head>
		<title>Message envoyé</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>

<?php

	require("../config.php");
	//On inclut le menu en fonction de la session en cours
	include("./menu.php");
	//On récupère la Class Message et Salle
	include("../modele/Message.php");
	include("../modele/Salle.php");


	//htmlspecialchars -> Convertit les caractères spéciaux en entités HTML
	//Les variables prennent les valeurs qui leur sont attribuées
	$idM = null;
	$idE = Etudiant::getIdBySession($_COOKIE['PolyRencontreSession'],$connect);

	$nomM = Addslashes(htmlspecialchars($_POST["nomM"]));
	$salleM = Addslashes(htmlspecialchars($_POST["salleM"]));
	$messageM = Addslashes(htmlspecialchars($_POST["messageM"]));

	$idS = salle::getIdByNom($salleM,$connect);
	echo $idS;
	if($idS!=0)	
	{

		$message = new Message($idM, $idE,$idS, $pseudoM, $messageM);
		//Ajout du mesage
		$message->create($connect);
		include('../vue/viewValidMessage.php');
	}
	else
	{
		include('../vue/viewErrorValidMessage.php');
	}

	//On inclut le footer		
	include("./footer.php");
?>



