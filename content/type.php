
	<?php
	if(isSet($_GET['supprimer'])&& !empty($_GET['supprimer'])){
		$id = $_GET['supprimer'];
		//$count = delUnite($_POST['id_unite']);
		$type_conso = new type_conso;
		$type_conso->delTypeConso($bdd,$id);
		header('Location: index.php?action=afficherUnite');  
	}

	$type_conso = new type_conso; 
	//$reponse = $unite -> getAllUnite();
	$affichageTypeConso = new affichageTable;
	$reponse = $affichageTypeConso->getTable($bdd, 'type_consommation');
	//echo $affichageUnite->getRequest('unite');
	// On affiche chaque entrée une à une
	?>
<div id="formulaire">
   		<div id="header">
			<h3>Liste des unité</h3>
		</div>
	<div id="content">	
	    <table class="gridtable">
			<tr>
				<th>
					<strong>
						Type de consommation
					</strong>
				</th>
				<th>
					<strong>
						Unité
					</strong>	
				</th>
				<th>
					<strong>
					Modifier
					</strong>
				</th>
				<th>
					<strong>
					Supprimer
					</strong>
				</th>
			</tr>

<?php
while ($donnees = $reponse->fetch())
{
?>
	<tr>
		<td><?php echo $donnees['libelle_type_consommation']; ?></td>
		<td><?php echo $donnees['id_unite']; ?></td>		
		<td>
			<a href="index.php?action=modifierTypeConso&modifier=<?php echo $donnees['id_type_consommation ']; ?>"> Modifier</a>
		</td>
		<td>	
			<a href="index.php?action=afficherTypeConso&supprimer=<?php echo $donnees['id_type_consommation ']; ?>"> Supprimer</a>
		</td>
	</tr>
<?php
}
?>
	<tr>
		<td colspan=4>
			<a href="index.php?action=modifierTypeConso"> Ajouter</a>
		</td>

	</tr>
		</table>
	</div>	
</div>
<?php

$reponse->closeCursor(); // Termine le traitement de la requ?e

?>
