<?php

include ("../config.php");

class Match
{
	private $idaMatch;
	private $idestMatch;
	
	//les methodes:
	public function getIdaMatch() 
	{ //un getter
		return $this->idaMatch;
	}
	
	public function getIdestMatch() 
	{ //un getter
		return $this->idestMatch;
	}

		
	//Un constructeur
	public function __construct ($idaMatch, $idestMatch) 
	{
		$this->idaMatch = $idaMatch;
		$this->idestMatch = $idestMatch;

	}
	
	//création d'un nouveau message dans la base de données match
	public function create($connect)
	{
			$idaMatch = $this->idaMatch;
			$idestMatch = $this->idestMatch;
			$req = "INSERT INTO matcher VALUES ('$idaMatch','$idestMatch')";
			$res = mysqli_query($connect,$req);
	}
	

	public static function getAllMatch($connect)
	{	$req = "SELECT m.'idEstMatcher' FROM matcher  AS m";
		//$req = "SELECT 'm1'.'idEstMatcher' FROM matcher AS m1, matcher AS m2 WHERE 'm1'.'idAMatcher'='m2'.'idEstMatcher' AND 'm1'.'idEstMatcher'= 'm2'.'idAMatcher'";
		$res = mysqli_query($connect,$req) or die ("Erreur requête : Classe matcher / fonction getAllMatch");
		return $res;		
	}
}



?>

