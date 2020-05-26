<?php
/*
 * Processing.php : sorte d'API qui permet l'édition des articles
 * Suppression, déplacement, renommage...
*/
require '../functions.php';

function main() {
	$articlesFileList = glob("../../articles/[[:digit:]]#*.html");
	natsort($articlesFileList);

	echo "<h1>TEST :</h1> <br>";
	echo "Affichage des fichiers au départ : <br>";
	echo "<textarea rows='8' cols='80'>";
			print_r($articlesFileList);
	echo "</textarea>";

	if (!isset($_GET["id"])) {
		echo p("Erreur : veuillez spécifier un article à traiter en paramètre GET.");

		return 1;
	}
	if (getArticleFilenameById($_GET["id"], "../..") === false) {
		echo p("Erreur : l'id spécifié ne correspond à aucun article existant.");

		return 1;
	}
	$id = $_GET["id"];

	switch ($_GET["action"]) {
		case 'delete':
			deleteArticle($id, $articlesFileList);
			break;
		case 'rename':
			renameArticleById($id, $articlesFileList);
			break;
		case 'moveUp':
			$newFileList = moveItemUp($id, $articlesFileList);
			doReordering($newFileList);
			break;
		case 'moveDown':
			$newFileList = moveItemDown($id, $articlesFileList);
			doReordering($newFileList);
			break;
		default:
			echo p("ERREUR : Aucune action spécifiée. Merci de choisir.");
			echo ul(
				a("?id=$id&action=delete", "delete"),
				a("?id=$id&action=rename&target=ceci est un test !", "rename"),
				a("?id=$id&action=moveUp", "moveUp"),
				a("?id=$id&action=moveDown", "moveDown")
			);
			break;
	}
}

// TODO : une fois fini, les fonctions doivent être déplacées dans functions.php
function deleteArticle($original) {
	// À compléter par Romain !
	echo p("l'article qui a pour identifiant [$original] sera supprimé");
}
function renameArticleById($id, $articlesFileList) {
	// À compléter par Romain !
	// tester le code : http://localhost/panneau/gestion/news/processing.php?id=1&action=rename&target=%22Bonjour%20le%20monde%22
	$target = $_GET["target"];
	echo p("l'article qui a pour identifiant [$id] va voir son nom renommé par [$target]...");
	// (me contacter en cas de besoin d'aide !) Il suffit de :
	// 1 - récupérer le chemin du fichier dans une variable ($originalFile) par ex.
	// 2 - récupérer uniquement son nom ($originalFileName)
	// 3 - dans le chemin du fichier, remplacer son nom original par $target
	//     et mettre le résultat dans $newFile
	// 4 - exécuter renameFile($originalFile, $newFile);
}
function renameFile($original, $target) {
	// À compléter par Romain uniquement si renameArticleById fonctionne.
	// Renommage strict à partir de noms de fichiers.
	echo p("[$original] sera renommé par [$target]");
}

function moveItemUp($id, $articlesFileList) {
	// Annule la tâche si on veut déplacer l'article le 1er encore plus haut
	if ($id <= 0) {
		return false;
	}
	// Échange simplement les valeurs de l'item actuel avec l'item "supérieur".
	$upperItemContent = $articlesFileList[$id - 1];
	$articlesFileList[$id - 1] = $articlesFileList[$id];
	$articlesFileList[$id] = $upperItemContent;

	return $articlesFileList;
}
function moveItemDown($id, $articlesFileList) {
	// Annule la tâche si on veut déplacer l'article le dernier encore plus bas
	if ($id + 1 >= count($articlesFileList)) {
		return false;
	}
	// Échange simplement les valeurs de l'item actuel avec l'item "inférieur".
	$downerItemContent = $articlesFileList[$id + 1];
	$articlesFileList[$id + 1] = $articlesFileList[$id];
	$articlesFileList[$id] = $downerItemContent;

	return $articlesFileList;
}
function doReordering($newFileList) {
	if ($newFileList === false) {
		// Ne fais rien si il n'y a rien a faire.
		echo p("*Ne fais rien*"); // TODO : à supprimer sur le code final.
		return 1;
	}
	// Applique les modifications "virtuelles" réellement
	foreach ($newFileList as $articleId => $origFileName) {
		// Mets à jour l'identifiant dans le nom de fichier. Ça remplace
		// uniquement le PREMIER chiffre (\d+) que PHP trouve par $articleId
		// Exemple :
		// Entrée : $articleId = 1;
		//  		$baseName = ../../articles/2#Information numéro 2.html
		// Sortie : $newFileName = ../../articles/1#Information numéro 2.html
		$newFileName = preg_replace('~\\d+~', $articleId, $origFileName, 1);

		renameFile($origFileName, $newFileName);
	}
}

main();
