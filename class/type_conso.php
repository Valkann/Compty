<?php


class type_conso { 
	/*  ATTRIBUTS     */    
	    private $id;
	    private $nom;    
	    private $unite;  

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

	function getUnite() {
		return $this->$unite->getNom();
	}

	function setId($newID) {
		 $this->$id = $newID;
	}

	function setNom($newName) {
		 $this-> $nom = $newName;
	}

	function setUnite($newUnite) {
		 $this->$unite = $newUnite;
	}

	/*
	function getUniteName($bdd, $id) {
				
				$myinsecuredata=$id;
				$sql = 'SELECT * FROM type_consommation WHERE id_type_consommation = '. $myinsecuredata;
				$reponse = $bdd->query($sql);
				foreach ($reponse as $id_unite ) {
					$unite = new unite;
					$unite->getUnite($bdd, $id_unite);
				}
				return $unite;
				$reponse->closeCursor();
	}
	*/

	function getTypeConso($bdd, $id) {
				
				$myinsecuredata=$id;
				$sql = 'SELECT * FROM type_consommation WHERE id_type_consommation = '. $myinsecuredata;
				$reponse = $bdd->query($sql);
				foreach ($reponse as $TypeConso ) {
					$this->id = $myinsecuredata;
					$this->nom =  $TypeConso["libelle_type_consommation"];
					$unite = new unite;
					$this->unite = $unite->getUnite($bdd, $TypeConso["id_unite"]);
				}
				$reponse->closeCursor();
	}

	function setTypeConso($bdd, $nom, $unite) {
			
			$newUnite = new unite;
			$newUnite->getUnite($bdd, $unite);
			$insert ='INSERT INTO type_consommation (libelle_type_consommation,id_unite) VALUES (:libelle_type_consommation, :id_unite)';
			$req = $bdd->prepare($insert);
			$req->execute(array(
			    'libelle_type_consommation' => $nom,
			    'id_unite' => $newUnite->getId()
	    	));
	    	$req->closeCursor();
	}

	function delTypeConso($bdd, $id) {
			
			$insert ='DELETE FROM type_consommation WHERE id_type_consommation = :id_type_consommation';
			$req = $bdd->prepare($insert);
			$req->execute(array(
			    'id_type_consommation' => $id
	    	));
	    	$req->closeCursor();
	}

	function upTypeConso($bdd, $id, $nom , $id_unite) {
			
			$insert ='UPDATE type_consommation set libelle_type_consommation =:libelle_type_consommation, id_unite = :id_unite WHERE id_type_consommation = :id';
			$req = $bdd->prepare($insert);
			$req->execute(array(
			    'libelle_type_consommation' => $nom,
			    'id_unite' => $unite->getId(),
			    'id' => $id 
	    	));
	    	$req->closeCursor();
	}
}	

?>