<?php

class Message
{
	private $idM;
	private $idE;
	private $idS;
	private $pseudoM;
	private $messageM;
	private $dateM;

	
	//les methodes:
	public function getIdM() 
	{ //un getter
		return $this->idM;
	}
	
	public function getIdE() 
	{ //un getter
		return $this->idE;
	}

	public function getIdS() 
	{ //un getter
		return $this->idS;
	}

	public function getPseudoM() 
	{ //un getter
		return $this->pseudoM;
	}
	
		
	public function getMessageM() 
	{ //un getter
		return $this->messageM;
	}
	
	
	//Un constructeur
	public function __construct ($idM, $idE,$idS,$pseudoM ,$messageM) 
	{
		$this->idM = null;
		$this->idE = $idE;
		$this->idS = $idS;
		$this->pseudoM = $idS;
		$this->messageM = $messageM;
	}
	
	//création d'un nouveau message dans la base de données message
	public function create($connect)
	{
			$id = NULL;
			$idE = $this->idE;
			$idS = $this->idS;
			$messageM = addslashes(htmlspecialchars($this->messageM));
			$pseudoM = $this->pseudoM;
			$req = "INSERT INTO message VALUES ('$id','$idE','$idS','$pseudoM','$messageM')";
			$res = mysqli_query($connect,$req) or die("Erreur insertion :  Classe message / Fonction creation") ;
	}
	
	//suppression d'un message dans la base de donnée message
	public static function delete($idM,$connect)
	{
		$req = mysqli_query("DELETE FROM message WHERE idM = '$idM'");
		mysqli_query($connect,$req);
	}

	public static function getAllMessage($connect)
	{
		$req = "SELECT * FROM message";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion : Classe message / fonction getAllMessage");
		return $res;		
	}
}



?>

