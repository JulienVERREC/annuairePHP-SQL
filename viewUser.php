<html>
	<div>
		<h2>Annuaire :</h2>
		<table>
			<tr>
				<th>Id</th>
				<th>Nom</th>	
				<th>Prénom</th>
				<th>Date de naissance</th>
				<th>Adresse</th>
				<th>Téléphone</th>
				<th>Entreprise</th>
			</tr>
		
			<?php 

				try {
					$bdd = new
					PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'root', 'ENZMAT');
					}
				catch (Exception $e){
					die('Erreur : ' . $e->getMessage());
				}

				$reponse = $bdd->query('SELECT * FROM contacts');
					while($donnees=$reponse->fetch()){
						$id = $donnees['id'];
						$Nom = $donnees['Nom'];
						$Prenom = $donnees['Prenom'];
						$BirthDate = $donnees['BirthDate'];
						$Adresse = $donnees['Adresse'];
						$Phone = $donnees['Phone'];
						$Entreprise = $donnees['Entreprise'];

						echo "
							<tr>
								<td>$id</td>
								<td>$Nom</td>
								<td>$Prenom</td>
								<td>$BirthDate</td>
								<td>$Adresse</td>
								<td>$Phone</td>
								<td>$Entreprise</td>
							</tr>
						";
					};
			?>
		</table>
	</div>
	<div>
		<table>
				<h2>Groupes</h2>
			<tr>
				<th>Id :</th>
				<th>Groupe(s) :</th>
				<th>Nouveau Groupe :</th>
			</tr>
			<?php

				try {
					$bdd = new
					PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'root', 'ENZMAT');
					}
				catch (Exception $e){
					die('Erreur : ' . $e->getMessage());
				}

				$reponse = $bdd->query('SELECT * FROM groupType');
				foreach ($reponse as $reponse) {
						$id = $reponse['id'];
						$groupName = $reponse['groupName'];
						$newNameGroup = $reponse['newNameGroup'];
					}	
					// while($donnees=$reponse->fetch()){
					// 	$id = $donnees['id'];	
					// 	$groupName = $donnees['groupName'];
					// 	$newNameGroup = $donnees['newNameGroup'];
						echo "
							<tr>
								<td>$id</td>
								<td>$groupName</td>
								<td>$newNameGroup</td>
							</tr>
						";
			
					
			?>
		</table>
	</div>
			
</html>
				
