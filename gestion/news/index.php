<?php
include '../functions.php';

abortIfNotAdmin();

function generateContent() {
	$articlesFileList = glob("../../articles/*.html");
	template_newsList($articlesFileList);
	template_createNews($articlesFileList);
}

function template_createNews($articlesFileList) {
	$defaultValue = "art". (count($articlesFileList)+1);

	echo "<h2>Créer un nouvel article</h2>";
	echo form(
			"<label for='articleName'>Nom de l'article</label>"
			. input("articleName", "text", $defaultValue)
			. input("submit", "submit", "Créer un nouvel article"),
			"create.php"
		);
}
function template_newsList($articlesFileList) {
	foreach ($articlesFileList as $i => $path) {
		// TODO: Utiliser un tableau, c'est + joli
		// TODO: Meilleure prise en charge des noms
		$name = $path;
		echo "<a class=\"fichier\" href='edit.php?article=$path'>$name</a><br>";
	}
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
		<a href="?">Liste des articles</a>
	</p>
	<div id="espaceErreur">
		<h1>Liste des articles à éditer</h1>
	</div>
	<div id="ListeFichier">
		<?php echo generateContent(); ?>
	</div>
</body>
</html>
