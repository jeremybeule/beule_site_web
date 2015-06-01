<!DOCTYPE html>
<html>
     <head>
          <title>Image ajoutée</title>
               <meta charset="utf-8" />
               <link rel="stylesheet" href="../style.css" />
     </head>

<?php
     //On inclut le fichier config pour accéder à la base de données
     require("../config.php");
     //On inclu le menu en fonction de la session en cours
     include("./menu.php");
     //On récupère la Class Image
     include("../modele/Image.php");	

	 $extensions_valides = array( 'jpg' , 'jpeg', 'png' );
	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules

		
if ($_FILES['image']['error'] > 0) 
	{ 
		
		header("location:../vue/viewErrorAddImage.php");
	}
else
	{
		$dossier = '../images/';
		//$fichier = basename($_FILES['image']['name']);
		$taille_maxi = 200000000;
		$taille = filesize($_FILES['image']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['image']['name'], '.'); 

			 //Début des vérifications de sécurité.
			 if(!in_array($extension, $extensions)) 
			 //Si l'extension n'est pas dans le tableau
			 {
				  $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
			 }
			 if($taille>$taille_maxi)
			 {
				  $erreur = 'Le fichier est trop gros';
			 }
			 if(!isset($erreur)) 
			 //S'il n'y a pas d'erreur, on upload
			 {
				//recupere l'extension du fichier
			 	//1. strrchr renvoie l'extension avec le point (« . »).
				//2. substr(chaine,1) ignore le premier caractère de chaine.
				//3. strtolower met l'extension en minuscules
				  $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
				//On formate le nom du fichier ici.
				  $nom = md5(uniqid(rand(), true));
				  if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $nom .'.'.$extension_upload))
				  {
				  		 //La valeur $id prend null car son attribut dans la table image s'auto-incrémente
						$id=null;
						$idE = Etudiant::getIdBySession($_COOKIE['PolyRencontreSession'],$connect);
						//Création d'une nouvelle image
						$image = new image($id,$idE, $nom .'.'.$extension_upload);
						//Ajout d'une nouvelle image
						$image->create($connect);

			 			//On inclut la vue d'affichage de la page de validation de l'ajout d'une image
						include('../vue/viewValidAddImages.php'); 
					   	echo 'Upload effectué avec succès !';
				  }
				  else 
				  {
					   echo 'Echec de l\'upload !';
				  }
			 }
			 else
			 {
				  echo $erreur;
			 }

	
			
	}
			 //On inclut le footer
			 include("./footer.php");
?>
