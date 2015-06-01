<?php

include ("./config.php");

class Image
{
	private $idI;
	private $idE;
	private $nomI;

	
	
	//les methodes:
	public function getIdI() 
	{ //un getter
		return $this->idI;
	}

	public function getIdE() 
	{ //un getter
		return $this->titreI;
	}

	public function getNom() 
	{ //un getter
		return $this->nomI;
	}


	//Un constructeur
	public function __construct ($idI,$idE, $nomI) 
	{
		$this->idI = null;
		$this->idE = $idE;
		$this->nomI = $nomI;
	}

	//Création par ajout dans la base de données dans la table image
	public function create($connect)
	{
		$idI= NULL;
		$idE= $this->idE;
		$nomI = addslashes(htmlspecialchars($this->nomI));
		$req = "INSERT INTO image (idI,idE,nomI) VALUES ('$idI','15','$nomI')";
		$res = mysqli_query($connect,$req);
	}
	
	//Suppression d'une image dans la base de données
	public static function delete($idI, $connect)
	{
		$req = mysqli_query("DELETE FROM image WHERE idI = '$idI'");
		mysqli_query($req);
	}

	
	public static function getNomById($idI, $connect)
	{
		$req = "SELECT nomI FROM image WHERE idI='$idI'";
		$res = mysql_query($connect,$req) or die(mysqli_error());
		$tuple = mysqli_fetch_array($res);
		return($tuple['nomI']);
	}

	}