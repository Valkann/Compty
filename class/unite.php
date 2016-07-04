<?php


class unite { 
	/*  ATTRIBUTS     */    
	    private $id;
	    private $nom;    
	    private $symbole;  

	/*===========================================================
	METHODES
	===============================================================*/   

/*	function getAllUnite() {
		$bdd = new PDO('mysql:host=localhost;dbname=compty;charset=utf8', 'root', 'cmc71adm');
		$reponse = $bdd->query('SELECT * FROM unite');
		return $reponse;
		$reponse->closeCursor();
	}*/

	function getId() {
		return $this->id;
	}

	function getNom() {
		return $this->nom;
	}

	function getSymbole() {
		return $this->symbole;
	}

	function setId($newID) {
		 $this->$id = $newID;
	}

	function setNom($newName) {
		 $this-> $nom = $newName;
	}

	function setSymbole($newSymbole) {
		 $this->$symbole = $newSymbole;
	}


	function getUnite($bdd, $id) {
				
				$myinsecuredata=$id;
				$sql = 'SELECT * FROM unite WHERE id_unite = '. $myinsecuredata;
				$reponse = $bdd->query($sql);
				foreach ($reponse as $unite ) {
					$this->id = $myinsecuredata;
					$this->nom =  $unite["libelle_unite"];
					$this->symbole= $unite["symbole_unite"];
				}
				$reponse->closeCursor();
	}

	function setUnite($bdd, $nom , $symbole) {
			
			$insert ='INSERT INTO unite (libelle_unite,symbole_unite) VALUES (:libelle_unite, :symbole_unite)';
			$req = $bdd->prepare($insert);
			$req->execute(array(
			    'libelle_unite' => $nom,
			    'symbole_unite' => $symbole
	    	));
	    	$req->closeCursor();
	}

	function delUnite($bdd, $id) {
			
			$insert ='DELETE FROM unite WHERE id_unite = :id_unite';
			$req = $bdd->prepare($insert);
			$req->execute(array(
			    'id_unite' => $id
	    	));
	    	$req->closeCursor();
	}

	function upUnite($bdd, $id, $nom , $symbole) {
			
			$insert ='UPDATE unite set libelle_unite =:libelle_unite, symbole_unite = :symbole_unite WHERE id_unite = :id';
			$req = $bdd->prepare($insert);
			$req->execute(array(
			    'libelle_unite' => $nom,
			    'symbole_unite' => $symbole,
			    'id' => $id 
	    	));
	    	$req->closeCursor();
	}
}	

?>