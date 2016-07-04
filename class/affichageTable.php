<?php 

class affichageTable { 
	/*  ATTRIBUTS     */    
	    var $table;

		/*===========================================================
		METHODES
		===============================================================*/   
		
		function getTable($bdd, $table) {
			$reponse = $bdd->query('SELECT * FROM '.$table);
			return $reponse;
			$reponse->closeCursor();
		}

		function getRequest($table) {
			$request = "SELECT * FROM ".$table;
			return $request;
		}
	}

?>