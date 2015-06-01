<!DOCTYPE html>
<html>
	<head>
		<title>Images</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />
	</head>
<!--On inclut le fichier config pour accéder à la base de données-->
<?php 
	include("config.php");
	//On inclut le menu en fonction de la session en cours
	include("./menu.php");
	//On appelle la Class Etudiant pour la connexion et la vérification de la session
?>


<?php 

	$connexion = FALSE;
	if (isset($_COOKIE['PolyRencontreSession']))
	{
			$connexion = Etudiant::verifConnexion($_COOKIE['PolyRencontreSession'],$connect);
	}
	if($connexion)
	{
		//On inclut la vue d'ajout d'une image
		include("../vue/viewAddImage.php");
	}
	else
	{ 
		//On affiche une page d'erreurssssss
		include("../vue/viewErrorAddImage.php");
	}
//On inclut le footer	
include("./footer.php");
?>