	<?php	
		//On inclut le menu en fonction de la session en cours
		//include("./menu.php");
		//On inclut le fichier config pour accéder à la base de données
		require("../config.php");
		require("../modele/Etudiant.php");
		//$email=$_POST['email'];
		///$etudiant= Etudiant::getEtudiantByEmail($connect,$email);
		//$id = $etudiant->getId();
		$chaine='abcdefghijklmnopqrstuvwxyz0123456789!#&$?'; //On crée une chaine de caractère
		$token=str_shuffle($chaine);
		$token=md5(uniqid($token));
		$email=addslashes(htmlspecialchars($_POST['email']));
		setcookie("PolyRencontreEmail",$email,0,'/');  // on l'envoi
		setcookie("PolyRencontreSession",$token,0,'/'); 
	?>

<!DOCTYPE html>
<html>
	<head>
		
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>

<?php

	//La valeur $email prend le ontenu récupéré	
	$email = $_POST["email"];
	//la valeur $mdp prend le contneu récupéré
	$mdp = md5($_POST["mdp"]);
	//Appel de la fonction connect de la classe etudiant
	$id = Etudiant::connect($email, $mdp, $connect);

	//Si l'$id est null
	if($id == null)
	{

		//on inclut la page d'erreur de connexion
		setcookie("PolyRencontreEmail", NULL,-1,'/'); ; //écrasement du cookie par un cookie vide
		unset($_COOKIE['PolyRencontreEmail']); //destruction de la valeur en local ce qui évite de l'employer plus tard
		setcookie("PolyRencontreSession", NULL,-1,'/'); //écrasement du cookie par un cookie vide
		unset($_COOKIE['PolyRencontreSession']); //destruction de la valeur en local ce qui évite de l'employer plus tard
		include('../vue/viewErrorConnexion.php'); 
	}
	else
	{


		Etudiant::set_session($connect, $token, $email);
		//On inclut la page de validation de connexion
		include('../vue/viewValidConnexion.php'); 
	}

	//On inclut le footer
	//require("./footer.php");
?>