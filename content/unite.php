
	<?php
	if(isSet($_GET['supprimer'])&& !empty($_GET['supprimer'])){
		$id = $_GET['supprimer'];
		//$count = delUnite($_POST['id_unite']);
		$unite = new unite;
		$unite->delUnite($bdd,$id);
		header('Location: index.php?action=afficherUnite');  
	}

	$unite = new unite; 
	//$reponse = $unite -> getAllUnite();
	$affichageUnite = new affichageTable;
	$reponse = $affichageUnite->getTable($bdd, 'unite');
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
						Unité
					</strong>
				</th>
				<th>
					<strong>
						symbole de l'unité
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
		<td><?php echo $donnees['libelle_unite']; ?></td>
		<td><?php echo $donnees['symbole_unite']; ?></td>		
		<td>
			<a href="index.php?action=modifierUnite&modifier=<?php echo $donnees['id_unite']; ?>"> Modifier</a>
		</td>
		<td>	
			<a href="index.php?action=afficherUnite&supprimer=<?php echo $donnees['id_unite']; ?>"> Supprimer</a>
		</td>
	</tr>
<?php
}
?>
	<tr>
		<td colspan=4>
			<a href="index.php?action=modifierUnite"> Ajouter</a>
		</td>

	</tr>
		</table>
	</div>	
</div>
<?php

$reponse->closeCursor(); // Termine le traitement de la requ?e

?>
