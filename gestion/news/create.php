<?php
include '../functions.php';

function main() {
	$articlesFileList = glob("../../articles/*.html");

	$new_id = count( $articlesFileList );
	$new_articleName = $_POST["articleName"];
	$new_basename = $new_id."#".$new_articleName;
	$new_filename = "../../articles/$new_basename.html";
	$new_articleContent = "Bienvenue !! Écrivez votre article.

	Il est possible d'écrire en HTML.
	Les sauts de lignes sont automatiquement ajoutés par l'éditeur.
	";
	if (new_id > 3) {
		die("Erreur : vous ne pouvez pas créer au delà de 4 articles. Supprimez-en.");
	}
	if (in_array($new_filename, $articlesFileList)) {
		die("Erreur : une erreur inattendue est survenue : le nouveau fichier que vous tentez d'écrire existe déjà.");
	} else {
		file_put_contents($new_filename, $new_articleContent);
		$_SESSION['article'] = $new_articleName;
		header('location: edit.php');
	}
}

if (!empty($_POST["articleName"])) {
	main();
} else {
	die("Nom spécifié incorrect ! <a href='./'>retourner en arrière</a>");
}
 ?>
