<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
	   <meta charset="utf-8">
	   <title>Espace de création de comptes</title>
	   <style>
	   #espaceErreur {
			font-weight: bold;
			margin-bottom: 50px;
			background: #ddd;
			text-align: center;
			padding: 10px;
			border-radius: 10px;
		}
		body {
			margin: 10px 10%;
			font-family: sans-serif;
		}
	   </style>
   </head>
   <body>
	   <div id="espaceErreur">
			<?php
			$fileToEdit = "art1.html";

			function traitement() {
				if ( empty($_POST["bouton"]) ) {
					return "";
				}
				if ( empty($_POST["password"]) ) {
					// Si le password est vide, faire :
					return "Erreur : pas de password !";
				}
				if ($_POST["password"] !== "admin") {
					return "Erreur : mauvais mot de passe";
				}
				if ( empty($_POST["name"]) ) {
					// Si le nom est vide, faire :
					return "Erreur : pas de nom !";
				}
				if ( empty($_POST["birthday"]) ) {
					// Si le nom est vide, faire :
					return "Erreur : Pas de date d'anniversaire valide !";
				}

				if ( empty($_POST["status"]) ) {
					$status = "Élève";
				} else {
					$status = "Professeur";
				}
				// tout est okay !!
				$valeurRetour  = "Nom envoyé : " . $_POST["name"];
				$valeurRetour .= " Date d'anniv: " . $_POST["birthday"];
				$valeurRetour .= " Statut : " . $status;

				return $valeurRetour;
			}

			echo traitement();
			 ?>
	 	</div>


		<form action="gestion_accounts.php" method="post">
			<div style="float: right;border-left: 1px solid grey;padding: 30px;">
				<p>Entrez le mot de passe pour valider</p>
				<input type="password" name="password" value="">
				<br><br>
				<input type="submit" name="bouton" value="envoyer">
			</div>


			<input type="text" name="name" value="NOM prénom">
			<br><br>
			<input type="date" name="birthday" value="2000-01-01">
			<br><br>
			<select name="status">
				<option value="">Élève</option>
				<option value="true">Professeur</option>
			</select>
		</form>
	</body>
</html>
