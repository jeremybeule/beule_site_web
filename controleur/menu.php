<body>

	<div id="page">
		<div id="corps">
<?php

	//On inclus le fichier config pour accéder à la base de données
	include("config.php");
	//On appelle la Class Etudiant pour la connexion et la vérification de la session
	include("../modele/Etudiant.php");
	$connexion = FALSE;
	if (isset($_COOKIE['PolyRencontreSession']))
	{
			$connexion = Etudiant::verifConnexion($_COOKIE['PolyRencontreSession'],$connect);
	}
	if($connexion)
	{
		?>
		<!-- Affichage du menu quand il y a une session-->
				<ul id="menu_mem">
					<li><a href="./controlAccueil.php">ACCUEIL</a></li>
					<li><a href="./controlProfil.php">PROFIL</a></li>
					<li><a href="./controlAddImage.php">AddPhoto</a></li>
					<li><a href="./controlMessage.php">MESSAGES</a></li>
					<li><a href="./controlAddMessage.php">SPOTTED</a></li>
					<li><a href="./controlEtudiantPolytech.php">ETUDIANTS</a></li>
					<li><a href="./controlDeconnexion.php">DECONNEXION</a></li>
				</ul>
			<div id="contenu">
									
	<?php
	}
	else
	{?>	
		<!-- Affichage du menu s'il n'y a pas de session en cours-->
			<ul id="menu_vis">
				<li><a href="./controlAccueil.php">ACCUEIL</a></li>
				<li><a href="./controlMessage.php">MESSAGES</a></li>
				<li><a href="./controlEtudiantPolytech.php">ETUDIANTS</a></li>
				<li><a href="./controlConnexion.php">CONNEXION</a>
				<li><a href="./controlInscription.php">INSCRIPTION</a></li>
			</ul>
		<div id="contenu">
<?php
}
?>
		