<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
			<link rel="icon" type="image/png" href="../Images/favicon.png" />
	</head>
	
<?php
	//On inclut le fichier config pour accéder à la base de données
	require("../config.php");
	//On inclut le menu en fonction de la session en cours
	include("./menu.php");

//Les vaiables ci-dessous prennent les valeurs qui leur sont attribuées
$id=null;
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];
$mdpc = $_POST["mdpc"];
$section = $_POST["section"];
$annee = $_POST["annee"];
$taille = $_POST["taille"];
$couleurCheveux = $_POST["couleurCheveux"];
$couleurYeux = $_POST["couleurYeux"];
$token=NULL;
/*echo $nom;
echo $prenom;
echo $email;
echo md5($mdp);
echo $section;
echo $annee;
echo $taille;
echo $couleurCheveux;
echo $couleurYeux;*/


	


//Vérification si l'utilisateur n'existe pas déjà avec son email grâce à la fonction Exist de la classe Utilisateur
	if(!etudiant::Exist($email,$connect))
	{	
		//Création d'un nouveau utilisateur
		$etudiant = new etudiant($id, $nom, $prenom, $email, md5($mdp), $section, $annee, $couleurCheveux, $couleurYeux, $taille, $token);
		//Ajout d'un utilisateur
		$etudiant->create($connect);
		//On inclut la page de validation d'inscription
		include('../vue/viewValidInscription.php');  
	}
	else
	{
		//on inclut la page d'erreur d'inscription
		include('../vue/viewErrorInscription.php');  
	}
	//On inclut le footer
	include("./footer.php");
?>
		


