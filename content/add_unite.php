<?php


	if(isset($_POST['ajouter']) && !empty($_POST['ajouter']))
	{
		    	$unite = new unite;
		    	/*
		    	 echo $_POST['nom'];
		    	echo '<br />';
		    	echo $_POST['symbole'];
		    	*/
		    	$unite->setUnite($bdd,$_POST['nom'],$_POST['symbole']);
		    	//header('Location: index.php?action=afficherUnite');
?>
	<div id="formulaire">
   		<div id="header">
			<h3>Données ajoutées</h3>
		</div>
		<div id="content">
			Vos informations ont été insérées dans la base de données. <br />
			nouvelle unité : <strong><?php echo $_POST['nom'] ?></strong> ayant pour symbole <strong> <?php echo $_POST['symbole'] ?> </strong>
			<form action="index.php?action=afficherUnite" method="post">
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
		$unite->upUnite($bdd, $_POST['id'],$_POST['nom'],$_POST['symbole'] ) ; 
   	# code...
   
?>
	<div id="formulaire">
   		<div id="header">
			<h3>Données modifiées</h3>
		</div>
		<div id="content">
			Vos informations ont été modifiées dans la base de données. <br />
			nouvelle unité : <strong><?php echo $_POST['nom'] ?></strong> ayant pour symbole <strong> <?php echo $_POST['symbole'] ?> </strong>
			<form action="index.php?action=afficherUnite" method="post">
				<p><input type="submit" value="Retour" name="retour"></p>
			</form>	
		</div>		
	</div>	
<?php

   }
    elseif(isSet($_GET['modifier']) && !empty($_GET['modifier']))
   {
		$id = $_GET['modifier'];
		$unite = new unite;
		$unite->getUnite($bdd, $id) ; 
   	# code...
?>   
	<div id="formulaire">
			<div id="header">
				<h3>Ajout d'unité</h3>
			</div>
			<div id="content">
				<form action="index.php?action=modifierUnite" method="post">
					<table class ="gridtable">
						<tr>
							<th>Nom de l'unité</th>
							<th>Symbole de l'unité</th>
						</tr>
						<tr>
							<td><input type="text" name="nom" value="<?php echo $unite->getNom();?>" required/></td>
							<td><input type="text" name="symbole" value="<?php echo $unite->getSymbole();?>" required/></td>
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
			<h3>Ajout d'unité</h3>
		</div>
		<div id="content">
			<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="post">
				<table class ="gridtable">
					<tr>
						<th>Nom de l'unité</th>
						<th>Symbole de l'unité</th>
					</tr>
					<tr>
						<td><input type="text" name="nom" required placeholder="Entrez un nom"/></td>
						<td><input type="text" name="symbole" required placeholder="Entrez un symbole" /></td>
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