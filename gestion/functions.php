<?php
/* FUNCTIONS.PHP
 * utilitaires automatisant certaines tâches. à importer avec include.
*/

// Création d'une session.
session_start();

// Détermine si la session actuelle n'est pas connectée en tant qu'admin (automatique)
$isNotAdmin = empty($_SESSION["admin"]);

// Connection à la base de donnée (automatique)
try {
	$dbID = 'root';
	$dbPassword = '';
	$db = new PDO('mysql:host=localhost;dbname=panneau;charset=utf8', $dbID, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e) { die('Erreur : '.$e->getMessage()); }

// FONCTIONS :

function abortIfNotAdmin() {
	// Pas possible d'utiliser $isNotAdmin pour cause de pb de portée de variable
	if (empty($_SESSION["admin"])) {
		?> <!DOCTYPE html> <html> <head> <meta charset="utf-8"> <title>Forbidden access</title> </head> <body>

		<h2>Forbidden Access</h2>
		<p>Vous n'avez pas les droits pour accéder à cette page. Merci de <a href='/gestion/'>vous connecter</a>.</p>

		</body> </html> <?php
		// Quitte le script
		die();
	}
}

function listFilesInsideFolder($pattern = "./") {
	/*	Retourne la liste de tous les fichiers correspondant à $pattern
		utilisable pour afficher la liste des articles disponibles */
	$retval = ["art1", "art2"];

	return $retval;
}

function getDatabaseInstance() {
	/* Permet la connection de la base de donnée. Retourne l'objet permettant
	   de faire des manipulations sur la base de données*/
	$db = function ($arg) {return "Appel de la fonction $arg dans la base de données"; };

	return $db;
}

function editInfos($db, $name, $birthday, $is_student, $is_here, $id = '-1') {
	/* Modifie les informations de $id : nom, anniv, est étudiant, est présent
	Si ID = -1 (défaut) c'est qu'on crée un nouvel étudiant*/
	if ($id == "-1") {
		$reponse = $db->query("
			INSERT INTO `accounts` (`card_id`, `name`, `birthday`, `is_student`, `is_here`)
							VALUES (NULL, '$name', '$birthday', '$is_student', '$is_here')");
	} else {
		$reponse = $db->query("
			UPDATE `accounts` SET name = $name, birthday = $birthday, is_student = $is_student, is_here = $is_here
			WHERE card_id = $card_id");
	}

	$retval = "FAIT !";

	return $retval;
}
function getInfos($db, $id) {
	/* Renvoie sous forme de liste les informations de $id*/
	$reponse = $db->query("SELECT * FROM `accounts` WHERE card_id=$id");

	return $reponse->fetch();
}
function getAllAccountsNames($db) {
	/*	Renvoie un tableau associatif qui contient en clé l'id de la personne et
		en contenu le nom de la personne.*/
	$reponse = $db->query('SELECT card_id, name FROM `accounts`');

	while ($account = $reponse->fetch()) {
		$account_id = $account['card_id'];
		$retval[$account_id] = $account['name'];
	}

	$reponse->closeCursor();

	return $retval;
}

// HTML shortcuts (make better code)
function p($content) {
	return "<p> $content </p>";
}
function br() {
	return "<br>";
}
function a($href, $content = "") {
	if ($content == "") {
		$content = $href;
	}

	return "<a href='$href'> $content </a>";
}
function ul(...$listItems) { // ... = arguments en nombre infini dans une liste
	$retval = "<ul>";
	foreach ($listItems as $item) {
		$retval .= "<li>$item</li>";
	}
	$retval .= "</ul>";

	return $retval;
}
function form($content, $action = "?", $method = "POST") {
	return "<form action='$action' method='$method'> $content </form>";
}
function input($name, $type = "text", $value = "") {
	return "<input type='$type' name='$name' value='$value' />";
}
 ?>
