<?php

// Espace de modification / création d'articles

include '../functions.php';
abortIfNotAdmin();

$title = "Erreur";
$errors = "";
$fileContent = false;
$fileToEdit = false;

/* Recherche fichier à modifier (dans l'URL ou en session) */
if (!empty($_GET['article'])){
	$_SESSION['article'] = $_GET["article"];
	$fileToEdit = $_GET['article'];
} elseif (!empty($_SESSION['article'])){
	$fileToEdit = $_SESSION['article'];
} else {
	$errors = "Erreur : aucun fichier spécifié.";
}
/* Sauvegarde éventuelle */
if (!empty($_POST["bouton"])) { // Si on a cliqué sur le bouton pour sauvegarder
	$articleContent = $_POST["article"];

	if (empty($articleContent)) {
		$errors .= "Erreur : texte vide !";
	} elseif (!empty($fileToEdit)) {
		// Si c'est okay alors :
		$fileContent = $articleContent; // (sera utilisé par la suite)
		if (file_put_contents($fileToEdit, $fileContent)) {
			$errors .= "Texte modifié avec succès !<br>";
			$errors .= "<a href='../' target='_blank'>Prévisualiser</a>";
		} else {
			$errors .= "Erreur : Impossible de sauvegarder le fichier (problème de permissions de fichier en écriture dans le disque ?). Se référer à l'erreur ci-dessus.";
		}
	}
}
/* Obtention du contenu si vide*/
if ($fileToEdit !== false) {
	$title = "Modification de « $fileToEdit »";
	if ($fileContent === false) {
		$fileContent = file_get_contents($fileToEdit);
	}
}

function generateContent($fileContent) {
	if ($fileContent === false) {
		echo p("Erreur : le fichier que vous tentez de modifier n'existe pas, vous ne pouvez pas l'éditer ou bien une autre erreur est survenue. Si tel est le cas, elle est marquée plus haut.");
	} else {
		echo form("
		<input type='submit' name='bouton' value='envoyer' id='submitBtn'><br>
			<textarea name='article' rows='8' cols='80'>$fileContent</textarea>
			");
	}
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="../style.css">
	<style>
	textarea {
		height: 70vh; /* 70 view (écran) height*/
		margin-top: 20px;
	}
	</style>
</head>
<body>
	<p id="gestionNav">
		<a href="../">Espace de gestion</a> >
		<a href="./">Liste des articles</a> >
		<a href="?"><?php echo $title; ?></a>
	</p>
	<div id="espaceErreur">
		<?php
		echo "<h1>$title</h1>";
		echo $errors;
		?>
	</div>
	<main>
		<?php echo generateContent($fileContent); ?>
	</main>
</body>
</html>
