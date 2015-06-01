<?php
class Salle 
{
	private $idS;
	private $nom;



	
	//les methodes:
	public function getId() 
	{ //un getter
		return $this->id;
	}
	
	public function getNom() 
	{ //un getter
		return $this->nom;
	}
	
	
	
	
	//Un constructeur
	public function __construct ($id, $nom) 
	{
		$this->id = null;
		$this->nom = $nom;
	}
	

public static function getIdByNom($salle,$connect)
	{
		$req = "SELECT idS FROM salle WHERE salle='$salle'";
		$res = mysqli_query($connect,$req) or die ("Erreur recherche : Classe Salle / Fonction getIdByNom");
		if (mysqli_num_rows($res) == 0)
		{ //l'etudiant n'existe pas
			return null;
		}
		else
		{
			$tuple = mysqli_fetch_array($res);
			return $tuple['idS'];
		}
	}

		
	
}
?>


