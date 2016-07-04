<?php


	if(isset($_POST['ajouter']) && !empty($_POST['ajouter']))
	{
		    	$type_conso = new type_conso;
		    	/*
		    	 echo $_POST['nom'];
		    	echo '<br />';
		    	echo $_POST['symbole'];
		    	*/
		    	$type_conso->setTypeConso($bdd,$_POST['nom'],$_POST['unite']);
		    	//header('Location: index.php?action=afficherTypeConso');
?>
	<div id="formulaire">
   		<div id="header">
			<h3>Données ajoutées</h3>
		</div>
		<div id="content">
			Vos informations ont été insérées dans la base de données. <br />
			nouveau type de consommation  : <strong><?php echo $_POST['nom'] ?></strong> en <strong> 
			<?php 
				$unite = new unite ;
				$unite->getUnite($bdd, $_POST['unite']);
				echo $unite->getNom();
				?>	
			</strong>
			<form action="index.php?action=afficherTypeConso" method="post">
				<p><input type="submit" value="Retour" name="retour"></p>
			</form>	
		</div>		
	</div>	
<?php		
   }
   
   elseif(isSet($_POST['modifier']) && !empty($_POST['modifier']))
   {
		$id = $_POST['modifier'];
		$unite = new unite;
		$unite->upUnite($bdd, $_POST['id'],$_POST['nom'],$_POST['unite'] ) ; 
   	# code...
   
?>
	<div id="formulaire">
   		<div id="header">
			<h3>Données modifiées</h3>
		</div>
		<div id="content">
			Vos informations ont été modifiées dans la base de données. <br />
			nouvelle unité : <strong><?php echo $_POST['nom'] ?></strong> ayant pour symbole <strong> <?php echo $_POST['symbole'] ?> </strong>
			<form action="index.php?action=afficherTypeConso" method="post">
				<p><input type="submit" value="Retour" name="retour"></p>
			</form>	
		</div>		
	</div>	
<?php

   }
    elseif(isSet($_GET['modifier']) && !empty($_GET['modifier']))
   {
		$id = $_GET['modifier'];
		$type_conso = new type_conso;
		$type_conso->type_conso($bdd, $id) ; 
   	# code...
?>   
	<div id="formulaire">
			<div id="header">
				<h3>Ajout d'un type de consommation</h3>
			</div>
			<div id="content">
				<form action="index.php?action=modifierTypeConso" method="post">
					<table class ="gridtable">
						<tr>
							<th>Type de consommation</th>
							<th>Unité</th>
						</tr>
						<tr>
							<td><input type="text" name="nom" value="<?php echo $type_conso->getNom();?>"/></td>
							<td><input type="text" name="unite" value="<?php echo $type_conso->getUnite();?>"/></td>
						</tr>
						<tr>
							<td colspan=2>
								<input type="hidden" name="id" value="<?php echo $unite->getId();?>"/>
								<input type="submit" value="Modifier" name="modifier"/>
							</td>
						</tr>
					</table>	
				</form>
			</div>
		</div>

 <?php  
   }else {
?>
	<div id="formulaire">
		<div id="header">
			<h3>Ajout d'un type de consommation</h3>
		</div>
		<div id="content">
			<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="post">
				<table class ="gridtable">
					<tr>
						<th>Type de consommation</th>
						<th>Unité</th>
					</tr>
					<tr>
						<td><input type="text" name="nom" /></td>
						<td>
						<select name="unite"> 
						<?php
						  // Variable qui ajoutera l'attribut selected de la liste déroulante
							  $selected = '';
							 
							// Parcours du tableau
							
							$affichageUnite = new affichageTable;
							$reponse = $affichageUnite->getTable($bdd, 'unite');
							while ($donnees = $reponse->fetch())
							{
						?>
							<option value=<?php echo $donnees['id_unite']; ?>><?php echo $donnees['libelle_unite']; ?></option>
						<?php		
							}
						?>	
							</select>						
						</td>
						<!-- <td><input type="text" name="unite" /></td> -->
					</tr>
					<tr>
						<td colspan=2>
							<input type="submit" value="Ajouter" name="ajouter"/>
						</td>	
					</tr>
				</table>
			</form>		
		</div>
	</div>

<?php

 }
	
	
?>