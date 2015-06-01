<?php
class Etudiant 
{
	private $id;
	private $nom;
	private $prenom;
	private $mdp;
	private $section;
	private $annee;
	private $couleurCheveux;
	private $couleurYeux;
	private $taille;


	
	//les methodes:
	public function getId() 
	{ //un getter
		return $this->id;
	}
	
	public function getNom() 
	{ //un getter
		return $this->nom;
	}
	
	public function getPrenom() 
	{ //un getter
		return $this->prenom;
	}
	
	public function getMdp() 
	{ //un getter
		return $this->mdp;
	}
	
	public function getEmail() 
	{ //un getter
		return $this->email;
	}
	
	public function getSection() 
	{ //un getter
		return $this->section;
	}
	
	public function getAnnee() 
	{ //un getter
		return $this->annee;
	}
	
	public function getCouleurCheveux() 
	{ //un getter
		return $this->couleurCheveux;
	}
	
	public function getCouleurYeux() 
	{ //un getter
		return $this->couleurYeux;
	}
	
	public function getTaille() 
	{ //un getter
		return $this->taille;
	}
	
	
	//Un constructeur
	public function __construct ($id, $nom, $prenom, $email, $mdp, $section, $annee, $couleurCheveux, $couleurYeux, $taille,$token) 
	{
		$this->id = null;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
		$this->mdp = $mdp;
		$this->section = $section;
		$this->annee = $annee;
		$this->couleurCheveux = $couleurCheveux;
		$this->couleurYeux = $couleurYeux;
		$this->taille = $taille;
		$this->token = null;
	}
	
	//création d'un nouvel utilisateur avec insertion dans la base de donnée
	public function create($connect)
	{
		$email = $this->email;
		$req = "SELECT * FROM etudiant WHERE email='$email'";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion 1 : Classe etudiant / Fonction create");
		
		if (mysqli_num_rows($res) == 0)
		{ // l'étudiant n'existe pas.
			$id = NULL;
			$nom = $this->nom;
			$prenom = $this->prenom;
			$mdp = $this->mdp;
			$section = $this->section;
			$annee = $this->annee;
			$couleurCheveux = $this->couleurCheveux;
			$couleurYeux = $this->couleurYeux;
			$taille = $this->taille;
			$token= NULL;


			$req = "INSERT INTO etudiant VALUES ('$id','$nom','$prenom','$email','$mdp','$section','$annee','$couleurCheveux','$couleurYeux','$taille','$token')";
			$res = mysqli_query($connect,$req) or die("Erreur insertion 2 : Classe etudiant / Fonction create");//("Erreur insertion :  Classe etudiant / Fonction Insertion nouveau membre")
		}
		else
		{
			return null/*'Cet email est déjà utilisé'*/;
		}
	}


	public static function verifConnexion($session,$connect)
	{
		$req = "SELECT * FROM etudiant WHERE session='$session'";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion: Classe Etudiant / Fonction verifConnexion");
		return (mysqli_num_rows($res) != 0);	
	}

	public static function set_session($connect, $session, $email)
	{
		$req = "UPDATE etudiant SET session = '$session' WHERE email ='$email'";
        $res = mysqli_query($connect,$req) or die("Erreur insertion : Classe Etudiant / Fonction set_session");
    }


	
	
	//vérification si un etudiant existe déjà ou non dans la base de donnée
	public static function Exist($email,$connect)
	{
		$req = "SELECT * FROM etudiant WHERE email='$email'";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion: Classe Etudiant / Fonction Exist");
		return (mysqli_num_rows($res) != 0);		
	}
	
	//suppression d'un étudiant dans la base de donnée
	public static function delete($id)
	{
		$req = mysqli_query("DELETE FROM etudiant WHERE id = '$id'");
		mysqli_query($req);

	}

	//permet la connexion d'un etudiant
	public static function connect($email, $mdp,$connect)
	{
		$req = "SELECT * FROM etudiant WHERE email='$email' AND mdp='$mdp'";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion : Classe Etudiant / Fonction Connect");

		if (mysqli_num_rows($res) == 0)
		{
			return null;
		}
		else
		{
			$tuple = mysqli_fetch_array($res);
			return $tuple['id'];
		}		
	}

	
	
	//Récupération des données d'un etudiant par son email
	public static function getEtudiantByEmail($connect,$email) 
	{ //une fonction statique
		$req = "SELECT * FROM etudiant WHERE email='$email'";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion : Classe Etudiant / Fonction getEtudiantByEmail ");
		
		if (mysqli_num_rows($res) == 0)
		{ //l'etudiant n'existe pas
			return null;
		}

		$tuple = mysqli_fetch_array($res);
		return new etudiant($tuple['id'], $tuple['nom'], $tuple['prenom'], $email, $tuple['mdp'], $tuple['section'], $tuple['annee'], $tuple['couleurCheveux'], $tuple['couleurYeux'], $tuple['taille'],$tuple['session']);
	}

	//Récupération des données d'un etudiant par son email
	public static function getEtudiantBySession($session,$connect) 
	{ //une fonction statique
		$req = "SELECT * FROM etudiant WHERE session='$session'";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion : Classe Etudiant / Fonction getEtudiantBySession ");
		
		if (mysqli_num_rows($res) == 0)
		{ //l'etudiant n'existe pas
			return null;
		}

		$tuple = mysqli_fetch_array($res);
		return new etudiant($tuple['id'], $tuple['nom'], $tuple['prenom'],  $tuple['email'], $tuple['mdp'], $tuple['section'], $tuple['annee'], $tuple['couleurCheveux'], $tuple['couleurYeux'], $tuple['taille'],$tuple['session']);
	}

	//Récupération des données d'un etudiant par son email
	public static function getIdBySession($session,$connect) 
	{ //une fonction statique
		$req = "SELECT * FROM etudiant WHERE session='$session'";
		$res = mysqli_query($connect,$req) or die ("Erreur insertion : Classe Etudiant / Fonction getEtudiantBySession ");
		
		if (mysqli_num_rows($res) == 0)
		{ //l'etudiant n'existe pas
			return null;
		}

		$tuple = mysqli_fetch_array($res);
		return $tuple['id'];
	}

	//Récupération des données d'un etudiant par son id
	public static function getUtilisateurByID($id)
	{//une fonction statique
		$req ="SELECT * FROM etudiant WHERE id='$id'";
		$res = mysqli_query($req) or die("Erreur insertion : Classe Etudiant / Fonction getUtilisateurByID ");
		
		if(mysqli_num_rows($res) == 0)
		{//l'etudiant n'existe pas
			return null;
		}
		
		$tuple = mysqli_fetch_array($res);
		return new etudiant($tuple['id'], $tuple['nom'], $tuple['prenom'], $email, $tuple['mdp'], $tuple['section'], $tuple['annee'], $tuple['couleurCheveux'], $tuple['couleurYeux'], $tuple['taille'],$tuple['session']);		
	}

	//Récupération des données d'un etudiant
	public static function getEtudiant()
	{
		$req="SELECT * from etudiant";
		$res =mysqli_query($req) or die ("Erreur insertion : Classe Etudiant / Fonction getEtudiant");
		while($dnn = mysqli_fetch_array($res))
		{
			$tuple = mysqli_fetch_array($res);
			return new etudiant($tuple['id'], $tuple['nom'], $tuple['prenom'], $email, $tuple['mdp'], $tuple['section'], $tuple['annee'], $tuple['couleurCheveux'], $tuple['couleurYeux'], $tuple['taille'],$tuple['session']);
		}
	}

	//Permet la modification du mot de passe d'un etudiant
    public static function changeMdp($email, $mdp)
    {//Une fonction qui change le mot de passe
        $req = "UPDATE etudiant SET mdp = '$mdp' WHERE email ='$email'";
        $res = mysqli_query($req) or die("Erreur insertion : Classe Etudiant / Fonction changeMotdePasse");
		$req = "SELECT * FROM etudiant WHERE email='$email'";
		$res = mysqli_query($req) or die("Erreur insertion : Classe Etudiant / Fonction changeMotdePasse");
		$tuple = mysqli_fetch_array($res);
		return new etudiant($tuple['id'], $tuple['nom'], $tuple['prenom'], $email, $tuple['mdp'], $tuple['section'], $tuple['annee'], $tuple['couleurCheveux'], $tuple['couleurYeux'], $tuple['taille']);
		
    }        
     
     //Permet de modifier les informations d'un profil etudiant   
    public static function changementInfo($email, $id,$nom, $prenom, $section, $annee, $couleurCheveux, $couleurYeux, $taille)
    {//Une fonction qui change les informations de l'etudiant    
        $req = "SELECT * FROM etudiant WHERE email='$email'";
        $res = mysqli_query($req) or die ("Erreur insertion : Classe Etudiant / Fonction changeInfo Debut ");
        $tuple = mysqli_fetch_array($res);
            
		if($tuple['section'] != $section)
        {
        	$str = addslashes($section);
            $req = "UPDATE etudiant SET statut = '$str' WHERE email ='$email'";
			$res = mysqli_query($req) or die("Erreur insertion : Classe Etudiant / Fonction changeSection ");
        }
            
		
		if($tuple['prenom'] != $prenom)
		{
			$req1 = "UPDATE etudiant SET prenom='$prenom' WHERE email ='$email'";
			$res = mysqli_query($req1) or die("Erreur insertion : Classe Etudiant / Fonction changePrenom");
		}
		
        if($tuple['annee'] != $annee)
        {
            $req1 = "UPDATE etudiant SET annee ='$annee' WHERE email ='$email'";
			$res = mysqli_query($req1) or die("Erreur insertion : Classe Etudiant / Fonction changeNom");
        }
        
		if($tuple['couleurCheveux'] != $couleurCheveux)
		{
			$req1 = "UPDATE etudiant SET couleurCheveux ='$couleurCheveux' WHERE email ='$email'";
			$res = mysqli_query($req1) or die("Erreur insertion : Classe Etudiant / Fonction changeCouleurCheveux");
		}
		
		if($tuple['couleurYeux'] != $couleurYeux)
		{
			$req1 = "UPDATE etudiant SET couleurYeux ='$couleurYeux' WHERE email ='$email'";
			$res = mysqli_query($req1) or die("Erreur insertion : Classe Etudiant / Fonction changeCouleurYeux");
		}
		
        if($tuple['taille'] != $taille)
        {
            $req1 = "UPDATE etudiant SET taille = '$taille' WHERE email ='$email'";
			$res = mysqli_query($req1) or die("Erreur insertion : Classe Etudiant / Fonction changeTaille");
        }
            
               
       return new etudiant($tuple['id'], $tuple['nom'], $tuple['prenom'], $email, $tuple['mdp'], $tuple['section'], $tuple['annee'], $tuple['couleurCheveux'], $tuple['couleurYeux'], $tuple['taille']);
		
    }
            
		
	public static function getAllEtudiant($connect)
	{
		$req ="SELECT id,nom, prenom, section, annee, couleurCheveux, couleurYeux, taille FROM etudiant ORDER BY id DESC";
		$res = mysqli_query($connect, $req) or die ("Erreur insertion : Classe Etudiant / fonction getAllEtudiant");
		return $res;
	}
	
}
?>


