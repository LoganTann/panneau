<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
	   <meta charset="utf-8">
	   <title>Espace de création de comptes</title>
	   <link rel="stylesheet" href="style.css">
   </head>
   <body>
	   <p id="gestionNav">
		   <a href="index.php">Espace de gestion</a> >
       <a href="choose.php">Gestion des comptes</a> >
		   <a href="accounts_admin.php">Formulaire de création de comptes</a>
	   </p>
	   <div id="espaceErreur">
		   <h1>Formulaire de création de comptes, espace administrateur</h1>
			<?php
			$fileToEdit = "art1.html";

			function traitement() {
				if ( empty($_POST["bouton"]) ) {
					return "";
				}
				if ( empty($_POST["name"]) ) {
					return "Erreur : pas de nom !";
				}
				if ( empty($_POST["birthday"]) ) {
					return "Erreur : Pas de date d'anniversaire valide !";
				}

				if ( empty($_POST["status"]) ) {
					$status = "Élève";
				} else {
					$status = "Professeur";
				}
				// tout est okay !!
				$valeurRetour  = "Nom envoyé : <i>" . $_POST["name"] . "</i>";
				$valeurRetour .= " Date d'anniv: <i>" . $_POST["birthday"] . "</i>";
				$valeurRetour .= " Statut : <i>" . $status . "</i>";

				return $valeurRetour;
			}

			echo traitement();
			 ?>
	 	</div>

		<form action="accounts_admin.php" method="post"> <table><tbody><tr>
			<td>
				<input type="text" name="name" value="NOM prénom">
				<br><br>
				<input type="date" name="birthday" value="2000-01-01" data-kwimpalastatus="alive" data-kwimpalaid="1583498132459-4">
				<br><br>
				<select name="status">
					<option value="">Élève</option>
					<option value="true">Professeur</option>
				</select>
			</td>
			<td id="formValidation">
				<input type="submit" name="bouton" value="envoyer" id="submitBtn">
			</td>
		</tr></tbody></table> </form>
	</body>
</html>
