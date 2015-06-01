
<!DOCTYPE html>
<html>
	<head>
		<title>Inscription</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../style.css" />

		<script>
			function verifMDP()
			{
			// fonction JS de verification du mot de passe et du mot de passe confirmation 
				mdp1 = document.forminscrip.mdp.value;	// recuperation variables
				mdp2 = document.forminscrip.mdpc.value;
				// si différentes :
				if ( mdp1 != mdp2 )
				{
					window.alert('Vos deux mots de passe ne sont pas identiques');	//pop up explicatif
					return false;
				}
				// si identiques
				else
				{
					return true;
				}
			}
		</script> 
</head>
	
<?php 
    //On inclut le fichier config pour accéder à la base de données
    include("config.php");
	//On inclut le menu en fonction de la session en cours
	include("./menu.php");
	//On inclut la vue d'affichage de la page pour s'inscrire
	include("../vue/viewInscription.php");
	//On inclut le footer
	include("./footer.php");
?>