<?php
// TODO: Fusionner accounts et accounts_admin qui possèdent la même fonction.

include '../functions.php';
abortIfNotAdmin();

function traitement() {
	if (empty($_POST["bouton"])) {
		return "";
	}
	if (empty($_POST["name"])) {
		// Si le nom est vide, faire :
		return "Erreur : pas de nom !";
	}
	if (empty($_POST["birthday"])) {
		// Si l'anniversaire est vide, faire :
		return "Erreur : Pas de date d'anniversaire valide !";
	}

	if (empty($_POST["status"])) {
		$status = "Élève";
	} else {
		$status = "Professeur";
	}
	// tout est okay !!
	// TODO: Adapter avec les bases de données
	$valeurRetour = "Nom envoyé : <i>".$_POST["name"]."</i>";
	$valeurRetour .= " Date d'anniv: <i>".$_POST["birthday"]."</i>";
	$valeurRetour .= " Statut : <i>".$status."</i>";

	return $valeurRetour;
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Espace de création de comptes</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
	<p id="gestionNav">
		<a href="../">Espace de gestion</a> >
		<a href="./">Gestion des comptes</a> >
		<a href="?">Formulaire de création de comptes</a>
	</p>
	<div id="espaceErreur">
		<h1>Formulaire de création de comptes</h1>
		<?php echo traitement(); ?>
	</div>
	<form action="?" method="post"> <table><tbody><tr>
		<td>
			<input type="text" name="name" value="NOM prénom">
			<br><br>
			<input type="date" name="birthday" value="2000-01-01">
			<br><br>
			<select name="status">
				<option value="">Élève</option>
				<option value="true">Professeur</option>
			</select>
		</td>
		<td id="formValidation">
			<input type="submit" name="bouton" value="Créer le compte   " id="submitBtn">
		</td>
	</tr></tbody></table> </form>
</body>
</html>
